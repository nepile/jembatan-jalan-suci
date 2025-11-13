<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payment\MidtransController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SettingsController;



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

Route::get('/donation-detail', function() {
    return view('pages.donation-detail');
})->name('pages.donation-detail');

Route::post('/midtrans/payment/{id}', [MidtransController::class, 'createTransaction'])->name('midtrans.payment');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login-login', [LoginController::class, 'handleLogin'])->name('login.handle');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/donasi', [DonationController::class, 'index'])->name('admin.donation');
    Route::get('/program-donasi', [ProgramController::class, 'index'])->name('admin.program');
    Route::get('/pengaturan', [SettingsController::class, 'index'])->name('admin.settings');
});

