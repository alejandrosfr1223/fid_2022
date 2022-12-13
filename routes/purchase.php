<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PurchaseController;

    Route::controller(PurchaseController::class)->group(function(){
        Route::get('/services/{id}', 'buyservice')->name("buyservice");
        Route::post('/services/{id}', 'stripePostProductos');
    });

    Route::controller(PurchaseController::class)->group(function(){
        Route::get('/subscription/{id}', 'buysubscription')->name("buysubscription");
        Route::post('/subscription/{id}', 'stripePost');
    });