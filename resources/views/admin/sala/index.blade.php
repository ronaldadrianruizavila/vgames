@extends('layouts.app')
@section('titlePage','Listado de salas')
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
				<table class="table w-100 h-100 table-responsive-sm">
					<thead class="bg-primary">
					<tr>
						<th scope="col">Nombre</th>
						<th scope="col">Estado</th>
						<th scope="col">Sesiones</th>
						<th scope="col">Fecha de creacion</th>
						@can('sala.edit')
						<th scope="col">Acciones</th>
						@endcan
					</tr>
					</thead>
					<tbody class="text-center">
					@foreach ($salas as $sala)
						<tr>
							<th>{{$sala['nombre']}}</th>
							<td>{{$sala['estado']}}</td>
							<td>
								<ul>
									@foreach($sala->sesions as $sesion)
										<li>{{$sesion->nombre}}</li>
									@endforeach
								</ul>
							</td>
							<td>{{$sala['created_at']}}</td>

							@can('sala.edit')
								<td>@include('partials.actions.sala') </td>
							@endcan
						</tr>
					@endforeach
					</tbody>
				</table>
			</div><!-- /.card-body -->
		</div>
		<!-- /.card -->
		{{$salas->links()}}
	</section>
@endsection