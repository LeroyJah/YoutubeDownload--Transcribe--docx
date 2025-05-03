<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranscribeController;
use App\Http\Controllers\fileUploadController;
use App\Http\Controllers\WordController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/transcribe/view', [TranscribeController::class,'getView'])->name('transcribeView');

Route::post('/transcribe', [TranscribeController::class,'transcribe'])->name('transcribe');

Route::post('/savefile', [fileUploadController::class,'saveFile']);

Route::post('/deletefile', [fileUploadController::class,'deleteFile'])->name('delete');

Route::post('/download', [WordController::class,'download']);