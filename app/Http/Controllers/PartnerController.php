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

        return view('partners.index', compact('partners'));
    }

    public function create(){
        return view('partners.create');
    }    

    public function store(PartnerRequest $request){
        $partner = Partner::create($request->except('_token'));

        if($partner){
            return redirect()->route('partners.index')->with('alert-success','Sócio adicionado com sucesso');
        } else {
            return redirect()->route('partners.index')->withError('Erro ao adicionar sócio');
        }      
    }

    public function edit($id){
        $partner = Partner::find($id);

        return view('partners.edit', compact('partner'));
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
                    'complement' => $request->complement,
                ]);

        if($partner){
            return redirect()->route('partners.index')->with('alert-success','Sócio atualizado com sucesso');
        } else {
            return redirect()->route('partners.index')->withError('Erro ao atualizar o sócio');
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

