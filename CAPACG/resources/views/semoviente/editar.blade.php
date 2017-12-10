@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<br>
			<div class="panel panel-default">
				<div class="panel-heading">Editar Semoviente</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="/semovientes/{{$semoviente->id}}" enctype="multipart/form-data">
						<input type="hidden" name="_method" value="PUT"> {{ csrf_field() }}

						<div class="form-group{{ $errors->has('Placa') ? ' has-error' : '' }}">
							<label for="Placa" class="col-md-4 control-label">Fierro</label>

							<div class="col-md-6">
								<input id="Placa" type="text" class="form-control" name="Placa" value="{{ $semoviente->activo->Placa }}" required autofocus> @if ($errors->has('Placa'))
								<span class="help-block">
									<strong>{{ $errors->first('Placa') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('Descripcion') ? ' has-error' : '' }}">
							<label for="Descripcion" class="col-md-4 control-label">Descripción</label>

							<div class="col-md-6">
								<input id="Descripcion" type="text" class="form-control" name="Descripcion" value="{{ $semoviente->activo->Descripcion }}"
								 required autofocus> @if ($errors->has('Descripcion'))
								<span class="help-block">
									<strong>{{ $errors->first('Descripcion') }}</strong>
								</span>
								@endif
							</div>
						</div>



						<div class="form-group{{ $errors->has('Sector') ? ' has-error' : '' }}">
							<label for="Sectores" class="col-md-4 control-label">Sector</label>
							<div class="col-md-6">

								{!! Form::select('Sectores', $Sectores, $activo->sector_id, ['id' => 'Sector', 'class'=>'form-control'])!!}


							</div>
						</div>

						<div class="form-group{{ $errors->has('TipoActivo') ? ' has-error' : '' }}">
							<label for="TipoActivo" class="col-md-4 control-label">Categoría</label>
							<div class="col-md-6">

								{!! Form::select('Tipos', $Tipos, $activo->tipo_id, ['id' => 'Tipo', 'class'=>'form-control'])!!}


							</div>
						</div>

						<div class="form-group{{ $errors->has('Programa') ? ' has-error' : '' }}">
							<label for="Programa" class="col-md-4 control-label">Programa</label>

							<div class="col-md-6">
								<input id="Programa" type="text" class="form-control" name="Programa" value="{{ $semoviente->activo->Programa }}" required> @if ($errors->has('Programa'))
								<span class="help-block">
									<strong>{{ $errors->first('Programa') }}</strong>
								</span>
								@endif

							</div>
						</div>

						<div class="form-group{{ $errors->has('SubPrograma') ? ' has-error' : '' }}">
							<label for="SubPrograma" class="col-md-4 control-label">SubPrograma</label>

							<div class="col-md-6">
								<input id="SubPrograma" type="text" class="form-control" name="SubPrograma" value="{{ $semoviente->activo->SubPrograma }}"
								 required> @if ($errors->has('SubPrograma'))
								<span class="help-block">
									<strong>{{ $errors->first('SubPrograma') }}</strong>
								</span>
								@endif

							</div>
						</div>

						<div class="form-group{{ $errors->has('Color') ? ' has-error' : '' }}">
							<label for="Color" class="col-md-4 control-label">Color</label>

							<div class="col-md-6">
								<input id="Color" type="text" class="form-control" name="Color" value="{{$semoviente->activo->Color}}" required> @if ($errors->has('Color'))
								<span class="help-block">

									<strong>{{ $errors->first('Color') }}</strong>
								</span>
								@endif

							</div>
						</div>

						<div class="form-group{{ $errors->has('Dependencia') ? ' has-error' : '' }}">
							<label for="Dependencia" class="col-md-4 control-label">Dependencia</label>
							<div class="col-md-6">
								{!! Form::select('Dependencias', $Dependencias, $activo->dependencia_id, ['id' => 'Dependencias', 'class'=>'form-control'])!!}
							</div>
						</div>


						<div class="form-group">
							<label for="Foto" class="col-md-4 control-label">Foto</label>

							<div class="col-md-6">
								<input id="Foto" type="file" class="form-control" name="Foto">
							</div>
						</div>

						<div class="form-group{{ $errors->has('Raza') ? ' has-error' : '' }}">
							<label for="Raza" class="col-md-4 control-label">Raza</label>

							<div class="col-md-6">
								<input id="Raza" type="text" class="form-control" name="Raza" value="{{ $semoviente->Raza }}" required autofocus> @if ($errors->has('Raza'))
								<span class="help-block">
									<strong>{{ $errors->first('Raza') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('Edad') ? ' has-error' : '' }}">
							<label for="Edad" class="col-md-4 control-label">Edad</label>

							<div class="col-md-6">
								<input id="Edad" type="text" class="form-control" name="Edad" value="{{ $semoviente->Edad }}" required autofocus> @if ($errors->has('Edad'))
								<span class="help-block">
									<strong>{{ $errors->first('Edad') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('Peso') ? ' has-error' : '' }}">
							<label for="Peso" class="col-md-4 control-label">Peso</label>

							<div class="col-md-6">
								<input id="Peso" type="text" class="form-control" name="Peso" value="{{ $semoviente->Peso }}" required> @if ($errors->has('Peso'))
								<span class="help-block">
									<strong>{{ $errors->first('Peso') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group" align="center"></div>
						<button type="submit" formnovalidate class="btn btn-success" class="btn btn-success">
							<i class="fa fa-floppy-o" aria-hidden="true"></i> Editar </button>
						<a href="/semovientes" class="btn btn-default">
							<i class="fa fa-times" aria-hidden="true"></i> Cancelar </a>
				</div>
				</form>
			</div>
			<br>
			<br>
		</div>
	</div>
</div>
</div>
@endsection