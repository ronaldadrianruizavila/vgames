@extends('layouts.app')
@section('titlePage','Edicion Sala')
@section('content')
	<section class="col-md-8 connectedSortable ui-sortable ">
		<!-- Custom tabs (Charts with tabs)-->
		<div class="card p-3">
			<div class="card-body">
				<div class="tab-content p-0">
					<!-- Morris chart - Sales -->
					<form method="POST" action="{{route('sala.update',$sala)}}">
						@method('PUT')
						@csrf
						<div class="form-group">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<label for="nombre">Nombre:</label>
									<input type="text" name="nombre" value="{{$sala->nombre}}" id="nombre"
									       class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}">

									@if ($errors->has('nombre'))
										<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group ">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<label for="nombre">Estado:</label>
									<select type="estado" name="estado" id="estado" class="custom-select">
										<option value="A" {{(($sala->estado==='A')?"selected":null)}}>Activo</option>
										<option value="I" {{(($sala->estado==='I')?"selected":null)}}>Inactivo</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<label for="sesion_id">Sesiones:</label>
									<sesions-sala num="{{$sala->id}}"></sesions-sala>
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