 @if($flash = session('message'))

<div id="mensaje" class="alert alert-success fade in">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	{{ $flash }}
</div>
@endif @if($flash = session('error'))

<div id="mensaje" class="alert alert-danger fade in">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	{{ $flash }}
</div>
@endif