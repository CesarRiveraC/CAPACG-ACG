<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CAPACG') }}</title>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
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
                            Activos <i class="fa fa-bars" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/infraestructuras"><i class="fa fa-university" aria-hidden="true"></i> Infraestructura</a></li>
                                <li><a href="/inmuebles"><i class="fa fa-television" aria-hidden="true"></i> Inmuebles</a></li>
                                <li><a href="/semovientes"><i class="fa fa-heartbeat" aria-hidden="true"></i> Semovientes</a></li>
                                <li><a href="/vehiculos"><span class="fa fa-car" aria-hidden="true"></span> Vehiculos</a></li>
                            </ul>
                    
                        </li>
                    </div>

                    <div class="navbar-brand">
                        <a href="/combustibles"><i class="fa fa-battery-full" aria-hidden="true"></i> Combustibles</a>
                    </div>
                   
                     <div class="navbar-brand">
                        <a href="/usuarios"><i class="fa fa-users" aria-hidden="true"></i> Usuarios</a>
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
                            <li><a href="{{ route('login') }}"> <i class="fa fa-sign-in" aria-hidden="true"></i> Iniciar Sesion</a></li>
                            <li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrar</a></li>
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
                                             <i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesion
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
