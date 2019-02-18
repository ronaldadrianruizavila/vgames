@extends('layouts.app')

@section('titlePage','Editar Usuario')

@section('content')
	<section class="col-md-8 connectedSortable ui-sortable ">
		<!-- Custom tabs (Charts with tabs)-->
		<div class="card p-3">
			<div class="card-body">
				<div class="tab-content p-0">
					<!-- Morris chart - Sales -->
					<form method="POST" action="{{route('usuario.update',$usuario)}}">
						@method('PUT')
						@csrf
						<div class="form-group">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<label for="name">Nombre:</label>
									<input type="text" name="name" value="{{$usuario->name}}" id="name"
									       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">

									@if ($errors->has('name'))
										<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
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
										<option value="A" {{(($usuario->estado==='A')?"selected":null)}}>Activo</option>
										<option value="I" {{(($usuario->estado==='I')?"selected":null)}}>Inactivo</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<label for="sesion_id">Lista de roles:</label>
									<ul class="list-unstyled">
										@foreach($roles as $rol)
											<li>
												<label for="">
													<input type="checkbox" value="{{$rol->id}}" name="rol" id="">
													{{$rol->name}}
													<em>{{$rol->description?:'(Sin descripcion)'}}</em>
												</label>
											</li>
										@endforeach
									</ul>
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