<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('formation.formation');
})->name('home');

Route::get('univ', function () {
    return view('formation.univ');
})->name("univ");

Route::get('instit', function () {
    return view('formation.instit');
})->name("instit");

Route::get('tutor', function () {
    return view('formation.tutor');
})->name("tutor");