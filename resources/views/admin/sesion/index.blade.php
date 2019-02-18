@extends('layouts.app')
@section('titlePage','Sesiones')
@section('content')
	<section class="col-md-10 connectedSortable ui-sortable ">

	{{--	@if (session('message'))
			<div class="alert alert-success" role="alert">
				{{ session('message') }}
			</div>
		@endif
		@if (session('messageerr'))
			<div class="alert alert-danger" role="alert">
				{{ session('messageerr') }}
			</div>
		@endif--}}

		<div class="card p-0">
			<div class="card-body d-flex justify-content-center p-0">
				<table class="table w-100 h-100">
					<thead class="bg-primary">
					<tr>
						<th scope="col">Nombre</th>
						<th scope="col">Sala</th>
						<th scope="col">Hora Inicio</th>
						<th scope="col">Hora fin</th>
						<th scope="col">fecha Creado</th>
					</tr>
					</thead>
					<tbody class="text-center">
					@foreach ($sesions as $sesion)
						<tr>
							<th>{{$sesion['nombre']}}</th>
							<th>{{$sesion->sala->nombre}}</th>
							<td>{{$sesion['hora_inicio']}}</td>
							<td>{{$sesion['hora_fin']}}</td>
							<td>{{$sesion['created_at']}}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div><!-- /.card-body -->
		</div>
		<!-- /.card -->
		{{$sesions->links()}}
	</section>
@stop