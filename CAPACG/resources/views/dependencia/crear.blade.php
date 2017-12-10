@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Nueva Dependencia</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="/dependencias" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('Dependencia') ? ' has-error' : '' }}">
							<label for="Dependencia" class="col-md-4 control-label">Nombre de la Dependencia</label>

							<div class="col-md-6">
								<input id="Dependencia" type="text" class="form-control" name="Dependencia" value="{{ old('Dependencia') }}" required autofocus>
							</div>
						</div>

						<div class="form-group" align="center"></div>
						<button type="submit" class="btn btn-success">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							</span> Guardar </button>
						<a href="/dependencias" class="btn btn-default">
							<i class="fa fa-times" aria-hidden="true"></i> Cancelar </a>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
@endsection