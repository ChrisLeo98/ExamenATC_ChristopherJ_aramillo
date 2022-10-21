<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    public $timestamps = false;
    protected $table = 'Asignacion';
    protected $fillable = [
        'idConductor',
        'idVehiculo'
    ];
    use HasFactory;
}
