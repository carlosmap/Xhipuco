<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUnidadesMedida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades_medidas', function (Blueprint $table) {
            $table->id("codigo_unidad_medida");
            $table->string('unidad_medida')->unique();
            $table->string('abreviacion_unidad_medida');
            $table->string('estado_unidad_medida');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidades_medidas');
    }
}
