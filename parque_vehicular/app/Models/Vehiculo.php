<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'tbl_vehiculos';
    protected $primaryKey = 'idVehiculo';

    protected $fillable = [
        'marca',
        'modelo',
        'year',
        'num_motor',
        'num_chasis'
    ];
}
