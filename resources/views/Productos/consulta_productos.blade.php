
@php
	 $menu=1;
@endphp

@extends('layouts.app')


@section('content')

	<div class="page-header ">
		<h1 class="d-flex justify-content-center">Productos</h1>

		@if(session('status'))
			<label for="" style="" >{{ session('status') }}</label>
		@endif
	</div>

	<div>
		<div class=" row justify-content-end"  >
			<a href="{{ route('nuevo_producto') }}"  >
				<button type="button" class="btn btn-secondary" title="Nuevo Producto">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
					  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
					</svg>
				</button>
			</a>&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
		</div>
		<dir> </dir>
	</div>

	<table class="table table-hover">

		<thead class="thead-dark">
			<tr>
				<th scope="col">Código</th>
				<th scope="col">Nombre</th>
				<th scope="col">Valor</th>
				<th scope="col">Estado</th>
				<th width="1%" ></th>
			</tr>

		</thead>

	@php( $ban=0 )
	@foreach($Productos as $ProductosItem)

		<tr class="cursor-pointer">

			<td>{{ $ProductosItem->codigo_producto }}</td>
			<td>{{ $ProductosItem->nombre_producto }}</td>
			<td>$ {{ $ProductosItem->valor_producto }}</td>
			<td>
				@if($ProductosItem->estado_producto==1)
					<svg xmlns="http://www.w3.org/2000/svg" title="Activo" width="25" height="25" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
					  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
					  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
					</svg>
				@else
					<svg xmlns="http://www.w3.org/2000/svg" title="Inactivo" width="25" height="25" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
					  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
					  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
					</svg>
				@endif
			</td>
			<td>
				<a href="{{ route('detalle_producto' ,$ProductosItem->codigo_producto) }}"  >

					<button type="button" class="btn btn-secondary" title="Información del Producto" >
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
						  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
						</svg>
					</button>
              	</a>
			</td>

		</tr>
		@php( $ban=1 )
	@endforeach
	</table>

	@if($ban==0)

		<div class=" row justify-content-center"><h3>No se encontraron productos</h3></div>

	@endif


	<nav>
		<ul class="pagination justify-content-center thead-dark">
			{{ $Productos->links() }}
		</ul>
	</nav>

@endsection