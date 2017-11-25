@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
        @include('partials.message')
      
    
        <a class="btn btn-primary" href="/inmuebles/create">
        <i class="fa fa-plus-circle" aria-hidden="true"></i></span> Crear nuevo Inmueble</a> 
      
        <a class="btn btn-success" href="/inmuebles/excel">
        <i class="fa fa-download" aria-hidden="true"></i></span> Generar Reporte</a> 
        
        <div class="btn-group">
        <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Filtrar Inmuebles
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a class="btn btn-default " href="/inmuebles">
            <i class="fa fa-check" aria-hidden="true"></i> Estado Activo</a></li>

            <li><a class="btn btn-default filtrar" href="/inmuebles/filter">
            <i class="fa fa-times" aria-hidden="true"></i> Estado Inactivo</a></li>

            <li><a class="btn btn-default filtarDependencia" data-toggle="modal" data-target="#FiltrarDependencia">
            <span class="fa fa-list-alt" aria-hidden="true"></span> Dependencia</a></li>

            <li><a class="btn btn-default filtrarTipo" data-toggle="modal" data-target="#FiltrarTipo">
            <span class="fa fa-clone" aria-hidden="true"></span> Tipo</a></li>

            <li><a class="btn btn-default filtrarFecha" data-toggle="modal" data-target="#FiltrarFecha">
            <i class="fa fa-calendar" aria-hidden="true"></i> Fecha</a></li>
            
        </ul>
        </div>
            <br>
            <br>

            <div class="panel panel-info">

            {!! Form::open(['url' => 'inmuebles/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
            {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}

            <button type="submit" class="btn btn-primary"><span class="fa fa-search" ></span></button>
            {!! Form::close() !!}

                <div class="panel-heading"><h4>Inmuebles</h4> </div>
                <div class="panel-body">
                {{ $inmuebles->links() }}
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                             <tr>
                                @include('partials.thActivo')
                              
                             
                                
                             </tr>
                      </thead>
                    <tbody>

                        @foreach ($inmuebles as $inmueble)
                            <tr>
                                <td class="info"> {{$inmueble->Placa}} </td>
                                <td class="info"> {{$inmueble->Descripcion}} </td>
                                <td class="info"> {{$inmueble->Programa}} </td>
                                <td class="info"> {{$inmueble->SubPrograma}} </td>
                                <td class="info"> {{$inmueble->Color}} </td>
                            
                                
                                <td class="warning"> 
                                <a class="btn btn-danger btn-xs fa fa-trash-o estado" data-estado ="{{$inmueble->id}}" ></a>
                                <a class="fa fa-eye btn btn-success btn-xs detalleInmueble" data-inmueble = "{{$inmueble->id}}" ></a>
                                <a href="/inmuebles/{{$inmueble->id}}/edit" class="btn btn-warning btn-xs fa fa-pencil"></a>
                                <a href="/inmuebles/asignar" class="btn btn-info btn-xs fa fa-child"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              
                </div>
            </div>
        </div>
    </div>
</div>
@include('modals.estado')
@include('modals.detalleInmueble')
@include('modals.modalPrueba')
@include('modals.filtrar')
@include('modals.filtrarDependencia')
@include('modals.filtrarTipo')
@include('modals.filtrarFecha')
    <script src="{{ asset('js/inmueble.js') }}"></script> 
    <script type="text/javascript">
setTimeout(function(){
    $('#mensaje').fadeOut('fast');
}, 2000);
    
</script>
@endsection