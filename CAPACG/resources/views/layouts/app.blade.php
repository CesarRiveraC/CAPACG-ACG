<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CAPACG') }}</title>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    html, body{
        color: #229337;
        background-color: #C3FBCD;
    }
    .navbar{
            background-color: #229337 !important;
            color: white; 
            border-bottom: 4px solid #1F8C33;
            box-shadow: 3px 3px 3px #7C837D;
    }
    .logo{
        font-weight: bold !important;
        
	    font-size: 22px; color: white; text-shadow: 0px 2px 3px #171717;
	
	    -webkit-box-shadow: 0px 2px 3px #1F8C33;
        -moz-box-shadow: 0px 2px 3px #1F8C33;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
    }
    a{
	    color: black !important;
        
    }
    li a{
	    color: black !important;
    }
    
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a id = "logo" class="navbar-brand" href="{{ url('/') }}">
                        <p class="logo">CAPACG</p>
                    </a>

                    <div class="navbar-brand">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"   >
                            Activos <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/infraestructuras">Infraestructura</a></li>
                                <li><a href="#">Inmuebles</a></li>
                                <li><a href="/semovientes">Semovientes</a></li>
                                <li><a href="/vehiculos">Vehiculos</a></li>
                            </ul>
                    
                        </li>
                    </div>
                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}"> <span class="glyphicon glyphicon-log-in"></span>Iniciar Sesion</a></li>
                            <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user">Registrar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                             <span class="glyphicon glyphicon-log-out"> Cerrar Sesion
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

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
