<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
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
    Route::get('home', [ProductController::class, 'homeIndex'])->name('home');

    Route::get('about', function () {
        return view('about');
    })->name('about');
    Route::get('testimonial', function () {
        return view('testimonial');
    })->name('testimonial');
    Route::get('/contact', function () {
    return view('contact'); // or your Blade file name
})->name('contact');
    Route::post('contact', [ContactController::class, 'submitForm'])->name('contact.submit');
    Route::get('product', [ProductController::class, 'index'])->name('product');
});

// Products Routes
Route::prefix('/products')->middleware(['auth', 'verified'])->group(function () {
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/filter', [ProductController::class, 'filter'])->name('products.filter');
});
Route::prefix('/products')->middleware(['auth', 'verified', 'retailer'])->group(function () {
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('products.delete');
});

Route::prefix('/products')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/{id}', [ProductController::class, 'show'])->name('productdetails');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/reports/download', [ReportController::class, 'downloadPDF'])
    ->middleware(['auth', 'verified'])
    ->name('reports.download');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::delete('/users/{id}', action: [AdminController::class, 'removeUser'])->name('admin.users.destroy');
    Route::post('/retailers/{id}/make', [AdminController::class, 'makeRetailer'])->name('admin.retailers.make');
    Route::post('/retailers/{id}/revoke', [AdminController::class, 'revokeRetailer'])->name('admin.retailers.revoke');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/productReview.php';
require __DIR__ . '/websiteReview.php';
require __DIR__ . '/addToCart.php';
require __DIR__ . '/checkout.php';