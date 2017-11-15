@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

    
        <a class="btn btn-primary crear" data-toggle="modal" data-target="#crearDependencia" >
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nueva Dependencia</a> 
      
       
            <br>
            <br>

            <div class="panel panel-info">

            <!-- {!! Form::open(['url' => 'dependencias/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
            {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}
            <button type="submit" class="btn btn-primary"><span class="fa fa-search" ></span></button>
            {!! Form::close() !!} -->
       
                <div class="panel-heading"><h4>Dependencias</h4> 

                </div>
                <div class="panel-body">
                    
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                             <tr>
                                <th>Nombre</th>
                               
                                <th>Opciones</th>
                             </tr>
                      </thead>
                    <tbody>

                        @foreach ($dependencias as $dependencia)
                            <tr>
                                <td class="info"> {{$dependencia->Dependencia}} </td>

                                <td class="warning"> 
                                <a class="btn btn-danger btn-xs fa fa-minus estado" data-estado ="{{$dependencia->id}}" ></a>
                                <a class="fa fa-eye btn btn-success btn-xs " data-dependencia = "{{$dependencia->id}}" ></a>
                                <a href="/dependencias/{{$dependencia->id}}/edit" class="btn btn-warning btn-xs fa fa-pencil"></a>
                               
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
@include('modals.crearDependencia')
@endsection