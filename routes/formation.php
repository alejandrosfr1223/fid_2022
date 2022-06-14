<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('formation.formation');
})->name('home');

Route::get('courses', function () {
    return view('formation.courses');
})->name("courses");

Route::get('congress', function () {
    return view('formation.congress');
})->name("congress");