<div class="form-group{{ $errors->has('Placa') ? ' has-error' : '' }}">
	<label for="Placa" class="col-md-4 control-label">Placa o Patrimonio</label>

	<div class="col-md-6">
		<input id="Placa" type="text" class="form-control" name="Placa" value="{{ old('Placa') }}" required autofocus> @if ($errors->has('Placa'))
		<span class="help-block">
			<strong>{{ $errors->first('Placa') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('Descripcion') ? ' has-error' : '' }}">
	<label for="Descripcion" class="col-md-4 control-label">Descripción</label>

	<div class="col-md-6">
		<input id="Descripcion" type="text" class="form-control" name="Descripcion" value="{{ old('Descripcion') }}" required autofocus> @if ($errors->has('Descripcion'))
		<span class="help-block">
			<strong>{{ $errors->first('Descripcion') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('Sector') ? ' has-error' : '' }}">
	<label for="Sector" class="col-md-4 control-label">Sector</label>
	<div class="col-md-6">
		<select name="Sector" id="sector_id" class="form-control" required>

			<option value="">--Escoja sector--</option>
			@foreach($sectores as $sector)
			<option value="{{$sector['id']}}">{{$sector['Sector']}}</option>
			@endforeach
		</select>


		@if ($errors->has('Sector'))
		<span class="help-block">
			<strong>{{ $errors->first('Sector') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('TipoActivo') ? ' has-error' : '' }}">
	<label for="TipoActivo" class="col-md-4 control-label">Categoría</label>
	<div class="col-md-6">
		<select name="TipoActivo" id="tipo_id" class="form-control" required>

			<option value="">--Escoja categoría--</option>
			@foreach($tipos as $tipo)
			<option value="{{$tipo['id']}}">{{$tipo['Tipo']}}</option>
			@endforeach
		</select>


		@if ($errors->has('TipoActivo'))
		<span class="help-block">
			<strong>{{ $errors->first('TipoActivo') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('Programa') ? ' has-error' : '' }}">
	<label for="Programa" class="col-md-4 control-label">Programa</label>

	<div class="col-md-6">
		<input id="Programa" type="text" class="form-control" name="Programa" value="{{ old('Programa') }}" required> @if ($errors->has('Programa'))
		<span class="help-block">
			<strong>{{ $errors->first('Programa') }}</strong>
		</span>
		@endif

	</div>
</div>

<div class="form-group{{ $errors->has('SubPrograma') ? ' has-error' : '' }}">
	<label for="SubPrograma" class="col-md-4 control-label">SubPrograma</label>

	<div class="col-md-6">
		<input id="SubPrograma" type="text" class="form-control" name="SubPrograma" value="{{ old('SubPrograma') }}" required> @if ($errors->has('SubPrograma'))
		<span class="help-block">
			<strong>{{ $errors->first('SubPrograma') }}</strong>
		</span>
		@endif

	</div>
</div>

<div class="form-group{{ $errors->has('Color') ? ' has-error' : '' }}">
	<label for="Color" class="col-md-4 control-label">Color</label>

	<div class="col-md-6">
		<input id="Color" type="text" class="form-control" name="Color" value="{{ old('Color') }}" required> @if ($errors->has('Color'))
		<span class="help-block">
			<strong>{{ $errors->first('Color') }}</strong>
		</span>
		@endif

	</div>
</div>

<div class="form-group{{ $errors->has('Dependencia') ? ' has-error' : '' }}">
	<label for="Dependencia" class="col-md-4 control-label">Dependencia</label>
	<div class="col-md-6">
		<select name="Dependencia" id="dependencia_id" class="form-control" required>

			<option value="">--Escoja dependencia--</option>
			@foreach($dependencias as $dependencia)
			<option value="{{$dependencia['id']}}">{{$dependencia['Dependencia']}}</option>
			@endforeach
		</select>

		@if ($errors->has('Dependencia'))
		<span class="help-block">
			<strong>{{ $errors->first('Dependencia') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group">
	<label for="Foto" class="col-md-4 control-label">Foto</label>

	<div class="col-md-6">
		<input id="Foto" type="file" class="form-control" name="Foto">
	</div>
</div>