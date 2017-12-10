<div class="form-group{{ $errors->has('Serie') ? ' has-error' : '' }}">
	<label for="Serie" class="col-md-4 control-label">Serie</label>

	<div class="col-md-6">
		<input id="Serie" type="text" class="form-control" name="Serie" value="{{ old('Serie') }}" required autofocus> @if ($errors->has('Serie'))
		<span class="help-block">
			<strong>{{ $errors->first('Serie') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('Marca') ? ' has-error' : '' }}">
	<label for="Marca" class="col-md-4 control-label">Marca</label>

	<div class="col-md-6">
		<input id="Marca" type="text" class="form-control" name="Marca" value="{{ old('Marca') }}" required autofocus> @if ($errors->has('Marca'))
		<span class="help-block">
			<strong>{{ $errors->first('Marca') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('Modelo') ? ' has-error' : '' }}">
	<label for="Modelo" class="col-md-4 control-label">Modelo</label>

	<div class="col-md-6">
		<input id="Modelo" type="text" class="form-control" name="Modelo" value="{{ old('Modelo') }}" required autofocus> @if ($errors->has('Modelo'))
		<span class="help-block">
			<strong>{{ $errors->first('Modelo') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('EstadoUtilizacion') ? ' has-error' : '' }}">
	<label for="EstadoUtilizacion" class="col-md-4 control-label">Estado de Utilización</label>

	<div class="col-md-6">
		<input id="EstadoUtilizacion" type="text" class="form-control" name="EstadoUtilizacion" value="{{ old('EstadoUtilizacion') }}"
		 required> @if ($errors->has('EstadoUtilizacion'))
		<span class="help-block">
			<strong>{{ $errors->first('EstadoUtilizacion') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('EstadoFisico') ? ' has-error' : '' }}">
	<label for="EstadoFisico" class="col-md-4 control-label">Estado Físico</label>

	<div class="col-md-6">
		<input id="EstadoFisico" type="text" class="form-control" name="EstadoFisico" value="{{ old('EstadoFisico') }}" required> @if ($errors->has('EstadoFisico'))
		<span class="help-block">
			<strong>{{ $errors->first('EstadoFisico') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('EstadoActivo') ? ' has-error' : '' }}">
	<label for="EstadoActivo" class="col-md-4 control-label">Estado Activo</label>

	<div class="col-md-6">
		<input id="EstadoActivo" type="text" class="form-control" name="EstadoActivo" value="{{ old('EstadoActivo') }}" required> @if ($errors->has('EstadoActivo'))
		<span class="help-block">
			<strong>{{ $errors->first('EstadoActivo') }}</strong>
		</span>
		@endif

	</div>
</div>