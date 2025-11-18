<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

// Pages Routes
Route::prefix('/')->middleware(['auth', 'verified'])->group(function () {
    Route::get('home', function () {
        return view('home'); })->name('home');
    Route::get('about', function () {
        return view('about'); })->name('about');
    ;
    Route::get('testimonial', function () {
        return view('testimonial'); })->name('testimonial');
    Route::get('contact', function () {
        return view('contact'); })->name('contact');
    Route::get('product', [ProductController::class, 'index'])->name('product');
});

// Products Routes
Route::prefix('/products')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{id}', [ProductController::class, 'show'])->name('productdetails');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/productReview.php';
require __DIR__ . '/websiteReview.php';
