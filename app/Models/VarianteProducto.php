<?php
// app/Models/VarianteProducto.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VarianteProducto extends Model
{
    use HasFactory;

    protected $table = 'variantes_producto'; // Especifica el nombre de la tabla

    protected $fillable = [
        'producto_id',
        'sku',
        'precio',
        'stock',
        'atributos',
        'imagen_url',
    ];

    /**
     * Los atributos son JSON.
     */
  // app/Models/VarianteProducto.php
protected $casts = [
    'atributos' => 'array',
    'precio'    => 'float',   // en vez de 'decimal:2' si prefieres números reales
];


    /**
     * Una Variante pertenece a un Producto.
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}