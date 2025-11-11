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

Route::prefix('/')->group( function() {
    Route::get('home', function() { return view('gadgetsoko.home'); })->name('home');
    Route::get('about', function() { return view('gadgetsoko.about'); })->name('about');;
    Route::get('product', [ProductController::class, 'index'])->name('product');
    Route::get('testimonial', function() { return view('gadgetsoko.testimonial'); })->name('testimonial');
    Route::get('contact', function() { return view('gadgetsoko.contact'); })->name('contact');
});

Route::prefix('/products')->group( function() {
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');;
});

Route::get('/', function () {
    return view('gadgetsoko.home');
});
Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
