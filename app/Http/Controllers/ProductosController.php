<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use DB;
use App\Productos;
use App\UnidadesMedida;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$Productos=Productos::get();
        $Productos=Productos::latest()->paginate(10);

        //return 'hola';
        return view('productos.consulta_productos', compact('Productos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidadesMedida= UnidadesMedida::get()->where('estado_unidad_medida', 'A'); // array (1,2,3); //UnidadesMedida::get();
        return view('Productos.crearProducto', compact('unidadesMedida'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        request()->validate(['nombreProducto'=>'required',
            'valorProducto'=>'required',
            'contenidoNeto'=>'required',
            'unidadMedida'=>'required',
            'descripcionProducto'=>'required',
            'marca'=>'required'

        ],

        [
            'nombreProducto.required'=>'*Por favor ingrese el nombre del producto',
            'valorProducto.required'=>'*Por favor ingrese el valor del producto',
            'contenidoNeto.required'=>'*Por favor ingrese el contenido neto del producto',
            'unidadMedida.required'=>'*Por favor seleccione la unidad de medida del producto',
            'descripcionProducto.required'=>'*Por favor ingrese la descripción del producto',
            'marca.required'=>'*Por favor ingrese la marca del producto'

        ]

        );

        Productos::create([

        'nombre_producto' => request('nombreProducto'),
        'valor_producto' => request('valorProducto'),
        'descripcion_producto' => request('descripcionProducto'),

        'cantidad_neta_producto' => request('contenidoNeto'),
        'unidad_medida_producto' => request('unidadMedida'),
        'marca_producto' => request('marca'),

        'id' => '1',
        'estado_producto' => '1']);

        return redirect()->route('consulta_productos')->with('status','El producto ha sido registrado.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo_producto)
    {
        //return "Hola - ".$id;
        $unidadesMedida= UnidadesMedida::get()->where('estado_unidad_medida', 'A');
        return view('Productos.detalleProducto', [
            'producto' => Productos::where('codigo_producto', '=', $codigo_producto)->firstOrFail()

        ], compact('unidadesMedida'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($idproducto)
    {

        request()->validate(['nombreProducto'=>'required',
            'valorProducto'=>'required',
            'contenidoNeto'=>'required',
            'unidadMedida'=>'required',
            'descripcionProducto'=>'required',
            'marca'=>'required'

        ],

        [
            'nombreProducto.required'=>'*Por favor ingrese el nombre del producto',
            'valorProducto.required'=>'*Por favor ingrese el valor del producto',
            'contenidoNeto.required'=>'*Por favor ingrese el contenido neto del producto',
            'unidadMedida.required'=>'*Por favor seleccione la unidad de medida del producto',
            'descripcionProducto.required'=>'*Por favor ingrese la descripción del producto',
            'marca.required'=>'*Por favor ingrese la marca del producto'
        ]

        );

        Productos::where('codigo_producto', $idproducto)->update([
            'nombre_producto' => request('nombreProducto'),
            'valor_producto' => request('valorProducto'),
            'descripcion_producto' => request('descripcionProducto'),

            'cantidad_neta_producto' => request('contenidoNeto'),
            'unidad_medida_producto' => request('unidadMedida'),
            'marca_producto' => request('marca'),

            'id' => '1',
            'estado_producto' => request('estadoProducto')]);

        return redirect()->route('detalle_producto', $idproducto )->with('status','El producto ha sido actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $producto)
    {
        Productos::where('codigo_producto', $producto)->delete();
        return redirect()->route('consulta_productos')->with('status','El producto ha sido eliminado.');

    }
}
