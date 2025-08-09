<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    // Indicar la tabla asociada
    protected $table = 'unidades';

    // Indicar los campos que se pueden llenar
    protected $fillable = ['marca', 'modelo', 'motor', 'transmision', 'precio', 'ejes_delanteros', 'ejes_traseros'];

    // Desactivar timestamps si no los usas
    public $timestamps = false;
}
