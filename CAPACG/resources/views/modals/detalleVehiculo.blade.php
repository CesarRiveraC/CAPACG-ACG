
<!-- The Modal -->
  <div class="modal fade" id="DetalleVehiculo">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detalle Vehículo</h4>   
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <dl class="dl-horizontal">


          <dt>Placa Vehículo</dt>
        <dd id="lblPlaca1"></dd>
        <br>
        
        @include('partials.detalle')
        
        <dt>Serie</dt>
        <dd id="lblSerie"></dd>
        <br>
        

        <dt>Estado Utilización</dt>
        <dd id="lblEstadoUtilizacion"></dd>
        <br>

        <dt>Marca:</dt>
        <dd id="lblMarca"></dd>
        <br>

        <dt>Modelo:</dt>
        <dd id="lblModelo"></dd>
        <br>

        <dt>Estado Físico</dt>
        <dd id="lblEstadoFisico"></dd>
        <br>

        <dt>Estado Activo</dt>
        <dd id="lblEstadoActivo"></dd>
        <br>

       
        

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>
