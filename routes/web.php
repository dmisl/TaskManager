<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\WelcomeMiddleware;
use Illuminate\Support\Facades\Route;

// only for guests
Route::middleware([GuestMiddleware::class])->group(function () {

    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

});

// only for logged users
Route::middleware([AuthMiddleware::class])->group(function () {

    Route::get('home', [HomeController::class, 'index'])->name('home.index');

    Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');

});

// only for new user
// Route::middleware([WelcomeMiddleware::class])->group(function () {

//     Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome.index');
//     Route::post('welcome', [WelcomeController::class, 'store'])->name('welcome.store');

// });

Route::fallback(function () {
    return redirect()->route('home.index');
});

Route::get('tz', function () {
    return view('tz');
});
