@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuarios</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/usuarios/{{$colaborador->id}}" enctype="multipart/form-data" >
                    <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
               
                        @include('partials.CrUsuario')

                        <div class="form-group{{ $errors->has('Cedula') ? ' has-error' : '' }}">
                            <label for="Cedula" class="col-md-4 control-label">Cédula</label>

                            <div class="col-md-6">
                                <input id="Cedula" type="text" class="form-control" name="Cedula" value="{{ $colaborador->Cedula }}" required autofocus>    
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('Direccion') ? ' has-error' : '' }}">
                            <label for="Direccion" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <input id="Direccion" type="text" class="form-control" name="Direccion" value = "{{$colaborador->Direccion}}"  required autofocus>                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('PuestoDeTrabajo') ? ' has-error' : '' }}">
                            <label for="PuestoDeTrabajo" class="col-md-4 control-label">Puesto de Trabajo</label>

                            <div class="col-md-6">
                                <input id="PuestodeTrabajo" type="text" class="form-control" name="PuestoDeTrabajo" value="{{ $colaborador->PuestoDeTrabajo }}" required>                               
                            </div>  
                        </div>

                        

                        <div class="form-group{{ $errors->has('LugarDeTrabajo') ? ' has-error' : '' }}">
                            <label for="LugarDeTrabajo" class="col-md-4 control-label">Lugar de Trabajo</label>

                            <div class="col-md-6">
                                <input id="LugarDeTrabajo" type="text" class="form-control" name="LugarDeTrabajo" value="{{ $colaborador->LugarDeTrabajo }}" required>
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('Telefono') ? ' has-error' : '' }}">
                            <label for="Telefono" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input id="Telefono" type="text" class="form-control" name="Telefono" value="{{ $colaborador->Telefono }}" required>
                            </div>
                        </div>
                        

                        <div class="form-group" align = "center"></div>
                            <button type="submit" class="btn btn-success"> 
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Editar </button>
                            <a href="/colaboradores" class="btn btn-default"> 
                            <i class="fa fa-times" aria-hidden="true"></i> Cancelar </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
