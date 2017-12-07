<!-- The Modal -->
<div class="modal fade" id="FiltrarDependencia">
	<div class="modal-dialog">
		<div class="modal-content">


			<form role="search" action="" id="form-dependencia">
				{{ csrf_field() }}

				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Filtrar Dependencia</h4>
				</div>

				<!-- Modal body -->
				<div class="modal-body">



					<br>



					<div class="form-group">
						<label for="BuscarDependencia" class="col-form-label">Buscar</label>
						<input type="text" class="form-control" id="BuscarDependencia" name="BuscarDependencia">
					</div>
					<div class="form-group">
						<div class="form-group">
							<label>Dependencia</label>
							<select id="DependenciaFiltrar" name="DependenciaFiltrar" class="form-control"></select>
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