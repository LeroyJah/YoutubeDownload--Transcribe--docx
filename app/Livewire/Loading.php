<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class Loading extends Component
{
    public $style = "bg-blue-300 text-white rounded px-2 hover:bg-blue-600 mr-2";
    public $buttonText = "Whisper"; 
    public $icon = false;
    public $fileName;
    private $token;

    public function __construct(){
        $this->token = config('services.openai.secret');
    }

    public function changeStyle($style){
        $this->style = $style;
        $this->changeText('Processing..');
        $this->icon = true;
    }

    public function changeText($text){
        $this->buttonText = $text;
    }

    public function mount($fileName){
        $this->fileName = $fileName;
    }

    public function wireTranscribe(){
        $fileOpen = fopen(storage_path('app/public/files/'.$this->fileName),'r'); //opening file for upload purposes

        $docPath = stream_get_meta_data($fileOpen)['uri']; //name of the file

        $character = '/';

        $trimPosition = strrpos($docPath, $character);

        $pathTrim = substr($docPath,$trimPosition); //trim to only keep original file name

        $response = Http::withHeaders([
            'authorization' => 'bearer '.$this->token,
            ])->attach('file',$fileOpen,$pathTrim)
            ->timeout(60)
            ->post('https://api.openai.com/v1/audio/transcriptions',['model' => 'gpt-4o-mini-transcribe']);

        $decode = json_decode($response);

        dd($decode);

        $word = new WordController;

        $word->exportData($decode->text,$pathTrim);

        return redirect()->route('transcribeView')->with(session()->flash('transcribe','The transcribe was successful'));
    }

    public function render()
    {
        return view('livewire.loading');
    }
}
