<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranscribeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transcribe', [TranscribeController::class,'getView']);