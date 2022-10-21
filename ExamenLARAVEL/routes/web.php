<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConductorController;

// Vista inicial de conductores y vehículos
Route::get('/', [ConductorController::class, 'inicio'])->name('inicio');
Route::get('/registro/{idConductor}/{idVehiculo}', [ConductorController::class, 'asignar'])->name('registro');