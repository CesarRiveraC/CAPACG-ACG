@extends('layouts.app') @section('content')
<div class="container">


	<div id="homeContentCol" class="col-md-10 col-md-offset-1">
		<div class="row">


			<br>
			<h2 class="text-center">Menú Principal</h2>
			<br>
			<div class="col-sm-4 text-center">
				<div class="thumbnail">
					<span id="inicio" class="fa-stack fa-4x">
						<i id="inicio" class="fa fa-circle fa-stack-2x text-primary"></i>
						<i class="fa fa-university fa-stack-1x fa-inverse"></i>
					</span>
					<p>
						<strong>Infraestructuras</strong>
					</p>
					<p>En este módulo se puede administrar todos los activos de tipo infraestructura.</p>
					<a href="/infraestructuras" class="btn hbtn">Ir al módulo</a>
				</div>
			</div>
			<div class="col-sm-4 text-center">
				<div class="thumbnail">
					<span id="inicio" class="fa-stack fa-4x">
						<i id="inicio" class="fa fa-circle fa-stack-2x text-primary"></i>
						<i class="fa fa-television fa-stack-1x fa-inverse"></i>
					</span>
					<p>
						<strong>Inmuebles</strong>
					</p>
					<p>En este módulo se puede administrar todos los activos de tipo inmueble.</p>
					<a href="/inmuebles" class="btn hbtn">Ir al módulo</a>
				</div>
			</div>
			<div class="col-sm-4 text-center">
				<div class="thumbnail">
					<span id="inicio" class="fa-stack fa-4x">
						<i id="inicio" class="fa fa-circle fa-stack-2x text-primary"></i>
						<i class="fa fa-bug fa-stack-1x fa-inverse"></i>
					</span>
					<p>
						<strong>Semovientes</strong>
					</p>
					<p>En este módulo se puede administrar todos los activos de tipo semoviente.</p>
					<a href="/semovientes" class="btn hbtn">Ir al módulo</a>
				</div>
			</div>

			<div class="col-sm-4 text-center">
				<div class="thumbnail">
					<span id="inicio" class="fa-stack fa-4x">
						<i id="inicio" class="fa fa-circle fa-stack-2x text-primary"></i>
						<i class="fa fa-car fa-stack-1x fa-inverse"></i>
					</span>
					<p>
						<strong>Vehículos</strong>
					</p>
					<p>En este módulo se puede administrar todos los activos de tipo vehiculo.</p>
					<a class="btn hbtn" href="/vehiculos">Ir al módulo</a>
				</div>
			</div>
			<div class="col-sm-4 text-center">
				<div class="thumbnail">
					<span id="inicio" class="fa-stack fa-4x">
						<i id="inicio" class="fa fa-circle fa-stack-2x text-primary"></i>
						<i class="fa fa-file-text fa-stack-1x fa-inverse"></i>
					</span>
					<p>
						<strong>Combustibles</strong>
					</p>
					<p>En este módulo se puede administrar todas las facturas de combustibles hechas a un vehículo.</p>
					<a href="/combustibles" class="btn hbtn">Ir al módulo</a>
				</div>
			</div>
			<div class="col-sm-4 text-center">
				<div class="thumbnail">
					<span id="inicio" class="fa-stack fa-4x">
						<i id="inicio" class="fa fa-circle fa-stack-2x text-primary"></i>
						<i class="fa fa-users fa-stack-1x fa-inverse"></i>
					</span>
					<p>
						<strong>Usuarios</strong>
					</p>
					<p>En este módulo se puede administrar los usuarios pertenecientes al sistema</p>
					<a href="/usuarios" class="btn hbtn">Ir al módulo</a>
				</div>
			</div>


		</div>
	</div>

</div>

@endsection