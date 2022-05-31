<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('divinapastora.divinapastora');
})->name("home");

Route::get('fisidoro', function () {
    return view('diffusion.fisidoro');
})->name("fisidoro");

Route::get('convsev', function () {
    return view('diffusion.convsev');
})->name("convsev");

Route::get('div_pastora', function () {
    return view('diffusion.div_pastora');
})->name("div_pastora");