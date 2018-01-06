<div class="col-md-8">

	<a class="btn btn-primary my-5" href="/combustibles/create">
		<i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nueva Factura Combustible</a>
	<a class="btn btn-success my-5" href="/combustibles/excel">
		<i class="fa fa-download" aria-hidden="true"></i>
		Generar Reporte</a>
	<div class="btn-group ">
		<button class="btn btn-warning dropdown-toggle my-5" type="button" data-toggle="dropdown">Filtrar Facturas
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li>
				<a href="/combustibles">
					<i class="fa fa-check" aria-hidden="true"></i> Estado Activo</a>
			</li>

			<li>
				<a class="filtrar" href="/combustibles/filter">
					<i class="fa fa-times" aria-hidden="true"></i> Eliminados</a>
			</li>

			<li>
				<a class="filtarDependencia" href="" data-toggle="modal" data-target="#FiltrarDependencia">
					<span class="fa fa-list-alt" aria-hidden="true"></span> Dependencia</a>
			</li>


			<li>
				<a class="filtrarFecha" href="" data-toggle="modal" data-target="#FiltrarFecha">
					<i class="fa fa-calendar" aria-hidden="true"></i> Fecha</a>
			</li>

			<li>
				<a href="/combustibles/asignados">
					<i class="fa fa-user-o" aria-hidden="true"></i> Asignados</a>
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
<br> @include('partials.message')

<div class="panel panel-info">

	{!! Form::open(['url' => 'combustibles/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search'])
	!!} {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}
	<button type="submit" class="btn btn-primary">
		<span class="fa fa-search"></span>
	</button>
	{!! Form::close() !!}

	<div class="panel-heading">
		<h4>Facturas de Combustibles</h4>

	</div>
	<div class="panel-body">
		<p>Hay {{$combustibles->total()}} registros</p>

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No Vaucher</th>
						<th>Monto</th>
						<th>Número</th>
						<th>Fecha</th>
						<th>Kilometraje</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($combustibles as $combustible)
					<tr>
						<td class="info"> {{$combustible->NoVaucher}} </td>
						<td class="info"> {{$combustible->Monto}} </td>
						<td class="info"> {{$combustible->Numero}} </td>
						<td class="info"> {{$combustible->Fecha}} </td>
						<td class="info"> {{$combustible->Kilometraje}} </td>

						<td class="warning">
							<a class="btn btn-danger btn-xs estado" data-estado="{{$combustible->id}}" data-toggle="tooltip" data-placement="bottom"
							 title="Eliminar">
								<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar
							</a>

							<a class="btn btn-success btn-xs detalleCombustible" data-combustible="{{$combustible->id}}" data-toggle="tooltip" data-placement="bottom"
							 title="Ver">
								<i class="fa fa-eye" aria-hidden="true"></i> Detalle
							</a>

							<a class="btn btn-warning btn-xs editar" href="/combustibles/{{$combustible->id}}/edit" data-toggle="tooltip" data-placement="bottom"
							 title="Editar">
								<i class="fa fa-pencil" aria-hidden="true"></i> Editar
							</a>

						</td>

						</td>

					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-8">{{ $combustibles->appends(Request::only(['buscar','DependenciaFiltrar','Desde','Hasta','BuscarDependencia']))->links()
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