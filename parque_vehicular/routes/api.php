<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;

Route::get('/vehiculos', [VehiculoController::class, 'index']);
Route::post('/vehiculos', [VehiculoController::class, 'store']);
Route::delete('/vehiculos/{id}', [VehiculoController::class, 'destroy']);
