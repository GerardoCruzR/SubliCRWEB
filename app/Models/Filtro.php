<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filtro extends Model
{
    use HasFactory;

    // Especificar la tabla si no sigue la convención de pluralización
    protected $table = 'filtros';

    // Definir los campos que se pueden asignar en masa
    protected $fillable = [
        'seccion', // Asegúrate de incluir 'seccion' aquí
        'tipo',
        'valor',
    ];

    /**
     * Relación opcional si los filtros están relacionados con otro modelo (como Cajas o Unidades)
     * Puedes descomentar y modificar si es necesario:
     * 
     * public function cajas()
     * {
     *     return $this->hasMany(Caja::class);
     * }
     * 
     * public function unidades()
     * {
     *     return $this->hasMany(Unidad::class);
     * }
     */
}
