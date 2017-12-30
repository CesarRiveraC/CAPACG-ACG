@extends('estandar.estandar') @section('content')
<div class="container">


	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<br>

			<div class="col-md-8">

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


									<td class="warning col-xs-2 col-xs-offset-2 ">

										<a class=" btn btn-success btn-xs detalleInmueble" data-inmueble="{{$inmueble->id}}" data-toggle="tooltip" data-placement="bottom"
										 title="Ver"><i class=" fa fa-eye" aria-hidden="true"></i>Detalle</a>


									</td>
								</tr>
								@endforeach
							</tbody>

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

@include('modals.detalleInmueble')

<script src="{{ asset('js/inmueble.js') }}"></script>

</script>
<script type="text/javascript">
	$(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>

@endsection