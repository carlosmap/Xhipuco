<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {

            $table->id('codigo_cliente');
            $table->string('nombre_cliente');
            $table->string('apellido_cliente');
            $table->string('direccion_cliente');
            $table->string('telefono_cliente');
            $table->string('correo_cliente');
            $table->string('estado_cliente');
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
        Schema::dropIfExists('clientes');
    }
}
