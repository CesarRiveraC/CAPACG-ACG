@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/semovientes/create">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nuevo semoviente</a> 
       
            <br>
            <br>

            <div class="panel panel-default">
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
                                
                                <td class="info"> {{$semoviente->Estado}} </td>
                                <td class="info"> {{$semoviente->Raza}} </td>
                                
                                <td class="warning"> 
                                    <a href="/archivos/{{$semoviente->id}}/eliminar" class="btn btn-danger btn-xs">
                                     Eliminar</a>

                                     <a  class="btn btn-info btn-xs detalleSemoviente" data-semoviente = "{{$semoviente->id}}" >
                                     Detalle</a>
                                    <a href="/semovientes/{{$semoviente->id}}/edit" class="btn btn-default btn-xs">
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
@include('modals.detalleSemoviente')
    <script src="{{ asset('js/semoviente.js') }}"></script> 
@endsection