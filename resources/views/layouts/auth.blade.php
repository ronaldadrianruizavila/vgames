<!doctype html>
<html lang="en">
<head>
	@include('partials.head')
	<title>Inicio sesion</title>

	<style>
		.load {
			animation: slide 2s;
		}

		.slider {
			background-repeat: no-repeat;
			background-position: center;
			background-size: 100% 100%;
			width: 100%;
			height: 100vh;
			animation: slide 40s infinite;
		}

		@keyframes slide {
			0% {
				background-image: url("{{asset('/img/evento.jpg')}}");
			}
			50% {
				background-image: url("{{asset('/img/evento2.jpg')}}");
			}
			70% {
				background-image: url("{{asset('/img/evento3.jpg')}}");
			}
			100% {
				background-image: url("{{asset('/img/evento4.jpg')}}");
			}

		}

	</style>
</head>
<body>
<div class="slider">
	<div class="load">
		<main>
			<!-- /.login-logo -->
			<div class="page-content">
				<div class="content-wrapper">
					<div class="content d-flex justify-content-center align-items-center "
					     style=" position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%);">
						@yield('content')
					</div>
				</div>
			</div>
		</main>
	</div>
	<!-- /.login-box -->
</div>


</body>
</html>