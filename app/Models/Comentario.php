<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre',
        'email',
        'comentario',
        'valoracion',
    ];
}