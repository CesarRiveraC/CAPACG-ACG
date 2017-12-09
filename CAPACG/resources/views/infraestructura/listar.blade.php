@extends('layouts.app')

@section('content')

<div class="container">
@include('modals.estado')
@include('modals.detalleInfraestructura')
@include('modals.modalPrueba')
@include('modals.editarInfraestructura')
@include('modals.filtrar')
@include('modals.filtrarDependencia')
@include('modals.filtrarTipo')
@include('modals.filtrarFecha')
@include('modals.filtrarSector')

    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
        <br>
   @include('partials.message')
   
        <div class="col-md-8">
        <a class="btn btn-primary my-5" href="/infraestructuras/create" >
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nueva Infraestructura</a> 
        <a class="btn btn-success my-5" href="/infraestructuras/excel">
        <i class="fa fa-download" aria-hidden="true"></i></span> Generar Reporte</a> 

        <div class="btn-group">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filtrar Infraestructuras
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="/infraestructuras">
            <i class="fa fa-check" aria-hidden="true"></i> Estado Activo</a></li>

            <li><a class="filtrar" href="/infraestructuras/filter">
            <i class="fa fa-times" aria-hidden="true"></i> Estado Inactivo</a></li>

            <li><a class="filtarDependencia" href="" data-toggle="modal" data-target="#FiltrarDependencia">
            <span class="fa fa-list-alt" aria-hidden="true"></span> Dependencia</a></li>

            <li><a class="filtrarTipo" href="" data-toggle="modal" data-target="#FiltrarTipo">
            <span class="fa fa-clone" aria-hidden="true"></span> Tipo</a></li>

            <li><a class="filtrarFecha" href="" data-toggle="modal" data-target="#FiltrarFecha">
            <i class="fa fa-calendar" aria-hidden="true"></i> Fecha</a></li>

            <li><a class="filtrarSector" href="" data-toggle="modal" data-target="#FiltrarSector">
			<i class="fa fa-location-arrow" aria-hidden="true"></i> Sector</a></li>
            
        </ul>
        </div>
       </div>
       <div class="col-md-3 pull-right"><a class="href my-5" href="/home">
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a>
        </div>
            {{--  <form class="navbar-form navbar-left"  role="search" action="/infraestructuras/filter">        
                            
                            <select name="TipoActivo" name="TipoActivo" class="form-control" id="TipoActivo"  required>
                                
                            <option value="0">--Escoja tipo--</option>
                          
                            <option value="2">Activos</option>
                            <option value="1">SINAC</option>
                            <option value="3">3</option>
                             
                            </select>
                            
            
                <button type="submit" class="btn btn-default">Filtrar</button>
                </form>  --}}
      
            <br>
            <br>

            <div class="panel panel-info">
           
            {!! Form::open(['url' => 'infraestructuras/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}
                <button type="submit" class="btn btn-primary"><span class="fa fa-search" ></span></button>
            {!! Form::close() !!}            

                <div class="panel-heading"><h4>Infraestructuras</h4> </div>
                
                <div class="panel-body">
                
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
                                
                                

                                <td class="info"> {{$infraestructura->NumeroFinca}} </td>
                                
                                <td class="warning"> 
                                <a class="btn btn-danger btn-xs estado" data-estado ="{{$infraestructura->id}}" >
                                Eliminar <i class="fa fa-minus" aria-hidden="true"></i></a>

                                <a class="btn btn-success btn-xs detalleInfraestructura" data-infraestructura = "{{$infraestructura->id}}" >
                                Detalle <i class="fa fa-eye" aria-hidden="true"></i></a>

                                <a  class="btn btn-warning btn-xs editar" href="/infraestructuras/{{$infraestructura->id}}/edit">
                                Editar <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="#" class="btn btn-info btn-xs fa fa-link"></a>
                                </td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="row">
                <div class="col-md-8">{{ $infraestructuras->appends(Request::only(['TipoActivo','buscar','DependenciaFiltrar','TipoFiltrar','Desde','Hasta','BuscarDependencia','BuscarTipo']))->links() }}</div>
                <div class="col-md-3 pull-right"><br><a class="href" href="/home">
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a></div>
              </div>
                </div> <!-- cierre de panel info -->
            </div> <!-- cierre de panel body-->
        </div>
        </div>
        </div>


    <script src="{{ asset('js/infraestructura.js') }}"></script> 
    <script type="text/javascript">
setTimeout(function(){
    $('#mensaje').fadeOut('fast');
}, 2000);
    
</script>
@endsection
