@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Editar Usuarios</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="/usuarios/{{$colaborador->id}}" enctype="multipart/form-data">
						<input type="hidden" name="_method" value="PUT"> {{ csrf_field() }} @include('partials.crusuario')

						<div class="form-group{{ $errors->has('Cedula') ? ' has-error' : '' }}">
							<label for="Cedula" class="col-md-4 control-label">Cédula</label>

							<div class="col-md-6">
								<input id="Cedula" type="text" class="form-control" name="Cedula" value="{{ $colaborador->Cedula }}" required autofocus> @if ($errors->has('Cedula'))
								<span class="help-block">
									<strong>{{ $errors->first('Cedula') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('PuestoDeTrabajo') ? ' has-error' : '' }}">
							<label for="PuestoDeTrabajo" class="col-md-4 control-label">Puesto de Trabajo</label>

							<div class="col-md-6">
								<input id="PuestodeTrabajo" type="text" class="form-control" name="PuestoDeTrabajo" value="{{ $colaborador->PuestoDeTrabajo }}"
								 required> @if ($errors->has('PuestodeTrabajo'))
								<span class="help-block">
									<strong>{{ $errors->first('PuestodeTrabajo') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('LugarDeTrabajo') ? ' has-error' : '' }}">
							<label for="LugarDeTrabajo" class="col-md-4 control-label">Lugar de Trabajo</label>

							<div class="col-md-6">
								<input id="LugarDeTrabajo" type="text" class="form-control" name="LugarDeTrabajo" value="{{ $colaborador->LugarDeTrabajo }}"
								 required> @if ($errors->has('LugarDeTrabajo'))
								<span class="help-block">
									<strong>{{ $errors->first('LugarDeTrabajo') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('Telefono') ? ' has-error' : '' }}">
							<label for="Telefono" class="col-md-4 control-label">Teléfono</label>

							<div class="col-md-6">
								<input id="Telefono" type="text" class="form-control" name="Telefono" value="{{ $colaborador->Telefono }}" required> @if ($errors->has('Telefono'))
								<span class="help-block">
									<strong>{{ $errors->first('Telefono') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">¿Desea establecer una nueva contraseña? </label>
							<input class="form" style="display:inline-flex;margin-top: 27px;margin-left: 18px;" type="checkbox" id="setNewPassword" name="setNewPassword">
						</div>


						<div id="setPassword" style="display:none">

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password" class="col-md-4 control-label">Nueva Contraseña</label>

								<div class="col-md-6">
									<input id="password" type="password" class="form-control" name="password" required> @if ($errors->has('password'))
									<span class="help-block">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								<label for="password_confirmation" class="col-md-4 control-label">Confirmar Contraseña</label>

								<div class="col-md-6">
									<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required> @if ($errors->has('password_confirmation'))
									<span class="help-block">
										<strong>{{ $errors->first('password_confirmation') }}</strong>
									</span>
									@endif
								</div>
							</div>


						</div>

						<div class="form-group" align="center"></div>
						<button type="submit" formnovalidate class="btn btn-success">
							<i class="fa fa-floppy-o" aria-hidden="true"></i> Editar </button>
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