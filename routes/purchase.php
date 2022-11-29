<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PurchaseController;

    Route::get('/services/{id}', [PurchaseController::class,"buyservice"])->name("buyservice");

    Route::get('/subscription/{id}', [PurchaseController::class,"buysubscription"])->name("buysubscription");