<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranscribeController extends Controller
{
    private $token;

    public function __construct()
    {
        $this->token = config('services.openai.secret');
    }

    public function getView(){
        if(session()->has('status')){
            return view('transcribe', ['status' => session('status')]);
        }else{
            return view('transcribe');
        }
    }

    public function transcribe(){
        $audioInput = fopen(storage_path('path to file'),'r'); //file path

        $docPath = stream_get_meta_data($audioInput)['uri']; 

        $character = '/';

        $trimPosition = strrpos($docPath, $character);

        $pathTrim = substr($docPath,$trimPosition); //trim to only keep original file name
    }
}
