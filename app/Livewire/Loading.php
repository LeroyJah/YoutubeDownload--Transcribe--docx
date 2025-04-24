<?php

namespace App\Livewire;

use Livewire\Component;

class Loading extends Component
{
    public $style = "bg-blue-300 text-white rounded px-2 hover:bg-blue-600 mr-2";

    public function changeStyle($style){
        $this->style = $style;
    }

    public function render()
    {
        return view('livewire.loading');
    }
}
