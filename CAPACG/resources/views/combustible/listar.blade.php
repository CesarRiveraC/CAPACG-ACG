@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/combustibles/create">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nueva Factura Combustible</a> 
        <a class="btn btn-success" href="/combustibles/excel">
        <i class="fa fa-download" aria-hidden="true"></i></span> Generar Reporte</a> 
       
            <br>
            <br>

            <div class="panel panel-info">



            {!! Form::open(['url' => 'combustibles/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
{!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}
<button type="submit" class="btn btn-primary"><span class="fa fa-search" ></span></button>
            {!! Form::close() !!}
       
                <div class="panel-heading"><h4>Facturas de Combustibles</h4> 

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
                                <td class="info"> {{$combustible->Estado}} </td>

                                
                                <td class="warning"> 
                                <a class="btn btn-danger btn-xs fa fa-minus estado" data-estado ="{{$combustible->id}}" ></a>
                                <a class="fa fa-eye btn btn-success btn-xs detalleCombustible" data-combustible = "{{$combustible->id}}" ></a>
                                <a href="/combustibles/{{$combustible->id}}/edit" class="btn btn-warning btn-xs fa fa-pencil"></a>
                                <a href="#" class="btn btn-info btn-xs fa fa-link"></a>
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
@include('modals.detalleCombustible')

    <script src="{{ asset('js/combustible.js') }}"></script> 
@endsection