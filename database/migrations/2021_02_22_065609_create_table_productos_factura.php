<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductosFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_factura', function (Blueprint $table) {
            $table->id('codigo_productos_factura');
            $table->integer('codigo_producto');
            $table->integer('cantidad_producto');
            $table->integer('valor_total_producto');
            $table->integer('codigo_factura');
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
        Schema::dropIfExists('productos_factura');
    }
}
