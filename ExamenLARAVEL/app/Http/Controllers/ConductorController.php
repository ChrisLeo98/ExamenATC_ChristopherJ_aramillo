<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use App\Models\Asignacion;

class ConductorController extends Controller
{
    // Funcion de carga inicial de datos 
    public function inicio()
    {
        $conductor_vehiculo = Asignacion::join('conductor', "conductor.idConductor", '=', 'asignacion.idConductor')
            ->join('vehiculo', "vehiculo.idVehiculo", '=', 'asignacion.idVehiculo')->select('*')->get();

        $conductores =Asignacion::rightjoin('conductor', "conductor.idConductor", '=', 'asignacion.idConductor')
        ->where('asignacion.idConductor','=',null)->select('*')->get();

        $vehiculos = Asignacion::rightjoin('vehiculo', "vehiculo.idVehiculo", '=', 'asignacion.idVehiculo')
        ->where('asignacion.idVehiculo','=',null)->select('*')->get();

        return view('inicio')->with('conductor_vehiculo', $conductor_vehiculo)->with('conductores', $conductores)->with('vehiculos', $vehiculos);
    }

    // Recuperación de asignaciones.
    public function conductoresVehiculos()
    {
        $conductor_vehiculo = Asignacion::join('conductor', "conductor.idConductor", '=', 'asignacion.idConductor')
            ->join('vehiculo', "vehiculo.idVehiculo", '=', 'asignacion.idVehiculo')->select('*')->get();
        return response()->json($conductor_vehiculo,200);
    }

    // Recuperación los conductores.
    public function obtenerConductores()
    {
        $conductores =Asignacion::rightjoin('conductor', "conductor.idConductor", '=', 'asignacion.idConductor')
        ->where('asignacion.idConductor','=',null)->select('*')->get();

        return response()->json($conductores,200);
    }

    // Recuperación de vehículos.
    public function obtenerVehiculos()
    {
        $vehiculos = Asignacion::rightjoin('vehiculo', "vehiculo.idVehiculo", '=', 'asignacion.idVehiculo')
        ->where('asignacion.idVehiculo','=',null)->select('*')->get();
        
        return response()->json($vehiculos,200);
    }

    // Recuperación de todos los Conductores.
    public function obtenerTodosConductores()
    {
        $conductor = Conductor::all();
        
        return response()->json($conductor,200);
    }

    // Recuperación de todos los Vehículos.
    public function obtenerTodosVehiculos()
    {
        $vehiculos = Vehiculo::all();
        
        return response()->json($vehiculos,200);
    }


    // Asignación de vehículos a conductores, con respuesta.
    public function asignacionConductor($idConductor, $idVehiculo)
    {
        $client = Asignacion::create([
            'idConductor' => $idConductor,
            'idVehiculo' => $idVehiculo
        ]);

        return response()->json($client, 200);
    }

    // Asignación de vehículos a conductores con respuesta de vista.
    public function asignar($idConductor, $idVehiculo)
    {
        Asignacion::create([
            'idConductor' => $idConductor,
            'idVehiculo' => $idVehiculo
        ]);

        return $this->inicio();
    }
}
