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

// Show the dashboard (which now calls the controller with $user passed in)
Route::get('/dashboard', [AuthController::class, 'showDashboard'])->middleware('auth')->name('index');

// Use PostController for posts
Route::get('/', [PostController::class, 'index'])->name('home');

Route::post('/posts', [PostController::class, 'store'])->middleware('auth')->name('posts.store');
