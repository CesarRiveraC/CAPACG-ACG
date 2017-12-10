@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Inmueble</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/inmuebles" enctype="multipart/form-data" >
                        {{ csrf_field() }}
               
                        @include('partials.activo')

                        @include('partials.inmueble')

                        <div class="form-group" align = "center"></div>
                            <button type="submit" formnovalidate class="btn btn-success" class="btn btn-success"> 
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
                            <a href="/inmuebles" class="btn btn-default"> 
                            <i class="fa fa-times" aria-hidden="true"></i> Cancelar </a>
                        </div>
                    </form>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
