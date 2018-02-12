@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<br>

			<a class="btn btn-primary crear" data-toggle="modal" data-target="#crearTipo">
				<i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nueva categoría</a>


			<br>
			<br>

			<div class="panel panel-info">


				<div class="panel-heading">
					<h4>Categoría de activos</h4>

				</div>
				<div class="panel-body">
					{{ $tipos->links() }}

					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Categoría</th>

									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($tipos as $tipo)
								<tr>
									<td class="info"> {{$tipo->Tipo}} </td>

									<td class="warning">
									@if($tipo->Estado == 1 && Auth::user()->roles_id == 1)
										<a class="btn btn-danger btn-xs estado" data-estado="{{$tipo->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Inactivar"> <i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</a>
									@endif
									@if($tipo->Estado == 0 && Auth::user()->roles_id == 1)
									<a class="btn btn-danger btn-xs estado" data-estado="{{$tipo->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Restaurar"> <i class="fa fa-reply" aria-hidden="true"></i> Restaurar</a>
									@endif
										<a class="btn btn-warning btn-xs  editar" data-editar="{{$tipo->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Editar"><i class="fa fa-trash-o" aria-hidden="true"></i> Editar</a>

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
@include('modals.estado') @include('modals.crearTipo') @include('modals.editarTipo')
<script src="{{ asset('js/tipo.js') }}"></script>
<script type="text/javascript">
	$(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection