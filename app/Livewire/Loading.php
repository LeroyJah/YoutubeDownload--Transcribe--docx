<?php

namespace App\Livewire;

use Livewire\Component;

class Loading extends Component
{
    public $style = "bg-blue-300 text-white rounded px-2 hover:bg-blue-600 mr-2";
    public $buttonText = "Whisper"; 
    public $icon = false;

    public function changeStyle($style){
        $this->style = $style;
        $this->changeText('Processing..');
        $this->icon = true;
    }

    public function changeText($text){
        $this->buttonText = $text;
    }

    public function render()
    {
        return view('livewire.loading');
    }
}
