<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_caja'); // Seca, Refrigerada, etc.
            $table->string('tamano'); // 20 ft, 28 ft, etc.
            $table->string('marca'); // Utility, Gran Danés, etc.
            $table->integer('ano'); // Año
            $table->string('condicion'); // Nueva, Seminueva, Usada
            $table->decimal('precio', 10, 2); // Precio en MXN
            $table->boolean('disponibilidad'); // Disponible o No disponible
            $table->string('tipo_suspension'); // Mecánica, Neumática
            $table->boolean('bolsas_aire'); // Sí o No
            $table->integer('numero_ejes'); // Número de ejes
            $table->string('frenos'); // De aire, Hidráulicos
            $table->string('tipo_puertas'); // Puertas de cortina, Puertas batientes
            $table->string('capacidad_carga'); // 30,000 kg, 80,000 lbs, etc.
            $table->string('tipo_motor')->nullable(); // Carrier, Thermo King (Solo para cajas refrigeradas)
            $table->json('imagenes')->nullable(); // Guardar imágenes en formato JSON
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cajas');
    }
};
