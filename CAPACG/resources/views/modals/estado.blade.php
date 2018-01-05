<!-- The Modal -->
  <div class="modal fade" id="Estado">
    <div class="modal-dialog">
      <div class="modal-content">

      <form id="role-form" method="POST"  action="">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="titleModal"></h4>
          </div>

        <!-- Modal body -->
        <div class="modal-body">


                     <dd id="bodyModal"></dd>
                     <br>
  

            <div class="form-group" id="Justificacion">
            <label id="Justificacion" for="Justificacion">Justificación:</label>
                <input id="txtJustificacion" type="text" class="form-control" name="Justificacion"  >
            </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger" id="btnOption"></a>

        </div>

      </div>
    </div>
    </form>
  </div>
