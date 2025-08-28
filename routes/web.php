<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    abort(403, 'Forbidden');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Email routes
Route::get('/email/{type}/form', [MailController::class, 'showEmailForm'])->name('email.form');
Route::post('/email/{type}/send-purchase-confirmation', [MailController::class, 'sendEmail'])->name('send.purchase.confirmation');
