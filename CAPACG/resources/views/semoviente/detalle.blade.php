@extends('layouts.app') @section('content')
<div class="container" id="pip">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Detalle Semoviente</div>

				<div class="panel-body">

					<dl class="dl-horizontal">
						<dt>Fierro</dt>
						<dd>{{$semoviente->activo->Placa}}</dd>
						<br>
						<dt>Descripción</dt>
						<dd>{{$semoviente->activo->Descripcion}}</dd>
						<br>
						<dt>Programa</dt>
						<dd>{{$semoviente->activo->Programa}}</dd>
						<br>
						<dt>SubPrograma</dt>
						<dd>{{$semoviente->activo->SubPrograma}}</dd>
						<br>
						<dt>Color</dt>
						<dd>{{$semoviente->activo->Color}}</dd>
						<br>
						<dt>Foto</dt>
						<dd>
							<a href="{{ asset('storage/pictures/'.$semoviente->activo->Foto) }}">
								<img src="{{ asset('storage/pictures/'.$semoviente->activo->Foto) }}" class="img-responsive" alt="Foto" height="300" width="300">
							</a>
						</dd>
						<br>

						<dt>Raza</dt>
						<dd>{{$semoviente->Raza}}</dd>
						<br>
						<dt>Edad</dt>
						<dd>{{$semoviente->Edad}}</dd>
						<br>
						<dt>Peso</dt>
						<dd>{{$semoviente->Peso}}</dd>

						<dt>
							<button title="Cerrar(Esc)" type="button" class="mfp-close">
								x</button>
						</dt>

					</dl>
					<div class="form-group" align="center"></div>

				</div>

			</div>
		</div>
	</div>
</div>
</div>

@endsection