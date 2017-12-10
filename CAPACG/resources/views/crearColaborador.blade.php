@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo Colaborador</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="/colaboradores">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('Cedula') ? ' has-error' : '' }}">
							<label for="Cedula" class="col-md-4 control-label">Cédula</label>

							<div class="col-md-6">
								<input id="Cedula" type="text" class="form-control" name="Cedula" value="{{ old('Cedula') }}" required autofocus> @if ($errors->has('Cedula'))
								<span class="help-block">
									<strong>{{ $errors->first('Cedula') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('Direccion') ? ' has-error' : '' }}">
							<label for="Direccion" class="col-md-4 control-label">Dirección</label>

							<div class="col-md-6">
								<input id="Direccion" type="text" class="form-control" name="Direccion" value="{{ old('Apellido') }}" required autofocus> @if ($errors->has('Direccion'))
								<span class="help-block">
									<strong>{{ $errors->first('Direccion') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('PuestoDeTrabajo') ? ' has-error' : '' }}">
							<label for="PuestoDeTrabajo" class="col-md-4 control-label">Puesto De Trabajo</label>

							<div class="col-md-6">
								<input id="PuestoDeTrabajo" type="text" class="form-control" name="PuestoDeTrabajo" value="{{ old('PuestoDeTrabajo') }}"
								 required> @if ($errors->has('PuestoDeTrabajo'))
								<span class="help-block">
									<strong>{{ $errors->first('PuestoDeTrabajo') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('LugarDeTrabajo') ? ' has-error' : '' }}">
							<label for="LugarDeTrabajo" class="col-md-4 control-label">Lugar De Trabajo</label>

							<div class="col-md-6">
								<input id="LugarDeTrabajo" type="text" class="form-control" name="LugarDeTrabajo" required> @if ($errors->has('LugarDeTrabajo'))
								<span class="help-block">
									<strong>{{ $errors->first('LugarDeTrabajo') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label for="Telefono" class="col-md-4 control-label">Telefono</label>

							<div class="col-md-6">
								<input id="Telefono" type="text" class="form-control" name="Telefono" required>
							</div>
						</div>

						<div class="form-group" align="center"></div>
						<button type="submit" class="btn btn-success">
							<span class="glyphicon glyphicon-floppy-disk"></span> Guardar </button>
						<a href="/home" class="btn btn-default">
							<span class="glyphicon glyphicon-remove"></span> Cancelar </a>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
@endsection