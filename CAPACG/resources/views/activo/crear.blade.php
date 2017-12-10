@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo Activo</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="/activos" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('Placa') ? ' has-error' : '' }}">
							<label for="Placa" class="col-md-4 control-label">Placa o Patrimonio</label>

							<div class="col-md-6">
								<input id="Placa" type="text" class="form-control" name="Placa" value="{{ old('Placa') }}" required autofocus>
							</div>
						</div>

						<div class="form-group{{ $errors->has('Descripcion') ? ' has-error' : '' }}">
							<label for="Discripcion" class="col-md-4 control-label">Descripcion</label>

							<div class="col-md-6">
								<input id="Descripcion" type="text" class="form-control" name="Descripcion" value="{{ old('Descripcion') }}" required autofocus>
							</div>
						</div>

						<div class="form-group{{ $errors->has('Programa') ? ' has-error' : '' }}">
							<label for="Programa" class="col-md-4 control-label">Programa</label>

							<div class="col-md-6">
								<input id="Programa" type="text" class="form-control" name="Programa" value="{{ old('Programa') }}" required>
							</div>
						</div>



						<div class="form-group{{ $errors->has('SubPrograma') ? ' has-error' : '' }}">
							<label for="SubPrograma" class="col-md-4 control-label">SubPrograma</label>

							<div class="col-md-6">
								<input id="SubPrograma" type="text" class="form-control" name="SubPrograma" required>
							</div>
						</div>

						<div class="form-group">
							<label for="Color" class="col-md-4 control-label">Color</label>

							<div class="col-md-6">
								<input id="Color" type="text" class="form-control" name="Color" required>
							</div>
						</div>




						<div class="form-group">
							<label for="Foto" class="col-md-4 control-label">Foto</label>

							<div class="col-md-6">
								<input id="Foto" type="file" class="form-control" name="Foto">
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