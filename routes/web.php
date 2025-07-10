<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranscribeController;
use App\Http\Controllers\fileUploadController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\WaController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/transcribe/view', [TranscribeController::class,'getView'])->name('transcribeView');

Route::get('/download/view', [DownloadController::class,'getView'])->name('downloadView');

Route::get('/wa/view', [WaController::class,'getView'])->name('waView');

//Route::post('/wa/view/send', [WaController::class,'sendMessage'])->name('sendMessage'); thanks to LiveWire

Route::post('/transcribe', [TranscribeController::class,'transcribe'])->name('transcribe');

Route::post('/savefile', [fileUploadController::class,'saveFile']);

Route::post('/deletefile', [fileUploadController::class,'deleteFile'])->name('delete');

Route::post('/download', [WordController::class,'download']);
