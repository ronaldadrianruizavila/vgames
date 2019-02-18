@extends('layouts.app')
@section('titlePage','Registro de Exposiciones')
@section('content')
	<section class="col-md-8 connectedSortable ui-sortable ">
		<!-- Custom tabs (Charts with tabs)-->
		<div class="card p-3">
			<div class="card-body">
				<div class="tab-content p-0">
					<!-- Morris chart - Sales -->
					<form method="POST" action="{{route('exposicion.store')}}">
						@csrf
						<div class="form-group">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<label for="nombre">Nombre:</label>
									<input type="text" name="titulo" id="titulo"
									       class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}">
									@if ($errors->has('titulo'))
										<div class="invalid-feedback">
											{{ $errors->first('titulo') }}
										</div>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<label for="duracion">Duracion:</label>
									<input type="time" name="duracion" class="form-control {{ $errors->has('duracion') ? ' is-invalid' : '' }}">
									@if ($errors->has('duracion'))
										<div class="invalid-feedback">
											{{ $errors->first('duracion') }}
										</div>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group ">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<input type="submit" class="btn btn-primary" value="Guardar">
								</div>
							</div>
						</div>
					</form>

				</div>
			</div><!-- /.card-body -->
		</div>
		<!-- /.card -->
	</section>

@stop