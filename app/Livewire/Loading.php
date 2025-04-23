<?php

namespace App\Livewire;

use Livewire\Component;

class Loading extends Component
{
    public $style = "Master Jah";

    public function changeStyle($style){
        $this->style = $style;
    }

    public function render()
    {
        return view('livewire.loading');
    }
}
