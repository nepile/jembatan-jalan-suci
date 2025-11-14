<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payment\MidtransController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('pages.home');
})->name('pages.home');

Route::get('general-donation', function () {
    return view('pages.general-donation');
})->name('pages.general-donation');

Route::get('/about-us', function () {
    return view('pages.about-us');
})->name('pages.about-us');

Route::get('/donation-program', function () {
    return view('pages.donation-program');
})->name('pages.donation-program');

Route::get('/donation-detail', function () {
    return view('pages.donation-detail');
})->name('pages.donation-detail');

Route::get('/confirmation-donation', function () {
    return view('pages.confirmation-donation');
})->name('pages.confirmation-donation');

Route::get('/pages.gallery', function () {
    return view('pages.gallery');
})->name('pages.gallery');

Route::get('/donation-bank', function () {
    return view('pages.donation-bank');
})->name('pages.donation-bank');



Route::post('/midtrans/payment/{id}', [MidtransController::class, 'createTransaction'])->name('midtrans.payment');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login-handle', [LoginController::class, 'handleLogin'])->name('login.handle');
Route::post('/logout-handle', [LoginController::class, 'handleLogout'])->name('logout.handle');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/donation', [DonationController::class, 'index'])->name('admin.donation');
    Route::prefix('/donation-program')->group(function() {
        Route::get('/', [ProgramController::class, 'index'])->name('admin.program');
        Route::post('/create', [ProgramController::class, 'store'])->name('admin.program.create');
        Route::put('/update/{id}', [ProgramController::class, 'update'])->name('admin.program.update');
        Route::delete('/delete/{id}', [ProgramController::class, 'destroy'])->name('admin.program.delete');
    });
    Route::get('/pengaturan', [SettingsController::class, 'index'])->name('admin.settings');

    Route::prefix('/gallery')->group(function () {
        Route::get('/', [GalleryController::class, 'index'])->name('admin.gallery');
        Route::post('/create', [GalleryController::class, 'create'])->name('admin.gallery.create');
        Route::delete('/delete/{id}', [GalleryController::class, 'destroy'])->name('admin.gallery.delete');
    });

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.admin');
});
