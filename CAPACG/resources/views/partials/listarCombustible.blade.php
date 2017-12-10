<div class="col-md-8">
	<br>
	<a class="btn btn-primary my-5" href="/combustibles/create">
		<i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nueva Factura Combustible</a>
	<a class="btn btn-success my-5" href="/combustibles/excel">
		<i class="fa fa-download" aria-hidden="true"></i>
		Generar Reporte</a>
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
								Eliminar
								<i class="fa fa-minus" aria-hidden="true"></i>
							</a>

							<a class="btn btn-success btn-xs detalleCombustible" data-combustible="{{$combustible->id}}" data-toggle="tooltip" data-placement="bottom"
							 title="Ver">
								Detalle
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>

							<a class="btn btn-warning btn-xs editar" href="/combustibles/{{$combustible->id}}/edit" data-toggle="tooltip" data-placement="bottom"
							 title="Editar">
								Editar
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
							<a href="#" class="btn btn-info btn-xs fa fa-link"></a>
						</td>

						</td>

					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-3 pull-right">
			<br>
			<a class="href" href="/home">
				<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a>
		</div>
	</div>
</div>