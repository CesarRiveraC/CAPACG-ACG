<div class="panel panel-default">
	<br>
	<div class="panel-heading">Editar Factura De Combustible</div>

	<div class="panel-body">
		<form class="form-horizontal" method="POST" action="/combustibles/{{$combustible->id}}" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT"> {{ csrf_field() }}

			<div class="form-group{{ $errors->has('NoVaucher') ? ' has-error' : '' }}">
				<label for="NoVaucher" class="col-md-4 control-label">No Vaucher</label>

				<div class="col-md-6">
					<input id="NoVaucher" type="text" class="form-control" name="NoVaucher" value="{{ $combustible->NoVaucher }}" required> @if ($errors->has('NoVaucher'))
					<span class="help-block">
						<strong>{{ $errors->first('NoVaucher') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('Monto') ? ' has-error' : '' }}">
				<label for="Monto" class="col-md-4 control-label">Monto</label>

				<div class="col-md-6">
					<input id="Monto" type="text" class="form-control" name="Monto" value="{{$combustible->Monto}}" required> @if ($errors->has('Monto'))
					<span class="help-block">
						<strong>{{ $errors->first('Monto') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('Numero') ? ' has-error' : '' }}">
				<label for="Numero" class="col-md-4 control-label">Número</label>

				<div class="col-md-6">
					<input id="Numero" type="text" class="form-control" name="Numero" value="{{ $combustible->Numero }}" required> @if ($errors->has('Numero'))
					<span class="help-block">
						<strong>{{ $errors->first('Numero') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('Fecha') ? ' has-error' : '' }}">
				<label for="Fecha" class="col-md-4 control-label">Fecha</label>

				<div class="col-md-6">
					<input id="Fecha" type="date" class="form-control" name="Fecha" value="{{ $combustible->Fecha }}" required> @if ($errors->has('Fecha'))
					<span class="help-block">
						<strong>{{ $errors->first('Fecha') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('Kilometraje') ? ' has-error' : '' }}">
				<label for="Kilometraje" class="col-md-4 control-label">Kilometraje</label>

				<div class="col-md-6">
					<input id="Kilometraje" type="text" class="form-control" name="Kilometraje" value="{{ $combustible->Kilometraje }}" required> @if ($errors->has('Kilometraje'))
					<span class="help-block">
						<strong>{{ $errors->first('Kilometraje') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('LitrosCombustible') ? ' has-error' : '' }}">
				<label for="LitrosCombustible" class="col-md-4 control-label">Litros Combustible</label>

				<div class="col-md-6">
					<input id="LitrosCombustible" type="text" class="form-control" name="LitrosCombustible" value="{{ $combustible->LitrosCombustible }}"
					 required> @if ($errors->has('LitrosCombustible'))
					<span class="help-block">
						<strong>{{ $errors->first('LitrosCombustible') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('FuncionarioQueHizoCompra') ? ' has-error' : '' }}">
				<label for="FuncionarioQueHizoCompra" class="col-md-4 control-label">Funcionario Que Hizo La Compra</label>

				<div class="col-md-6">
					@if( ! empty($usuarios)) 
				{!! Form::select('usuarios', $usuarios, $combustible->colaborador_id, ['id' => 'usuarios', 'class'=>'form-control'])!!}
					@endif
				</div>
			</div>
			<div class="form-group{{ $errors->has('Dependencia') ? ' has-error' : '' }}">
				<label for="Dependencia" class="col-md-4 control-label">Dependencia</label>
				<div class="col-md-6">
					{!! Form::select('Dependencias', $Dependencias, $combustible->dependencia_id, ['id' => 'Dependencias', 'class'=>'form-control'])!!}
				</div>
			</div>

			<div class="form-group">
				<label for="Foto" class="col-md-4 control-label">Foto</label>

				<div class="col-md-6">
					<input id="Foto" type="file" class="form-control" name="Foto">
				</div>
			</div>

			<div class="form-group{{ $errors->has('CodigoDeAccionDePlanPresupuesto') ? ' has-error' : '' }}">
				<label for="CodigoDeAccionDePlanPresupuesto" class="col-md-4 control-label">Código De Acción De Plan Presupuesto</label>

				<div class="col-md-6">
					<input id="CodigoDeAccionDePlanPresupuesto" type="text" class="form-control" name="CodigoDeAccionDePlanPresupuesto" value="{{ $combustible->CodigoDeAccionDePlanPresupuesto }}"
					 required> @if ($errors->has('CodigoDeAccionDePlanPresupuesto'))
					<span class="help-block">
						<strong>{{ $errors->first('CodigoDeAccionDePlanPresupuesto') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('Vehiculos') ? ' has-error' : '' }}">
				<label for="Vehiculos" class="col-md-4 control-label">Vehículo</label>

				<div class="col-md-6">
					{!! Form::select('Vehiculos', $Vehiculos, $combustible->vehiculo_id, ['id' => 'Vehiculos', 'class'=>'form-control'])!!}
				</div>
			</div>

			<div class="form-group" align="center"></div>
			<button type="submit" formnovalidate class="btn btn-success" class="btn btn-success">
				<span class="fa fa-floppy-o"></span> Editar </button>
			<a href="javascript:history.back(-1);" class="btn btn-default">
				<span class="fa fa-times"></span> Cancelar </a>
	</div>
	</form>
</div>

<br>
<br>
</div>