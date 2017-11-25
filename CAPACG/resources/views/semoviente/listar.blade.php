@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @include('partials.message')
 
        <div class="col-lg-10 col-lg-offset-1">

    
        <a class="btn btn-primary" href="/semovientes/create">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nuevo semoviente</a> 
        <a class="btn btn-success" href="/semovientes/excel">
        <i class="fa fa-download" aria-hidden="true"></i></span> Generar Reporte</a> 
        <div class="btn-group">
        <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Filtrar Semovientes
        <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
            <li><a class="btn btn-default " href="/semovientes">
            <i class="fa fa-check" aria-hidden="true"></i> Estado Activo</a></li>

            <li><a class="btn btn-default filtrar" href="/semovientes/filter">
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

            {!! Form::open(['url' => 'semovientes/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}
                <button type="submit" class="btn btn-primary"><span class="fa fa-search" ></span></button>
            {!! Form::close() !!}

                <div class="panel-heading"><h4>Semovientes</h4> </div>
                <div class="panel-body">
                {{ $semovientes->links() }}
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                             <tr>
                                @include('partials.thActivo')
                                <th>Raza</th>
                                <th>Opciones</th>
                                
                             </tr>
                      </thead>
                    <tbody>

                        @foreach ($semovientes as $semoviente)
                            <tr>
                                <td class="info"> {{$semoviente->Placa}} </td>
                                <td class="info"> {{$semoviente->Descripcion}} </td>
                                <td class="info"> {{$semoviente->Programa}} </td>
                                <td class="info"> {{$semoviente->SubPrograma}} </td>
                                <td class="info"> {{$semoviente->Color}} </td>
                                
                                
                                <td class="info"> {{$semoviente->Raza}} </td>
                                
                                <td class="warning"> 
                                <a class="btn btn-danger btn-xs fa fa-minus estado" data-estado ="{{$semoviente->id}}" ></a>
                                <a class="fa fa-eye btn btn-success btn-xs detalleSemoviente" data-semoviente = "{{$semoviente->id}}" ></a>
                                <a href="/semovientes/{{$semoviente->id}}/edit" class="btn btn-warning btn-xs fa fa-pencil"></a>
                                <a href="#" class="btn btn-info btn-xs fa fa-link"></a>
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
@include('modals.detalleSemoviente')
@include('modals.modalPrueba')
@include('modals.filtrar')
@include('modals.filtrarDependencia')
@include('modals.filtrarTipo')
@include('modals.filtrarFecha')
    <script src="{{ asset('js/semoviente.js') }}"></script> 
    <script type="text/javascript">
setTimeout(function(){
    $('#mensaje').fadeOut('fast');
}, 2000);
    
</script>
@endsection