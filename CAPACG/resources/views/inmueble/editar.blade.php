@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Editar Inmueble</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="/inmuebles/{{$inmueble->id}}" enctype="multipart/form-data">
						<input type="hidden" name="_method" value="PUT"> {{ csrf_field() }}

						<div class="form-group{{ $errors->has('Placa') ? ' has-error' : '' }}">
							<label for="Placa" class="col-md-4 control-label">Placa o Patrimonio</label>

							<div class="col-md-6">
								<input id="Placa" type="text" class="form-control" name="Placa" value="{{ $inmueble->activo->Placa}}" required autofocus> @if ($errors->has('Placa'))
								<span class="help-block">
									<strong>{{ $errors->first('Placa') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('Descripcion') ? ' has-error' : '' }}">
							<label for="Descripcion" class="col-md-4 control-label">Descripción</label>

							<div class="col-md-6">
								<input id="Descripcion" type="text" class="form-control" name="Descripcion" value="{{ $inmueble->activo->Descripcion }}"
								 required autofocus> @if ($errors->has('Descripcion'))
								<span class="help-block">
									<strong>{{ $errors->first('Descripcion') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('Sectores') ? ' has-error' : '' }}">
							<label for="Sectores" class="col-md-4 control-label">Sector</label>
							<div class="col-md-6">
								
							{!! Form::select('Sectores', $Sectores, $activo->sector_id, ['id' => 'Sector', 'class'=>'form-control'])!!}

							
							</div>
						</div>
						<div class="form-group{{ $errors->has('Tipod') ? ' has-error' : '' }}">
							<label for="Tipos" class="col-md-4 control-label">Categoría</label>
							<div class="col-md-6">
								
							{!! Form::select('Tipos', $Tipos, $activo->tipo_id, ['id' => 'Tipo', 'class'=>'form-control'])!!}


							</div>
						</div>

						<div class="form-group{{ $errors->has('Programa') ? ' has-error' : '' }}">
							<label for="Programa" class="col-md-4 control-label">Programa</label>

							<div class="col-md-6">
								<input id="Programa" type="text" class="form-control" name="Programa" value="{{ $inmueble->activo->Programa }}" required> @if ($errors->has('Programa'))
								<span class="help-block">
									<strong>{{ $errors->first('Programa') }}</strong>
								</span>
								@endif

							</div>
						</div>

						<div class="form-group{{ $errors->has('SubPrograma') ? ' has-error' : '' }}">
							<label for="SubPrograma" class="col-md-4 control-label">SubPrograma</label>

							<div class="col-md-6">
								<input id="SubPrograma" type="text" class="form-control" name="SubPrograma" value="{{ $inmueble->activo->SubPrograma}}" required> @if ($errors->has('SubPrograma'))
								<span class="help-block">
									<strong>{{ $errors->first('SubPrograma') }}</strong>
								</span>
								@endif

							</div>
						</div>

						<div class="form-group{{ $errors->has('Color') ? ' has-error' : '' }}">
							<label for="Color" class="col-md-4 control-label">Color</label>

							<div class="col-md-6">
								<input id="Color" type="text" class="form-control" name="Color" value="{{ $inmueble->activo->Color }}" required> @if ($errors->has('Color'))
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

						<div class="form-group{{ $errors->has('Serie') ? ' has-error' : '' }}">
							<label for="Serie" class="col-md-4 control-label">Serie</label>

							<div class="col-md-6">
								<input id="Serie" type="text" class="form-control" name="Serie" value="{{ $inmueble->Serie }}" required autofocus> @if ($errors->has('Serie'))
								<span class="help-block">
									<strong>{{ $errors->first('Serie') }}</strong>
								</span>
								@endif
							</div>
						</div>


						<div class="form-group{{ $errors->has('Marca') ? ' has-error' : '' }}">
							<label for="Marca" class="col-md-4 control-label">Marca</label>

							<div class="col-md-6">
								<input id="Marca" type="text" class="form-control" name="Marca" value="{{ $inmueble->Marca }}" required autofocus> @if ($errors->has('Marca'))
								<span class="help-block">
									<strong>{{ $errors->first('Marca') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('Modelo') ? ' has-error' : '' }}">
							<label for="Modelo" class="col-md-4 control-label">Modelo</label>

							<div class="col-md-6">
								<input id="Modelo" type="text" class="form-control" name="Modelo" value="{{ $inmueble->Modelo }}" required autofocus> @if ($errors->has('Modelo'))
								<span class="help-block">
									<strong>{{ $errors->first('Modelo') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('EstadoUtilizacion') ? ' has-error' : '' }}">
							<label for="EstadoUtilizacion" class="col-md-4 control-label">Estado de Utilización</label>

							<div class="col-md-6">
								<input id="EstadoUtilizacion" type="text" class="form-control" name="EstadoUtilizacion" value="{{ $inmueble->EstadoUtilizacion }}"
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
								<input id="EstadoFisico" type="text" class="form-control" name="EstadoFisico" value="{{ $inmueble->EstadoFisico }}" required> @if ($errors->has('EstadoFisico'))
								<span class="help-block">
									<strong>{{ $errors->first('EstadoFisico') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('EstadoActivo') ? ' has-error' : '' }}">
							<label for="EstadoActivo" class="col-md-4 control-label">Estado Activo</label>

							<div class="col-md-6">
								<input id="EstadoActivo" type="text" class="form-control" name="EstadoActivo" value="{{ $inmueble->EstadoActivo }}" required> @if ($errors->has('EstadoActivo'))
								<span class="help-block">
									<strong>{{ $errors->first('EstadoActivo') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group" align="center"></div>
						<button type="submit" formnovalidate class="btn btn-success" class="btn btn-success">
							<i class="fa fa-floppy-o" aria-hidden="true"></i> Editar </button>
						<a href="/inmuebles" class="btn btn-default">
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
