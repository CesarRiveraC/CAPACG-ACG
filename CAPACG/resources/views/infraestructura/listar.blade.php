@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/infraestructuras/create">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nueva Infraestructura</a> 
        <a class="btn btn-success" href="/infraestructuras/excel">
         Generar Reporte</a> 
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
                                    <a  class="btn btn-danger btn-xs estado" data-estado ="{{$infraestructura->id}}" >
                                    Eliminar</a>

                                     <a  class="btn btn-info btn-xs detalleInfraestructura" data-infraestructura = "{{$infraestructura->id}}" >
                                     Detalle</a>
                                    <a href="/infraestructuras/{{$infraestructura->id}}/edit" class="btn btn-default btn-xs">
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
@include('modals.estado')
@include('modals.detalleInfraestructura')

    <script src="{{ asset('js/infraestructura.js') }}"></script> 
@endsection