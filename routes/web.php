<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payment\MidtransController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Pages\DonationController as PagesDonationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Pages\AboutUsController;
use App\Http\Controllers\Pages\ConfirmationDonationController;
use App\Http\Controllers\Pages\DonationProgramController;
use App\Http\Controllers\Pages\GalleryController as PagesGalleryController;
use App\Http\Controllers\Pages\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('pages.home');


// Route::get('general-donation', function () {
//     return view('pages.general-donation');
// })->name('pages.general-donation');

Route::get('/about-us', [AboutUsController::class, 'index'])->name('pages.about-us');

Route::get('/donation-program', [DonationProgramController::class, 'index'])->name('pages.donation-program');

Route::get('/donation-detail/{slug?}', [DonationProgramController::class, 'showDonationDetail'])->name('pages.donation-detail');
Route::get('/donation-bank/{slug}', [PagesDonationController::class, 'showDonationFill'])->name('pages.donation-bank');
Route::get('/bill-invoice/{orderId}', [PagesDonationController::class, 'showBillInvoice'])->name('pages.bill-invoice');

Route::prefix('/confirmation-donation')->group(function () {
    Route::get('/', [ConfirmationDonationController::class, 'index'])->name('pages.confirmation-donation');
    Route::get('/search', [ConfirmationDonationController::class, 'searchInvoice'])->name('pages.confirmation-donation.search');
});

Route::get('/pages.gallery', [PagesGalleryController::class, 'index'])->name('pages.gallery');


Route::post('/midtrans/payment/{id}', [MidtransController::class, 'createTransaction'])->name('midtrans.payment');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login-handle', [LoginController::class, 'handleLogin'])->name('login.handle');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout-handle', [LoginController::class, 'handleLogout'])->name('logout.handle');

    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/donation', [DonationController::class, 'index'])->name('admin.donation');
        Route::prefix('/donation-program')->group(function () {
            Route::get('/', [ProgramController::class, 'index'])->name('admin.program');
            Route::post('/create', [ProgramController::class, 'store'])->name('admin.program.create');
            Route::put('/update/{id}', [ProgramController::class, 'update'])->name('admin.program.update');
            Route::delete('/delete/{id}', [ProgramController::class, 'destroy'])->name('admin.program.delete');
        });

        Route::get('/pengaturan', [SettingsController::class, 'index'])->name('admin.settings');
        Route::post('/pengaturan/update-password', [SettingsController::class, 'updatePassword'])
            ->name('admin.settings.updatePassword');

        Route::prefix('/gallery')->group(function () {
            Route::get('/', [GalleryController::class, 'index'])->name('admin.gallery');
            Route::post('/create', [GalleryController::class, 'create'])->name('admin.gallery.create');
            Route::delete('/delete/{id}', [GalleryController::class, 'destroy'])->name('admin.gallery.delete');
        });

        Route::middleware('role:SUPERADMIN')->group(function () {
            Route::get('/admin', [AdminController::class, 'index'])->name('admin.admin');
            Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.admin.store');
            Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.admin.update');
            Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.admin.delete');
        });
    });
});
