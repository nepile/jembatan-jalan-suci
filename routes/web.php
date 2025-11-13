<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payment\MidtransController;


Route::get('/', function () {
    return view('pages.home');
});

Route::post('/midtrans/payment/{id}', [MidtransController::class, 'createTransaction'])->name('midtrans.payment');
