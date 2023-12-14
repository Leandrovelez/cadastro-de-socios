<?php

namespace App\Livewire;

use Livewire\Component;

class Cep extends Component
{
    public $cep = '';

    public function render()
    {
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        // curl_setopt($ch, CURLOPT_URL, 'viacep.com.br/ws/'. $this->cep.'/json/');
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     "Content-Type: application/json",
        //     "x-rapidapi-key:".env('API_FOOTBAL_KEY'),  
        //     "x-rapidapi-host: v3.football.api-sports.io",  
        // ));

        // //$response = json_decode(curl_exec($ch));
        // curl_close($ch);

        return view('livewire.partners.create', ['reponse' => '$response']);
    }
}
