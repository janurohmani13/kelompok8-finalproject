<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (setelah login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Users (contoh rute untuk users)
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Produk dan Kategori
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Laporan Penjualan
Route::get('/sales-report', [SalesReportController::class, 'index'])->name('sales.report');



