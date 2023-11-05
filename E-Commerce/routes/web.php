<?php

use App\Http\Controllers\Auth\SocialController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/google', [SocialController::class, 'redirect'])->name('google.redirect');

Route::get('/auth/google/callback', [SocialController::class, 'handle'])->name('google.callback');
