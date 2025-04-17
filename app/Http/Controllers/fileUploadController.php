<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class fileUploadController extends Controller
{
    public function saveFile(Request $request){
        if($request->validate([
            'uploadedFile' => 'required|file|mimes:mp3,mp4|max:20480'
        ])){

            $file = $request->file('uploadedFile');

            $fileName = $file->getClientOriginalName();

            $path = $request->file('uploadedFile')->storeAs('files',$fileName,'public');

            return redirect()->route('transcribeView')->with(session()->flash('status','The upload was successful'));
        }
    }

    public function deleteFile(Request $request){
        $fileName = $request->get('path');

        $path = storage_path('app/public/files/'.$fileName);

        File::delete($path);

        return redirect()->route('transcribeView');
    }
}
