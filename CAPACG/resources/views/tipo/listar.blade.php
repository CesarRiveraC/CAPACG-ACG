@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

    
        <a class="btn btn-primary crear" data-toggle="modal" data-target="#crearDependencia" >
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nuevo Tipo</a> 
      
       
            <br>
            <br>

            <div class="panel panel-info">

            <!-- {!! Form::open(['url' => 'dependencias/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
            {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}
            <button type="submit" class="btn btn-primary"><span class="fa fa-search" ></span></button>
            {!! Form::close() !!} -->
       
                <div class="panel-heading"><h4>Tipos de activos</h4> 

                </div>
                <div class="panel-body">
                    
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                             <tr>
                                <th>Tipo</th>
                               
                                <th>Opciones</th>
                             </tr>
                      </thead>
                    <tbody>

                        @foreach ($tipos as $tipo)
                            <tr>
                                <td class="info"> {{$tipo->Tipo}} </td>

                                <td class="warning"> 
                                <a class="btn btn-danger btn-xs fa fa-minus estado" data-estado ="{{$tipo->id}}" ></a>
                                <a class="fa fa-eye btn btn-success btn-xs " data-tipo = "{{$tipo->id}}" ></a>
                                <a href="/tipos/{{$tipo->id}}/edit" class="btn btn-warning btn-xs fa fa-pencil"></a>
                               
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

@endsection