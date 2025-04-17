<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class TranscribeController extends Controller
{
    private $token;
    private $files;
    private $docs;

    public function __construct()
    {
        $this->token = config('services.openai.secret');
        $this->files = File::allFiles(storage_path('app/public/files'));
        $this->docs = File::allFiles(storage_path('app/public/transcript'));
    }

    public function getView(){
        if(session()->has('status')){
            return view('transcribe', ['status' => session('status'), 'files' => $this->files, 'docs' => $this->docs]);
        }elseif(session()->has('transcribe')){
            return view('transcribe',['transcribe' => session('transcribe'),'files' => $this->files, 'docs' => $this->docs]);
        }else{
            return view('transcribe',['files' => $this->files, 'docs' => $this->docs]);
        }
    }

    public function transcribe(Request $request){
        $fileName = $request->get('path');

        $fileOpen = fopen(storage_path('app/public/files/'.$fileName),'r'); //file path

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

        $word = new WordController;

        $word->exportData($decode->text,$pathTrim);

        return redirect()->route('transcribeView')->with(session()->flash('transcribe','The transcribe was successful'));

        return "exported the file";
    }
}
