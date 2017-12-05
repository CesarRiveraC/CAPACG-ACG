<!-- The Modal -->
<div class="modal fade" id="Editar">
    <div class="modal-dialog">
      <div class="modal-content">

      <form id="role-form1" method="POST"  action="">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar</h4>
          </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
        <div class="form-group">
            <label for="Sector" class="col-form-label">Sector</label>
            <input type="text" class="form-control" id="Sector1" name="Sector1" required autofocus>
          </div>   
                    
                    

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger" id="editar">Editar</a>
          
        </div>
        
      </div>
    </div>
    </form>
  </div>
  
