@extends('layouts.app') @section('content')
<div class="container">


	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<br>

			<div class="col-md-8">
				<a class="btn btn-primary my-5" href="/inmuebles/create">
					<i class="fa fa-plus-circle " aria-hidden="true"></i>
					</span> Crear nuevo Inmueble</a>

				<a class="btn btn-success my-5" href="/inmuebles/excel">
					<i class="fa fa-download" aria-hidden="true"></i>
					</span> Generar Reporte</a>

				<div class="btn-group ">
					<button class="btn btn-warning dropdown-toggle my-5" type="button" data-toggle="dropdown">Filtrar Inmuebles
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a href="/inmuebles">
								<i class="fa fa-check" aria-hidden="true"></i> Estado Activo</a>
						</li>

						<li>
							<a class="filtrar" href="/inmuebles/filter">
								<i class="fa fa-times" aria-hidden="true"></i> Eliminados</a>
						</li>

						<li>
							<a class="filtarDependencia" href="" data-toggle="modal" data-target="#FiltrarDependencia">
								<span class="fa fa-list-alt" aria-hidden="true"></span> Dependencia</a>
						</li>

						<li>
							<a class="filtrarTipo" href="" data-toggle="modal" data-target="#FiltrarTipo">
								<span class="fa fa-clone" aria-hidden="true"></span> Categoría</a>
						</li>

						<li>
							<a class="filtrarFecha" href="" data-toggle="modal" data-target="#FiltrarFecha">
								<i class="fa fa-calendar" aria-hidden="true"></i> Fecha</a>
						</li>

						<li>
							<a class="filtrarSector" href="" data-toggle="modal" data-target="#FiltrarSector">
								<i class="fa fa-location-arrow" aria-hidden="true"></i> Sector</a>
						</li>

						<li>
							<a href="/inmuebles/asignados">
								<i class="fa fa-user-o" aria-hidden="true"></i> Asignados</a>
						</li>

					</ul>
				</div>
			</div>
			<div class="col-md-3 pull-right">
				<a class="href my-5" href="/home">
					<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a>
			</div>
			<br>
			<br> @include('partials.message')

			<div class="panel panel-info">

				{!! Form::open(['url' => 'inmuebles/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search'])
				!!} {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}

				<button type="submit" class="btn btn-primary">
					<span class="fa fa-search"></span>
				</button>
				{!! Form::close() !!}

				@if( !empty($usuarios) && Auth::user()->roles_id == 1)
				<div>
					<div class="panel-heading" style="display: inline-flex">
						<div>
							<label>Asignar Colaborador:</label>
						</div>
						<div>
							<input type="checkbox" id="checkOption" name="question">
						</div>
						<div id="formUsuarios" style="display:none">
							{!! Form::select('usuarios', $usuarios, null, ['id' => 'usuarios'])!!}
						</div>
					</div>
				</div>
				@endif

				<div class="panel-heading" style="width: 100%">
					<h4>Inmuebles</h4>
				</div>

				<div class="panel-body">
					<p>Hay {{$inmuebles->total()}} registros</p>

					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									@include('partials.thActivo')

								</tr>
							</thead>
							<tbody>

								@foreach ($inmuebles as $inmueble)
								<tr>
									<td class="info"> {{$inmueble->Placa}} </td>
									<td class="info"> {{$inmueble->Descripcion}} </td>
									<td class="info"> {{$inmueble->Programa}} </td>
									<td class="info"> {{$inmueble->SubPrograma}} </td>
									<td class="info"> {{$inmueble->Color}} </td>

									<td class="warning  ">
										@if($inmueble->Estado == 1 && Auth::user()->roles_id == 1)
										<a class="btn btn-danger btn-xs estado" data-estado="{{$inmueble->id}}">
											<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar
										</a>
										@endif
										@if($inmueble->Estado == 0 && Auth::user()->roles_id == 1)
										<a class="btn btn-danger btn-xs estado" data-estado="{{$inmueble->id}}">
											<i class="fa fa-reply" aria-hidden="true"></i> Restaurar
										</a>
										@endif
										<a class="btn btn-success btn-xs detalleInmueble" data-inmueble="{{$inmueble->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Ver"><i class="fa fa-eye" aria-hidden="true"></i> Detalle</a>
										<a href="/inmuebles/{{$inmueble->id}}/edit" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="bottom"
										 title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
										<a class="btn btn-info btn-xs asignarColaborador" style="display:none" data-inmueble="{{$inmueble->id}}" data-toggle="tooltip"
										 data-placement="bottom" title="Asignar responsable">
										 <i class="fa fa-child" aria-hidden="true"></i> Asignar</a>

									</td>
								</tr>
								@endforeach
							</tbody>
							{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>  --}}

						</table>
					</div>
					<div class="col-md-8">{{ $inmuebles->appends(Request::only(['TipoActivo','buscar','DependenciaFiltrar','TipoFiltrar','Desde','Hasta']))->links()
						}}
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
@include('modals.estado') @include('modals.detalleInmueble') @include('modals.modalPrueba') @include('modals.filtrar') @include('modals.filtrarDependencia')
@include('modals.filtrarTipo') @include('modals.filtrarFecha') @include('modals.filtrarSector') @include('modals.asignarColaborador')
<script src="{{ asset('js/inmueble.js') }}"></script>
<script type="text/javascript">
	setTimeout(function(){
    $('#mensaje').fadeOut('fast');
}, 2000);

</script>
<script type="text/javascript">
	$(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>

@endsection