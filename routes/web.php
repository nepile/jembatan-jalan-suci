<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payment\MidtransController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('pages.home');
});

Route::post('/midtrans/payment/{id}', [MidtransController::class, 'createTransaction'])->name('midtrans.payment');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login-login', [LoginController::class, 'handleLogin'])->name('login.handle');