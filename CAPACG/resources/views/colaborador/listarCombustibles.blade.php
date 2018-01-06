@extends('colaborador.colaborador') @section('content')
<div class="container">
	<div class="row">

		<div class="col-lg-10 col-lg-offset-1">
			<br>
			<div class="col-md-8">
				<a class="btn btn-primary my-5" href="/colaborador/combustiblesAsignados">
					<i class="fa fa-check" aria-hidden="true"></i> Ver mis facturas</a>

			</div>
			<div class="col-md-3 pull-right">
				<a class="href my-5" href="/home">
					<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a>
			</div>
			<br>
			<br>
			<br>

			<div class="panel panel-info">

				<form role="search" action="/colaborador/searchCombustibles" class="navbar-form navbar-right">
					{{ csrf_field() }}


					<input type="text" class="form-control" id="Buscar" placeholder="Buscar" name="Buscar">


					<button type="submit" class="btn btn-primary">
						<span class="fa fa-search"></span>
					</button>
				</form>

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
										<a class="btn btn-success btn-xs detalleCombustible" data-combustible="{{$combustible->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Ver"> <i class="fa fa-eye " aria-hidden="true"></i>
										Detalle
											</a>
									</td>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="col-md-8">{{ $combustibles->appends(Request::only(['Buscar']))->links()}}
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

@include('modals.detalleCombustible')

<script src="{{ asset('js/combustible.js') }}"></script>
<script type="text/javascript">
	$(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
@endsection
