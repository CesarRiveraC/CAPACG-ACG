<!-- The Modal -->
  <div class="modal fade" id="Estado">
    <div class="modal-dialog">
      <div class="modal-content">

      <form id="role-form" method="POST"  action="">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Eliminar activo</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
               
                     ¿Está seguro de eliminar el siguiente registro?  
                     <br>
                     <br>
                        Placa:
                        <br>
                        <p id="Placa"></p>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger" id="eliminar">Eliminar</a>
          
        </div>
        
      </div>
    </div>
    </form>
  </div>
  
