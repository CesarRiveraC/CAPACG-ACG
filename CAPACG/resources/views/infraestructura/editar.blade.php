@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Infraestructura</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/infraestructuras/{{$infraestructura->id}}" enctype="multipart/form-data" >
                    <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
               
                        @include('partials.activo')

                        <div class="form-group{{ $errors->has('NumeroFinca') ? ' has-error' : '' }}">
                            <label for="NumeroFinca" class="col-md-4 control-label">Numero de Finca</label>

                            <div class="col-md-6">
                                <input id="NumeroFinca" type="text" class="form-control" name="NumeroFinca" value="{{ $infraestructura->NumeroFinca }}" required autofocus>    
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('AreaConstruccion') ? ' has-error' : '' }}">
                            <label for="AreaConstruccion" class="col-md-4 control-label">Area de Construccion</label>

                            <div class="col-md-6">
                                <input id="AreaConstruccion" type="text" class="form-control" name="AreaConstruccion" value = "{{$infraestructura->AreaConstruccion}}"  required autofocus>                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('AreaTerreno') ? ' has-error' : '' }}">
                            <label for="AreaTerreno" class="col-md-4 control-label">Area de Terreno</label>

                            <div class="col-md-6">
                                <input id="AreaTerreno" type="text" class="form-control" name="AreaTerreno" value="{{ $infraestructura->AreaTerreno }}" required>                               
                            </div>  
                        </div>

                        

                        <div class="form-group{{ $errors->has('AnoFabricacion') ? ' has-error' : '' }}">
                            <label for="AnoFabricacion" class="col-md-4 control-label">Año de Fabricacion</label>

                            <div class="col-md-6">
                                <input id="AnoFabricacion" type="text" class="form-control" name="AnoFabricacion" value="{{ $infraestructura->AnoFabricacion }}" required>
                            </div>
                        </div>

                        

                        <div class="form-group" align = "center"></div>
                            <button type="submit" class="btn btn-success"> 
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Editar </button>
                            <a href="/infraestructuras" class="btn btn-default"> 
                            <i class="fa fa-times" aria-hidden="true"></i> Cancelar </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
