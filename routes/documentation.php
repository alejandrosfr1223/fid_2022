<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('dig_books', [BookController::class,"showDigs"])->name("dig_books");

Route::get('dig_books/bookdig/{id}', [BookController::class,"showDigInfo"])->name("bookdig");