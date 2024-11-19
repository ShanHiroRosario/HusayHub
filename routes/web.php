<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Show signup form (GET request)
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');

// Handle signup (POST request)
Route::post('/signup', [AuthController::class, 'handleSignup'])->name('signup.submit');

// Show login form (GET request)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');

// Handle login (POST request)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
