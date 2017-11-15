<div class="modal fade" id="Editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="POST"  action="" enctype="multipart/form-data" id="role-form1">
    <input type="hidden" id="input" name="_method" value="">
    {{ csrf_field() }}

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="Placa" class="col-form-label">Placa o Patrimonio:</label>
            <input type="text" class="form-control" id="Placa1" name="Placa1" required autofocus>
          </div>          

          <div class="form-group">
            <label for="Descripcion" class="col-form-label">Descripción:</label>
            <input type="text" class="form-control" id="Descripcion1" name="Descripcion1" required autofocus>
          </div>

          <div class="form-group">
            <label for="Programa" class="col-form-label">Programa:</label>
            <input type="text" class="form-control" id="Programa1" name="Programa1" required autofocus>
          </div>

          <div class="form-group">
            <label for="SubPrograma" class="col-form-label">SubPrograma:</label>
            <input type="text" class="form-control" id="SubPrograma1" name="SubPrograma1" required autofocus>
          </div>

          <div class="form-group">
            <label for="Color" class="col-form-label">Color:</label>
            <input type="text" class="form-control" id="Color1" name="Color1" required autofocus>
          </div>

          <div class="form-group">
            <label for="Foto" class="col-form-label">Foto:</label>
            <input type="file" class="form-control" id="Foto1" name="Foto1">
          </div>

          <div class="form-group">
            <label for="NumeroFinca" class="col-form-label">Número de Finca:</label>
            <input type="text" class="form-control" id="NumeroFinca1" name="NumeroFinca1" required autofocus>
          </div>

          <div class="form-group">
            <label for="AreaConstruccion" class="col-form-label">Área de Construcción:</label>
            <input type="text" class="form-control" id="AreaConstruccion1" name="AreaConstruccion1" required autofocus>
          </div>

          <div class="form-group">
            <label for="AreaTerreno" class="col-form-label">Área de Terreno:</label>
            <input type="text" class="form-control" id="AreaTerreno1" name="AreaTerreno1" required autofocus>
          </div>

          <div class="form-group">
            <label for="AnoFabricacion" class="col-form-label">Año de Fabricación:</label>
            <input type="text" class="form-control" id="AnoFabricacion1" name="AnoFabricacion1" required autofocus>
          </div>

          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Editar</button>
    
      </div>
    </div>
  </div>
  </form>
</div>