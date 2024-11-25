<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelHabitacion extends Model
{
    protected $table = 'hotel_habitaciones'; // Nombre de la tabla
    public $timestamps = false; // Si no tienes columnas 'created_at' y 'updated_at'

    protected $fillable = [
        'hotel_id', 'habitacion_id', 'cantidad'
    ];
}
