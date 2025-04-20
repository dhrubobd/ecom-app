<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SSLCommerzCredentialController;

Route::get('/', [DashboardController::class, 'index'])->name('page.dashboard');
Route::resource('/settings', SSLCommerzCredentialController::class);
Route::get('/login',[AuthController::class, 'loginPage'])->name('page.login');
Route::post('/login',[AuthController::class, 'login'])->name('post.login');

Route::resource('/brands', BrandController::class);