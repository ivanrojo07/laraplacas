@extends('2layout_master')
@section('titulo')
    Posibles Multas
@endsection
@section('estilos')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.flexdatalist.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
    <style type="text/css">
        .panel {
            border: none;
            margin-top: 0px;
            margin-bottom: 0px;
        }
        .panel-heading {
            border: none;
            color: #fff !important;
            background-color: #a5a7a8 !important;
            height: 55px;
            padding: 0px 0px 0px 30px;
            border-radius: 20px 20px 0px 0px;"
        }
        .panel-heading .head-titulo>.nav-tabs {
            border-bottom: none;
            background-color: #3f444b;
            border-radius: 10px 10px 0px 0px;
        }
        .panel-heading .head-titulo>.nav-tabs>li.active>a {
            background-color: #3f444b;
        }
        .panel-heading .head-titulo>.nav>li>a {
            padding: 8px 15px;
        }
        .panel-heading .head-titulo>.nav-tabs>li>a {
            margin-right: 10px;
            border: none;
        }
        .panel-heading .head-titulo>.nav-tabs>li>a>h4 {
            color: #f58220;
        }
        .panel-body {
            background-color: #3f444b;
            /* padding: 1% 1% 0%;*/
        }
        .panel-body #agregarIncidente .form-group {
            margin-right: 0px;
            margin-left: 0px;
            color: white;
        }
        .formularioRegistro{
            background-color: #3f444b;
        }
        hr {
            margin-top: -7px;
            margin-bottom: 6px;
            border-top: 1px solid #fff;
        }
        .borde-indicadores {
            border: 1px solid #fff;
            padding-top: 1%;
            margin-bottom: 10px;
        }
        .radio {
            /* border: solid 2px #e2231a;
             padding: 4% 7%;*/
            margin-top: 0;
            margin-bottom: 0;
        }
        label{
            font-weight: bold;
        }
        .form-group {
            margin-right: 0px;
            margin-left: 0px;
        }
        .form-group>.radio label {
            padding-left: 27px;
            font-weight: normal;
        }
        .form-group>.radio>.radio-inline>input[type="radio"] {
            height: 22px;
            width: 22px;
            /* margin-left: -25px;*/
            margin-top: -3px;
        }
        .panel-content{
            color: #fff !important;
            background-color:#a5a7a8 !important;
            /*border-radius: 20px 20px 0px 0px;*/
        }

        /**************** Estilos para el Modal **********************************/
        .modal-mask {
            position: fixed;
            z-index: 9998;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .5);
            display: table;
            transition: opacity .3s ease;
        }

        .modal-wrapper {
            display: table-cell;
            vertical-align: middle;
        }

        .modal-container {
            width: 300px;
            margin: 0px auto;
            padding: 20px 30px;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
            transition: all .3s ease;
            font-family: Helvetica, Arial, sans-serif;
        }

        .modal-header h3 {
            margin-top: 0;
            color: #42b983;
        }

        .modal-body {
            margin: 20px 0;
        }

        .modal-default-button {
            float: right;
        }

        .modal-enter {
            opacity: 0;
        }

        .modal-leave-active {
            opacity: 0;
        }

        .modal-enter .modal-container,
        .modal-leave-active .modal-container {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }


    </style>
@endsection
@section('sidebar')
	{{-- expr --}}
	<!--=====================================================
    ==               Sección de información                ==
    ==                    y busqueda                       ==
    ======================================================-->
    <div class="col-12">
        <div class="capsula">
            <article id="imagenes">
                <div class="row encabezado-aseguradoras">
                    <div class="col-lg-12 mt-3">
                        <h3 class="text-left">Busqueda de Placas:</h3>
                    </div>
                </div>
                <div class="box row">
                    <div class="col-12 mt-3 mb-3">
                    	<form method="POST" action="{{ route('historial.buscar') }}" id="placa_form">
                    		<div class="input-group">
                    			<div class="input-group-prepend">
                    				<span class="input-group-text">Placa:</span>
                    			</div>
                                @csrf
                    			<input type="text" name="placa" id="placa" class="form-control uppercase" pattern="[A-Ha-hJ-Nj-nP-Zp-z0-9]{4,7}" title="Sólo se permite el uso de letras (excepto la I y O) y numeros. Con longitud de 4 a 7" value="{{old('placa')}}">
                    			<div class="input-group-append">
                    				<button type="submit" class="btn btn-info">Buscar</button>
                    			</div>
                    		</div>
                    	</form>
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card col-12">
                	<div class="card-header">
                		<h3>Placa:</h3>
                	</div>
                	<div class="card-body" style="padding: 0 !important;">
                		<div class="col-md-12 contenedor-datos-carro-info">
                			<div class="row">
                    			<div class="col text-left">
                    				Marca
                    			</div>
                    			<div class="col text-right">
                    				N/A
                    			</div>
                			</div>
                		</div>
                		<div class="col-md-12 contenedor-datos-carro-info">
                			<div class="row">
                    			<div class="col text-left">
                    				Modelo
                    			</div>
                    			<div class="col text-right">
                    				N/A
                    			</div>
                			</div>
                		</div>
                		<div class="col-md-12 contenedor-datos-carro-info">
                			<div class="row">
                    			<div class="col text-left">
                    				Año
                    			</div>
                    			<div class="col text-right">
                    				N/A
                    			</div>
                			</div>
                		</div>
                		<div class="col-md-12 contenedor-datos-carro-info">
                			<div class="row">
                    			<div class="col text-left">
                    				Clase
                    			</div>
                    			<div class="col text-right">
                    				N/A
                    			</div>
                			</div>
                		</div>
                		<div class="col-md-12 contenedor-datos-carro-info">
                			<div class="row">
                    			<div class="col text-left">
                    				NIV
                    			</div>
                    			<div class="col text-right">
                    				N/A
                    			</div>
                			</div>
                		</div>
                		<div class="col-md-12 contenedor-datos-carro-info">
                			<div class="row">
                    			<div class="col text-left">
                    				Version
                    			</div>
                    			<div class="col text-right">
                    				N/A
                    			</div>
                			</div>
                		</div>
                		<div class="col-md-12 contenedor-datos-carro-info">
                			<div class="row">
                    			<div class="col text-left">
                    				Tipo
                    			</div>
                    			<div class="col text-right">
                    				N/A
                    			</div>
                			</div>
                		</div>
                		<div id="v-pills-tab" role="tablist">
                    		<div class="col-md-12 contenedor-datos-carro-info">
                    			<div class="row">
	                    			<div class="col text-left">
	                    				Velocidad Promedio
	                    			</div>
	                    			<div class="col text-right">
	                    				N/A
	                    				<a class="" id="v-pills-velocidad-tab" data-toggle="pill" href="#velocidad" role="tab" aria-controls="velocidad" aria-selected="true">Más detalles</a>
	                    			</div>
                    			</div>
                    		</div>
                    		<div class="col-md-12 contenedor-datos-carro-info">
                    			<div class="row">
	                    			<div class="col text-left">
	                    				Excesos de Velocidad
	                    			</div>
	                    			<div class="col text-right">
	                    				N/A
	                    				<a id="v-pills-exceso-tab" data-toggle="pill" href="#exceso" role="tab" aria-controls="exceso" aria-selected="false">Más detalles</a>
	                    			</div>
                    			</div>
                    		</div>
                    		<div class="col-md-12 contenedor-datos-carro-info" >
                    			<div class="row">
	                    			<div class="col text-left">
	                    				Robado
	                    			</div>
	                    			<div class="col text-right">
	                    				N/A
	                    				<a id="v-pills-robado-tab" data-toggle="pill" href="#robado" role="tab" aria-controls="robado" aria-selected="false">Más detalles</a>
	                    			</div>
                    			</div>
                    		</div>
                    		<div class="col-md-12 contenedor-datos-carro-info">
                    			<div class="row">
	                    			<div class="col text-left">
	                    				Detecciones
	                    			</div>
	                    			<div class="col text-right">
	                    				N/A
	                    				<a id="v-pills-detecciones-tab" data-toggle="pill" href="#detecciones" role="tab" aria-controls="detecciones" aria-selected="false">Más detalles </a>
	                    			</div>
                    			</div>
                    		</div>
                		</div>
                	</div>
                </div>
            </article>
        </div>
    </div>
@endsection
@section('contenido')
    <div class="row">
        <!--================================================
        ==           RECONOCIMIENTO SECTION               ==
        =================================================-->
        <div class="col-12">
            <div class="capsula">
                <div class="tab-content" id="v-pills-tabContent">
                	<div class="tab-pane fade show active" id="velocidad" role="tabpanel" aria-labelledby="velocidad-tab">
                		<div class="row encabezado-aseguradoras">
	                        <div class="col-lg-12 mt-3">
	                            <h3 class="text-left">Historial</h3>
	                        </div>
	                    </div>
	                    <div id="rec" class=" box row">
	                    	<div id="map" class="w-100" style="min-height: 750px; max-height: 750px;"></div>
	                    </div>
                	</div>
                	<div class="tab-pane fade" id="exceso" role="tabpanel" aria-labelledby="exceso-tab">
                		<div class="row encabezado-aseguradoras">
	                        <div class="col-lg-12 mt-3">
	                            <h3 class="text-left">Detalle de Exceso de Velocidad</h3>
	                        </div>
	                    </div>
	                    <div id="rec" class="box row">
                    		<table class="table table-default">
                    			<thead align="center">
                    				<tr>
                    					<th class="col-xs-3 headTable text-warning">
                    						Fecha
                    					</th>
                    					<th class="col-xs-3 headTable text-warning">
                    						Ubicación
                    					</th>
                    					<th class="col-xs-3 headTable text-warning">
                    						Velocidad(KPH)
                    					</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                    				<tr class="text-white">
                    					<td>Hola</td>
                    					<td>Mundo</td>
                    					<td>Nuevo</td>
                    				</tr>
                    				<tr class="text-white">
                    					<td>Hola</td>
                    					<td>Mundo</td>
                    					<td>Nuevo</td>
                    				</tr>
                    				<tr class="text-white">
                    					<td>Hola</td>
                    					<td>Mundo</td>
                    					<td>Nuevo</td>
                    				</tr>
                    				<tr class="text-white">
                    					<td>Hola</td>
                    					<td>Mundo</td>
                    					<td>Nuevo</td>
                    				</tr>
                    			</tbody>
                    		</table>
	                    </div>
                	</div>
                	<div class="tab-pane fade" id="robado" role="tabpanel" aria-labelledby="robado-tab">
                		<div class="row encabezado-aseguradoras">
	                        <div class="col-lg-12 mt-3">
	                            <h3 class="text-left"> Reporte de Robo </h3>
	                        </div>
	                    </div>
	                    <div id="rec" class=" box row">
	                    	<table class="table table-default">
                    			<thead align="center">
                    				<tr>
                    					<th class="col-xs-3 headTable text-warning">
                    						Fecha
                    					</th>
                    					<th class="col-xs-3 headTable text-warning">
                    						Ubicación
                    					</th>
                    					<th class="col-xs-3 headTable text-warning">
                    						Velocidad(KPH)
                    					</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                    				<tr class="text-white">
                    					<td>Hola</td>
                    					<td>Mundo</td>
                    					<td>Nuevo</td>
                    				</tr>
                    				<tr class="text-white">
                    					<td>Hola</td>
                    					<td>Mundo</td>
                    					<td>Nuevo</td>
                    				</tr>
                    				<tr class="text-white">
                    					<td>Hola</td>
                    					<td>Mundo</td>
                    					<td>Nuevo</td>
                    				</tr>
                    				<tr class="text-white">
                    					<td>Hola</td>
                    					<td>Mundo</td>
                    					<td>Nuevo</td>
                    				</tr>
                    			</tbody>
                    		</table>
	                    </div>
                	</div>
                	<div class="tab-pane fade" id="detecciones" role="tabpanel" aria-labelledby="detecciones-tab">
                		<div class="row encabezado-aseguradoras">
	                        <div class="col-lg-12 mt-3">
	                            <h3 class="text-left"> Detalle de Detecciones </h3>
	                        </div>
	                    </div>
	                    <div id="rec" class=" box row">
	                    	<table class="table table-default">
                    			<thead align="center">
                    				<tr>
                    					<th class="col-xs-3 headTable text-warning">
                    						Fecha
                    					</th>
                    					<th class="col-xs-3 headTable text-warning">
                    						Ubicación
                    					</th>
                    					<th class="col-xs-3 headTable text-warning">
                    						Velocidad(KPH)
                    					</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                    				<tr class="text-white">
                    					<td>Hola</td>
                    					<td>Mundo</td>
                    					<td>Nuevo</td>
                    				</tr>
                    				<tr class="text-white">
                    					<td>Hola</td>
                    					<td>Mundo</td>
                    					<td>Nuevo</td>
                    				</tr>
                    				<tr class="text-white">
                    					<td>Hola</td>
                    					<td>Mundo</td>
                    					<td>Nuevo</td>
                    				</tr>
                    				<tr class="text-white">
                    					<td>Hola</td>
                    					<td>Mundo</td>
                    					<td>Nuevo</td>
                    				</tr>
                    			</tbody>
                    		</table>
	                    </div>
                	</div>
                </div>
                </article>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
	<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 19.4416816, lng: -99.2037946},
          zoom: 5,
          styles:[
            {
              featureType: 'administrative',
              elementType: 'geometry',
              stylers: [{visibility: "off"},{"weight": 1}]
            },
            {
              featureType: 'administrative',
              elementType: 'geometry.fill',
              stylers: [{visibility: "on"}]
            },
            {
              featureType: 'administrative',
              elementType: 'geometry.stroke',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'administrative',
              elementType: 'labels',
              stylers: [{color: '#000000'},{visibility: "off"}]
            },
            {
              featureType: 'administrative.country',
              elementType: 'geometry',
              stylers: [{color: '#a6a6a6'},{visibility: "on"},{"weight": 1.5}]
            },
            {
              featureType: 'administrative.country',
              elementType: 'labels',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'administrative.country',
              elementType: 'labels.icon',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'administrative.land_parcel',
              elementType: 'geometry',
              stylers: [{visibility: "on"}]
            },
            {
              featureType: 'administrative.land_parcel',
              elementType: 'labels',
              stylers: [{visibility: "on"}]
            },
            {
              featureType: 'administrative.land_parcel',
              elementType: 'labels.icon',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'administrative.locality',
              elementType: 'geometry',
              stylers: [{visibility: "on"}]
            },
            {
              featureType: 'administrative.locality',
              elementType: 'labels',
              stylers: [{color: '#696969'},{visibility: "simplified"}]
            },
            {
              featureType: 'administrative.locality',
              elementType: 'labels.icon',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'administrative.neighborhood',
              elementType: 'geometry',
              stylers: [{visibility: "on"}]
            },
            {
              featureType: 'administrative.neighborhood',
              elementType: 'labels',
              stylers: [{color: '#696969'},{visibility: "simplified"}]
            },
            {
              featureType: 'administrative.neighborhood',
              elementType: 'labels.icon',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'administrative.province',
              elementType: 'geometry',
              stylers: [{visibility: "on"},{"weight": 1.5}]
            },
            {
              featureType: 'administrative.province',
              elementType: 'labels',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'administrative.province',
              elementType: 'labels.icon',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: "landscape",
              stylers: [{color: '#D5D8DC'}]
            },
            {
              featureType: 'landscape',
              elementType: 'geometry',
              stylers: [{color: '#D5D8DC'}]
            },
            {
              featureType: 'landscape',
              elementType: 'labels',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'landscape',
              elementType: 'labels.icon',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'landscape.man_made',
              elementType: 'geometry',
              stylers: [{color: '#526081'},{visibility: "off"}]
            },
            {
              featureType: 'landscape.natural.landcover',
              elementType: 'geometry',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'landscape.natural.landcover',
              elementType: 'labels.icon',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'landscape.natural.terrain',
              elementType: 'geometry',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'landscape.natural.terrain',
              elementType: 'labels',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'landscape.natural.terrain',
              elementType: 'labels.icon',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'poi',
              elementType: 'geometry',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'poi',
              elementType: 'labels',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.icon',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{visibility: "simplified"}]
            },
            {
              featureType: 'road',
              elementType: 'labels',
              stylers: [{visibility: "simplified"}]
            },
            {
              featureType: 'road',
              elementType: 'labels.icon',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'transit',
              elementType: 'labels',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'transit',
              elementType: 'labels.icon',
              stylers: [{visibility: "off"}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#F2F4F4'},{visibility: "on"}]
            },
            {
              featureType: 'water',
              elementType: 'labels',
              stylers: [{visibility: "off"}]
            },
          ]
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_Ev0haW8nP_ToX5KahzvGPWrqT02PWRI&callback=initMap" async defer></script>
    {{-- <script src="{{ asset("js/app.js") }}"> </script> --}}
    <script>
	  	$('#v-pills-tab a').on('click', function (e) {
		  e.preventDefault();
		  $('#v-pills-tab div:last-child a').removeClass('active').prop('aria-selected',false);
		  $(this).tab('show');
		});
	</script>

@endsection
