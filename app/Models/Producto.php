<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria',
        'imagen_url_principal',
    ];

    public function variantes()
    {
        return $this->hasMany(VarianteProducto::class, 'producto_id');
    }

    // ---- Helpers para la vista pública ----

    // Precio mínimo entre variantes (float|null)
    public function getPrecioDesdeAttribute(): ?float
    {
        $min = $this->relationLoaded('variantes')
            ? $this->variantes->min('precio')
            : $this->variantes()->min('precio');

        return $min !== null ? (float) $min : null;
    }

    // Colores agregados desde atributos de variantes
    public function getColoresAttribute(): array
    {
        if (!$this->relationLoaded('variantes')) $this->load('variantes');

        $colores = collect();
        foreach ($this->variantes as $v) {
            $c = data_get($v->atributos, 'color');
            if (is_array($c)) {
                $colores = $colores->merge($c);
            } elseif (is_string($c) && strlen($c)) {
                $colores = $colores->merge(
                    collect(explode('|', $c))->map(fn($x) => trim($x))->filter()
                );
            }
        }
        return $colores->unique()->take(6)->values()->all();
    }

    public function getCapacidadAttribute(): ?string
    {
        if (!$this->relationLoaded('variantes')) $this->load('variantes');
        $v = $this->variantes->first(fn($x) => data_get($x->atributos, 'capacidad'));
        return $v ? data_get($v->atributos, 'capacidad') : null;
    }

    public function getTallaAttribute(): ?string
    {
        if (!$this->relationLoaded('variantes')) $this->load('variantes');
        $v = $this->variantes->first(fn($x) => data_get($x->atributos, 'talla'));
        return $v ? data_get($v->atributos, 'talla') : null;
    }

    public function getImagenPublicaAttribute(): ?string
    {
        if ($this->imagen_url_principal && Str::startsWith($this->imagen_url_principal, ['http://','https://'])) {
            return $this->imagen_url_principal;
        }
        if ($this->imagen_url_principal) {
            return Storage::url($this->imagen_url_principal);
        }
        if (!$this->relationLoaded('variantes')) $this->load('variantes');
        $var = $this->variantes->first(fn($v) => filled($v->imagen_url));
        if ($var?->imagen_url) {
            return Str::startsWith($var->imagen_url, ['http://','https://'])
                ? $var->imagen_url
                : Storage::url($var->imagen_url);
        }
        return null;
    }
}
