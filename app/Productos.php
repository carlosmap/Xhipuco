<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = ['nombre_producto', 'valor_producto','descripcion_producto', 'cantidad_neta_producto','unidad_medida_producto', 'marca_producto','estado_producto','id'];
}
