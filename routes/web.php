<?php

use Illuminate\Support\Facades\Route;

Route::post('/', function() {
    return response()->json(['message' => 'POST recibido en /']);
});

