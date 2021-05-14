<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarcaCantidadUnidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->string('marca_producto')->after('descripcion_producto');
            $table->integer('cantidad_neta_producto')->after('descripcion_producto');
            $table->integer('unidad_medida_producto')->after('descripcion_producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('marca_producto');
            $table->dropColumn('cantidad_neta_producto');
            $table->dropColumn('unidad_medida_producto');
        });
    }
}
