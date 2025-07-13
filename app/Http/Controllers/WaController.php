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
    public function templateMessage(Request $request)
    {
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

    public function serviceMessage(Request $request)
    {
        $phoneNumber = $request->get('phonenumber');
        $serviceMessage = $request->get('servicemessage');

        $response = Http::withHeaders([
            'authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json'
        ])->post('https://graph.facebook.com/v22.0/677078752161030/messages?',[
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $phoneNumber,
            'type' => 'text',
            'text' => [
                'body' => $serviceMessage
            ]
        ]);

        dd($response->json());
    }

    public function interactiveMessage(Request $request)
    {
        $buttons = [
            [
                "type" => "reply",
                "reply" => [
                    "id" => "centrum-btn",
                    "title" => "Almere-centrum"
                ]
            ],
            [
                "type" => "reply",
                "reply" => [
                    "id" => "buiten-btn",
                    "title" => "Almere-buiten"
                ]
            ],
            [
                "type" => "reply",
                "reply" => [
                    "id" => "lelystad-btn",
                    "title" => "Lelystad"
                ]
            ]
        ];

        dd(json_encode($buttons));

        $phoneNumber = $request->get('phonenumber');
        $serviceMessage = $request->get('servicemessage');

        $response = Http::withHeaders([
            'authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json'
        ])->post('https://graph.facebook.com/v22.0/677078752161030/messages?',[
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $phoneNumber,
            'type' => 'interactive',
            'interactive' => [
                'type' => 'button',
                'header' => [
                    'type' => 'text',
                    'text' => 'Welkom bij Soapclub'
                ],
                'body' => [
                    'text' => 'Op welke locatie bevindt u zich momenteel'
                ],
                'footer' => [
                    'text' => ''
                ],
                'action' => [
                    'buttons' => [[
                        $buttons
                    ]]
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
