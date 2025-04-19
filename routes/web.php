<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SSLCommerzCredentialController;

Route::get('/', [DashboardController::class, 'index'])->name('page.dashboard');
Route::resource('/settings', SSLCommerzCredentialController::class);
