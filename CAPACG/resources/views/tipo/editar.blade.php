@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Editar Categoría</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="/tipos/{{$tipo->id}}" enctype="multipart/form-data">
						<input type="hidden" name="_method" value="PUT"> {{ csrf_field() }}


						<div class="form-group{{ $errors->has('Tipo') ? ' has-error' : '' }}">
							<label for="Tipo" class="col-md-4 control-label">Categoría</label>

							<div class="col-md-6">
								<input id="Tipo" type="text" class="form-control" name="Tipo" value="{{ $tipo->Tipo }}" required autofocus>
							</div>
						</div>



						<div class="form-group" align="center"></div>
						<button type="submit" class="btn btn-success">
							<i class="fa fa-floppy-o" aria-hidden="true"></i> Editar </button>
						<a href="/tipos" class="btn btn-default">
							<i class="fa fa-times" aria-hidden="true"></i> Cancelar </a>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
@endsection