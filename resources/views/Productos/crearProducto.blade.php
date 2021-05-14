
@php
	 $ruta=[route("consulta_productos"), "Productos" ];
	 $menu=1;
@endphp

@extends('layouts.app')

@section('content')



	<div class="page-header ">
		<h1 class="d-flex justify-content-center">Nuevo Producto</h1>
	</div>


	<form method="POST" action="{{ route('registrarProducto') }}" role="form">
		@csrf

		<div class="justify-content-center ">
			<div class=" form-group ">
				<label for="Producto"><b><h3>Producto</h3></b></label>
				<input type="text" class="form-control" name="nombreProducto"  autofocus="" value="{{ old('nombreProducto') }}" >

				<label>{!! $errors->first('nombreProducto') !!} </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Contenido Neto</h3></b></label>
					<input type="number" class="form-control" name="contenidoNeto" value="{{ old('contenidoNeto') }}" >

				<label >{!! $errors->first('contenidoNeto') !!} </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Unidad de medida</h3></b></label>

					<select name="unidadMedida"  class="form-control" >
							<option value="">Seleccione Unidad de Medida</option>
							@foreach ($unidadesMedida as $unidadesMedidaItem)

							{{ $select='' }}
							@if(old('unidadMedida')==$unidadesMedidaItem->codigo_unidad_medida)
								{{ $select='selected' }}

							@endif
								<option {{ $select }} value="{{ $unidadesMedidaItem->codigo_unidad_medida   }}">{{ $unidadesMedidaItem->abreviacion_unidad_medida." - ".$unidadesMedidaItem->unidad_medida  }}</option>

							@endforeach
					</select>

				<label >{!! $errors->first('unidadMedida') !!} </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Marca</h3></b></label>
					<input type="text" class="form-control" name="marca" value="{{ old('marca') }}" >

				<label >{!! $errors->first('marca') !!} </label>
			</div>

			<div class="form-group">
				<label for=""><b><h3>Descripci&oacute;n </h3></b></label>
				<textarea name="descripcionProducto" class="form-control" id="" cols="10" rows="3">{{ old('descripcionProducto') }}</textarea>
				<label >{!! $errors->first('descripcionProducto') !!} </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Valor $</h3></b></label>
					<input type="number" class="form-control" name="valorProducto" value="{{ old('valorProducto') }}" >

				<label >{!! $errors->first('valorProducto') !!} </label>
			</div>

			<div class="form-group">
				<button class="btn btn-secondary">Guardar</button>
			</div>
		</div>
	</form>


@endsection