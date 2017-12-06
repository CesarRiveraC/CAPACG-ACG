<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Bienvenido</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">


<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	  @if (Route::has('login'))
     @if (Auth::check())
      <a class="navbar-brand" href="/home">Inicio</a>
	 @endif
   @endif
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
	  @if (Route::has('login'))
     @if (Auth::check())
     @else
        <li><a href="#about">ACG</a></li>
        <li><a href="{{ url('/login') }}">Iniciar Sesión</a></li>
        
		 @endif
         @endif
      </ul>
    </div>
  </div>
</nav>

@yield('content')

<footer class="container-fluid bg-4 text-center">
<div id="link" class="row">
      <div class="col-md-4">
      
               <p><span class="copyright">Copyright &copy; CAPACG</span></p> 
             
                <p>Área de Conservación Guanacaste</p>
             
                <p>Sistema Nacional de Área de Conservación Costa Rica</p>
            
                <p>Ministerio de Ambiente y Energía</p>
           
           
      </div>
      <div class="col-md-4">
        <p>Control de Activos para el Area de Conservación Guanacaste</p>
      <p>
        <a id="link" href="#home" ><i class="fa fa-arrow-up"></i>Arriba</a>
      </p>
      <a id="link" href="https://www.facebook.com/ACG.CR"><i class="fa fa-facebook-official"></i></a>
    <a id="link" href="https://plus.google.com/u/0/108989919407702501124/posts"><i class="fa fa-google-plus"></i></a>
    <a id="link" href="http://www.youtube.com/videosacg"><i class="fa fa-youtube"></i></a>
    <a id="link" href="https://www.acguanacaste.ac.cr/noticias?format=feed&type=rss"><i class="fa fa-rss-p w3-hover-opacity"></i></a>
    <a id="link" href="https://twitter.com/ACGuanacaste"><i class="fa fa-twitter"></i></a>
      </div>

      <div class="col-md-4">
             <p>Autores:</p>
            <p>Omar Miranda Villagra</p>
            <p>Adriana Vargas Villalobos</p>
            <p>Cesar Rivera Campos</p>
        </div>
      
      </div>
</footer>

</body>
</html>