@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nueva Infraestructura</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/infraestructuras" enctype="multipart/form-data" >
                        {{ csrf_field() }}
               
                        @include('partials.activo')

                        <div class="form-group{{ $errors->has('NumeroFinca') ? ' has-error' : '' }}">
                            <label for="NumeroFinca" class="col-md-4 control-label">Numero de Finca</label>

                            <div class="col-md-6">
                                <input id="NumeroFinca" type="text" class="form-control" name="NumeroFinca" value="{{ old('NumeroFinca') }}" required autofocus>    
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('AreaConstruccion') ? ' has-error' : '' }}">
                            <label for="AreaConstruccion" class="col-md-4 control-label">Area de Construccion</label>

                            <div class="col-md-6">
                                <input id="AreaConstruccion" type="text" class="form-control" name="AreaConstruccion" value="{{ old('AreaConstruccion') }}" required autofocus>                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('AreaTerreno') ? ' has-error' : '' }}">
                            <label for="AreaTerreno" class="col-md-4 control-label">Area de Terreno</label>

                            <div class="col-md-6">
                                <input id="AreaTerreno" type="text" class="form-control" name="AreaTerreno" value="{{ old('AreaTerreno') }}" required>                               
                            </div>  
                        </div>

                        

                        <div class="form-group{{ $errors->has('AnoFabricacion') ? ' has-error' : '' }}">
                            <label for="AnoFabricacion" class="col-md-4 control-label">Año de Fabricacion</label>

                            <div class="col-md-6">
                                <input id="AnoFabricacion" type="text" class="form-control" name="AnoFabricacion" value="{{ old('AnoFabricacion') }}" required>
                            </div>
                        </div>

                        

                        <div class="form-group" align = "center"></div>
                            <button type="submit" class="btn btn-success"> 
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
                            <a href="/infraestructuras" class="btn btn-default"> 
                            <i class="fa fa-times" aria-hidden="true"></i> Cancelar </a>
                        </div>
                    </form>
                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_Omar">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modal_Omar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OMAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
