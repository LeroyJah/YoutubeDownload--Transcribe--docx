<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class Loading extends Component
{
    private $token;
    public $fileName;
    public $buttonText;
    private $doc;

    public function __construct(){
        $this->token = config('services.openai.secret');
        $this->doc = new \PhpOffice\PhpWord\PhpWord();
    }

    public function mount($fileName){
        $this->fileName = $fileName;
        $this->buttonText = "Processing..";
    }

    public function wireTranscribe(){
        $fileOpen = fopen(storage_path('app/public/files/'.$this->fileName),'r'); //opening file for upload purposes

        $docPath = stream_get_meta_data($fileOpen)['uri']; //name of the file

        $character = '/';

        $trimPosition = strrpos($docPath, $character);

        $pathTrim = substr($docPath,$trimPosition); //trim to only keep original file name

        $this->buttonText = "Trimming";

        $response = Http::withHeaders([
            'authorization' => 'bearer '.$this->token,
            ])->attach('file',$fileOpen,$pathTrim)
            ->timeout(60)
            ->post('https://api.openai.com/v1/audio/transcriptions',['model' => 'gpt-4o-mini-transcribe']);

        $decode = json_decode($response);

        // $decode = "This is a test string";

        $word = $this->exportData($decode->text,$pathTrim); //$decode->text for http request

        return redirect()->route('transcribeView')->with(session()->flash('transcribe','The transcribe was successful'));
    }

    public function exportData($docText,$docName)
    {
        $pathToFile = storage_path('app/public/transcript'.$docName.'.docx');

        $section = $this->doc->addSection();
        $section->addText($docText);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($this->doc, 'Word2007');
        $objWriter->save($pathToFile);
    }

    public function download(Request $request){
        $fileName = $request->get('path');

        $pathToFile = storage_path('app/public/transcript/'.$fileName);

        return response()->download($pathToFile);

    }

    public function render()
    {
        return view('livewire.loading');
    }
}
