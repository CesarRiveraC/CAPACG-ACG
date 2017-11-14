@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary crear" data-toggle="modal" data-target="#exampleModal" >
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nueva Infraestructura</a> 
        <a class="btn btn-success" href="/infraestructuras/excel">
        <i class="fa fa-download" aria-hidden="true"></i></span> Generar Reporte</a> 
      <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#modal_Omar">
  Launch demo modal
</button>
      
            <br>
            <br>

            <div class="panel panel-info">
           
            {!! Form::open(['url' => 'infraestructuras/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}
                <button type="submit" class="btn btn-primary"><span class="fa fa-search" ></span></button>
            {!! Form::close() !!}            

                <div class="panel-heading"><h4>Infraestructuras</h4> </div>
                <div class="panel-body">
                {{ $infraestructuras->links() }}
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                             <tr>
                                @include('partials.thActivo')
                                <th>Número Finca</th>
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
                                
                                <td class="warning"> 
                                <a class="btn btn-danger btn-xs fa fa-minus estado" data-estado ="{{$infraestructura->id}}" ></a>
                                <a class="fa fa-eye btn btn-success btn-xs detalleInfraestructura" data-infraestructura = "{{$infraestructura->id}}" ></a>
                                <a href="/infraestructuras/{{$infraestructura->id}}/edit" class="btn btn-warning btn-xs fa fa-pencil"></a>
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
@include('modals.detalleInfraestructura')
@include('modals.crearInfraestructura')
@include('modals.modalPrueba')

    <script src="{{ asset('js/infraestructura.js') }}"></script> 
@endsection