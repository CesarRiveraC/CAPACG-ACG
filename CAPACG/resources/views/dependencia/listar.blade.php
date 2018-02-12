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
					{{ $dependencias->links() }}

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
										@if($dependencia->Estado == 1 && Auth::user()->roles_id == 1)
										<a class="btn btn-danger btn-xs  estado" data-estado="{{$dependencia->id}}" data-toggle="tooltip" data-placement="bottom"
										title="Inactivar"><i class="fa fa-trash-o " aria-hidden="true"></i>Inactivar</a>
										@endif
										 @if($dependencia->Estado == 0 && Auth::user()->roles_id == 1)
										<a class="btn btn-danger btn-xs estado" data-estado="{{$dependencia->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Restaurar"><i class="fa fa-reply" aria-hidden="true"></i> Restaurar</a>
										 @endif
										<a class="btn btn-warning btn-xs editar" data-editar="{{$dependencia->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Editar"><i class=" fa fa-pencil" aria-hidden="true"></i>Editar</a>

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