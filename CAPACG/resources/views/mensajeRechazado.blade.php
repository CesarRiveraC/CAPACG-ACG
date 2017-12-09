@extends('colaborador.colaborador')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <br>
            <div class="panel panel-default">
                <div class="panel-body">    
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>No tiene suficientes permisos para acceder al recurso</p>
                    <a href="javascript:history.back(-1);" title="Ir a la pagina anterior">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
