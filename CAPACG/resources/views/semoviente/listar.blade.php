@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">

		<div class="col-lg-10 col-lg-offset-1">
			<br>
			<div class="col-md-8">
				<a class="btn btn-primary my-5" href="/semovientes/create">
					<i class="fa fa-plus-circle" aria-hidden="true"></i> Crear nuevo semoviente</a>
				<a class="btn btn-success my-5" href="/semovientes/excel">
					<i class="fa fa-download" aria-hidden="true"></i>
					</span> Generar Reporte</a>
				<div class="btn-group">
					<button class="btn btn-warning dropdown-toggle my-5" type="button" data-toggle="dropdown">Filtrar Semovientes
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">

						<li>
							<a href="/semovientes">
								<i class="fa fa-check" aria-hidden="true"></i> Estado Activo</a>
						</li>

						<li>
							<a class="filtrar" href="/semovientes/filter">
								<i class="fa fa-times" aria-hidden="true"></i> Estado Inactivo</a>
						</li>

						<li>
							<a class="filtarDependencia" href="" data-toggle="modal" data-target="#FiltrarDependencia">
								<span class="fa fa-list-alt" aria-hidden="true"></span> Dependencia</a>
						</li>

						<li>
							<a class="filtrarTipo" href="" data-toggle="modal" data-target="#FiltrarTipo">
								<span class="fa fa-clone" aria-hidden="true"></span> Tipo</a>
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
							<a href="/semovientes/asignados">
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

				{!! Form::open(['url' => 'semovientes/search', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search'])
				!!} {!! Form::text('buscar', null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}
				<button type="submit" class="btn btn-primary">
					<span class="fa fa-search"></span>
				</button>
				{!! Form::close() !!}

				@if( ! empty($usuarios))
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

				<div class="panel-heading" style="width:100%">
					<h4>Semovientes</h4>
				</div>
				<div class="panel-body">
					<p>Hay {{$semovientes->total()}} registros</p>

					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									@include('partials.thActivo')
									<th>Raza</th>
									<th>Opciones</th>

								</tr>
							</thead>
							<tbody>

								@foreach ($semovientes as $semoviente)
								<tr>
									<td class="info"> {{$semoviente->Placa}} </td>
									<td class="info"> {{$semoviente->Descripcion}} </td>
									<td class="info"> {{$semoviente->Programa}} </td>
									<td class="info"> {{$semoviente->SubPrograma}} </td>
									<td class="info"> {{$semoviente->Color}} </td>


									<td class="info"> {{$semoviente->Raza}} </td>

									<td class="warning col-xs-2 col-xs-offset-2 ">
										<a class="btn btn-danger btn-xs fa fa-trash-o estado" data-estado="{{$semoviente->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Eliminar"></a>
										<a class="fa fa-eye btn btn-success btn-xs detalleSemoviente" data-semoviente="{{$semoviente->id}}" data-toggle="tooltip"
										 data-placement="bottom" title="Ver"></a>
										<a href="/semovientes/{{$semoviente->id}}/edit" class="btn btn-warning btn-xs fa fa-pencil" data-toggle="tooltip" data-placement="bottom"
										 title="Editar"></a>
										<a class="btn btn-info btn-xs fa fa-child asignarColaborador" style="display:none" data-semoviente="{{$semoviente->id}}"
										 data-toggle="tooltip" data-placement="bottom" title="Asignar responsable"></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="col-md-8">{{ $semovientes->appends(Request::only(['TipoActivo','buscar','DependenciaFiltrar','TipoFiltrar','Desde','Hasta']))->links()
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
@include('modals.estado') @include('modals.detalleSemoviente') @include('modals.modalPrueba') @include('modals.filtrar')
@include('modals.filtrarDependencia') @include('modals.filtrarTipo') @include('modals.filtrarSector') @include('modals.filtrarFecha')
@include('modals.asignarColaborador')
<script src="{{ asset('js/semoviente.js') }}"></script>
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