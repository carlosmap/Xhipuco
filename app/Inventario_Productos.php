<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario_Productos extends Model
{
    protected $fillable = ['codigo_producto', 'cantidad_producto','codigo_factura','tipo_registro','inventario_actual'];
}
