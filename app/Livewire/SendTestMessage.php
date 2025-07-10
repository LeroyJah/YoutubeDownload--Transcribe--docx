<?php

namespace App\Livewire;

use Livewire\Component;

class SendTestMessage extends Component
{
    public $defaultNumber = "31612430324";
    public $phoneNumber;

    public function setDefaultNumber()
    {
        $this->phoneNumber = $this->defaultNumber;
    }

    public function render()
    {
        return view('livewire.send-test-message');
    }
}
