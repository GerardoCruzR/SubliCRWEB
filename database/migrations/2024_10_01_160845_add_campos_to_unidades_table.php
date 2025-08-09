<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('unidades', function (Blueprint $table) {
        $table->decimal('diferencial', 8, 2)->nullable()->comment('Diferencial en libras, por ejemplo: 40,000');
        $table->string('tipo_camarote')->nullable()->comment('Ejemplo: Grande con Sleep Studio');
    });
}

public function down()
{
    Schema::table('unidades', function (Blueprint $table) {
        $table->dropColumn(['diferencial', 'tipo_camarote']);
    });
}

};
