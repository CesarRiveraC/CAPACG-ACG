@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/combustibles/create">
        <span class="glyphicon glyphicon-upload"></span> Crear nueva Factura Combustible</a> 
       
            <br>
            <br>

            <div class="panel panel-info">
<!--
            <form class="navbar-form navbar-right " role="search">
  <div class="form-group">
  <div class="col-xs-3">
  <input type="search" class="form-control" placeholder="">
</div>
  </div>
  <button type="submit" class="btn btn-info btn-sm active">Buscar</button>
</form> 


            {!! Form::open(['route'=>'combustible.listar','method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
            <div class="form-group">

            {!! Form::text('name', null,['class'=>'form-control','placeholder'=>'Buscar'])}
            </div>
            {!! Form::close() !!}
                <div class="panel-heading"><h4>Combustibles</h4> 
                -->
                {{ Form::open('route'=>'/combustible/listar','method'=> 'GET', 'class'=> 'navbar-form pull-right') }}


                {{ Form::close() }}
                
                </div>
                <div class="panel-body">
                {{ $combustibles->links() }}
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                             <tr>
                                <th>No Vaucher</th>
                                <th>Monto</th>
                                <th>Número</th>
                                <th>Fecha</th>
                                <th>Kilometraje</th>
                                <th>Opciones</th>
                             </tr>
                      </thead>
                    <tbody>

                        @foreach ($combustibles as $combustible)
                            <tr>
                                <td class="info"> {{$combustible->NoVaucher}} </td>
                                <td class="info"> {{$combustible->Monto}} </td>
                                <td class="info"> {{$combustible->Numero}} </td>
                                <td class="info"> {{$combustible->Fecha}} </td>
                                <td class="info"> {{$combustible->Kilometraje}} </td>
                               

                                <td class="warning"> 
                                    <a href="/combustibles/{{$combustible->id}}/change" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-remov-circle"></span> Eliminar</a>

                                     <a href="/combustibles/{{$combustible->id}}" class="ajax-popup-link">
                                     Detalle</a>
                                    <a href="/combustibles/{{$combustible->id}}/edit" class="btn btn-default btn-xs">
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