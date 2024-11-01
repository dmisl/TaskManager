<?php

use App\Http\Controllers\DayController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\TaskController;
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

    // GOAL ROUTES

    Route::get('home/goals', [GoalController::class, 'index'])->name('goal.index');
    Route::get('home/goals/show/{id?}', [GoalController::class, 'show'])->name('goal.show');
    Route::get('home/goals/create', [GoalController::class, 'create'])->name('goal.create');
    Route::post('home/goals/create', [GoalController::class, 'store'])->name('goal.store');
    Route::post('home/goals/delete', [GoalController::class, 'delete'])->name('goal.delete');
    Route::post('home/goals/update', [GoalController::class, 'update'])->name('goal.update');
    Route::post('home/goals/getData', [GoalController::class, 'getData'])->name('goal.getData');

    // TASK ROUTES

    Route::post('home/task/getData', [TaskController::class, 'getData'])->name('task.getData');
    Route::post('home/task/create', [TaskController::class, 'store'])->name('task.store');
    Route::post('home/task/changeDay', [TaskController::class, 'changeDay'])->name('task.changeDay');
    Route::post('home/task/changePriority', [TaskController::class, 'changePriority'])->name('task.changePriority');
    Route::post('home/task/changeDesc', [TaskController::class, 'changeDesc'])->name('task.changeDesc');
    Route::post('home/task/createComment', [TaskController::class, 'createComment'])->name('task.createComment');
    Route::post('home/task/complete', [TaskController::class, 'complete'])->name('task.complete');
    Route::post('home/task/delete', [TaskController::class, 'delete'])->name('task.delete');

    // DAY ROUTES

    Route::post('home/day/changeResult', [DayController::class, 'changeResult'])->name('day.changeResult');

    // STATISTIC ROUTES

    Route::get('home/stats', [StatsController::class, 'index'])->name('stats.index');

    // FREEPIK

    Route::get('getImages/{text?}/{limit?}/{page?}', [HomeController::class, 'getImages'])->name('home.getImages');

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
