@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nueva Factura de Combustible</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/combustibles" enctype="multipart/form-data" >
                        {{ csrf_field() }}
               
                        <div class="form-group{{ $errors->has('NoVaucher') ? ' has-error' : '' }}">
                            <label for="NoVaucher" class="col-md-4 control-label">No Vaucher</label>

                            <div class="col-md-6">
                                <input id="NoVaucher" type="text" class="form-control" name="NoVaucher" value="{{ old('NoVaucher') }}" required autofocus>    
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('Monto') ? ' has-error' : '' }}">
                            <label for="Monto" class="col-md-4 control-label">Monto</label>

                            <div class="col-md-6">
                                <input id="Monto" type="text" class="form-control" name="Monto" value="{{ old('Monto') }}" required autofocus>                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Numero') ? ' has-error' : '' }}">
                            <label for="Numero" class="col-md-4 control-label">Número</label>

                            <div class="col-md-6">
                                <input id="Numero" type="text" class="form-control" name="Numero" value="{{ old('Numero') }}" required>                               
                            </div>  
                        </div>

                        

                        <div class="form-group{{ $errors->has('Fecha') ? ' has-error' : '' }}">
                            <label for="Fecha" class="col-md-4 control-label">Fecha</label>

                            <div class="col-md-6">
                                <input id="Fecha" type="date" class="form-control" name="Fecha" value="{{ old('Fecha') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Kilometraje') ? ' has-error' : '' }}">
                            <label for="Kilometraje" class="col-md-4 control-label">Kilometraje</label>

                            <div class="col-md-6">
                                <input id="Kilometraje" type="text" class="form-control" name="Kilometraje" value="{{ old('Kilometraje') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('LitrosCombustible') ? ' has-error' : '' }}">
                            <label for="LitrosCombustible" class="col-md-4 control-label">Litros De Combustible</label>

                            <div class="col-md-6">
                                <input id="LitrosCombustible" type="text" class="form-control" name="LitrosCombustible" value="{{ old('LitrosCombustible') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('FuncionarioQueHizoCompra') ? ' has-error' : '' }}">
                            <label for="FuncionarioQueHizoCompra" class="col-md-4 control-label">Funcionario Que Hizo la Compra</label>

                            <div class="col-md-6">
                                <input id="FuncionarioQueHizoCompra" type="text" class="form-control" name="FuncionarioQueHizoCompra" value="{{ old('FuncionarioQueHizoCompra') }}" required>
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('Dependencia') ? ' has-error' : '' }}">
                            <label for="Dependencia" class="col-md-4 control-label">Dependencia</label>

                            <div class="col-md-6">
                                <input id="Dependencia" type="text" class="form-control" name="Dependencia" value="{{ old('Dependencia') }}" required>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="Foto" class="col-md-4 control-label">Foto</label>
                            <div class="col-md-6">
                                <input id="Foto" type="file" class="form-control" name="Foto" >
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('CodigoDeAccionDePlanPresupuesto') ? ' has-error' : '' }}">
                            <label for="CodigoDeAccionDePlanPresupuesto" class="col-md-4 control-label">Código De Accion De Plan Presupuesto</label>
                            <div class="col-md-6">
                                <input id="CodigoDeAccionDePlanPresupuesto" type="text" class="form-control" name="CodigoDeAccionDePlanPresupuesto" value="{{ old('CodigoDeAccionDePlanPresupuesto') }}" required>
                           
                            </div>
                        </div>
                      

                        <div class="form-group" align = "center"></div>
                            <button type="submit" class="btn btn-success"> 
                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> Guardar </button>
                            <a href="/combustibles" class="btn btn-default"> 
                            <i class="fa fa-times" aria-hidden="true"></i> Cancelar </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
