<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Animale
 *
 * @property $id
 * @property $nombre
 * @property $raza
 * @property $color
 * @property $edad
 * @property $vacunas
 * @property $estado
 * @property $usuarios_id
 * @property $estado_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Animale extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    'imagen' => 'required',
		'tipo' => 'required',
		'enfermedades' => 'required',
		'vacunas' => 'required',
		'raza' => 'required',
		
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','imagen','tipo','enfermedades','vacunas','raza'];



}
