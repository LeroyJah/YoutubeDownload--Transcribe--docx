<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TranscribeController extends Controller
{
    private $token;
    private $files;

    public function __construct()
    {
        $this->token = config('services.openai.secret');
        $this->files = File::allFiles(storage_path('app/public/files'));
    }

    public function getView(){
        if(session()->has('status')){
            return view('transcribe', ['status' => session('status'), 'files' => $this->files]);
        }else{
            return view('transcribe',['files' => $this->files]);
        }
    }

    public function transcribe(Request $request){
        $fileName = $request->get('path');

        $fileOpen = fopen(storage_path('app/public/files/'.$fileName),'r'); //file path

        dd($fileOpen);

        $docPath = stream_get_meta_data($audioInput)['uri']; 

        $character = '/';

        $trimPosition = strrpos($docPath, $character);

        $pathTrim = substr($docPath,$trimPosition); //trim to only keep original file name
    }
}
