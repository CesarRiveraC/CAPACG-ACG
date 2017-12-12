@extends('colaborador.colaborador') @section('content')

<div class="container">

	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<br>


			<div class="col-md-8">

			</div>
			<div class="col-md-3 pull-right">
				<a class="href my-5" href="/home">
					<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a>
			</div>

			<br>
			<br>

			<div class="panel panel-info">

				<form role="search" action="/colaborador/searchInfraestructuras" class="navbar-form navbar-right">
					{{ csrf_field() }}


					<input type="text" class="form-control" id="Buscar" placeholder="Buscar" name="Buscar">


					<button type="submit" class="btn btn-primary">
						<span class="fa fa-search"></span>
					</button>
				</form>

				<div class="panel-heading">
					<h4>Infraestructuras</h4>
				</div>

				<div class="panel-body">

					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									@include('partials.thActivo')
									<th>Número Finca</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($infraestructuras as $infraestructura)
								<tr>
									<td class="info"> {{$infraestructura->Placa}} </td>
									<td class="info"> {{$infraestructura->Descripcion}} </td>
									<td class="info"> {{$infraestructura->Programa}} </td>
									<td class="info"> {{$infraestructura->SubPrograma}} </td>
									<td class="info"> {{$infraestructura->Color}} </td>

									<td class="info"> {{$infraestructura->NumeroFinca}} </td>

									<td class="warning">

										<a class="btn btn-success btn-xs detalleInfraestructura" data-infraestructura="{{$infraestructura->id}}">
											Detalle
											<i class="fa fa-eye" aria-hidden="true"></i>
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-8">{{ $infraestructuras->appends(Request::only(['TipoActivo','buscar','DependenciaFiltrar','TipoFiltrar','Desde','Hasta','BuscarDependencia','BuscarTipo']))->links()
							}}</div>
						<div class="col-md-3 pull-right">
							<br>
							<a class="href" href="/home">
								<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a>
						</div>
					</div>
				</div>
				<!-- cierre de panel info -->
			</div>
			<!-- cierre de panel body-->
		</div>
	</div>
</div>

@include('modals.detalleInfraestructura')

<script src="{{ asset('js/infraestructura.js') }}"></script>

@endsection