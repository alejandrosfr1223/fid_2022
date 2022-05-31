<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('divinapastora.divinapastora');
})->name("home");

Route::get('fisidoro', function () {
    return view('divinapastora.fisidoro');
})->name("fisidoro");

Route::get('convsev', function () {
    return view('divinapastora.convsev');
})->name("convsev");

Route::get('div_pastora', function () {
    return view('divinapastora.div_pastora');
})->name("div_pastora");