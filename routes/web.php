<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;

// Rute untuk menampilkan halaman login admin
Route::get('/', [AdminLoginController::class, 'showLoginForm'])->middleware('guest:admin')->name('admin.login');

// Rute untuk memproses login admin
Route::post('/login', [AdminLoginController::class, 'login'])->middleware('guest:admin')->name('admin.login.attempt');

// Grup rute yang memerlukan autentikasi admin
Route::middleware('auth:admin')->group(function () {
    // Dashboard (halaman default setelah login)
    Route::get('/dashboard', function () {
        return view('admin.premium.index'); // Langsung arahkan ke koleksi premium
    })->name('dashboard');

    // Rute untuk koleksi
    Route::get('/koleksi/premium', function () {
        return view('admin.premium.index');
    })->name('admin.koleksi.premium');

    Route::get('/koleksi/original', function () {
        return view('admin.original.index');
    })->name('admin.koleksi.original');

    Route::get('/aksesoris', function () {
        return view('admin.aksesoris.index');
    })->name('admin.aksesoris');

    // Rute untuk logout
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});
