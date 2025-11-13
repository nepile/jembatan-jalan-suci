<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payment\MidtransController;

Route::prefix('/midtrans')->group(function () {
    // Route::post('/payment', [MidtransController::class, 'createTransaction']);
    Route::post('/callback', [MidtransController::class, 'callback']);
});