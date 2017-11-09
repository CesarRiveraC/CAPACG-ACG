@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    
        <a class="btn btn-primary" href="/combustibles/create">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nueva Factura Combustible</a> 
       
            <br>
            <br>

            <div class="panel panel-info">
            

     <form action="combustibles/search" class="navbar-form navbar-right" role="search" method="GET">
    <div class="form-group">
    <input type="text" class="form-control" name="search"  placeholder="Buscar">
    <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></span></button>
    </div>
    
     </form>


     <!--   <form action="combustibles/search" class="navbar-form navbar-right" role="search">
    <div class="form-group">
    <input type="text" class="form-control" name="search"  placeholder="Buscar">
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" ></span></button>
    </div>
    
     </form>-->
                <div class="panel-heading"><h4>Combustibles</h4> 

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
                                    <a href="/combustibles/{{$combustible->id}}/edit" class="btn btn-default btn-xs">
                                    <span class=""></span> Asignar</a>
                                    

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