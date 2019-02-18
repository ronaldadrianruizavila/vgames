<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('partials.head')
</head>
<body class="hold-transition sidebar-mini">
<div id="app">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
			<!-- Left navbar links -->


			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block ">
					<a href="{{url('/')}}" class="nav-link">Inicio</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contacto</a>
				</li>
			</ul>

			<ul class="navbar-nav ml-auto">
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item">
					<form action="{{route('logout')}}" id="logout-form" method="POST">
						@csrf
						<a class="nav-link"  onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
							<i class="fa fa-lg fa-sign-out-alt"></i>
						</a>
					</form>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-light-primary elevation-4">
			<!-- Brand Logo -->
			<a href="{{url('/')}}" class="brand-link ml-2">
				<i class="fa fa-gamepad" style="color: #116bfb"></i>
				<span class="brand-text font-weight-light">{{config('app.name')}}</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="{{asset('svg/man.svg')}}" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">{{auth()->user()->name}}</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
					    data-accordion="false">
						<!-- Option meniu-->
						@include('partials.menu')
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header" style="background: white">
				<div class="container-fluid">
					<div class="row m-2">
						<div class="col-ms-12">
							<h3 class="m-0 text-dark">@yield('titlePage', 'Inicio')</h3>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->
			<div class="content-header p-2 elevation-1 border-bottom" style="background: white">
				<div class="container-fluid">
					<div class="row justify-content-end">
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
								<li class="breadcrumb-item active">@yield('titlePage', 'Inicio')</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content mt-5">
				<div class="container-fluid">
					<!-- Main row -->
					<div class="row justify-content-center">
						@yield('content')
					</div>
					<!-- /.row (main row) -->
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<strong>Copyright &copy; {{date('Y')}} <a href="{{url('/')}}">Base de datos II</a>.</strong>
			Derechos reservador
			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 1.0.0
			</div>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
</div>
</body>
</html>

