@extends('layouts.app')
@section('titlePage','Listado de exposicion')
@section('content')
	<section class="col-md-10 connectedSortable ui-sortable ">
		<!-- Custom tabs (Charts with tabs)-->

		@if (session('message'))
			<div class="alert alert-success" role="alert">
				{{ session('message') }}
			</div>
		@endif
		@if (session('messageerr'))
			<div class="alert alert-danger" role="alert">
				{{ session('messageerr') }}
			</div>
		@endif

		<div class="card p-0">
			<div class="card-body d-flex justify-content-center p-0">
				<table class="table w-100 h-100">
					<thead class="bg-primary">
					<tr>
						<th scope="col">Titulo</th>
						<th scope="col">Estado</th>
						<th scope="col">Fecha de creacion</th>
						<th scope="col">Acciones</th>
					</tr>
					</thead>
					<tbody class="text-center">
					@foreach ($exposiciones as $exposicion)
						<tr>
							<th>{{$exposicion['titulo']}}</th>
							<td>{{$exposicion['estado']}}</td>
							<td>{{$exposicion['duracion']}}</td>
							<td>{{$exposicion['created_at']}}</td>
							{{--<td>@include('$partials.actions.exposicion') </td>--}}
						</tr>
					@endforeach
					</tbody>
				</table>
			</div><!-- /.card-body -->
		</div>
		<!-- /.card -->
		{{$exposiciones->links()}}
	</section>
@stop