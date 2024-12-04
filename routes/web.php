<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

// Show signup form (GET request)
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');

// Handle signup (POST request)
Route::post('/signup', [AuthController::class, 'handleSignup'])->name('signup.submit');

// Show login form (GET request)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');

// Handle login (POST request)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route (protected with auth middleware)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('index')->middleware('auth');

Route::get('/index', [PostController::class, 'index'])->name('index')->middleware('auth');


Route::post('/posts', [PostController::class, 'store'])->middleware('auth')->name('posts.store');
