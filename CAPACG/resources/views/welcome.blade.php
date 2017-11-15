<!DOCTYPE html>
<html>
<title>¡Bienvenido!</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    @if (Route::has('login'))
     @if (Auth::check())
    <a href="{{ url('/home') }}" class="w3-bar-item w3-button">INICIO</a>
     @else
    <a href="#about" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> ACG</a>
    <a href="{{ url('/login') }}" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> Iniciar Sesión</a>
    <a href="{{ url('/register') }}" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> Registrar</a>
        @endif
         @endif
                
           
    
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
   @if (Route::has('login'))
     @if (Auth::check())
     <a href="{{ url('/home') }}" class="w3-bar-item w3-button">INICIO</a>
      @else
    <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">ACG</a>
    <a href="{{ url('/login') }}" class="w3-bar-item w3-button" >Iniciar Sesión</a>
    <a href="{{ url('/register') }}" class="w3-bar-item w3-button" >Registrar</a>
     @endif
     @endif
    
  </div>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-green w3-xlarge w3-wide w3-animate-opacity" id="capacg">CAPACG </span>
  </div>
</div>
<div class="aboutSection">
<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
  <h3 class="w3-center">Área de Conservación Guanacaste</h3>
  <p class="w3-center"><em>Control de Activos para el Área de Conservación Guanacaste</em></p>
  <p>El corazón del Área de Conservación Guanacaste (ACG) comprende un solo bloque
    bio-geográco ininterrumpido de área silvestre protegida de 163,000 hectáreas, que se
    extiende desde el área marina en los alrededores del archipiélago Islas Murciélago en el
    océano Pacico, pasando por la meseta de Santa Rosa hasta la cima de los volcanes Orosí,
    Cacao y Rincón de la Vieja de la Cordillera Volcánica de Guanacaste y continuando hasta
    las tierras bajas del lado caribe de Costa Rica. <a href="https://www.acguanacaste.ac.cr/acg/que-es-el-acg"> Ver mas..</a></p>
    <br>

    <div class="w3-row-padding w3-center w3-section">    
        <div class="w3-col m3">

            <img  src="http://www.sinac.go.cr/ES/ac/PublishingImages/logo-area-conservacion-guana.png" class="w3-image w3-opacity w3-hover-opacity-off" alt="Logo ACG">
        </div>
        <div class="w3-col m3">
            <img  src="http://www.sinac.go.cr/SiteCollectionImages/logo.jpg" class="w3-image w3-opacity w3-hover-opacity-off" alt="Logo SINAC">
        </div>
        <div class="w3-col m3">
            <img  src="https://flecharoja.com/assets/images/clientes/logo-minae.svg" class="w3-image w3-opacity w3-hover-opacity-off" alt="Logo MINAE">
        </div>
    </div>
  &nbsp;&nbsp;

  
  
</div>





</div>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off" id="footer">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Arriba</a>
  
  <p>CAPACG</p>
</footer>
 

<script src="{{ asset('js/welcome.js') }}"></script>


</body>
</html>