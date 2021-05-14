<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsTableInventarioProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('inventario_productos', function (Blueprint $table) {
            $table->integer('inventario_actual')->after('codigo_factura');
            $table->integer('tipo_registro')->after('codigo_factura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventario_productos', function (Blueprint $table) {
            $table->dropColumn('inventario_actual');
            $table->dropColumn('tipo_registro');
        });
    }
}
