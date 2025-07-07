<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WaController extends Controller
{
    private $token = '' ;

    public function __construct()
    {
        $this->token = config('services.whatsapp.secret');
    }

    public function sendMessage()
    {
        $response = Http::withHeaders([
            'authorization' => 'bearer '.$this->token,
            'Content-Type' => 'application/ json'
        ])->post('https://graph.facebook.com/v22.0/677078752161030/messages');

        dd($response->json());

//  -H 'Content-Type: application/json' \
//  -d '{ "messaging_product": "whatsapp", "to": "31612430324", "type": "template", "template": { "name": "hello_world", "language": { "code": "en_US" } } }'
    }
    public function getview()
    {
        return view('wa');
    }
}
