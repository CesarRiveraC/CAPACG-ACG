@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Inmueble</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/inmuebles/{{$inmueble->id}}" enctype="multipart/form-data" >
                    <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
               
                        @include('partials.activo')
                       
                         <div class="form-group{{ $errors->has('Serie') ? ' has-error' : '' }}">
                            <label for="Serie" class="col-md-4 control-label">Serie</label>

                            <div class="col-md-6">
                                <input id="Serie" type="text" class="form-control" name="Serie" value="{{ $inmueble->Serie }}" required autofocus>    
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('Marca') ? ' has-error' : '' }}">
                            <label for="Marca" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <input id="Marca" type="text" class="form-control" name="Marca" value="{{ $inmueble->Marca }}" required autofocus>                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Modelo') ? ' has-error' : '' }}">
                            <label for="Modelo" class="col-md-4 control-label">Modelo</label>

                            <div class="col-md-6">
                                <input id="Modelo" type="text" class="form-control" name="Modelo" value="{{ $inmueble->Modelo }}" required autofocus>                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('EstadoUtilizacion') ? ' has-error' : '' }}">
                            <label for="EstadoUtilizacion" class="col-md-4 control-label">Estado de Utilización</label>

                            <div class="col-md-6">
                                <input id="EstadoUtilizacion" type="text" class="form-control" name="EstadoUtilizacion" value="{{ $inmueble->EstadoUtilizacion }}" required>                               
                            </div>  
                        </div>

                        

                        <div class="form-group{{ $errors->has('EstadoFisico') ? ' has-error' : '' }}">
                            <label for="EstadoFisico" class="col-md-4 control-label">Estado Físico</label>

                            <div class="col-md-6">
                                <input id="EstadoFisico" type="text" class="form-control" name="EstadoFisico" value="{{ $inmueble->EstadoFisico }}" required>
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('EstadoActivo') ? ' has-error' : '' }}">
                            <label for="EstadoActivo" class="col-md-4 control-label">Estado Activo</label>

                            <div class="col-md-6">
                                <input id="EstadoActivo" type="text" class="form-control" name="EstadoActivo" value="{{ $inmueble->EstadoActivo }}" required>
                            </div>
                        </div>
                                                                        

                        

                        <div class="form-group" align = "center"></div>
                            <button type="submit" class="btn btn-success"> 
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Editar </button>
                            <a href="/inmuebles" class="btn btn-default"> 
                            <i class="fa fa-times" aria-hidden="true"></i> Cancelar </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
