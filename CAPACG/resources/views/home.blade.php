@extends('layouts.app')

@section('content')
<div class="container">

    
    <div id="homeContentCol" class="col-md-10 col-md-offset-1">
    <div class="row">
    <div class="jumbotron">
        <h1 id="titulo" class="text-center">CAPACG</h1>
        <p class="lead text-center" id="texto">Es un proyecto en el cual se puede administrar los activos pertenecientes al Área de Conservación Guanacaste, dentro de las categorías que administra están: infraestrucutras, inmuebles, semovientes y vehiculos además de sus respectivas facturas.</p>
        
      </div>



    
     <div class="col-sm-4 text-center">
        <div class="thumbnail">
          <img class="img-responsive" id="img-infraestructura" src="https://si.cultura.cr/sites/default/files/styles/ficha_full/public/museo_historico_de_la_casona_de_santa_rosa_1.jpg?itok=QJ605ONe" alt="Infraestructura" width="400" height="300">
          <p><strong>Infraestructuras</strong></p>
          <p>En este modulo se puede administrar todos los activos de tipo infraestructura.</p>
          <a href="/infraestructuras" class="btn hbtn">Ir al modulo</a>
        </div>
      </div>
      <div class="col-sm-4 text-center">
        <div class="thumbnail">
          <img class="img-responsive" id="img-infraestructura" src="https://img10.naventcdn.com/avisos/9/00/51/62/20/01/360x266/47930557.jpg" alt="Inmuebles" width="400" height="00">
          <p><strong>Inmuebles</strong></p>
          <p>En este modulo se puede administrar todos los activos de tipo inmueble.</p>
          <a href="/inmuebles" class="btn hbtn" >Ir al modulo</a>
        </div>
      </div>
      <div class="col-sm-4 text-center">
        <div class="thumbnail">
          <img class="img-responsive" id="img-infraestructura" src="https://www.anipedia.net/imagenes/caballos-arabes.jpg" alt="Semovientes" width="400" height="300">
          <p><strong>Semovientes</strong></p>
          <p>En este modulo se puede administrar todos los activos de tipo semoviente.</p>
          <a href="/semovientes" class="btn hbtn" >Ir al modulo</a>
        </div>
      </div>  
    
     <div class="col-sm-4 text-center">
        <div class="thumbnail">
          <img class="img-responsive" id="img-infraestructura" src="https://http2.mlstatic.com/S_10061-MCR20023972055_122013-O.jpg" alt="Vehiculos" width="400" height="300">
          <p><strong>Vehiculos</strong></p>
          <p>En este modulo se puede administrar todos los activos de tipo vehiculo.</p>
          <a class="btn hbtn" href="/vehiculos">Ir al modulo</a>
        </div>
      </div>
      <div class="col-sm-4 text-center">
        <div class="thumbnail">
          <img class="img-responsive" id="img-infraestructura" src="http://es.chinalanfeng.com/propic/L_Fuel-Dispenser_Red-Sun_JDk50D424.jpg" alt="Combustibles" width="400" height="300">
          <p><strong>Combustibles</strong></p>
          <p>En este modulo se puede administrar todas las facturas de combustibles hechas a un vehiculo.</p>
          <a href="/combustibles" class="btn hbtn" >Ir al modulo</a>
        </div>
      </div>
      <div class="col-sm-4 text-center">
        <div class="thumbnail">
          <img class="img-responsive" id="img-infraestructura" src="http://www.brighidstudio.com/wp-content/uploads/2016/11/tipos-de-usuarios-imagen1.png" alt="Usuarios" width="400" height="300">
          <p><strong>Usuarios</strong></p>
          <p>En este modulo se puede administrar los usuarios pertenecientes al sistema</p>
          <a href="/usuarios" class="btn hbtn" >Ir al modulo</a>
        </div>
      </div>  
    
    
        </div>
    </div>
     
</div>

@endsection

