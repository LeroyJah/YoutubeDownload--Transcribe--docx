<?php

namespace App\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $file;

    public function mount($file){
        $this->file = $file;
    }

    public function render()
    {
        return view('livewire.test');
    }
}
