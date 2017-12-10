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
										<a class="btn btn-danger btn-xs fa fa-trash-o estado" data-estado="{{$tipo->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Eliminar"></a>
										<a class="btn btn-warning btn-xs fa fa-pencil editar" data-editar="{{$tipo->id}}" data-toggle="tooltip" data-placement="bottom"
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
@include('modals.estado') @include('modals.crearTipo') @include('modals.editarTipo')
<script src="{{ asset('js/tipo.js') }}"></script>
<script type="text/javascript">
	$(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection