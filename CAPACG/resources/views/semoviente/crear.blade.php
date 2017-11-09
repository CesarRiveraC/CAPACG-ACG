@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nueva Infraestructura</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/semovientes" enctype="multipart/form-data" >
                        {{ csrf_field() }}

                        @include('partials.activo')


                        <div class="form-group{{ $errors->has('Raza') ? ' has-error' : '' }}">
                            <label for="Raza" class="col-md-4 control-label">Raza</label>

                            <div class="col-md-6">
                                <input id="Raza" type="text" class="form-control" name="Raza" value="{{ old('Raza') }}" required autofocus>    
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('Edad') ? ' has-error' : '' }}">
                            <label for="Edad" class="col-md-4 control-label">Edad</label>

                            <div class="col-md-6">
                                <input id="Edad" type="text" class="form-control" name="Edad" value="{{ old('Edad') }}" required autofocus>                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Peso') ? ' has-error' : '' }}">
                            <label for="Peso" class="col-md-4 control-label">Peso</label>

                            <div class="col-md-6">
                                <input id="Peso" type="text" class="form-control" name="Peso" value="{{ old('Peso') }}" required>                               
                            </div>
                        </div>                                                
                        

                        <div class="form-group" align = "center"></div>
                            <button type="submit" class="btn btn-success"> 
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
                            <a href="/semovientes" class="btn btn-default"> 
                            <i class="fa fa-times" aria-hidden="true"></i> Cancelar </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
