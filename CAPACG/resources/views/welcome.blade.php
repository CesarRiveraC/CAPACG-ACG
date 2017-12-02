<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
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

<!-- Navbar -->
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
        {{--  <li><a href="{{ url('/register') }}">Resgistrarse</a></li>  --}}
		 @endif
         @endif
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center" id="home">
<br>
<br>
  <h2 class="margin"><div><span id="logo" class="label label-default">CAPACG</span></div></h2>
  
  <h3>Control de Activos para el Área de Conservación Guanacaste</h3>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center" id="about">
  <h3 class="margin">Área de Conservación Guanacaste</h3>
  <p>Control de Activos para el Área de Conservación Guanacaste</em></p>
  <p>El corazón del Área de Conservación Guanacaste (ACG) comprende un solo bloque
    bio-geográfico ininterrumpido de área silvestre protegida de 163,000 hectáreas, que se
    extiende desde el área marina en los alrededores del archipiélago Islas Murciélago en el
    océano Pacifico, pasando por la meseta de Santa Rosa hasta la cima de los volcanes Orosí,
    Cacao y Rincón de la Vieja de la Cordillera Volcánica de Guanacaste y continuando hasta
    las tierras bajas del lado caribe de Costa Rica. <a href="https://www.acguanacaste.ac.cr/acg/que-es-el-acg"> Ver mas..</a> </p>
  <div class="row">
  <div class="col-sm-4">
      
      <img id="img"  src="http://www.sinac.go.cr/ES/ac/PublishingImages/logo-area-conservacion-guana.png" class="img-responsive margin" height="180" width="180" alt="Logo ACG">
    </div>
    <div class="col-sm-4"> 
      
      <img id="img" src="http://www.sinac.go.cr/SiteCollectionImages/logo.jpg" class="img-responsive margin"  height="180" width="180" alt="Logo SINAC">
    </div>
    <div class="col-sm-4"> 
      
      <img id="img" src="https://flecharoja.com/assets/images/clientes/logo-minae.svg" class="img-responsive margin" height="180" width="180" alt="Logo MINAE">
    </div>
    </div>
</div>



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
<a id="link" href="#home" ><i class="fa fa-arrow-up w3-margin-right"></i>Arriba</a>
  <p>CAPACG</p> 
      <a id="link" href="https://www.facebook.com/ACG.CR"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
    <a id="link" href="https://plus.google.com/u/0/108989919407702501124/posts"><i class="fa fa-google-plus w3-hover-opacity"></i></a>
    <a id="link" href="http://www.youtube.com/videosacg"><i class="fa fa-youtube w3-hover-opacity"></i></a>
    <a id="link" href="https://www.acguanacaste.ac.cr/noticias?format=feed&type=rss"><i class="fa fa-rss-p w3-hover-opacity"></i></a>
    <a id="link" href="https://twitter.com/ACGuanacaste"><i class="fa fa-twitter w3-hover-opacity"></i></a>
</footer>

</body>
</html>