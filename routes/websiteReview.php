<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteReviewController;

Route::post('/testimonial', [WebsiteReviewController::class, 'store'])->name('testimonial.store');

Route::get('/testimonial', [WebsiteReviewController::class, 'index'])->name('testimonial');
