@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/semovientes/create">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nuevo semoviente</a> 
        <a class="btn btn-success" href="/semovientes/excel">
        <i class="fa fa-download" aria-hidden="true"></i></span> Generar Reporte</a> 
      
            <br>
            <br>

            <div class="panel panel-info">

            {!! Form::open(['url' => 'semovientes/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}
                <button type="submit" class="btn btn-primary"><span class="fa fa-search" ></span></button>
            {!! Form::close() !!}

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
                                <a class="btn btn-danger btn-xs fa fa-minus estado" data-estado ="{{$semoviente->id}}" ></a>
                                <a class="fa fa-eye btn btn-success btn-xs detalleSemoviente" data-semoviente = "{{$semoviente->id}}" ></a>
                                <a href="/semovientes/{{$semoviente->id}}/edit" class="btn btn-warning btn-xs fa fa-pencil"></a>
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
@include('modals.detalleSemoviente')
    <script src="{{ asset('js/semoviente.js') }}"></script> 
@endsection