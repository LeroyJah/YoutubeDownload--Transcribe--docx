<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;

class SendTestMessage extends Component
{
    public $defaultNumber = "31612430324";
    #[Rule('required', message:'Field needs to be filled in.')]
    #[Rule('regex: /^[0-9]+$/', message:'Enter a valid phone number.')]
    public $phoneNumber;
    public $active = false;

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

    public function render()
    {
        return view('livewire.send-test-message');
    }
}
