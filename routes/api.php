<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);  // ✅ Ruta GET para obtener usuarios
Route::post('/users', [UserController::class, 'store']); // ✅ Ruta POST para crear usuarios
Route::delete('/users/{id}', [UserController::class, 'destroy']); // ✅ DELETE para eliminar usuarios
Route::put('/users/{id}', [UserController::class, 'update']);     // ✅ PUT para actualizar usuarios
Route::patch('/users/{id}', [UserController::class, 'update']);   // ✅ PATCH para actualizaciones parciales
