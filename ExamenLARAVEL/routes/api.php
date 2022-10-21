<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConductorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API Obtener conductores
Route::get('obtener-conductores', [ConductorController::class, 'obtenerTodosConductores']);

// API Asignar conductores
Route::post('asignacion/{idConductor}/{idVehiculo}', [ConductorController::class, 'asignacionConductor']);

// API Obtener Vehiculos
Route::get('obtener-vehiculos', [ConductorController::class, 'obtenerTodosVehiculos']);

// API Obtener asignaciones
Route::get('obtener-asignacion', [ConductorController::class, 'conductoresVehiculos']);