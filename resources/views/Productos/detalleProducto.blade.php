
@php
	 $ruta=[route("consulta_productos"), "Productos" ];
	 $menu=1;
@endphp

@extends('layouts.app')

@section('content')

	<div class="page-header ">
		<h1 class="d-flex justify-content-center">Información del Producto</h1>

		@if(session('status'))
			<label for="" style="" >{{ session('status') }}</label>
		@endif
	</div>

	<div>
		<div class=" row justify-content-end"  >


				<button type="button" class="btn btn-secondary" title="Editar Producto" onclick="habilitar(['nombreProducto', 'contenidoNeto','unidadMedida','marca','descripcionProducto', 'valorProducto','estadoProducto'])" >
	                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
	  					<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
					</svg>
	          	</button>

	        &nbsp;&nbsp;&nbsp;
	        @php
				if(trim($errors)=="[]")
				{
			@endphp
	        <form action="{{ route('eliminar_producto',$producto->codigo_producto) }}" method="POST" onsubmit="return confirm('Desea eliminar el producto?')" >
		        @csrf
		        @method('DELETE')
		        <div id="del" >
		        	<button type="submit"  class="btn btn-secondary" title="Eliminar Producto" >
		        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
						  	<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
						</svg>
		        	</button>
		        </div>
			</form>
			@php
	    		}
	        @endphp
          	&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
         </div>
     </div>



	<form method="POST" action="{{ route('actualizarProducto', $producto->codigo_producto) }}" role="form">
		@csrf

@php
	if(trim($errors)=="[]")
	{
		$desabilita="disabled";
	}
	else
	{
		$desabilita="";
	}
@endphp

		<div class="justify-content-center ">
			<div class=" form-group ">
				<label for="Producto"><b><h3>Producto</h3></b></label>

				@if($errors=="[]")
						@php($P=$producto->nombre_producto)
				@else
						@php( $P=old('nombreProducto') )
				@endif

				<input type="text" class="form-control" name="nombreProducto" id="nombreProducto"  autofocus="" value="{{ $P }}" {{ $desabilita }}  >

				<label>{!! $errors->first('nombreProducto') !!} </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Contenido Neto</h3></b></label>
					@if($errors=="[]")
						@php( $Con=$producto->cantidad_neta_producto )
					@else
						@php( $Con=old('contenidoNeto') )
					@endif

					<input type="number" class="form-control" name="contenidoNeto" id="contenidoNeto" value="{{ $Con }}" {{ $desabilita }} >
				<label >{!! $errors->first('contenidoNeto') !!} </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Unidad de medida</h3></b></label>

					<select name="unidadMedida" id="unidadMedida"  class="form-control" {{ $desabilita }}  >
							<option value="">Seleccione Unidad de Medida</option>
							@foreach ($unidadesMedida as $unidadesMedidaItem)


								@if(old('unidadMedida')==$unidadesMedidaItem->codigo_unidad_medida)
									@php( $select='selected' )

								@elseif($unidadesMedidaItem->codigo_unidad_medida == $producto->unidad_medida_producto )
									@php( $select='selected' )
								@else
									@php( $select='')
								@endif

								<option {{ $select }} value="{{ $unidadesMedidaItem->codigo_unidad_medida   }}">{{ $unidadesMedidaItem->abreviacion_unidad_medida." - ".$unidadesMedidaItem->unidad_medida  }}</option>

							@endforeach
					</select>

				<label >{!! $errors->first('unidadMedida') !!} </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Marca</h3></b></label>

					@if($errors=="[]")
						@php( $M=$producto->marca_producto )
					@else
						@php( $M=old('marca') )
					@endif


					<input type="text" class="form-control" name="marca" id="marca" value="{{ $M }}" {{ $desabilita }} >

				<label >{!! $errors->first('marca') !!} </label>
			</div>

			<div class="form-group">
				<label for=""><b><h3>Descripci&oacute;n </h3></b></label>

				@if($errors=="[]")
					@php( $D= $producto->descripcion_producto )
				@else
					@php( $D= old('descripcionProducto') )
				@endif

				<textarea name="descripcionProducto" id="descripcionProducto" class="form-control" id="" cols="10" rows="3" {{ $desabilita }} > {{$D}} </textarea>
				<label >{!! $errors->first('descripcionProducto') !!} </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Valor $</h3></b></label>

					@if($errors=="[]")
						@php( $V= $producto->valor_producto )
					@else
						@php( $V= old('valorProducto') )
					@endif

					<input type="number" class="form-control" name="valorProducto" id="valorProducto" value="{{ $V }}" {{ $desabilita }} >

				<label >{!! $errors->first('valorProducto') !!} </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Estado</h3></b></label>

					<select name="estadoProducto" id="estadoProducto"  class="form-control" {{ $desabilita }}  >

						@php( $select='')
						@if(old('estadoProducto')==1)
							@php( $select='selected' )
						@endif

						@if($producto->estado_producto==1 )
							@php( $select='selected' )
						@endif

						<option value="1" {{ $select }} >Activo</option>

						@php( $select='')
						@if(old('estadoProducto')==0)
							@php( $select='selected' )
						@endif

						@if($producto->estado_producto==0 )
							@php( $select='selected' )
						@endif

						<option value="0" {{ $select }} >Inactivo</option>
					</select>
			</div>


					<div class="form-group" id="up" style="
					@if(trim($errors)=="[]")
						{{ "display: none;" }}
					@else
						{{ "display: block;" }}
					@endif
					" >
						<input type="hidden" id="edit" value="0" >
						<button class="btn btn-secondary">Actualizar</button>
					</div>


		</div>
	</form>

@endsection