<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterController::class)->name('user.register');

Route::post('/login', LoginController::class)->name('user.login');

Route::get('/auth/google', [SocialController::class, 'redirect'])->name('google.redirect');

Route::get('/auth/google/callback', [SocialController::class, 'handle'])->name('google.callback');
