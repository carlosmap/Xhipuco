
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header "><h3>Menú</h3>
                </div>
                <div class="card-header"><a href="{{ route('consulta_productos') }} "><b><h3>Productos</h3></b></a></div>

                <div class="card-header"><a href="{{ route('consulta_inventario') }} "><b><h3>Inventario</h3></b></a></div>

                <div class="card-header"><a href="{{ route('consulta_productos') }} "><b><h3>Facturas</h3></b></a></div>

                <div class="card-header"><a href="{{ route('consulta_productos') }} "><b><h3>Reportes</h3></b></a></div>
            </div>
        </div>
    </div>
</div>
@endsection
