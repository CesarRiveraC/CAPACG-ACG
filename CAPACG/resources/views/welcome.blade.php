<!DOCTYPE html>
<html>
<title>¡Bienvenido!</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
body, html {
    height: 100%;
    color: #777;
    line-height: 1.8;
   

}
.aboutSection{
     background-color: #C3FBCD;
}
#footer{
     background-color: #4CAF50 !important;
}
#capacg{
   color: green;
}
/* Create a Parallax Effect */
.bgimg-1, .bgimg-2, .bgimg-3 {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

/* First image (Logo. Full height) */
.bgimg-1 {
    background-image: url('https://upload.wikimedia.org/wikipedia/commons/d/d3/Site_of_coolness.jpg');
    min-height: 100%;
}



.w3-wide {letter-spacing: 10px;}
.w3-hover-opacity {cursor: pointer;}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1024px) {
    .bgimg-1, .bgimg-2, .bgimg-3 {
        background-attachment: scroll;
    }
    #about{
     background-color: #C3FBCD;
}

}

</style>
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
    las tierras bajas del lado caribe de Costa Rica. <a href="#"> Ver mas..</a></p>
    <br>

    <div class="w3-row-padding w3-center w3-section">    
        <div class="w3-col m3">

            <img  src="http://www.sinac.go.cr/ES/ac/PublishingImages/logo-area-conservacion-guana.png" class="w3-image w3-opacity w3-hover-opacity-off" alt="a picture">
        </div>
        <div class="w3-col m3">
            <img  src="http://www.sinac.go.cr/SiteCollectionImages/logo.jpg" class="w3-image w3-opacity w3-hover-opacity-off" alt="a picture">
        </div>
        <div class="w3-col m3">
            <img  src="https://flecharoja.com/assets/images/clientes/logo-minae.svg" class="w3-image w3-opacity w3-hover-opacity-off" alt="a picture">
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
 

<script>




// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-green";
       
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-green", "");
          
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>


</body>
</html>