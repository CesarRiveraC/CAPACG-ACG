@extends('layouts.app') @section('content')
<div class="container" id="pip">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Detalle de Usuarios</div>

				<div class="panel-body">

					<dl class="dl-horizontal">
						<dt>Nombre</dt>
						<dd>{{$colaborador->usuario->name}}</dd>
						<br>
						<dt>Apellido</dt>
						<dd>{{$colaborador->usuario->Apellido}}</dd>
						<br>
						<dt>Correo Electrónico</dt>
						<dd>{{$colaborador->usuario->email}}</dd>
						<br>
						<dt>Rol</dt>
						<dd>{{$colaborador->usuario->Rol}}</dd>
						<br>
						<dt>Estado</dt>
						<dd>{{$colaborador->usuario->Estado}}</dd>
						<br>
						<dt>Cédula</dt>
						<dd>{{$colaborador->Cedula}}</dd>
						<br>
						<dt>Puesto de trabajo</dt>
						<dd>{{$colaborador->PuestoDeTrabajo}}</dd>
						<br>
						<dt>Lugar de trabajo</dt>
						<dd>{{$colaborador->LugarDeTrabajo}}</dd>
						<br>
						<dt>Teléfono</dt>
						<dd>{{$colaborador->Telefono}}</dd>
						<br>
						<dt>Estado de colaborador</dt>
						<dd>{{$colaborador->Estado}}</dd>
						<br>
						<dt>
							<button title="Cerrar(Esc)" type="button" class="mfp-close">
								x</button>
						</dt>
					</dl>
					<div class="form-group" align="center"></div>

				</div>

			</div>
		</div>
	</div>
</div>
</div>

@endsection