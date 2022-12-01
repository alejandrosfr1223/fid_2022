<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PurchaseController;

    Route::get('/services/{id}', [PurchaseController::class,"buyservice"])->name("buyservice");

    Route::controller(PurchaseController::class)->group(function(){
        Route::get('/subscription/{id}', 'buysubscription')->name("buysubscription");
        Route::post('/subscription/{id}', 'stripePost');
    });