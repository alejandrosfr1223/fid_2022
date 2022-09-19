<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

Route::get('/', function () {
    return view('formation.formation');
})->name('home');

Route::get('courses', function () {
    return view('formation.courses');
})->name("courses");

Route::get('congress', function () {
    return view('formation.congress');
})->name("congress");

Route::get('congress', [CursoController::class,"showcongresos"])->name("congress");

Route::get('congress/showcongress/{id}', [CursoController::class,"showcongreso"])->name("showcongress");

Route::get('courses', [CursoController::class,"showcursos"])->name("courses");

Route::get('courses/showcourse/{id}', [CursoController::class,"showcurso"])->name("showcourse");