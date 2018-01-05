
<!-- The Modal -->
  <div class="modal fade" id="DetalleInfraestructura">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detalle Infraestructura</h4>  
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <dl class="dl-horizontal">

        @include('partials.detalle')
        
        
        

        <dt>Número Finca</dt>
        <dd id="lblNumeroFinca"></dd>
        <br>

        <dt>Área de Contrucción</dt>
        <dd id="lblAreaConstruccion"></dd>
        <br>

        <dt>Área de Terreno</dt>
        <dd id="lblTerreno"></dd>
        <br>

        <dt>Año de Fabricación</dt>
        <dd id="lblAnoFabricacion"></dd>
        <br>

        <div id="DetalleJustificacion">
        <dt>Justificación</dt>
        <dd id="lblJustificacion"></dd>
        <br>
        </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>
