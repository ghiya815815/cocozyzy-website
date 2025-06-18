<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController; // Tambahkan ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Rute Landing Page (root URL)
Route::get('/', function () {
    return view('landing'); // Mengarahkan ke file landing.blade.php
})->name('landing');

// Rute Dashboard Anda yang sekarang akan diakses setelah login atau melalui tombol dari landing page
// Anda bisa mengubahnya menjadi /home atau /app jika ingin
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk Manajemen Buku (CRUD)
Route::resource('books', BookController::class);

// Route untuk Manajemen Peminjaman (CRUD)
Route::resource('borrowings', BorrowingController::class);

// Route kustom untuk mengembalikan buku
Route::post('borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.returnBook');


require __DIR__.'/auth.php'; // ... (route lain jika ada)