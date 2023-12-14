<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function index(){
        $partners = Partner::paginate(15);

        return view('dashboard', compact('partners'));
    }

    public function view($id){
        $partner = Partner::find($id);

        return view('livewire.partners.view', compact('partner'));
    }

    public function create(){
        return view('livewire.partners.create');
    }    

    public function searchCep($cep){
        $cep = trim(str_replace('-', '', $cep));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_URL, 'viacep.com.br/ws/'.$cep.'/json/');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "x-rapidapi-key:".env('API_FOOTBAL_KEY'),  
            "x-rapidapi-host: viacep.com.br", 
        ));

        $data = json_decode(curl_exec($ch));
        curl_close($ch);
        
        $response = [];
        if($data){
            $response['success'] = true;
            $response['data'] = $data;
        } else {
            $response['success'] = false;
            $response['data'] = "Erro ao buscar o CEP";
        }
        return response()->json($response);       
    }

    public function store(PartnerRequest $request){
        $partner = Partner::create($request->except('_token'));

        if($partner){
            return redirect()->route('dashboard')->with('alert-success','Sócio adicionado com sucesso');
        } else {
            return redirect()->route('dashboard')->withError('Erro ao adicionar sócio');
        }      
    }

    public function edit($id){
        $partner = Partner::find($id);

        return view('livewire.partners.edit', compact('partner'));
    }

    public function update($id, PartnerRequest $request){
        $partner = DB::table('partners')
              ->where('id', $id)
              ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'type' => $request->type,
                    'cpf' => $request->cpf,
                    'cep' => $request->cep,
                    'state' => $request->state,
                    'city' => $request->city,
                    'address' => $request->address,
                    'number' => $request->number,
                    'complement' => $request->complement ? $request->complement : null ,
                ]);

        if($partner){
            return redirect()->route('dashboard')->with('alert-success','Sócio atualizado com sucesso');
        } else {
            return redirect()->route('dashboard')->withError('Erro ao atualizar o sócio');
        }  
    }

    public function delete($id){
        $partner = Partner::where('id', $id)->delete();

        $response = [];
        if($partner){
            $response['success'] = true;
            $response['message'] = "Usuário deletado com sucesso";
        } else {
            $response['success'] = false;
            $response['message'] = "Erro ao deletar o usuário";
        }
        return response()->json($response);
    }
}

