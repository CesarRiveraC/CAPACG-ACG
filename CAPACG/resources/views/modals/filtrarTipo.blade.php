<!-- The Modal -->
<div class="modal fade" id="FiltrarTipo">
	<div class="modal-dialog">
		<div class="modal-content">

			<form role="search" action="" id="form-tipo">
				{{ csrf_field() }}

				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Filtrar Tipo</h4>
				</div>

				<!-- Modal body -->
				<div class="modal-body">



					<br>

					<div class="form-group">
						<label for="BuscarTipo" class="col-form-label">Buscar</label>
						<input type="text" class="form-control" id="BuscarTipo" name="BuscarTipo">
					</div>
					<div class="form-group">
						<div class="form-group">
							<label>Tipo</label>
							<select id="TipoFiltrar" name="TipoFiltrar" class="form-control"></select>
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