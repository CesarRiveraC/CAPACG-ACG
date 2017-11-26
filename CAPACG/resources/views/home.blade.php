@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
    <div id="homeContentCol" class="col-md-10 col-md-offset-1">
    <div class="jumbotron">
        <h1 id="titulo" class="text-center">CAPACG</h1>
        <p class="lead text-center" id="texto">Es un proyecto en el cual se puede administrar los activos pertenecientes al Área de Conservación Guanacaste, dentro de las categorías que administra están: infraestrucutras, inmuebles, semovientes y vehiculos además de sus respectivas facturas.</p>
        
      </div>
    <div id="homeContentInfraestructura" class="col-md-4 text-center">
    <div class="homeInfraestructura">
          <img class="img-circle center" id="img-infraestructura" src="https://si.cultura.cr/sites/default/files/styles/ficha_full/public/museo_historico_de_la_casona_de_santa_rosa_1.jpg?itok=QJ605ONe" alt="Generic placeholder image" width="140" height="140">
          <h2 id="titulo" class="text-center">Infraestructuras</h2>
          <p class="text-justify" id="texto">
          En este modulo se puede administrar todos los activos de tipo infraestructura.
          <br>
          <a id="link" href="#">Crear una nueva infraestructura</a>
          <br>
          <a id="link" href="/infraestructuras">Listar infraestructuras en estado activo</a>
          <br>
          <a id="link" href="/infraestructuras/filter">Listar infraestructuras en estado inactivo</a>
          </p>
          <p><a class="btn btn-primary text-center" href="/infraestructuras" role="button">Ir al modulo &raquo;</a></p>
        </div>
        </div><!-- /.col-lg-4 -->
        <div id="homeContent" class="col-md-4 text-center">
          <img class="img-circle" id="img-inmueble" src="https://img10.naventcdn.com/avisos/9/00/51/62/20/01/360x266/47930557.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2 id="titulo" class="text-center">Inmuebles</h2>
          <p  id="texto">
          En este modulo se puede administrar todos los activos de tipo inmueble.
          <br>
          <a id="link" href="/inmuebles/create">Crear un nuevo inmueble</a>
          <br>
          <a id="link" href="/inmuebles">Listar inmuebles en estado activo</a>
          <br>
          <a id="link" href="/inmuebles/filter">Listar inmuebles en estado inactivo</a></p>
          <p><a class="btn btn-default text-center" href="/inmuebles" role="button">Ir al modulo &raquo;</a></p>
        
        </div><!-- /.col-lg-4 -->
        <div id="homeContent" class="col-md-4 text-center">
          <img class="img-circle" id="img-semoviente" src="https://www.anipedia.net/imagenes/caballos-arabes.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2 id="titulo" class="text-center">Semovientes</h2>
          <p  id="texto">
          En este modulo se puede administrar todos los activos de tipo semoviente.
          <br>
          <a id="link" href="/semovientes/create">Crear un nuevo semoviente</a>
          <br>
          <a id="link" href="/semovientes">Listar semovientes en estado activo</a>
          <br>
          <a id="link" href="/semovientes/filter">Listar semovientes en estado inactivo</a></p>
          <p ><a class="btn btn-default text-center" href="/semovientes" role="button">Ir al modulo &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

        <div id="homeContent" class="col-md-4 text-center">
          <img class="img-circle" id="img-vehiculo" src="https://http2.mlstatic.com/S_10061-MCR20023972055_122013-O.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2 id="titulo" class="text-center">Vehiculos</h2>
          <p  id="texto">
          En este modulo se puede administrar todos los activos de tipo vehiculo.
          <br>
          <a id="link" href="/vehiculos">Crear un nuevo vehiculo</a>
          <br>
          <a id="link" href="/vehiculos">Listar vehiculos en estado activo</a>
          <br>
          <a id="link" href="/vehiculos/filter">Listar vehiculos en estado inactivo</a></p>
          <p><a class="btn btn-default text-center" href="/vehiculos" role="button">Ir al modulo &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

        <div id="homeContent" class="col-md-4 text-center">
          <img class="img-circle" id="img-combustible" src="http://es.chinalanfeng.com/propic/L_Fuel-Dispenser_Red-Sun_JDk50D424.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2 id="titulo" class="text-center">Combustibles</h2>
          <p id="texto">En este modulo se puede administrar todas las facturas de combustibles hechas a un vehiculo.
          <br>
          <a id="link" href="/combustibles/create">Crear una nueva factura</a>
          <br>
          <a id="link" href="/combustibles">Listar inmuebles en estado activo</a>
          <br>
          <a href="/combustibles/filter">Listar inmuebles en estado inactivo</a></p>
          <p><a class="btn btn-default text-center" href="/combustibles" role="button">Ir al modulo &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

        <div id="homeContent" class="col-md-4 text-center">
          <img class="img-circle" id="img-usuario" src="http://www.brighidstudio.com/wp-content/uploads/2016/11/tipos-de-usuarios-imagen1.png" alt="Generic placeholder image" width="140" height="140">
          <h2 id="titulo" class="text-center">Usuarios</h2>
          <p id="texto">En este modulo se puede administrar los usuarios pertenecientes al sistema.
          <br>
          <a href="/usuarios/create">Crear un nuevo usuario</a>
          <br>
          <a href="/usuarios">Listar usuarios en estado activo</a>
          <br>
          <a href="/usuarios/filter">Listar usuarios en estado inactivo</a></p>
          <p><a class="btn btn-default text-center" href="/usuarios" role="button">Ir al modulo &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

      </div><!-- /.row -->

        {{--  <div class="col-md-8 col-md-offset-2">
        
            <div class="panel panel-default">
                <div class="panel-heading">¡Bienvenido!</div>

                <div class="panel-body">    
                    
                    
                  
                </div>
            </div>
        </div>  --}}
        </div>
    </div>
     


@endsection

