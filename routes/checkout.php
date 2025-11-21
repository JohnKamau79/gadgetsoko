<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group( function() {
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('place-order', [OrderController::class, 'placeOrder'])->name('placeOrder');
    Route::post('/mpesa/callback', [OrderController::class, 'mpesaCallback']);
});