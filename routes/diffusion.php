<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('diffusion.diffusion');
})->name("home");

Route::get('/editorialbv', function () {
    return view('diffusion.editorialbv');
})->name("editorialbv");