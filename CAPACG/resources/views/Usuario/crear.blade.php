@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo Usuario</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="/usuarios">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Nombre</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> @if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('Apellido') ? ' has-error' : '' }}">
							<label for="Apellido" class="col-md-4 control-label">Apellidos</label>

							<div class="col-md-6">
								<input id="Apellido" type="text" class="form-control" name="Apellido" value="{{ old('Apellido') }}" required autofocus> @if ($errors->has('Apellido'))
								<span class="help-block">
									<strong>{{ $errors->first('Apellido') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">Correo Electronico</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required> @if ($errors->has('email'))
								<span class="help-block">
									<strong>
										{{ $errors->first('email') }}
									</strong>
								</span>
								@endif
							</div>
						</div>



						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Contraseña</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password" required> @if ($errors->has('password'))
								<span class="help-block">
									<strong>
										{{ $errors->first('password') }}
									</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required> @if ($errors->has('password_confirmation'))
								<span class="help-block">
									<strong>
										{{ $errors->first('password_confirmation') }}
									</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('Cedula') ? ' has-error' : '' }}">
							<label for="Cedula" class="col-md-4 control-label">Cedula</label>

							<div class="col-md-6">
								<input id="Cedula" type="text" class="form-control" name="Cedula" value="{{ old('Cedula') }}" required autofocus> @if ($errors->has('Cedula'))
								<span class="help-block"></span>
								<strong>{{ $errors->first('Cedula') }}</strong>
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
								<input id="Telefono" type="text" class="form-control" name="Telefono" required> @if ($errors->has('Telefono'))
								<span class="help-block">
									<strong>{{ $errors->first('Telefono') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group" align="center"></div>
						<button type="submit" formnovalidate class="btn btn-success">
							<i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
						<a href="/usuarios" class="btn btn-default">
							<i class="fa fa-times" aria-hidden="true"></i> Cancelar </a>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
@endsection