@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<br> @include('partials.listarCombustible')
		</div>
	</div>
</div>
@include('modals.estado') @include('modals.detalleCombustible') @include('modals.filtrarDependencia') 
@include('modals.filtrarFecha') 


<script src="{{ asset('js/combustible.js') }}"></script>
<script type="text/javascript">
	$(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
@endsection