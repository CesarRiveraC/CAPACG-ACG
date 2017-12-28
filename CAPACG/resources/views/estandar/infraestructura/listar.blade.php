@extends('estandar.estandar') @section('content')

<div class="container">

	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<br>


			<div class="col-md-8">
				<a class="btn btn-primary my-5" href="/infraestructuras/create">
					<i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nueva Infraestructura</a>
				<a class="btn btn-success my-5" href="/infraestructuras/excel">
					<i class="fa fa-download" aria-hidden="true"></i>
					Generar Reporte</a>

				<div class="btn-group">
					<button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Filtrar Infraestructuras
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a href="/infraestructuras">
								<i class="fa fa-check" aria-hidden="true"></i> Todas</a>
						</li>

						<li>
							<a href="/infraestructuras/asignadas">
								<i class="fa fa-user-o" aria-hidden="true"></i> Asignadas</a>
						</li>

					</ul>
				</div>

			</div>
			<div class="col-md-3 pull-right">
				<a class="href my-5" href="/home">
					<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a>
			</div>

			<br>
			<br>

			<div class="panel panel-info">

				{!! Form::open(['url' => 'infraestructuras/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search'])
				!!} {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}
				<button type="submit" class="btn btn-primary">
					<span class="fa fa-search"></span>
				</button>
				{!! Form::close() !!}

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
											<i class="fa fa-eye" aria-hidden="true"></i>Detalle</a>
									</td>

								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-8">{{ $infraestructuras->appends(Request::only(['TipoActivo','buscar','DependenciaFiltrar','TipoFiltrar','Desde','Hasta','BuscarDependencia','BuscarTipo']))->links()
							}}
						</div>
						<div class="col-md-3 pull-right">
							<br>
							<a class="href" href="/home">
								<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>


@include('modals.detalleInfraestructura')

<script src="{{ asset('js/infraestructura.js') }}"></script>

@endsection