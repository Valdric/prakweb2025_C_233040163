<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

// Public pages
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');


// ============================
// AUTH ROUTES (SUDAH FIXED)
// ============================

// REGISTER
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');   // ← diperbaiki

// LOGIN
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');             // ← diperbaiki

// LOGOUT
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// ============================
// DASHBOARD (PROTECTED)
// ============================
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/dashboard/posts', DashboardPostController::class)->names('dashboard.posts');
});
