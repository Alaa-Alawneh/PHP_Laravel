<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::view("/","home")->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->name('register.store');
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store');
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class,'destroy'])->name('logout');
    
    Route::view('/trainer/dashboard', 'dashboards.trainer')
    ->middleware('role:trainer')
    ->name('trainer.dashboard');

    Route::view('/player/dashboard', 'dashboards.player')
    ->middleware('role:player')
    ->name('player.dashboard');
});