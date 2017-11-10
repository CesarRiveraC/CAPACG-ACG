@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/vehiculos/create">
        <i class="fa fa-plus-circle" aria-hidden="true"></i></span> Crear nuevo Vehiculo</a> 
        <a class="btn btn-success" href="/vehiculos/excel">
         Generar Reporte</a> 
            <br>
            <br>

            <div class="panel panel-info">

            {!! Form::open(['url' => 'vehiculos/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}
                <button type="submit" class="btn btn-primary"><span class="fa fa-search" ></span></button>
            {!! Form::close() !!}

                <div class="panel-heading"><h4>Vehiculos</h4> </div>
                <div class="panel-body">
                {{ $vehiculos->links() }}
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                             <tr>
                                @include('partials.thActivo')
                                <th>Serie</th>
                                <th>Opciones</th>
                                
                             </tr>
                      </thead>
                    <tbody>

                        @foreach ($vehiculos as $vehiculo)
                            <tr>
                                <td class="info"> {{$vehiculo->Placa}} </td>
                                <td class="info"> {{$vehiculo->Descripcion}} </td>
                                <td class="info"> {{$vehiculo->Programa}} </td>
                                <td class="info"> {{$vehiculo->SubPrograma}} </td>
                                <td class="info"> {{$vehiculo->Color}} </td>
                                
                                <td class="info"> {{$vehiculo->Estado}} </td>

                                <td class="info"> {{$vehiculo->Serie}} </td>
                                
                                <td class="warning"> 
                                <a class="btn btn-danger btn-xs fa fa-minus estado" data-estado ="{{$vehiculo->id}}" ></a>
                                <a class="fa fa-eye btn btn-success btn-xs detalleVehiculo" data-vehiculo = "{{$vehiculo->id}}" ></a>
                                <a href="/vehiculos/{{$vehiculo->id}}/edit" class="btn btn-warning btn-xs fa fa-pencil"></a>
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
@include('modals.detalleVehiculo')
    <script src="{{ asset('js/vehiculo.js') }}"></script> 
@endsection