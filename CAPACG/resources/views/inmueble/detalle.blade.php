@extends('layouts.app') @section('content')
<div class="container" id="pip">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Detalle Inmueble</div>

				<div class="panel-body">

					<dl class="dl-horizontal">
						<dt>Placa</dt>
						<dd>{{$inmueble->activo->Placa}}</dd>
						<br>
						<dt>Descripcion</dt>
						<dd>{{$inmueble->activo->Descripcion}}</dd>
						<br>
						<dt>Programa</dt>
						<dd>{{$inmueble->activo->Programa}}</dd>
						<br>
						<dt>SubPrograma</dt>
						<dd>{{$inmueble->activo->SubPrograma}}</dd>
						<br>
						<dt>Color</dt>
						<dd>{{$inmueble->activo->Color}}</dd>
						<br>
						<dt>Foto</dt>
						<dd>
							<a href="{{ asset('storage/pictures/'.$inmueble->activo->Foto) }}">
								<img src="{{ asset('storage/pictures/'.$inmueble->activo->Foto) }}" class="img-responsive" alt="Foto" height="300" width="300">
							</a>
						</dd>
						<br>
						<dt>Serie</dt>
						<dd>{{$inmueble->Serie}}</dd>
						<br>
						<dt>Dependencia</dt>
						<dd>{{$inmueble->Dependencia}}</dd>
						<br>
						<dt>Estado Utilizacion</dt>
						<dd>{{$inmueble->EstadoUtilizacion}}</dd>
						<br>
						<dt>Estado Fisico</dt>
						<dd>{{$inmueble->EstadoFisico}}</dd>
						<br>
						<dt>Estado Activo</dt>
						<dd>{{$inmueble->EstadoActivo}}</dd>
						<br>
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