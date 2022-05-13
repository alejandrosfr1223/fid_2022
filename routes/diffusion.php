<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicBookController;

Route::get('/', function () {
    return view('diffusion.diffusion');
})->name("home");

Route::get('editorialbv', [PublicBookController::class,"show"])->name("editorialbv");