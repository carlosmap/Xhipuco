
@extends('layouts.app')

@section('content')

	<div class="page-header ">
		<h1 class="d-flex justify-content-center">Inventario</h1>

		@if(session('status'))
			<label for="" style="" >{{ session('status') }}</label>
		@endif
	</div>


@endsection