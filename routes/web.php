<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranscribeController;
use App\Http\Controllers\fileUploadController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transcribe', [TranscribeController::class,'getView']);

Route::post('/savefile', [fileUploadController::class,'saveFile']);