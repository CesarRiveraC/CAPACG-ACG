<!-- The Modal -->
  <div class="modal fade" id="restaurar">
    <div class="modal-dialog">
      <div class="modal-content">

      <form id="role-form" method="POST"  action="">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Restaurar</h4>
          </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
               
                     ¿Está seguro que desea restaurar el usuario        <dd id="Nombre"></dd>          seleccionado?  
                     <br>
                    

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger" id="eliminar">Restaurar</a>
          
        </div>
        
      </div>
    </div>
    </form>
  </div>
 
  