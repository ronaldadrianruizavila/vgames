@extends('layouts.auth')

@section('content')
	<div class="card">
		<div class="card-body register-card-body">
			<p class="login-box-msg">Registro de nuevos miembros</p>
			<form method="POST" action="{{ route('register') }}">
				@csrf
				<div class="input-group mb-3">
					<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
					       name="name" placeholder="Nombre"  value="{{ old('name') }}" required autofocus>
					<div class="input-group-append">
						<span class="fa fa-user input-group-text"></span>
					</div>
					@if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
					@endif
				</div>
				<div class="input-group mb-3">
					<input id="email" type="email" placeholder="Email"
					       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
					       value="{{ old('email') }}" required>
					<div class="input-group-append">
						<span class="fa fa-envelope input-group-text"></span>
					</div>
					@if ($errors->has('email'))
						<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
					@endif
				</div>
				<div class="input-group mb-3">
					<input id="password" type="password" placeholder="Password"
					       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
					       required>
					<div class="input-group-append">
						<span class="fa fa-lock input-group-text"></span>
					</div>

					@if ($errors->has('password'))
						<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
					@endif
				</div>
				<div class="input-group mb-3">
					<input id="password-confirm" placeholder="Repetir Password" type="password" class="form-control" name="password_confirmation"
					       required>
					<div class="input-group-append">
						<span class="fa fa-lock input-group-text"></span>
					</div>

				</div>
				<div class="row">
					<!-- /.col -->
					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Register') }}</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
			<div class="mt-2 text-center">
				<a href="{{route('login')}}" class="text-center mt-4">Ya posee una cuenta?</a>
			</div>
		</div>
		<!-- /.form-box -->
	</div>
@endsection
