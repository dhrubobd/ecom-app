<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SSLCommerzCredentialController;
use App\Http\Controllers\UserController;

Route::get('/', [DashboardController::class, 'index'])->name('page.dashboard');
Route::resource('/settings', SSLCommerzCredentialController::class);
Route::get('/login',[AuthController::class, 'loginPage'])->name('page.login');
Route::post('/login',[AuthController::class, 'login'])->name('post.login');

Route::resource('/brands', BrandController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/sliders', SliderController::class);
Route::resource('/products', ProductController::class);
Route::resource('/users', UserController::class);