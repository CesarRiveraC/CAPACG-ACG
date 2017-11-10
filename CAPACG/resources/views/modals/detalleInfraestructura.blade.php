
<!-- The Modal -->
  <div class="modal fade" id="DetalleInfraestructura">
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
        
        <dt>Numero Finca</dt>
        <dd id="lblNumeroFinca"></dd>
        <br>

        <dt>Area de Contruccion</dt>
        <dd id="lblAreaConstruccion"></dd>
        <br>

        <dt>Area de Terreno</dt>
        <dd id="lblTerreno"></dd>
        <br>

        <dt>Año de Fabricacion</dt>
        <dd id="lblAnoFabricacion"></dd>
        <br>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>
