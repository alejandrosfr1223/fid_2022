<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContributeBookController;

Route::get('/', function () {
    return view('contribute.contribute');
})->name('contribute');

Route::view('contributeform', 'contribute.contributeform');

Route::post('contributeform', [ContributeBookController::class, "storeContrib"]);