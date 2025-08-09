<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_caja',
        'tamano',
        'marca',
        'ano',
        'condicion',
        'precio',
        'disponibilidad',
        'tipo_suspension',
        'bolsas_aire',
        'numero_ejes',
        'frenos',
        'tipo_puertas',
        'capacidad_carga',
        'tipo_motor',
        'imagenes',
    ];

    protected $casts = [
        'imagenes' => 'array', // JSON para imágenes
        'disponibilidad' => 'boolean',
        'bolsas_aire' => 'boolean',
    ];
}
