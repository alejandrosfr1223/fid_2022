<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('documentation.documentation');
})->name("home");

Route::get('utrans', function () {
    return view('documentation.utrans');
})->name("utrans");

Route::get('ucat', function () {
    return view('documentation.ucat');
})->name("ucat");

Route::get('ucon', function () {
    return view('documentation.ucon');
})->name("ucon");

Route::get('dig_audiovideo', function () {
    return view('documentation.dig_audiovideo');
})->name("dig_audiovideo");

Route::get('dig_books', function () {
    return view('documentation.dig_books');
})->name("dig_books");