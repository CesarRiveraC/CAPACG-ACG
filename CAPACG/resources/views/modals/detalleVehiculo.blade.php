
<!-- The Modal -->
  <div class="modal fade" id="DetalleVehiculo">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detalle</h4>   
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <dl class="dl-horizontal">

        @include('partials.detalle')
        
        <dt>Serie</dt>
        <dd id="lblSerie"></dd>
        <br>

        <dt>Dependencia</dt>
        <dd id="lblDependencia"></dd>
        <br>

        <dt>Estado Utilizacion</dt>
        <dd id="lblEstadoUtilizacion"></dd>
        <br>

        <dt>Estado Fisico</dt>
        <dd id="lblEstadoFisico"></dd>
        <br>

        <dt>Estado Activo</dt>
        <dd id="lblEstadoActivo"></dd>
        <br>

        <dt>Placa</dt>
        <dd id="lblPlaca"></dd>
        <br>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>
