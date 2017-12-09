<div class="modal fade" id="FiltrarSector">
	<div class="modal-dialog">
		<div class="modal-content">

			<form role="search" action="" id="form-sector">
				{{ csrf_field() }}

				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Filtrar Sector</h4>
				</div>

				<!-- Modal body -->
				<div class="modal-body">


					<br>

					<div class="form-group">
						<label for="BuscarSector" class="col-form-label">Buscar</label>
						<input type="text" class="form-control" id="BuscarSector" name="BuscarSector">
					</div>
					<div class="form-group">
						<div class="form-group">
							<label>Sector</label>
							<select id="SectorFiltrar" name="SectorFiltrar" class="form-control"></select>
						</div>
					</div>

				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-danger" id="eliminar">Filtrar</a>

				</div>

		</div>
	</div>
	</form>
</div>