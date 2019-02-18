@extends('layouts.app')
@section('titlePage','Registro de sala')
@section('content')
	<section class="col-md-8 connectedSortable ui-sortable ">
		<!-- Custom tabs (Charts with tabs)-->
		<div class="card p-3">
			<div class="card-body">
				<div class="tab-content p-0">
					<!-- Morris chart - Sales -->
					<form method="POST" action="{{route('sala.store')}}">
						@csrf
						<div class="form-group">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<label for="nombre">Nombre:</label>
									<input type="text" name="nombre" id="nombre"
									       class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}">
									@if ($errors->has('nombre'))
										<div class="invalid-feedback">
                                        {{ $errors->first('nombre') }}
                                        </div>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<label for="sesion_id">Sesiones:</label>
									<select name="sesion_id" id="sesion_id" class="custom-select">
										<option value="0">Sin seciones</option>
										<option value="1">Matutina</option>
										<option value="2">Vespertirna</option>
										<option value="3">Ambas</option>
									</select>
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