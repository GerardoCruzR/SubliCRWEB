<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiltrosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('filtros', function (Blueprint $table) {
            $table->id(); // ID del filtro
            $table->string('seccion'); // Sección a la que pertenece el filtro, ejemplo: "cajas", "unidades"
            $table->string('tipo'); // Tipo de filtro, ejemplo: "tipo_caja", "marca", "tamano", etc.
            $table->string('valor'); // Valor del filtro, ejemplo: "Seca", "Utility", "40 ft", etc.
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filtros');
    }
}
