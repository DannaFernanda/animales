<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopcion extends Model
{
    use HasFactory;

    protected $table = 'adopciones'; // Specify the correct table name

    protected $fillable = [
        'nombre_perro',
        'raza',
        'enfermedades',
        'vacunas',
        'nombre_adoptante',
        'email',
        'telefono',
    ];
}
