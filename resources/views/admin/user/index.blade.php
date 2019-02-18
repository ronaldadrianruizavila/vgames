@extends('layouts.app')

@section('titlePage','Lista usuarios')

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
						<th scope="col">Fecha de creacion</th>
						@can('user.edit')
							<th scope="col">Acciones</th>
						@endcan
					</tr>
					</thead>
					<tbody class="text-center">
					@foreach ($users as $user)
						<tr>
							<th>{{$user['name']}}</th>
							<td>{{$user['estado']}}</td>
							<td>{{$user['created_at']}}</td>

							@can('user.edit')
								<td>@include('partials.actions.user') </td>
							@endcan
						</tr>
					@endforeach
					</tbody>
				</table>
			</div><!-- /.card-body -->
		</div>
		<!-- /.card -->
		{{$users->links()}}
	</section>
@stop