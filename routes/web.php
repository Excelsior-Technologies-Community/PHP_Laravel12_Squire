<?php

use App\Http\Controllers\KnightController;
use App\Http\Controllers\SquireController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Resource routes for knights and squires
Route::resource('knights', KnightController::class);
Route::resource('squires', SquireController::class);

// Dashboard route (if using authentication)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';