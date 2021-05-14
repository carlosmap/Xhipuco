<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadesMedida extends Model
{
    protected $fillable = ['codigo_unidad_medida', 'unidad_medida','abreviacion_unidad_medida','estado_unidad_medida'];
}
