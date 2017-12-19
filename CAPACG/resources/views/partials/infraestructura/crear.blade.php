<div class="row">

		<div class="col-md-8 col-md-offset-2">
			<br>
			<div class="panel panel-default">

				<div class="panel-heading">
					
						Nueva Infraestructura
					
					<br>
					<br>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="/infraestructuras" enctype="multipart/form-data">
						{{ csrf_field() }} @include('partials.activo')

						<div class="form-group{{ $errors->has('NumeroFinca') ? ' has-error' : '' }}">
							<label for="NumeroFinca" class="col-md-4 control-label">Número de Finca</label>

							<div class="col-md-6">
								<input id="NumeroFinca" type="text" class="form-control" name="NumeroFinca" value="{{ old('NumeroFinca') }}" required autofocus> @if ($errors->has('NumeroFinca'))
								<span class="help-block">
									<strong>{{ $errors->first('NumeroFinca') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('AreaConstruccion') ? ' has-error' : '' }}">
							<label for="AreaConstruccion" class="col-md-4 control-label">Área de Construcción</label>

							<div class="col-md-6">
								<input id="AreaConstruccion" type="text" class="form-control" name="AreaConstruccion" value="{{ old('AreaConstruccion') }}"
								 required autofocus> @if ($errors->has('AreaConstruccion'))
								<span class="help-block">
									<strong>{{ $errors->first('AreaConstruccion') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('AreaTerreno') ? ' has-error' : '' }}">
							<label for="AreaTerreno" class="col-md-4 control-label">Área de Terreno</label>

							<div class="col-md-6">
								<input id="AreaTerreno" type="text" class="form-control" name="AreaTerreno" value="{{ old('AreaTerreno') }}" required> @if ($errors->has('AreaTerreno'))
								<span class="help-block">
									<strong>{{ $errors->first('AreaConstruccion') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('AnoFabricacion') ? ' has-error' : '' }}">
							<label for="AnoFabricacion" class="col-md-4 control-label">Año de Fabricación</label>

							<div class="col-md-6">
								<input id="AnoFabricacion" type="text" class="form-control" name="AnoFabricacion" value="{{ old('AnoFabricacion') }}" required> @if ($errors->has('AnoFabricacion'))
								<span class="help-block">
									<strong>{{ $errors->first('AnoFabricacion') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group" align="center"></div>
							<button type="submit" formnovalidate class="btn btn-success" class="btn btn-success">
								<i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
							<a href="/infraestructuras" class="btn btn-default">
								<i class="fa fa-times" aria-hidden="true"></i> Cancelar </a>
						</div>
						
				</form>
			</div>
			<br>
			<br>
		</div>
	</div>
</div>