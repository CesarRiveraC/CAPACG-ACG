@extends('estandar.estandar') @section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">

			<div class="col-md-3 pull-right">
				<a class="href my-5" href="/home">
					<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar al menu principal</a>
			</div>
			@include('partials.message')
			<br>
			<br>

			<div class="panel panel-info">

				{!! Form::open(['url' => '#', 'method' =>'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!} {!! Form::text('buscar',
				null,['class'=> 'form-control', 'placeholder' => 'Buscar']) !!}

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

										<a class="btn btn-success btn-xs detalleColaborador" data-colaborador="{{$colaborador->id}}" data-toggle="tooltip"
										 data-placement="bottom" title="Ver"><i class="fa fa-eye" aria-hidden="true"></i>Detalle</a>

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
@include('modals.detalleColaborador')

<script src="{{ asset('js/colaborador.js') }}"></script>

<script type="text/javascript">
	$(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>

@endsection