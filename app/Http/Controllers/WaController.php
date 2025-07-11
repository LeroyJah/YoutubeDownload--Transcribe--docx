<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WaController extends Controller
{
    private $token;
    public function __construct()
    {
        $this->token = config('services.whatsapp.secret');
    }
    public function sendMessage(Request $request)
    {
        $phoneNumber = $request->get('phonenumber');

        $response = Http::withHeaders([
            'authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json'
        ])->post('https://graph.facebook.com/v22.0/677078752161030/messages?',[
            'messaging_product' => 'whatsapp',
            'to' => $phoneNumber,
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
