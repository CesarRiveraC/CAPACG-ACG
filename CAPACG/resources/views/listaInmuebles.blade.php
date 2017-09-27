@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/infraestructuras/create">
        <span class="glyphicon glyphicon-upload"></span> Crear nuevo Inmueble</a> 
       
            <br>
            <br>

            <div class="panel panel-default">
                <div class="panel-heading"><h4>Inmuebles</h4> </div>
                <div class="panel-body">
                {{ $inmuebles->links() }}
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                             <tr>
                                @include('partials.thActivo')
                                <th>Serie</th>
                                <th>Dependencia</th>
                                <th>Estado Utilizacion</th>
                                <th>Estado Fisico</th>
                                <th>Estado Activo</th>
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
                                <td class="info"> {{$inmueble->Foto}} </td>
                                <td class="info"> {{$inmueble->Estado}} </td>

                                <td class="info"> {{$inmueble->Serie}} </td>
                                <td class="info"> {{$inmueble->Dependencia}} </td>
                                <td class="info"> {{$inmueble->EstadoUtilizacion}} </td>
                                <td class="info"> {{$inmueble->EstadoFisico}} </td>
                                <td class="info"> {{$inmueble->EstadoActivo}} </td>
                                <td class="warning"> 
                                    <a href="/archivos/{{$inmueble->id}}/eliminar" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-remove-circle"></span> Eliminar</a>
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