<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\PremiumCollectionController; // <-- TAMBAHKAN INI
use App\Http\Controllers\RenterController;

// Rute untuk menampilkan halaman login admin
Route::get('/', [AdminLoginController::class, 'showLoginForm'])->middleware('guest:admin')->name('admin.login');

// Rute untuk memproses login admin
Route::post('/login', [AdminLoginController::class, 'login'])->middleware('guest:admin')->name('admin.login.attempt');

// Grup rute yang memerlukan autentikasi admin
Route::middleware('auth:admin')->group(function () {
    // Dashboard (sekarang akan diarahkan oleh AdminLoginController)
    // Rute dashboard ini bisa dihapus jika tidak ada halaman dashboard khusus,
    // karena redirect akan langsung ke 'admin.koleksi.premium'
    Route::get('/dashboard', [PremiumCollectionController::class, 'index'])->name('dashboard');

    // --- Route untuk Koleksi Premium (INI YANG DIPERBAIKI) ---
    Route::get('/koleksi/premium', [PremiumCollectionController::class, 'index'])->name('admin.koleksi.premium');
    Route::get('/koleksi/premium/create', [PremiumCollectionController::class, 'create'])->name('admin.koleksi.premium.create');
    Route::post('/koleksi/premium', [PremiumCollectionController::class, 'store'])->name('admin.koleksi.premium.store');
    Route::get('/koleksi/premium/{collection}', [PremiumCollectionController::class, 'show'])->name('admin.koleksi.premium.detail');
    Route::get('/koleksi/premium/{collection}/edit', [PremiumCollectionController::class, 'edit'])->name('admin.koleksi.premium.edit');
    Route::put('/koleksi/premium/{collection}', [PremiumCollectionController::class, 'update'])->name('admin.koleksi.premium.update');
    Route::delete('/koleksi/premium/{collection}', [PremiumCollectionController::class, 'destroy'])->name('admin.koleksi.premium.destroy');

    // --- Route untuk Penyewa ---
    Route::post('/koleksi/premium/{collection}/renters', [RenterController::class, 'store'])->name('admin.renters.store');
    Route::delete('/renters/{renter}', [RenterController::class, 'destroy'])->name('admin.renters.destroy');

    // Route untuk koleksi original dan aksesoris (masih menggunakan view langsung)
    Route::get('/koleksi/original', function () {
        return view('admin.original.index');
    })->name('admin.koleksi.original');
    Route::get('/koleksi/original/{id}', function ($id) {
        return view('admin.original.detail', ['id' => $id]);
    })->name('admin.koleksi.original.detail');

    Route::get('/aksesoris', function () {
        return view('admin.aksesoris.index');
    })->name('admin.aksesoris');
    Route::get('/aksesoris/{id}', function ($id) {
        return view('admin.aksesoris.detail', ['id' => $id]);
    })->name('admin.aksesoris.detail');


    // Rute untuk logout
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});