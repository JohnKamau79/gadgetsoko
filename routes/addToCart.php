<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group( function () {
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
});
Route::middleware('auth')->group( function () {
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
});
Route::middleware('auth')->group( function () {
    Route::post('/cart/increment/{id}', [CartController::class, 'incrementCart'])->name('cart.increment');
});
Route::middleware('auth')->group( function () {
    Route::post('/cart/decrement/{id}', [CartController::class, 'decrementCart'])->name('cart.decrement');
});
Route::middleware('auth')->group( function () {
    Route::delete('/cart/delete/{id}', [CartController::class, 'removeCartItem'])->name('cart.removeCartItem');
});
Route::middleware('auth')->group( function () {
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
});
