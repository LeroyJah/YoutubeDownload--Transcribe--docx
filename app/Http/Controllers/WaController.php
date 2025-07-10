<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WaController extends Controller
{
    private $token;

    public function __construct()
    {
        $this->token = config('services.whatsapp.secret');
    }

    public function sendMessage()
    {
        $response = Http::withHeaders([
            'authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json'
        ])->post('https://graph.facebook.com/v22.0/677078752161030/messages?',[
            'messaging_product' => 'whatsapp',
            'to' => '31612430324',
            'type' => 'template',
            'template' => [
                'name' => 'hello_world',
                'language' => [
                    'code' => 'en_US'
                ]
            ]
        ]);

        dd($response->json());
    }
    public function getview()
    {
        return view('wa');
    }
}
