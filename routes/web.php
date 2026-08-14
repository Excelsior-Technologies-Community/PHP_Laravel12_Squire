<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KnightController;
use App\Http\Controllers\SquireController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Knights
Route::resource('knights', KnightController::class);

// Squires
Route::resource('squires', SquireController::class);

require __DIR__ . '/auth.php';