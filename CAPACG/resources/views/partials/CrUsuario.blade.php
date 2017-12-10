<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Nombre</label>

	<div class="col-md-6">
		<input id="name" type="text" class="form-control" name="name" value="{{ $usuario->name }}" required autofocus> @if ($errors->has('name'))
		<span class="help-block">
			<strong>{{ $errors->first('name') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('Apellido') ? ' has-error' : '' }}">
	<label for="Apellido" class="col-md-4 control-label">Apellido</label>

	<div class="col-md-6">
		<input id="Apellido" type="text" class="form-control" name="Apellido" value="{{ $usuario->Apellido }}" required autofocus> @if ($errors->has('Apellido'))
		<span class="help-block">
			<strong>{{ $errors->first('Apellido') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	<label for="email" class="col-md-4 control-label">Correo Electrónico</label>

	<div class="col-md-6">
		<input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" required> @if ($errors->has('email'))
		<span class="help-block">
			<strong>{{ $errors->first('email') }}</strong>
		</span>
		@endif
	</div>
</div>

{{-- puede que el form-group para errores y la validacion de errores no sea necesaria para este campo --}}
<div class="form-group{{ $errors->has('Rol') ? ' has-error' : '' }}">
	<label for="Rol" class="col-md-4 control-label">Permisos</label>
	<div class="col-md-6">

		{!! Form::select('roles', $roles, $rol->id, ['id' => 'roles', 'class'=>'form-control'])!!} @if ($errors->has('Rol'))
		<span class="help-block">
			<strong>{{ $errors->first('Rol') }}</strong>
		</span>
		@endif
	</div>
</div>

<script src="{{ asset('js/colaborador.js') }}"></script>