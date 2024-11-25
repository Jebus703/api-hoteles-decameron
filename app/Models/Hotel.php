<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    public $timestamps = false; // Desactiva created_at y updated_at

    protected $table = 'hoteles'; 
    protected $fillable = ['id','nombre', 'direccion', 'ciudad', 'nit', 'max_habitaciones'];
}
