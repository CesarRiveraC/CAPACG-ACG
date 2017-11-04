@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/inmuebles/create">
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
                                <th>Opciones</th>
                                
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
                               
                                <td class="info"> {{$inmueble->Estado}} </td>

                                <td class="info"> {{$inmueble->Serie}} </td>
                                <td class="info"> {{$inmueble->Dependencia}} </td>
                                
                                <td class="warning"> 
                                    <a href="/inmuebles/{{$inmueble->id}}/change" class="btn btn-danger btn-xs">
                                    Eliminar</a>
                                    <a href="/inmuebles/{{$inmueble->id}}" class="ajax-popup-link">
                                    Detalle</a>
                                    <a href="/inmuebles/{{$inmueble->id}}/edit" class="btn btn-default btn-xs">
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