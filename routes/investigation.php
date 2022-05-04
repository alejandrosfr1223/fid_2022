<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('investigation.investigation');
})->name("home");