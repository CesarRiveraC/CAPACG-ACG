@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Detalle Activo</div>

				<div class="panel-body">

					<dl class="dl-horizontal">
						<dt>Placa</dt>
						<dd>{{$activo->Placa}}</dd>
						<br>
						<dt>Descripcion</dt>
						<dd>{{$activo->Descripcion}}</dd>
						<br>
						<dt>Programa</dt>
						<dd>{{$activo->Programa}}</dd>
						<br>
						<dt>SubPrograma</dt>
						<dd>{{$activo->SubPrograma}}</dd>
						<br>
						<dt>Color</dt>
						<dd>{{$activo->Color}}</dd>
						<br>
						<dt>Foto</dt>
						<dd>

							<a href="{{ asset('storage/pictures/'.$activo->Foto) }}">
								<img src="{{ asset('storage/pictures/'.$activo->Foto) }}" class="img-responsive" alt="Foto" height="300" width="300">
							</a>
						</dd>
						<br>
						<br>
					</dl>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection