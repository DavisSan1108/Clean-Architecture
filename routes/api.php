<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);  // ✅ Ruta GET para obtener usuarios
Route::post('/users', [UserController::class, 'store']); // ✅ Ruta POST para crear usuarios


