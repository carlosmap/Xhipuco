<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Inventario_Productos;

class Inventario_ProductosController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$Productos=Productos::get();
        //$Inventario=Inventario_Productos::latest()->paginate(10);

        //return 'hola';
        return view('inventario.consultaInventario', compact('Inventario'));

    }
}
