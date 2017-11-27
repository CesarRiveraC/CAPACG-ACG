@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-10 col-lg-offset-1">

<div class="col-md-8">
        <a class="btn btn-primary my-5" href="/combustibles/create">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nueva Factura Combustible</a> 
        <a class="btn btn-success my-5" href="/combustibles/excel">
        <i class="fa fa-download" aria-hidden="true"></i></span> Generar Reporte</a> 
       </div>
       <div class="col-md-3 pull-right"><a class="href my-5" href="/home">
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a>
        </div>
            <br>
            <br>
            @include('partials.message')

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
                                                               
                                <td class="warning col-xs-2 col-xs-offset-2 "> 
                                <a class="btn btn-danger btn-xs fa fa-trash-o estado" data-estado ="{{$combustible->id}}"  data-toggle="tooltip" data-placement="bottom" title="Eliminar"></a>
                                <a class="fa fa-eye btn btn-success btn-xs detalleCombustible" data-combustible = "{{$combustible->id}}" data-toggle="tooltip" data-placement="bottom" title="Ver"></a>
                                <a href="/combustibles/{{$combustible->id}}/edit" class="btn btn-warning btn-xs fa fa-pencil" data-toggle="tooltip" data-placement="bottom" title="Editar"></a>
                                
                                </td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="col-md-3 pull-right"><br><a class="href" href="/home">
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modals.estado')
@include('modals.detalleCombustible')

    <script src="{{ asset('js/combustible.js') }}"></script> 
    <script type="text/javascript">
    $(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })
    </script>
@endsection