<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnderCategoryController;
use App\Http\Controllers\UserController;
use App\Models\UnderCategory;
use Illuminate\Support\Facades\Route;

// Login / Registration / Logout
Route::get('/registration', [AuthController::class, 'registration_page']);
Route::get('/login', [AuthController::class, 'login_page']);

Route::post('/registration', [AuthController::class, 'registration']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Products
Route::get('', [ProductController::class, 'index']);

Route::middleware('auth:sanctum')->group(function() {
   Route::middleware(['auth', 'isAdmin'])->group(function () {
      // admin
      Route::get('/admin', [AdminController::class, 'admin']);
      Route::post('/admin', [AdminController::class, 'store']);
   });

   // profile
   Route::get('/profile', [UserController::class, 'profile']);
});
