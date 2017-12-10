@extends('layouts.app') @section('content')
<div class="container" id="pip">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Detalle Infraestructura</div>

				<div class="panel-body">

					<dl class="dl-horizontal">
						<dt>Placa</dt>
						<dd>{{$infraestructura->activo->Placa}}</dd>
						<br>
						<dt>Descripción</dt>
						<dd>{{$infraestructura->activo->Descripcion}}</dd>
						<br>
						<dt>Programa</dt>
						<dd>{{$infraestructura->activo->Programa}}</dd>
						<br>
						<dt>SubPrograma</dt>
						<dd>{{$infraestructura->activo->SubPrograma}}</dd>
						<br>
						<dt>Color</dt>
						<dd>{{$infraestructura->activo->Color}}</dd>
						<br>
						<dt>Foto</dt>
						<dd>
							<a href="{{ asset('storage/pictures/'.$infraestructura->activo->Foto) }}">
								<img src="{{ asset('storage/pictures/'.$infraestructura->activo->Foto) }}" class="img-responsive" alt="Foto" height="300"
								 width="300">
							</a>
						</dd>
						<br>
						<dt>Número Finca</dt>
						<dd>{{$infraestructura->NumeroFinca}}</dd>
						<br>
						<dt>Área de Contrucción</dt>
						<dd>{{$infraestructura->AreaConstruccion}}</dd>
						<br>
						<dt>Área de Terreno</dt>
						<dd>{{$infraestructura->AreaTerreno}}</dd>
						<br>
						<dt>Año de Fabricación</dt>
						<dd>{{$infraestructura->AnoFabricacion}}</dd>
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