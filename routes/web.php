<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

// only for guests
Route::middleware([GuestMiddleware::class])->group(function () {

    Route::get('login', [LoginController::class, 'index'])->name('login.index');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');

});

// only for logged users
Route::middleware([AuthMiddleware::class])->group(function () {

    Route::get('home', [HomeController::class, 'index'])->name('home.index');

});

