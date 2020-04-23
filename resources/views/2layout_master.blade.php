<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="icon" type="image/png" href="{{ asset('/favicon.ico') }}" />
		<title>@yield('titulo')</title>

		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
		@yield('estilos')
	</head>
	<body>
	  	<div id="app">
			<!-- parte superior izquierda en la que se contendra el logo del cliente -->
			<section id="page">
				{{-- INICIO HEADER 1 --}}
				<div  class="cabecera text-center" id="header1">
				{{-- BOTON MENU, ESTA ESCONDIDO --}}
					<div id="hambmenu">
						<a role="button"  onclick="funcion_aparecer()">
							<span id="fonthamb" class="glbl glbl-menu"></span>
							<!--span id="fonthambclass="glbl glbl-menu" role="button"></span-->
						</a>
					</div>
				</div>
		  		{{-- FIN HEADER 1 --}}

				{{-- INICIO HEADER 2 --}}
				<div id="header2">
					<!-- parte superoir derecha en donde s eencuentra el nombre del proyecto  y la sesion con la que entra al sistema -->
					@section('cabecera')
						<header class="cabecera hidden-md-down">
							<div class="row">
								<div class="col-8 col-sm-8 col-md-7 col-lg-6 col-xl-8 text-right">
									<a href="{{ url('/dashboard') }}" title="Inicio"></a>
								</div>
								<div class="col-4 col-sm-4 col-md-5 col-lg-6 col-xl-4" >
									<ul class="navbar-nav ml-auto">
										<!-- Authentication Links -->
										@guest
											{{-- EMPTY --}}
										@else
											<div class="botonlogin align-self-middle" style="text-align: end;margin-top: 4px;"></div>
										@endguest
									</ul>
								</div>
							</div>
						</header>
					@show
				</div>
		  		{{-- FIN HEADER 2 --}}

				{{-- INICIO HEADER 3 --}}
				<div id="header3"  class="cabecera text-center">
					{{-- PARTE DONDE SE OBSERVA MENU, NOMBRE Y USUARIO DE APLICACIóN --}}
					<div class="row">
						<div class="col-10 col-sm-10 col-md-5 col-lg-10 col-xl-10" >
							<ul class="navbar-nav ml-auto">
								<!-- Authentication Links -->
								@guest
								@else
									<div class="row">
										<div class="botonlogin align-self-middle nsis col-4 col-sm-4 col-md-5 col-lg-6 col-xl-8">
											<h1 style="color: #40474f;font: 16px arial;">Incidentes</h1>
											<!--a role="button"  onclick="funcion_aparecer()" title="Salir" style=""></a-->
										</div>
										<div class="botonlogin align-self-middle nuser col-4 col-sm-4 col-md-5 col-lg-6 col-xl-4">
											<h1 style="color: #40474f;font: 16px arial;">{{ Auth::user()->name }}</h1>
											@if(Auth::user()->token != 'null' && Auth::user()->token != '')
												<script>window.location = "{{ route('developer.dashboard') }}";</script>
											@else
												{{-- EMPTY --}}
											@endif
											<!--a role="button"  onclick="funcion_aparecer()" title="Salir" style=""></a-->
										</div>
									</div>
							  @endguest
							</ul>
						</div>
						<div class="col-2 col-sm-2 col-md-7 col-lg-2 col-xl-2" >
							<a role="button"  onclick="funcion_aparecer()" title="Salir" style="">
								<span class="glbl glbl-menu"  style="text-align: center;margin-top: 12px;margin-right: 5px; background:#f5f5f5;color: #40474f; border:2px solid #f5f5f5"></span>
							</a>
						</div>
					</div>
				</div>
				{{-- FIN HEADER 3 --}}
			
				{{-- FIN DE NAVBAR --}}

				{{-- MENU LEFT (HOME, SEARCH, PLUS) --}}
				<nav class="nav nav-tabs " id="nav-tab" style="">
					<div style="">
						<!--span class="glbl glbl-search" role="button" style=" float:right" title="Buscar"></span-->
						{{-- HOME --}}
						<a href="{{ route('home') }}"><span role="button" class="glbl glbl-home" title="Inicio"></span></a>
						{{-- SEARCH --}}
						<a href="{{ route('home') }}"><span role="button" class="glbl glbl-search" title="Inicio"></span></a>
						{{-- PLUS --}}
						<a href="{{ route('home') }}"><span role="button" class="glbl glbl-more" title="Inicio"></span></a>
					</div>
				</nav>

				{{-- CONTENIDO IZQUIERDA --}}
				<div id="nav3">
					<div id="sidebar">
						<div class="toggle-btn" id="efectotoggle2">
							<div class="card-headermenus cajalateral">
								<div class="titulolateral">
									Menú
								</div>
							</div>
						</div>
						<div class="toggle-btn" id="efectotoggle1">
							<div class="card-headermenus cajalateral">
								<div class="titulolateral">
									Menú
								</div>
							</div>
						</div>
						<div class="contenidomenus" id="hidden-menu">
							<div>
								<ul class="list-group">
									@yield('sidebar')
									
								</ul>
							</div>
							
						</div>
					</div>
				</div>
				{{-- FIN MENU IZQUIERDA --}}

				{{-- CONTENIDO CENTRAL --}}
				<main class="">

					<!-- modal de login -->
					<div id="miModal" href="{{ route('logout') }}" >
						<div class="logoutbutton" style="text-align: end">
							<!--span aria-hidden="true" id="botoncerrar"  >&nbsp;&times;&nbsp;</span-->
							<span onclick="funcion_cerrar()"role="button" style="background: transparent;border: none; color: #40474f; font-size: 26px;" class="glbl glbl-close"  title="Cerrar"></span>
							<div id="sesionmodal">
								@guest
									{{-- EMPTY --}}
								@else
									<div class="botonlogin">
										Incidentes | {{ Auth::user()->name }}
									</div>
								@endguest
							</div>
						</div>
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link nav-option" href="{{ route('home') }}">Posibles Multas</a>
								<a class="nav-link nav-option" href="{{ route('historial.index') }}">Busqueda de Placas</a>
							</li>
						</ul>
						<div id="textologin">
							<h3 style="border-bottom:  double #f5f5f5;font-size: 16px;text-align: start; margin-bottom: 0px;">Contacto</h3>
							@yield('contenidosession')
							Centro de Tecnologías Unificadas<br><br>
							Lago Zurich No. 245<br>
							Torre Presa Falcón, Piso 19, Plaza Carso,<br>
							Ampliación Granada, Miguel Hidalgo,<br>
							Ciudad de México, México<br><br>
							Teléfono: +(52)5590003902 ext.520<br>
							<!--Correo: contacto@claro360.com-->
						</div>
						<div id="salidasesion">
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							  @csrf
							</form>
							<button type="button" id="botonsesion" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <strong>{{ __('Cerrar Sesión') }} </strong></button>
							</div>
					</div>
					<!-- modal de login close -->

					{{-- CONTENIDO --}}
					<div id="container-fluid">
					  {{-- Contenido General de cada vista  --}}
						<div class="container-fluid contenido my-auto">
						  @yield('contenido')
						</div>


						<!-- /.modal de Mensajes -->
						<div class="modal fade" id="modalMensajes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Mensaje:</h5>
									 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										 <span aria-hidden="true">&times;</span>
									 </button>
									</div><!-- /.modal-header -->
									<div class="modal-body">
										<div class="row">
											<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
												<span aria-hidden="true"></span>
											</div>
										 	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
												<h4 id="mensaje"></h4>
										 	</div>
										</div>
									</div><!-- /.modal-body -->
								 	<div class="modal-footer">
									 	<button type="button" class="btn btn-primary" id="bttn-modal-a">Aceptar</button>
									 	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									</div><!-- /.modal-footer -->
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					</div>
				</main>

				{{-- FOOTER --}}
				<footer >
					<div class="col-12 textolicencia text-center" >
						<h6 class="textfoter"> &copy; 360 HQ S.A de C.V 2019. Todos los derechos reservados </h6>
					</div>
					<div class="col-12 imagenlogo" >
						<img src="{{ asset('images/claro2min.png') }}" class="img-fluid logofoter" alt="claro-360" >
					</div>
				</footer>
			</section>
		</div>
		<script src="{{ asset("js/app.js") }}"> </script>
		@yield('scripts')
	</body>
</html>
