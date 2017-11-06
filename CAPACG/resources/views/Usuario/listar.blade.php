@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/usuarios/create">
        <span class="glyphicon glyphicon-upload"></span> Crear nuevo Usuario</a> 
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
                                <th>Lugar de Trabajo</th>
                                <th>Teléfono</th> 
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
                                <td class="info"> {{$colaborador->LugarDeTrabajo}} </td>
                                <td class="info"> {{$colaborador->Telefono}} </td>

                                {{--  <td class="info"> {{$colaborador->Estado}} </td>  --}}
                                
                                <td class="warning"> 
                                    <a href="/archivos/{{$colaborador->id}}/eliminar" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-remov-circle"></span> Eliminar</a>

                                     <a href="/usuarios/{{$colaborador->id}}" class="ajax-popup-link">
                                     Detalle</a>
                                    <a href="/usuarios/{{$colaborador->id}}/edit" class="btn btn-default btn-xs">
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