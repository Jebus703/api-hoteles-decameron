<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reservas extends Model
{
    protected $table = 'vista_hotel_habitaciones'; // Referencia a la vista en la base de datos
    public $timestamps = false; // No hay columnas created_at o updated_at en la vista

    protected $fillable = [
        'nombre_hotel','tipo_habitacion', 'acomodacion', 'cantidad'
    ];
}
