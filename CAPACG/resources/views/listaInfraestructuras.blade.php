@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/infraestructuras/create">
        <span class="glyphicon glyphicon-upload"></span> Crear nueva Infraestructura</a> 
       
            <br>
            <br>

            <div class="panel panel-default">
                <div class="panel-heading"><h4>Infraestructuras</h4> </div>
                <div class="panel-body">
                {{ $infraestructuras->links() }}
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                             <tr>
                                @include('partials.thActivo')
                                <th>Numero Finca</th>
                                <th>Area de Construccion</th>
                                <th>Area Terreno</th>
                                <th>Año Fabricacion</th>
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
                                <td class="info"> {{$infraestructura->Foto}} </td>
                                <td class="info"> {{$infraestructura->Estado}} </td>

                                <td class="info"> {{$infraestructura->NumeroFinca}} </td>
                                <td class="info"> {{$infraestructura->AreaConstruccion}} </td>
                                <td class="info"> {{$infraestructura->AreaTerreno}} </td>
                                <td class="info"> {{$infraestructura->AnoFabricacion}} </td>
                                <td class="warning"> 
                                    <a href="/archivos/{{$infraestructura->id}}/eliminar" class="btn btn-danger btn-xs">
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