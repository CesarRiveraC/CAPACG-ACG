<!-- The Modal -->
<div class="modal fade" id="asignarColaborador">
	<div class="modal-dialog">
		<div class="modal-content">

			<form id="form-asignar" method="POST" action="">
				<input type="hidden" name="_method" value="PUT"> {{ csrf_field() }}
				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Asignar</h4>
				</div>

				<!-- Modal body -->
				<div class="modal-body">


					<label>¿Está seguro que desea asignar el activo al colaborador </label><label id="NombreUsuario"></label>?
					<br>


				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-danger" id="asignar">Asignar</a>

				</div>

		</div>
	</div>
	</form>
</div>