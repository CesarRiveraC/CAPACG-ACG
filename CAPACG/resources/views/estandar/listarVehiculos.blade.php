@extends('estandar.estandar') @section('content')
<div class="container">
	<div class="row">

		<div class="col-lg-10 col-md-offset-1">
			<br>

			<div class="btn-group">
				<button class="btn btn-warning dropdown-toggle my-5" type="button" data-toggle="dropdown">Filtrar Vehiculos
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">

					<li>
						<a href="/estandar/vehiculos">
							<i class="fa fa-check" aria-hidden="true"></i> Todos</a>
					</li>

					<li>
						<a class="filtrar" href="/estandar/vehiculosAsignados">
							<i class="fa fa-user-o" aria-hidden="true"></i> Asignados</a>
					</li>
				</ul>
			</div>
			<br>
			<br>

			<div class="panel panel-info">

				{!! Form::open(['url' => 'vehiculos/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search'])
				!!} {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}
				<button type="submit" class="btn btn-primary">
					<span class="fa fa-search"></span>
				</button>
				{!! Form::close() !!}

				<div class="panel-heading">
					<h4>Vehículos</h4>
				</div>
				<div class="panel-body">
					{{ $vehiculos->links() }}
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									@include('partials.thActivo')
									<th>Serie</th>
									<th>Opciones</th>

								</tr>
							</thead>
							<tbody>

								@foreach ($vehiculos as $vehiculo)
								<tr>
									<td class="info"> {{$vehiculo->Placa}} </td>
									<td class="info"> {{$vehiculo->Descripcion}} </td>
									<td class="info"> {{$vehiculo->Programa}} </td>
									<td class="info"> {{$vehiculo->SubPrograma}} </td>
									<td class="info"> {{$vehiculo->Color}} </td>



									<td class="info"> {{$vehiculo->Serie}} </td>

									<td class="warning">

										<a class="fa fa-eye btn btn-success btn-xs detalleVehiculo" data-vehiculo="{{$vehiculo->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Ver"></a>


									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@include('modals.detalleVehiculo')

<script src="{{ asset('js/vehiculo.js') }}"></script>

<script type="text/javascript">
	$(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
@endsection