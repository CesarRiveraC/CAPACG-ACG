@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<br>
			<a class="btn btn-primary crear" data-toggle="modal" data-target="#crearDependencia">
				<i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nueva Dependencia</a>

			<br>
			<br>

			<div class="panel panel-info">

				<div class="panel-heading">
					<h4>Dependencias</h4>

				</div>
				<div class="panel-body">

					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Nombre</th>

									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($dependencias as $dependencia)
								<tr>
									<td class="info"> {{$dependencia->Dependencia}} </td>


									<td class="warning">
										<a class="btn btn-danger btn-xs fa fa-trash-o estado" data-estado="{{$dependencia->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Eliminar"></a>

										<a class="btn btn-warning btn-xs fa fa-pencil editar" data-editar="{{$dependencia->id}}" data-toggle="tooltip" data-placement="bottom"
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
@include('modals.estado') @include('modals.editarDependencia') @include('modals.crearDependencia')

<script src="{{ asset('js/dependencia.js') }}"></script>
<script type="text/javascript">
	$(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection