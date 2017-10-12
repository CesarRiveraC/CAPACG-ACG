@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detalle Vehiculo</div>

                <div class="panel-body">


                     

                     <dl class="dl-horizontal">
                      <dt>Placa</dt>
                      <dd>{{$vehiculo->inmueble->activo->Placa}}</dd>
                      <br>
                      <dt>Descripcion</dt>
                      <dd>{{$vehiculo->inmueble->activo->Descripcion}}</dd>
                      <br>
                     <dt>Programa</dt>
                      <dd>{{$vehiculo->inmueble->activo->Programa}}</dd>
                        <br>
                      <dt>SubPrograma</dt>
                      <dd>{{$vehiculo->inmueble->activo->SubPrograma}}</dd>
                        <br>
                      <dt>Color</dt>
                      <dd>{{$vehiculo->inmueble->activo->Color}}</dd>
                        <br>
                      <dt>Foto</dt>
                      <dd><a  href="{{ asset('storage/pictures/'.$vehiculo->inmueble->activo->Foto) }}" class="test-popup-link">
                       <img src="{{ asset('storage/pictures/'.$vehiculo->inmueble->activo->Foto) }}" class="img-responsive" alt="Foto" height="300" width="300"> 
                       </a></dd>
                        <br>

                      <dt>Serie</dt>
                      <dd>{{$vehiculo->inmueble->Serie}}</dd>
                        <br>
                      <dt>Dependencia</dt>
                      <dd>{{$vehiculo->inmueble->Dependencia}}</dd>
                        <br>
                      <dt>Estado Utilizacion</dt>
                      <dd>{{$vehiculo->inmueble->EstadoUtilizacion}}</dd>
                        <br>
                      <dt>Estado Fisico</dt>
                      <dd>{{$vehiculo->inmueble->EstadoFisico}}</dd>
                        <br>
                        <dt>Estado Activo</dt>
                      <dd>{{$vehiculo->inmueble->EstadoActivo}}</dd>
                        <br>

                        <dt>Placa Vehiculo</dt>
                      <dd>{{$vehiculo->Placa}}</dd>
                        <br>

                      <dt><a href="/vehiculos" >
                             <button type="submit" class="btn btn-primary" > <span class="glyphicon glyphicon-menu-left"></span></span>
                             Regresar </button></a></dt>
                    </dl>
                    <div class="form-group" align = "center"></div>
                            
                            
                            
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection