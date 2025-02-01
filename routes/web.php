<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/main', [IndexController::class, 'index']);
Route::get('/combat', [IndexController::class, 'combat']);
Route::get('/map', [IndexController::class, 'map']);
Route::get('/inventory', [IndexController::class, 'inventory']);
Route::get('/combat/enemy1', [IndexController::class, 'enemy1']);

require __DIR__.'/auth.php';
