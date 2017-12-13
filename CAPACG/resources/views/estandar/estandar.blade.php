<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'CAPACG') }}</title>

	<script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>

	<!-- Styles -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"></link>

	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}"></link>

	{{--  <link href="{{ asset('css/Montserrat-Regular.ttf') }}"></link>  --}}

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet"> {{--
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> --}}

</head>

<body>
	<div id="app">
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">

					<!-- Collapsed Hamburger -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
						<span class="sr-only">Navegación</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<!-- Branding Image -->
					<a id="logo" class="navbar-brand" href="{{ url('/') }}">
						<p class="logo">CAPACG</p>
					</a>

				</div>

				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<!-- Left Side Of Navbar -->
					<ul class="nav navbar-nav">
						@if (Auth::check())

						<li>
							<a id="activosDrop" href="/estandar/combustibles">
								<i class="fa fa-file-text" aria-hidden="true"></i> Combustibles</a>
						</li>

						<li>
							<a id="activosDrop" href="/estandar/vehiculos">
								<i class="fa fa-car" aria-hidden="true"></i> Vehiculos</a>
						</li>
						<li>
							<a id="activosDrop" href="/estandar/usuarios">
								<i class="fa fa-users" aria-hidden="true"></i> Usuarios</a>
						</li>
						@endif
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						<!-- Authentication Links -->
						@if (Auth::guest())
						<li>
							<a id="activosDrop" href="{{ route('login') }}">
								<i class="fa fa-sign-in" aria-hidden="true"></i> Iniciar Sesión</a>
						</li>
						{{--
						<li>
							<a id="activosDrop" href="{{ route('register') }}">
								<i class="fa fa-user-plus" aria-hidden="true"></i> Registrar</a>
						</li> --}} @else
						<li id="activosDrop" class="dropdown">
							<a id="activosDrop" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->name }}
								<span class="caret"></span>
							</a>

							<ul id="Drop" class="dropdown-menu" role="menu">
								<li>
									<a id="activosDrop" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
										<i id="activosDrop" class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesión
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>

		@yield('content') @include('partials.footerAbsolute')
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>


</body>

</html>