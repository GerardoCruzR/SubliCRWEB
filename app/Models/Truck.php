<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    // Define la tabla en la base de datos que se usará
    protected $table = 'unidades';

    // Desactivar los timestamps automáticos si no los estás usando
    public $timestamps = false;

    // Definir los atributos que son asignables en masa
    protected $fillable = [
        'nombre_articulo',     // Nuevo campo
        'tipo_medida',         // Nuevo campo
        'talla',               // Nuevo campo (array de tallas)
        'capacidad',           // Nuevo campo
        'colores',             // Nuevo campo (string con los colores seleccionados)
        'tipo_impresion',      // Nuevo campo (array de tipos de impresión)
        'stock',               // Nuevo campo
        'disponibilidad',      // Nuevo campo
        'sku',                 // Nuevo campo
        'precio',              // Nuevo campo
        'documentacion',       // Mantener la gestión de documentos
        'imagenes',            // Mantener la gestión de imágenes
    ];

    // Si estás utilizando JSON en la base de datos para 'documentacion' y 'imagenes', puedes agregar lo siguiente:
    protected $casts = [
        'documentacion' => 'array',  // Laravel manejará automáticamente como un array
        'imagenes' => 'array',       // Igual para imágenes
        'talla' => 'array',          // Para convertir el array de tallas
        'tipo_impresion' => 'array', // Para convertir el array de tipos de impresión
    ];

    // Puedes agregar más métodos si los necesitas, como scopes o relaciones
}