@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">WELCOME!</div>

                <div class="panel-body">    
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->Rol==1)
                   <div>
                    Se ha logueado como administrador.
                   </div>
                  @endif  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
