<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranscribeController extends Controller
{
    private $token;

    public function __construct(){

    }

    public function getView(){
        return view('transcribe');
    }

    public function transcribe(){
        
    }
}
