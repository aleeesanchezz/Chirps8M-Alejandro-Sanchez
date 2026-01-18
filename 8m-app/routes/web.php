<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\MemeController;
use Illuminate\Support\Facades\Route;

// Ruta pública
Route::get('/', [MemeController::class, 'index']);

// Rutas de autenticación
Route::middleware('guest')->group(function () {
	Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'show'])->name('register');
	Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register']);
	Route::get('/login', [\App\Http\Controllers\LoginController::class, 'show'])->name('login');
	Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);
});

Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Rutas de memes protegidas
Route::middleware('auth')->group(function () {
	Route::post('/memes', [MemeController::class, 'store']);
	Route::get('/memes/{meme}/edit', [MemeController::class, 'edit']);
	Route::put('/memes/{meme}', [MemeController::class, 'update']);
	Route::delete('/memes/{meme}', [MemeController::class, 'destroy']);
});

// Chirps routes (still available)
Route::get('/chirps', [ChirpController::class, 'index']);
Route::post('/chirps/store', [ChirpController::class, 'store']);

