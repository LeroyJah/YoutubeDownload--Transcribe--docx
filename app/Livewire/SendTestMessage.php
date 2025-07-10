<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Rule;

class SendTestMessage extends Component
{
    public $defaultNumber = "31612430324";
    #[Rule('required', message:'Field needs to be filled in.')]
    #[Rule('regex: /^[0-9]+$/', message:'Enter a valid phone number.')]
    public $phoneNumber;
    public $active = false;
    public $token;

    public function mount()
    {
        $this->token = config('services.whatsapp.secret');
    }

    public function setDefaultNumber()
    {
        if($this->active === false){
            $this->phoneNumber = $this->defaultNumber;
            $this->active = true;
        }else{
            $this->phoneNumber = "";
            $this->active = false;
        }
    }

    public function sendMessage()
    {
        $this->validate();

        $response = Http::withHeaders([
            'authorization' => 'Bearer '.$this->token,
            'Content-Type' => 'application/json'
        ])->post('https://graph.facebook.com/v22.0/677078752161030/messages?',[
            'messaging_product' => 'whatsapp',
            'to' => $this->phoneNumber,
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

    public function render()
    {
        return view('livewire.send-test-message');
    }
}
