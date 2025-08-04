<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;

// Rute #1: Menampilkan halaman login di URL utama (/)
// Middleware 'guest:admin' memastikan halaman ini hanya bisa diakses jika admin BELUM login.
Route::get('/', [AdminLoginController::class, 'showLoginForm'])->middleware('guest:admin')->name('admin.login');

// Rute #2: Memproses data login dari form
Route::post('/login', [AdminLoginController::class, 'login'])->middleware('guest:admin')->name('admin.login.attempt');

// Rute #3: Grup untuk halaman yang hanya bisa diakses SETELAH admin login
Route::middleware('auth:admin')->group(function () {
    // Rute untuk dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rute untuk logout
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    // Rute-rute admin lainnya bisa ditambahkan di sini
});

// Kita tidak lagi memerlukan file auth.php bawaan, jadi hapus atau beri komentar
// require __DIR__.'/auth.php';
