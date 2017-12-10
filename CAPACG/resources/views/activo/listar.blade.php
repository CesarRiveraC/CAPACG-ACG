@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<a class="btn btn-primary" href="/activos/create">
				<span class="glyphicon glyphicon-upload"></span> Crear nuevo activo</a>

			<br>
			<br>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Activos</h4>
				</div>
				<div class="panel-body">
					{{ $activos->links() }}
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Placa</th>
									<th>Descripción</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($activos as $activo)
								<tr>
									<td class="info"> {{$activo->Placa}} </td>
									<td class="info"> {{$activo->Descripcion}} </td>
									<td class="warning">
										<a href="/activos/{{$activo->id}}/eliminar" class="btn btn-danger btn-xs">
											<span class="glyphicon glyphicon-remove-circle"></span> Eliminar</a>

										<a href="/activos/{{$activo->id}}" class="btn btn-danger btn-xs">
											<span class="glyphicon glyphicon-edit-circle"></span> Editar</a>
									</td>
									<td class="warning">
										<a href="/activos/{{$activo->id}}/edit" class="btn btn-danger btn-xs">
											<span class="glyphicon glyphicon-edit-circle"></span> Editar</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					{{ $activos->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection