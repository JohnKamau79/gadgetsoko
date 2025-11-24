<?php

use App\Http\Controllers\ProductReviewController;
use Illuminate\Support\Facades\Route;


Route::post('/product/{id}/review', [ProductReviewController::class, 'store'])
       ->middleware('auth')
       ->name('productReview.store');
Route::delete('/product/delete/{productReview}', [ProductReviewController::class, 'delete'])
       ->middleware('auth')
       ->name('productReview.delete');




?>