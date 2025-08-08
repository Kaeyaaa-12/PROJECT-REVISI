<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\PremiumCollectionController;
use App\Http\Controllers\RenterController;
use App\Http\Controllers\OriginalCollectionController;
use App\Http\Controllers\RenterOriginalController;
use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\RenterAccessoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Auth\AdminResetPasswordController;


// Rute untuk menampilkan halaman login admin
Route::get('/', [AdminLoginController::class, 'showLoginForm'])->middleware('guest:admin')->name('admin.login');

// Rute untuk memproses login admin
Route::post('/login', [AdminLoginController::class, 'login'])->middleware('guest:admin')->name('admin.login.attempt');

// Rute untuk menampilkan form lupa password
Route::get('/admin/forgot-password', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->middleware('guest:admin')->name('admin.password.request');
// Rute untuk mengirim email reset password
Route::post('/admin/forgot-password', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->middleware('guest:admin')->name('admin.password.email');
// Route untuk menampilkan form reset password (link dari email)
Route::get('/admin/reset-password/{token}', [AdminResetPasswordController::class, 'showResetForm'])->middleware('guest:admin')->name('admin.password.reset');
// Route untuk menyimpan password baru
Route::post('/admin/reset-password', [AdminResetPasswordController::class, 'reset'])->middleware('guest:admin')->name('admin.password.update');

// Grup rute yang memerlukan autentikasi admin
Route::middleware('auth:admin')->group(function () {
    // Dashboard (sekarang akan diarahkan oleh AdminLoginController)
    // Rute dashboard ini bisa dihapus jika tidak ada halaman dashboard khusus,
    // karena redirect akan langsung ke 'admin.koleksi.premium'
    Route::get('/dashboard', [PremiumCollectionController::class, 'index'])->name('dashboard');
    Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('admin.search');

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

    Route::get('/koleksi/original', [OriginalCollectionController::class, 'index'])->name('admin.koleksi.original');
    Route::get('/koleksi/original/create', [OriginalCollectionController::class, 'create'])->name('admin.koleksi.original.create');
    Route::post('/koleksi/original', [OriginalCollectionController::class, 'store'])->name('admin.koleksi.original.store');
    Route::get('/koleksi/original/{collection}', [OriginalCollectionController::class, 'show'])->name('admin.koleksi.original.detail');
    Route::get('/koleksi/original/{collection}/edit', [OriginalCollectionController::class, 'edit'])->name('admin.koleksi.original.edit');
    Route::put('/koleksi/original/{collection}', [OriginalCollectionController::class, 'update'])->name('admin.koleksi.original.update');
    Route::delete('/koleksi/original/{collection}', [OriginalCollectionController::class, 'destroy'])->name('admin.koleksi.original.destroy');
    // --- Route untuk Penyewa Original ---
    Route::post('/koleksi/original/{collection}/renters', [RenterOriginalController::class, 'store'])->name('admin.renters.original.store');
    Route::delete('/renters/original/{renter}', [RenterOriginalController::class, 'destroy'])->name('admin.renters.original.destroy');

    Route::get('/aksesoris', [AccessoryController::class, 'index'])->name('admin.aksesoris');
    Route::get('/aksesoris/create', [AccessoryController::class, 'create'])->name('admin.aksesoris.create');
    Route::post('/aksesoris', [AccessoryController::class, 'store'])->name('admin.aksesoris.store');
    Route::get('/aksesoris/{accessory}', [AccessoryController::class, 'show'])->name('admin.aksesoris.detail');
    Route::get('/aksesoris/{accessory}/edit', [AccessoryController::class, 'edit'])->name('admin.aksesoris.edit');
    Route::put('/aksesoris/{accessory}', [AccessoryController::class, 'update'])->name('admin.aksesoris.update');
    Route::delete('/aksesoris/{accessory}', [AccessoryController::class, 'destroy'])->name('admin.aksesoris.destroy');
    // --- Route untuk Penyewa Aksesoris ---
    Route::post('/aksesoris/{accessory}/renters', [RenterAccessoryController::class, 'store'])->name('admin.renters.accessory.store');
    Route::delete('/renters/accessory/{renter}', [RenterAccessoryController::class, 'destroy'])->name('admin.renters.accessory.destroy');

    // Rute untuk logout
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});