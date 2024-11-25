<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class habitaciones extends Model
{
    use HasFactory;

    public $timestamps = false; // Desactiva created_at y updated_at

    protected $table = 'habitaciones'; 
    protected $fillable = ['id','tipo_habitacion', 'acomodacion'];
}
