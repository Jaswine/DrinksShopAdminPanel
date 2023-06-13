<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Login / Registration / Logout
Route::get('/registration', [AuthController::class, 'registration_page']);
Route::get('/login', [AuthController::class, 'login_page']);

Route::post('/registration', [AuthController::class, 'registration']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Products
Route::get('', [ProductController::class, 'index']);