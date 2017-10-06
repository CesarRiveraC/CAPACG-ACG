@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detalle Infraestructura</div>

                <div class="panel-body">


                     

                     <dl class="dl-horizontal">
                      <dt>Placa</dt>
                      <dd>{{$infraestructura->activo->Placa}}</dd>
                      <br>
                      <dt>Descripcion</dt>
                      <dd>{{$infraestructura->activo->Descripcion}}</dd>
                      <br>
                     <dt>Programa</dt>
                      <dd>{{$infraestructura->activo->Programa}}</dd>
                        <br>
                      <dt>SubPrograma</dt>
                      <dd>{{$infraestructura->activo->SubPrograma}}</dd>
                        <br>
                      <dt>Color</dt>
                      <dd>{{$infraestructura->activo->Color}}</dd>
                        <br>
                      <dt>Foto</dt>
                      <dd><a  href="{{ asset('storage/pictures/'.$infraestructura->activo->Foto) }}">
                       <img src="{{ asset('storage/pictures/'.$infraestructura->activo->Foto) }}" class="img-responsive" alt="Foto" height="300" width="300"> 
                       </a></dd>
                        <br>
                      <dt>Numero Finca</dt>
                      <dd>{{$infraestructura->NumeroFinca}}</dd>
                        <br>
                      <dt>Area de Contruccion</dt>
                      <dd>{{$infraestructura->AreaConstruccion}}</dd>
                        <br>
                      <dt>Area de Terreno</dt>
                      <dd>{{$infraestructura->AreaTerreno}}</dd>
                        <br>
                      <dt>Año de Fabricacion</dt>
                      <dd>{{$infraestructura->AnoFabricacion}}</dd>
                        <br>
                      <dt><button type="submit" class="btn btn-primary">
                             <a href="/infraestructuras" > 
                             Regresar </button></dt>
                    </dl>
                    <div class="form-group" align = "center"></div>
                            
                            
                            
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection