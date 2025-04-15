<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class fileUploadController extends Controller
{
    public function saveFile(Request $request){
        if($request->validate([
            'uploadedFile' => 'required|file|mimes:mp3,mp4|max:20480'
        ])){

            $file = $request->file('uploadedFile');

            $fileName = $file->getClientOriginalName();

            $path = $request->file('uploadedFile')->storeAs('files',$fileName,'public');

            return redirect()->route('transcribe')->with(session(['status' => 'The upload was succesful']));
        }
    }
}
