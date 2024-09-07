<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;



Route::middleware(['guest'])->group(function () {

    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');

});

Route::middleware(['auth'])->group(function () {

    Route::get('home', [HomeController::class, 'index'])->name('home.index');

});

