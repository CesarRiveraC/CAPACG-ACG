@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<br>
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo Vehículo</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="/vehiculos" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('PlacaVehiculo') ? ' has-error' : '' }}">
							<label for="PlacaVehiculo" class="col-md-4 control-label">Placa Vehiculo</label>

							<div class="col-md-6">
								<input id="PlacaVehiculo" type="text" class="form-control" name="PlacaVehiculo" value="{{ old('PlacaVehiculo') }}" required
								 autofocus> @if ($errors->has('PlacaVehiculo'))
								<span class="help-block">
									<strong>{{ $errors->first('PlacaVehiculo') }}</strong>
								</span>
								@endif
							</div>
						</div>

						@include('partials.activo') 
                        @include('partials.inmueble')

						<div class="form-group" align="center"></div>
						<button type="submit" formnovalidate class="btn btn-success" class="btn btn-success">
							<i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
						<a href="/vehiculos" class="btn btn-default">
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