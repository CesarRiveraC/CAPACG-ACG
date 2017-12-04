@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">

            <br>
            <br>

            <div class="panel panel-info">

            {!! Form::open(['url' => '#', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
            {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}
            
            <button type="submit" class="btn btn-primary"><span class="fa fa-search" ></span></button>
            {!! Form::close() !!}

                <div class="panel-heading"><h4>Inmuebles</h4> </div>
                <div class="panel-body">
                {{ $inmuebles->links() }}
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                             <tr>
                             <th>Placa</th>
                             <th>Descripción</th>
                             <th>Programa</th>
                             <th>SubPrograma</th>
                             <th>Color</th>
                             <th>Estado</th>
                                
                             </tr>
                      </thead>
                    <tbody>

                        @foreach ($inmuebles as $inmueble)
                            <tr>
                                <td class="info"> {{$inmueble->Placa}} </td>
                                <td class="info"> {{$inmueble->Descripcion}} </td>
                                <td class="info"> {{$inmueble->Programa}} </td>
                                <td class="info"> {{$inmueble->SubPrograma}} </td>
                                <td class="info"> {{$inmueble->Color}} </td>
                                <td class="info"> {{$inmueble->Estado}} </td>
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