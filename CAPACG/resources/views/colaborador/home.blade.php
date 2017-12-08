@extends('colaborador.colaborador')

@section('content')
<div class="container">

    
    <div id="homeContentCol" class="col-md-10 col-md-offset-1">
    <div class="row">
    {{--  <div class="jumbotron">
        <h1 id="titulo" class="text-center">CAPACG</h1>
        {{--  <p class="lead text-center" id="texto">Es un proyecto en el cual se puede administrar los activos pertenecientes al Área de Conservación Guanacaste, dentro de las categorías que administra están: infraestrucutras, inmuebles, semovientes y vehiculos además de sus respectivas facturas.</p>  --}}
        
      {{--  </div>    --}}



    <br>
    <h2 class="text-center">Menú Principal</h2>
    <br>
     <div class="col-sm-4 text-center">
        <div class="thumbnail">
          
          <span id = "inicio" class="fa-stack fa-4x">
              <i id="inicio" class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-university fa-stack-1x fa-inverse"></i>
            </span>
          <p><strong>Infraestructuras</strong></p>
          <p>En este módulo se puede ver todos los activos de tipo infraestructura asignados a.</p>
          <a href="/infraestructuras" class="btn hbtn">Ir al módulo</a>
        </div>
      </div>
      <div class="col-sm-4 text-center">
        <div class="thumbnail">
          
          <span id="inicio" class="fa-stack fa-4x">
              <i id="inicio" class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-television fa-stack-1x fa-inverse"></i>
            </span>
          <p><strong>Inmuebles</strong></p>
          <p>En este módulo se puede ver todos los activos de tipo inmueble asignados a mí.</p>
          <a href="/inmuebles" class="btn hbtn" >Ir al modulo</a>
        </div>
      </div>
      <div class="col-sm-4 text-center">
        <div class="thumbnail">
          
          <span id="inicio" class="fa-stack fa-4x">
              <i id="inicio" class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-bug fa-stack-1x fa-inverse"></i>
            </span>
          <p><strong>Semovientes</strong></p>
          <p>En este módulo se puede ver todos los activos de tipo semoviente asignados a mí.</p>
          <a href="/semovientes" class="btn hbtn" >Ir al modulo</a>
        </div>
      </div>  
    
     <div class="col-sm-6 text-center">
        <div class="thumbnail">
          
          <span id="inicio" class="fa-stack fa-4x">
              <i id="inicio" class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-car fa-stack-1x fa-inverse"></i>
            </span>
          <p><strong>Vehículos</strong></p>
          <p>En este módulo se puede ver todos los activos de tipo vehículo asignados a mí.</p>
          <a class="btn hbtn" href="/vehiculos">Ir al modulo</a>
        </div>
      </div>
      <div class="col-sm-6 text-center">
        <div class="thumbnail">
          
          <span id="inicio" class="fa-stack fa-4x">
              <i id="inicio" class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-file-text fa-stack-1x fa-inverse"></i>
            </span>
          <p><strong>Combustibles</strong></p>
          <p>En este modulo se puede ver todas las facturas de combustibles hechas a un vehiculo asignados a mí.</p>
          <a href="/combustibles" class="btn hbtn" >Ir al modulo</a>
        </div>
      </div>
     
    
    
        </div>
    </div>
     
</div>

@endsection
