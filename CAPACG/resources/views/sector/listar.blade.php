@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<br>

			<a class="btn btn-primary crear" data-toggle="modal" data-target="#crearSector">
				<i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nuevo Sector</a>
			<br>
			<br>

			<div class="panel panel-info">

				<div class="panel-heading">
					<h4>Sector de activos</h4>

				</div>
				<div class="panel-body">

					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sector</th>

									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($sectores as $sector)
								<tr>
									<td class="info"> {{$sector->Sector}} </td>

									<td class="warning">
										<a class="btn btn-danger btn-xs fa fa-trash-o estado" data-estado="{{$sector->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Eliminar"></a>
										<a class="btn btn-warning btn-xs fa fa-pencil editar" data-editar="{{$sector->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Editar"></a>

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
@include('modals.estado') @include('modals.crearSector') @include('modals.editarSector')
<script src="{{ asset('js/sector.js') }}"></script>
<script type="text/javascript">
	$(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection