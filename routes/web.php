<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index']);

Route::get('/register', [AuthController::class, 'registerPage']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/profile', [ProfileController::class, 'index'])
    ->middleware('auth');

Route::post('/profile', [ProfileController::class, 'update'])
    ->middleware('auth');

Route::get('/todos/create', [TodoController::class, 'create'])
    ->middleware('auth');

Route::post('/todos', [TodoController::class, 'store'])
    ->middleware('auth');

Route::post('/todos/{id}/complete', [TodoController::class, 'complete'])
    ->middleware('auth');

Route::delete('/todos/{id}', [TodoController::class, 'destroy'])
    ->middleware('auth');

Route::get('/todos/{id}/edit', [TodoController::class, 'edit'])
    ->middleware('auth');

Route::put('/todos/{id}', [TodoController::class, 'update'])
    ->middleware('auth');

Route::delete('/todos/selesai/hapus-semua', [TodoController::class, 'destroySelesai'])
    ->middleware('auth');