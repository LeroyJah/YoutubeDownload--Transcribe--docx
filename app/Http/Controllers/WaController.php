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
        dd($request->all());
        $phoneNumber = $request->get('phonenumber');
        $templateName = $request->get('templatename');

        $response = Http::withHeaders([
            'authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json'
        ])->post('https://graph.facebook.com/v22.0/677078752161030/messages?',[
            'messaging_product' => 'whatsapp',
            'to' => $phoneNumber,
            'type' => 'template',
            'template' => [
                'name' => $templateName,
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
