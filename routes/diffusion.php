<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('diffusion.diffusion');
})->name("home");

Route::get('audiovisual', function () {
    return view('diffusion.audiovisual');
})->name("audiovisual");

Route::get('visualcom', function () {
    return view('diffusion.visualcom');
})->name("visualcom");

Route::get('editorialbv', [BookController::class,"showBooks"])->name("editorialbv");