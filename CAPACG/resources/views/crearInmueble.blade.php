@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Activo Inmueble</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/inmuebles">
                        {{ csrf_field() }}
               
                        @include('partials.activo')

                        @include('partials.inmueble')

                        

                        <div class="form-group" align = "center"></div>
                            <button type="submit" class="btn btn-success"> 
                            <span class="glyphicon glyphicon-floppy-disk"></span> Guardar </button>
                            <a href="/home" class="btn btn-default"> 
                            <span class="glyphicon glyphicon-remove"></span> Cancelar </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
