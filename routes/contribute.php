<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContributeBookController;

Route::get('/', function () {
    return view('contribute.contribute');
})->name('home');

Route::view('contributeform', 'contribute.contributeform')->name('contributeform');

Route::post('contributeform', [ContributeBookController::class, "storeContrib"]);