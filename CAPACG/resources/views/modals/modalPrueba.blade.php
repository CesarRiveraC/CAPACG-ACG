<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="POST"  action="/infraestructuras" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="Placa" class="col-form-label">Placa o Patrimonio:</label>
            <input type="text" class="form-control" id="Placa" name="Placa" required autofocus>
          </div>          

          <div class="form-group">
            <label for="Descripcion" class="col-form-label">Descripción:</label>
            <input type="text" class="form-control" id="Descripcion" name="Descripcion" required autofocus>
          </div>

          <div class="form-group">
            <label for="Programa" class="col-form-label">Programa:</label>
            <input type="text" class="form-control" id="Programa" name="Programa" required autofocus>
          </div>

          <div class="form-group">
            <label for="SubPrograma" class="col-form-label">SubPrograma:</label>
            <input type="text" class="form-control" id="SubPrograma" name="SubPrograma" required autofocus>
          </div>

          <div class="form-group">
        <div class="form-group">
            <label>Tipo de activo</label>
            <select id="Tipo" name="Tipo" class="form-control"></select>
            </div>        
        </div>

          <div class="form-group">
            <label for="Color" class="col-form-label">Color:</label>
            <input type="text" class="form-control" id="Color" name="Color" required autofocus>
          </div>

          <div class="form-group">
            <label for="Foto" class="col-form-label">Foto:</label>
            <input type="file" class="form-control" id="Foto" name="Foto">
          </div>

          <div class="form-group">
        <div class="form-group">
            <label>Dependencia:</label>
            <select id="Dependencia" name="Dependencia" class="form-control"></select>
            </div>        
        </div>

          <div class="form-group">
            <label for="NumeroFinca" class="col-form-label">Número de Finca:</label>
            <input type="text" class="form-control" id="NumeroFinca" name="NumeroFinca" required autofocus>
          </div>

          <div class="form-group">
            <label for="AreaConstruccion" class="col-form-label">Área de Construcción:</label>
            <input type="text" class="form-control" id="AreaConstruccion" name="AreaConstruccion" required autofocus>
          </div>

          <div class="form-group">
            <label for="AreaTerreno" class="col-form-label">Área de Terreno:</label>
            <input type="text" class="form-control" id="AreaTerreno" name="AreaTerreno" required autofocus>
          </div>

          <div class="form-group">
            <label for="AnoFabricacion" class="col-form-label">Año de Fabricación:</label>
            <input type="text" class="form-control" id="AnoFabricacion" name="AnoFabricacion" required autofocus>
          </div>

          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Crear</button>
    
      </div>
    </div>
  </div>
  </form>
</div>