<?php

namespace App\Livewire;

use Livewire\Component;

class SendTestMessage extends Component
{
    public $defaultNumber = "31612430324";
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
