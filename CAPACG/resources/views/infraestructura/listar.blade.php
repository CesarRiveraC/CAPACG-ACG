@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/infraestructuras/create">
        <span class="glyphicon glyphicon-upload"></span> Crear nueva Infraestructura</a> 
       
            <br>
            <br>

            <div class="panel panel-info">
                <div class="panel-heading"><h4>Infraestructuras</h4> </div>
                <div class="panel-body">
                {{ $infraestructuras->links() }}
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                             <tr>
                                @include('partials.thActivo')
                                <th>Numero Finca</th>
                                <th>Opciones</th>
                             </tr>
                      </thead>
                    <tbody>

                        @foreach ($infraestructuras as $infraestructura)
                            <tr>
                                <td class="info"> {{$infraestructura->Placa}} </td>
                                <td class="info"> {{$infraestructura->Descripcion}} </td>
                                <td class="info"> {{$infraestructura->Programa}} </td>
                                <td class="info"> {{$infraestructura->SubPrograma}} </td>
                                <td class="info"> {{$infraestructura->Color}} </td>
                                
                                <td class="info"> {{$infraestructura->Estado}} </td>

                                <td class="info"> {{$infraestructura->NumeroFinca}} </td>
                                
                                <td class="info"> 
                                    <a href="/archivos/{{$infraestructura->id}}/eliminar" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-remov-circle"></span> Eliminar</a>

                                     <a href="/infraestructuras/{{$infraestructura->id}}" class="btn btn-primary btn-xs">
                                    <span class="glyphicon glyphicon-detail-circle"></span> Detalle</a>
                                    <a href="/infraestructuras/{{$infraestructura->id}}/edit" class="btn btn-default btn-xs">
                                    <span class="glyphicon glyphicon-edit-circle"></span> Editar</a>

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