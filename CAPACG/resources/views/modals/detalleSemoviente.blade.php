
<!-- The Modal -->
  <div class="modal fade" id="DetalleSemoviente">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detalle Semoviente</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <dl class="dl-horizontal">

        @include('partials.detalle')
        
        <dt>Raza</dt>
        <dd id="lblRaza"></dd>
        <br>

        <dt>Edad</dt>
        <dd id="lblEdad"></dd>
        <br>

        <dt>Peso</dt>
        <dd id="lblPeso"></dd>
        <br>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>
