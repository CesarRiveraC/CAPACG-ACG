@extends('layouts.app') @section('content')
<div class="container" id="pip">
	<div class="row">
		<div class="col-md-8 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">Detalle Factura Combustible</div>

				<div class="panel-body">

					<dl class="dl-horizontal">
						<dt>No Vaucher</dt>
						<dd>{{$combustible->NoVaucher}}</dd>
						<br>
						<dt>Monto</dt>
						<dd>{{$combustible->Monto}}</dd>
						<br>
						<dt>Número</dt>
						<dd>{{$combustible->Numero}}</dd>
						<br>
						<dt>Fecha</dt>
						<dd>{{$combustible->Fecha}}</dd>
						<br>
						<dt>Kilometraje</dt>
						<dd>{{$combustible->Kilometraje}}</dd>
						<br>
						<dt>Litros Combustible</dt>
						<dd>{{$combustible->LitrosCombustible}}</dd>
						<br>
						<dt>Funcionario Que Hizo la Compra</dt>
						<dd>{{$combustible->FuncionarioQueHizoCompra}}</dd>
						<br>
						<dt>Dependencia</dt>
						<dd>{{$combustible->Dependencia}}</dd>

						<dt>Foto</dt>
						<dd>
							<a href="{{ asset('storage/pictures/'.$combustible->Foto) }}">
								<img src="{{ asset('storage/pictures/'.$combustible->Foto) }}" class="img-responsive" alt="Foto" height="300" width="300">
							</a>
						</dd>
						<br>
						<dt>Código De Acción De Plan Presupuesto</dt>
						<dd>{{$combustible->CodigoDeAccionDePlanPresupuesto}}</dd>

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