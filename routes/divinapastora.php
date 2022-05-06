<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('divinapastora.divinapastora');
})->name("home");