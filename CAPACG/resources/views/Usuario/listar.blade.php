@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
<br>
			<a class="btn btn-primary" href="/usuarios/create">
				<i class="fa fa-plus-circle" aria-hidden="true"></i>
				</span> Crear nuevo Usuario</a>
			<div class="btn-group ">
				<button class="btn btn-warning dropdown-toggle my-5" type="button" data-toggle="dropdown">Filtrar Usuarios
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
				
					<li>
						<a href="/usuarios">
							<i class="fa fa-check" aria-hidden="true"></i> Estado Activo</a>
					</li>

					<li>
						<a class="filtrar" href="/usuarios/filter">
							<i class="fa fa-times" aria-hidden="true"></i> Eliminados</a>
					</li>

				</ul>
			</div>

			<div class="col-md-3 pull-right">
				<a class="href my-5" href="/home">
					<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a>
			</div>
			@include('partials.message')
			<br>
			<br>

			<div class="panel panel-info">

				{!! Form::open(['url' => '#', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!} {!! Form::text('buscar',null,['class'=>
				'form-control', 'placeholder' => 'Buscar']) !!}

				<button type="submit" class="btn btn-primary">
					<span class="fa fa-search"></span>
				</button>
				{!! Form::close() !!}

				<div class="panel-heading">
					<h4>Usuarios</h4>
				</div>
				<div class="panel-body">
					{{ $colaboradores->links() }}

					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									@include('partials.usuario')
									<th>Cédula</th>
									<th>Permisos</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($colaboradores as $colaborador)
								<tr>
									<td class="info"> {{$colaborador->name}} </td>
									<td class="info"> {{$colaborador->Apellido}} </td>
									<td class="info"> {{$colaborador->email}} </td>
									<td class="info"> {{$colaborador->Cedula}} </td>
									<td class="info"> {{$colaborador->Rol}} </td>

									<td class="warning">
										@if($colaborador->Estado == 1)
										<a class="btn btn-danger btn-xs estado" data-estado="{{$colaborador->id}} " data-toggle="tooltip" data-placement="bottom"
										 title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</a>
										@endif @if($colaborador->Estado == 0)
										<a class="btn btn-danger btn-xs estado" data-estado="{{$colaborador->id}} " data-toggle="tooltip" data-placement="bottom"
										 title="Restaurar"><i class="fa fa-reply" aria-hidden="true"></i> Restaurar</a>
										@endif
										<a class="btn btn-success btn-xs detalleColaborador" data-colaborador="{{$colaborador->id}}" data-toggle="tooltip"
										 data-placement="bottom" title="Ver"><i class="fa fa-eye" aria-hidden="true"></i> Detalle</a>
										<a href="/usuarios/{{$colaborador->id}}/edit" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="bottom"
										 title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
									</td>

									</td>

								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="col-md-3 pull-right">
						<a class="href my-5" href="/home">
							<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('modals.detalleColaborador') @include('modals.estado') {{-- @include('modals.restaurar') --}}


<script src="{{ asset('js/colaborador.js') }}"></script>

<script type="text/javascript">
	setTimeout(function(){
        $('#mensaje').fadeOut('fast');
    }, 2000);

</script>>
<script type="text/javascript">
	$(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
@endsection