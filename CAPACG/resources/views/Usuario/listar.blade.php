@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/usuarios/create">
        <i class="fa fa-plus-circle" aria-hidden="true"></i></span> Crear nuevo Usuario</a> 
            <br>
            <br>

            <div class="panel panel-info">
                <div class="panel-heading"><h4>Usuarios</h4> </div>
                <div class="panel-body">
                {{ $colaboradores->links() }}
                
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                             <tr>
                                @include('partials.usuario')
                                <th>Cédula</th>
                                <th>Dirección</th>
                                <th>Puesto de Trabajo</th>
                                <th>Opciones</th>
                             </tr>
                      </thead>
                    <tbody>

                        @foreach ($colaboradores as $colaborador)
                            <tr>
                                <td class="info"> {{$colaborador->name}} </td>
                                <td class="info"> {{$colaborador->Apellido}} </td>
                                <td class="info"> {{$colaborador->email}} </td>
                                <td class="info"> {{$colaborador->Cedula}} </td>
                                <td class="info"> {{$colaborador->Direccion}} </td>
                                <td class="info"> {{$colaborador->PuestoDeTrabajo}} </td>
                                                           
                                <td class="warning"> 
                                <a class="btn btn-danger btn-xs fa fa-minus estado"  ></a>
                                <a class="fa fa-eye btn btn-success btn-xs detalleColaborador" data-colaborador = "{{$colaborador->id}}"></a>
                                <a href="/usuarios/{{$colaborador->id}}/edit" class="btn btn-warning btn-xs fa fa-pencil"></a>
                                <a href="#" class="btn btn-info btn-xs fa fa-link"></a>
                                </td>

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
@include('modals.detalleColaborador')
    <script src="{{ asset('js/colaborador.js') }}"></script> 

@endsection