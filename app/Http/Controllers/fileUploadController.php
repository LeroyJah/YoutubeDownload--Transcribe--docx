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
            // $uploadedFile = $request->all()['uploadedFile'];

            // $path = $request->file('uploadedFile')->store('files');

            $file = $request->file('uploadedFile');

            $name = $file->getClientOriginalName();

            return $name;
        }
    }
}
