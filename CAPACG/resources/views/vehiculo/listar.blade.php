@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/vehiculos/create">
        <span class="glyphicon glyphicon-upload"></span> Crear nuevo Vehiculo</a> 
       
            <br>
            <br>

            <div class="panel panel-default">
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
                                
                                <td class="info"> 
                                    <a href="/archivos/{{$vehiculo->id}}/eliminar" class="btn btn-danger btn-xs">
                                     Eliminar</a>

                                     <a href="/vehiculos/{{$vehiculo->id}}" class="btn btn-primary btn-xs">
                                     Detalle</a>
                                    <a href="/vehiculos/{{$vehiculo->id}}/edit" class="btn btn-default btn-xs">
                                     Editar</a>
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
@endsection