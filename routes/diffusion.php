<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicBookController;

Route::get('/', function () {
    return view('diffusion.diffusion');
})->name("home");

Route::get('audiovisual', function () {
    return view('diffusion.audiovisual');
})->name("audiovisual");

Route::get('visualcom', function () {
    return view('diffusion.visualcom');
})->name("visualcom");

Route::get('editorialbv', [PublicBookController::class,"show"])->name("editorialbv");