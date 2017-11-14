<!-- The Modal -->
  <div class="modal dialog" id="modal_Omar">
    <div class="modal-dialog">
      <div class="modal-content">

      <form id="role-form" method="POST"  action="/infraestructuras" enctype="multipart/form-data" >
        
        {{ csrf_field() }}
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Crear</h4>
          </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
               
                 @include('partials.activo')

                        <div class="form-group{{ $errors->has('NumeroFinca') ? ' has-error' : '' }}">
                            <label for="NumeroFinca" class="col-form-label">Número de Finca</label>

                            
                                <input id="NumeroFinca" type="text" class="form-control" name="NumeroFinca" value="{{ old('NumeroFinca') }}" required autofocus>    
                            
                        </div>

                         <div class="form-group{{ $errors->has('AreaConstruccion') ? ' has-error' : '' }}">
                            <label for="AreaConstruccion" class="col-form-label">Área de Construcción</label>

                            
                                <input id="AreaConstruccion" type="text" class="form-control" name="AreaConstruccion" value="{{ old('AreaConstruccion') }}" required autofocus>                               
                           
                        </div>

                        <div class="form-group{{ $errors->has('AreaTerreno') ? ' has-error' : '' }}">
                            <label for="AreaTerreno" class="col-form-label">Área de Terreno</label>

                            
                                <input id="AreaTerreno" type="text" class="form-control" name="AreaTerreno" value="{{ old('AreaTerreno') }}" required>                               
                             
                        </div>

                        

                        <div class="form-group{{ $errors->has('AnoFabricacion') ? ' has-error' : '' }}">
                            <label for="AnoFabricacion" class="col-form-label">Año de Fabricación</label>

                            
                                <input id="AnoFabricacion" type="text" class="form-control" name="AnoFabricacion" value="{{ old('AnoFabricacion') }}" required>
                           
                        </div>
   
                    

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger" id="eliminar">Crear</a>
          
        </div>
        
      </div>
    </div>
    </form>
  </div>
  
  
<!-- Modal -->
  {{--  <div class="modal fade" id="modal_Omar" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OMAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        @include('partials.activo')

                        <div class="form-group{{ $errors->has('NumeroFinca') ? ' has-error' : '' }}">
                            <label for="NumeroFinca" class="col-md-4 control-label">Número de Finca</label>

                            <div class="col-md-6">
                                <input id="NumeroFinca" type="text" class="form-control" name="NumeroFinca" value="{{ old('NumeroFinca') }}" required autofocus>    
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('AreaConstruccion') ? ' has-error' : '' }}">
                            <label for="AreaConstruccion" class="col-md-4 control-label">Área de Construcción</label>

                            <div class="col-md-6">
                                <input id="AreaConstruccion" type="text" class="form-control" name="AreaConstruccion" value="{{ old('AreaConstruccion') }}" required autofocus>                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('AreaTerreno') ? ' has-error' : '' }}">
                            <label for="AreaTerreno" class="col-md-4 control-label">Área de Terreno</label>

                            <div class="col-md-6">
                                <input id="AreaTerreno" type="text" class="form-control" name="AreaTerreno" value="{{ old('AreaTerreno') }}" required>                               
                            </div>  
                        </div>

                        

                        <div class="form-group{{ $errors->has('AnoFabricacion') ? ' has-error' : '' }}">
                            <label for="AnoFabricacion" class="col-md-4 control-label">Año de Fabricación</label>

                            <div class="col-md-6">
                                <input id="AnoFabricacion" type="text" class="form-control" name="AnoFabricacion" value="{{ old('AnoFabricacion') }}" required>
                            </div>
                        </div>

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
</div>    --}}