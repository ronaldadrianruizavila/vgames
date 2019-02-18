@extends('layouts.auth')

@section('content')
    <div class="card" style="width: 350px">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Inicia sesion para el evento mas grande de video juegos</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
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
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span>
                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Inicia sesion</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-4 mb-0 text-center">
                <a href="{{route('register')}}" class="">Desea Registrarse?</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>

@endsection
