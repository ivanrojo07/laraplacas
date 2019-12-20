@extends('2layout_master')
@section('titulo')
Registro Incidente
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
@section('botonera')
<a href="{{ route('dashboard') }}"><span role="button" class="glbl glbl-home"  title="Inicio"></span></a>
 <a href="#"><span role="button" class="glbl glbl-search"  title="Buscar"></span></a>
@endsection
@section('titulopanel')
<div  class="titulolateral">Registro de Incidente</div>
@endsection
@section('contenido')

<!--******************************************************************-->
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">

<!--******************************************************************-->
<div class="panel-content">
                           <label style="margin-top:1%;margin-left:1%;"><h4 style="font-size: 15px;
    font-weight: bold">Nuevo Incidente</h4></label><br></div>

<!---------------------------  Panel de llamadas    ---------------------------->
<!---------------------------------------------------------------------------------------------------------------->
<div id="app-formulario" >

    <div class="panel-body tab-content"><br>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

            <!--*************************************************-->
                    <!-- Formulario @submit="checkForm"-->
                       <!-- @csrf        -->
                        <div class="panel-body tab-content"><br>
                            <div class="row" id="app-vue" style="margin-top: -50px">
                                <div class="col-sm-6 col-md-6 col-sm-6 form-group form-group" >

                                        <label for="select_incidente" style="color: white;">Incidentes</label>
                                        <multiselect
                                                name="nombreIncidente"
                                                v-model="nombreIncidente"
                                                :options="incidentes"
                                                @input="nuevoIncidente" >
                                        </multiselect>
                                        <span id="alerta" style="color:#FF0000;font-size:18px;" ></span>
                                        <!--input type="hidden" name="nombreIncidente" id="select_incidente" v-model="select_incidente"-->

                                </div>
                                <div class="col-sm-6 col-md-6 col-sm-6 form-group">
                                    <label for="select_estado">{{ __('Estado:') }}</label>
                                        <multiselect
                                          name="nombreEstado"
                                          v-model="nombreEstado"
                                          :options="estados"
                                          @input="nuevoIncidente" >
                                        </multiselect>
                                        <!--input type="hidden" id="select_estado" name="nombreEstado" v-model="select_estado"-->
                                </div>
                                <!--div class="col-sm-3 col-md-3 col-sm-3 text-center">
                                    <button v-on:click="vistaregistroincidente" class="boton2" style="  margin-top: 5%;">
                                        {{ __('Nuevo') }}
                                    </button>
                                </div-->
                            </div>
                        </div>


            <!--*************************************************-->
        </div>
    </div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 formularioRegistro" style="margin-top: -15px">
<!-- Formulario-->
                <!--@csrf-->
        <div class="col-lg-12 Registro-titulo">
            <input type="text" name="idUsuario" id="idUsuario" value="{{ $idUsuario }}" v-model="idUsuario" hidden="true">
            <input type="text" name="idIncidente" id="idIncidente" v-model="idIncidente" hidden="true">
            <input type="text" name="nombreIncidente" id="nombreIncidente" v-model="nombreIncidente" hidden="true">
            <h5 id="etiqueta" style="padding-top: 0px;">Registro del Nuevo Incidente: </h5>
            <hr>
            <h6>@{{ nombreIncidente }} </h6>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" >
                <div >
                    <label for="descripcion" id="etiqueta">{{ __('Descripción del Incidente:') }}</label>
                    <textarea type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" id="descripcion" v-model="descripcion" required placeholder="Descripción del incidente"></textarea>
                    @if ($errors->has('descripcion'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('descripcion') }}</strong>
                        </span>
                    @endif
                </div>
                <div >
                    <!--label for="prefijoestado" id="etiqueta">{{ __('Estado:') }}</label-->
                    <!--input id="nombreestado" type="text" name="nombreestado" v-model="nombreEstado" readonly="readonly" hidden="true" >
                    <input id="prefijoestado" type="text" name="prefijoestado" v-model="prefijoEdo" readonly="readonly" hidden="true"-->
                </div>
                <div >
                    <label for="lugaresafectados" id="etiqueta">{{ __('Lugares Afectados:') }}</label>
                                        <multiselect
                                            v-model="nombreLocalidades"
                                            :options="localidades"
                                            :multiple="true"
                                            track-by="loc"
                                            :custom-label="customLabel"
                                            @input="seleccionarLocalidad">
                                        </multiselect><br>
                    <input type="text" name="otro" id="otro" v-model="otroLugar" placeholder="Otro lugar no registrado... Estado, Municipio, Localidad" class="form-control">
                </div>
                <div >
                    <label for="ubicaciongeografica" id="etiqueta">{{ __('Ubicación Geográfica del Incidente:') }}</label><br>
                    <!--div style="height: 350px;"-->
                        <input type="text" name="latitud" v-model="latitud" id="latitud" readonly="readonly" placeholder="Latitud" hidden="true" required>
                        <input type="text" name="longitud" v-model="longitud" id="longitud" readonly="readonly" placeholder="Longitud" hidden="true" required>
                        <input type="text" name="coordenadas" v-model="coordenadas" id="coordenadas" hidden="true" >
                        <input type="text" id="autocomplete" v-model="busquedaLugares"  class="form-control"/>
                        <div id="map" style="width: 100%; height: 36vh;"></div>
                    <!--/div-->
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" >
                <div >
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 " >
                                <label for="fechaocurrencia" class="col-lg-12" id="etiqueta">{{ __('Fecha de Ocurrencia:') }}</label>
                                <input id="fechaocurrencia" type="date" class="form-control" name="fechaocurrencia" v-model="fecha" required>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 " >
                                <label for="horaocurrencia" class="col-lg-12" id="etiqueta">{{ __('Hora de Ocurrencia:') }}</label>
                                <input id="horaocurrencia" type="time" class="form-control" name="horaocurrencia" v-model="hora" required>
                            </div>
                        </div>
                </div>
                <div >
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 " >
                            <div >
                                <label for="afectacionvial" id="etiqueta">{{ __('Afectación Vial:') }}</label>
                                <input id="afectacionvial" type="text" class="form-control{{ $errors->has('afectacionvial') ? ' is-invalid' : '' }}" name="afectacionvial" v-model="afectacionVial" required placeholder="Av. Calle cerrada... Carretera sin circulación... etc...">
                                @if ($errors->has('afectacionvial'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('afectacionvial') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div >
                                <label for="infraestructuraafectada" id="etiqueta">{{ __('Infraestructura Afectada:') }}</label>
                                <input id="infraestructuraafectada" type="text" class="form-control{{ $errors->has('infraestructuraafectada') ? ' is-invalid' : '' }}" name="infraestructuraafectada" v-model="infraestructuraAfectada" required placeholder="Poste caído... Cámara pública dañada... etc...">
                                @if ($errors->has('infraestructuraafectada'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('infraestructuraafectada') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div >
                                <label for="danoscolaterales" id="etiqueta">{{ __('Daños Colaterales:') }}</label>
                                <input id="danoscolaterales" type="text" class="form-control{{ $errors->has('danoscolaterales') ? ' is-invalid' : '' }}" name="danoscolaterales" v-model="danosColaterales" required placeholder="Propiedad privada afectada... Daños materiales... etc...">
                                @if ($errors->has('danoscolaterales'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('danoscolaterales') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div >
                                <label id="etiqueta">Estatus del Incidente:</label>
                                <select class="form-control" name="status" id="status_incidente">
                                    <option value="1" selected>Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            <div>
                                <label id="etiqueta" >Tipos de Seguimiento:</label>
                                <select class="form-control" name="tiposeguimiento" id="tiposeguimiento">
                                    <option value="2">Inicial</option>
                                    <option value="1" selected>Único</option>
                                    <option value="3">Seguimiento</option>
                                    <option value="4">Final</option>
                                </select>
                            </div><br>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">

                                        <div class="">
                                            <div class="form-group">
                                                <label for="" id="etiqueta">Nivel de Impacto:</label>
                                                   <div class=" row radio" >
                                                    <label for="NivelAlto" class="radio-inline" id="etiqueta">
                                                        <input type="radio" name="radioNivelImpacto" id="radioNivelImpacto" value="1" checked><span style="border:1px solid #b3282d;    padding: 2px 4px;">Alto</span>
                                                    </label>
                                                    <label for="NivelMedio" class="radio-inline" id="etiqueta">
                                                        <input type="radio" name="radioNivelImpacto" id="radioNivelImpacto" value="2"><span style="border:1px solid #ffc300;    padding: 2px 4px;">Medio</span>
                                                    </label>
                                                    <label for="NivelBajo" class="radio-inline" id="etiqueta">
                                                        <input type="radio" name="radioNivelImpacto" id="radioNivelImpacto" value="3"><span style="border:1px solid green;    padding: 2px 4px;">Bajo</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div><br>

                            </div>
                            <div>
                                <label for="medidascontrol" id="etiqueta">{{ __('Medidas de Control:') }}</label>
                                <input id="medidascontrol" type="text" class="form-control{{ $errors->has('medidascontrol') ? ' is-invalid' : '' }}" name="medidascontrol" v-model="medidasControl" required placeholder="Se informó a la autoridad pertinente...">
                                @if ($errors->has('medidascontrol'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('medidascontrol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 " >
                          <div >
                              <label for="personasafectadas" id="etiqueta">{{ __('Personas Afectadas:') }}</label>
                              <input id="personasafectadas" type="number" class="form-control{{ $errors->has('personasafectadas') ? ' is-invalid' : '' }}" name="personasafectadas" v-model="personasAfectadas"  placeholder="0">
                              @if ($errors->has('personaslesionadas'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('personaslesionadas') }}</strong>
                                  </span>
                              @endif

                          </div>
                          <div >
                              <label for="personaslesionadas" id="etiqueta">{{ __('Personas Lesionadas:') }}</label>
                              <input id="personaslesionadas" type="number" class="form-control{{ $errors->has('personaslesionadas') ? ' is-invalid' : '' }}" name="personaslesionadas" v-model="personasLesionadas"  placeholder="0">
                              @if ($errors->has('personaslesionadas'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('personaslesionadas') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div >
                              <label for="personasfallecidas" id="etiqueta">{{ __('Personas Fallecidas:') }}</label>
                              <input id="personasfallecidas" type="number" class="form-control{{ $errors->has('personasfallecidas') ? ' is-invalid' : '' }}" name="personasfallecidas" v-model="personasFallecidas"  placeholder="0">
                              @if ($errors->has('personasfallecidas'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('personasfallecidas') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div >
                              <label for="personasdesaparecidas" id="etiqueta">{{ __('Personas Desaparecidas:') }}</label>
                              <input id="personasdesaparecidas" type="number" class="form-control{{ $errors->has('personasdesaparecidas') ? ' is-invalid' : '' }}" name="personasdesaparecidas" v-model="personasDesaparecidas"  placeholder="0">
                              @if ($errors->has('personasdesaparecidas'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('personasdesaparecidas') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div >
                              <label for="personasevacuadas" id="etiqueta">{{ __('Personas Evacuadas:') }}</label>
                              <input id="personasevacuadas" type="number" class="form-control{{ $errors->has('personasevacuadas') ? ' is-invalid' : '' }}" name="personasevacuadas" v-model="personasEvacuadas"  placeholder="0">
                              @if ($errors->has('personasevacuadas'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('personasevacuadas') }}</strong>
                                  </span>
                              @endif
                          </div><br>
                            <div >
                                <label id="etiqueta">Respuesta Institucional:</label>
                                <input type="text" class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia" id="dependencia" placeholder="Dependencia a quien se reportó el incidente" v-model="dependencia" required><br>
                                @if ($errors->has('dependencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dependencia') }}</strong>
                                    </span>
                                @endif
                                <input type="text" class="form-control{{ $errors->has('nombretrabdep') ? ' is-invalid' : '' }}" name="nombretrabdep" id="nombretrabdep" placeholder="Nombre del empleado" v-model="nombretrabdep" required><br>
                                @if ($errors->has('nombretrabdep'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombretrabdep') }}</strong>
                                    </span>
                                @endif
                                <input type="text" class="form-control{{ $errors->has('cargotrabdep') ? ' is-invalid' : '' }}" name="cargotrabdep" id="cargotrabdep" placeholder="Cargo del empleado" v-model="cargotrabdep" required><br>
                                @if ($errors->has('cargotrabdep'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cargotrabdep') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                <!--button type="submit" class="btn btn-danger" style="background-color:#e2231a; margin-top: 4%; font-size: 13px; border-color: #d43f3a; color: #fff;">
                    {{ __('Register') }}
                </button-->
                <modal v-if="showModal" @close="showModal = false">
    <h3 slot="header"> @{{ tituloModal }} </h3>
    <h3 style="color:black;" slot="body">
        <p v-if="camposVacios.length">
        <ul>
          <b><li v-for="error in camposVacios">@{{ error }}</li></b>
        </ul>
      </p>
    </h3>
  </modal>
                    <!--button id="show-modal" @click="showModal = true">Show Modal</button-->
                   <button v-on:click="validarFormulario" class="boton2" style="margin-top: 4%; margin-bottom: 9%;">Registrar</button>
                </div>
            </div>
        </div>
</div>
</div>
@endsection
@section('scripts')
<!--*************************************************-->
<script src="{{ asset('js/VueJs/multiselect-2.1.0.min.js') }}"></script>
<!--script src="{{ asset('js/sipml5/sipml5-api.js') }}"></script-->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!--script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script-->

<script type="text/x-template" id="modal-template">
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">

          <div class="modal-header">
            <slot name="header">
              default header
            </slot>
          </div>

          <div class="modal-body">
            <slot name="body">
              default body
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">
              default footer
              <button class="modal-default-button" @click="$emit('close')">
                OK
              </button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</script>


    <script type="text/javascript">

var centroZoom = {
  "zac":[
  {
    "id": "32",
    "estado": "Zacatecas",
    "latitud": 23.2890189111082,
    "longitud": -102.660557257399,
    "zoom":7
  }
  ],
  "yuc":[{
    "id": "31",
    "estado": "Yucatán",
    "latitud": 20.7622589908159,
    "longitud": -88.9281641971611,
    "zoom":7
  }],
  "ver":[{
    "id": "30",
    "estado": "Veracruz",
    "latitud": 19.39295722334,
    "longitud": -96.4185585742556,
    "zoom":7
  }],
  "tla":[{
    "id": "29",
    "estado": "Tlaxcala",
    "latitud": 19.4285756075335,
    "longitud": -98.1685494274177,
    "zoom":8
  }],
  "tam":[{
    "id": "28",
    "estado": "Tamaulipas",
    "latitud": 24.2910115601326,
    "longitud": -98.6408943916298,
    "zoom":6
  }],
  "tab":[{
    "id": "27",
    "estado": "Tabasco",
    "latitud": 17.9376914023949,
    "longitud": -92.5939869775475,
    "zoom":7
  }],
  "son":[{
    "id": "26",
    "estado": "Sonora",
    "latitud": 29.6877027819247,
    "longitud": -110.809947362188,
    "zoom":6
  }],
  "sin":[{
    "id": "25",
    "estado": "Sinaloa",
    "latitud": 25.0014381575954,
    "longitud": -107.509141335061,
    "zoom":6
  }],
  "slp":[{
    "id": "24",
    "estado": "San Luis Potosí",
    "latitud": 22.5854598218071,
    "longitud": -100.416508698966,
    "zoom":7
  }],
  "roo":[{
    "id": "23",
    "estado": "Quintana Roo",
    "latitud": 19.6013220590156,
    "longitud": -88.1116703876339,
    "zoom":7
  }],
  "qto":[{
    "id": "22",
    "estado": "Querétaro",
    "latitud": 20.855176056674,
    "longitud": -99.845796407229,
    "zoom":8
  }],
  "pue":[{
    "id": "21",
    "estado": "Puebla",
    "latitud": 19.0060693376167,
    "longitud": -97.9000945494861,
    "zoom":7
  }],
  "oax":[{
    "id": "20",
    "estado": "Oaxaca",
    "latitud": 16.9614424912462,
    "longitud": -96.4301302621991,
    "zoom":7
  }],
  "nle":[{
    "id": "19",
    "estado": "Nuevo León",
    "latitud": 25.5725902796604,
    "longitud": -99.9689699166473,
    "zoom":6
  }],
  "nay":[{
    "id": "18",
    "estado": "Nayarit",
    "latitud": 21.8021016259634,
    "longitud": -104.854974117878,
    "zoom":7
  }],
  "mor":[{
    "id": "17",
    "estado": "Morelos",
    "latitud": 18.7420779446432,
    "longitud": -99.0749623273653,
    "zoom":8
  }],
  "mic":[{
    "id": "16",
    "estado": "Michoacán de Ocampo",
    "latitud": 19.2070960823745,
    "longitud": -101.878113286594,
    "zoom":7
  }],
  "mex":[{
    "id": "15",
    "estado": "México",
    "latitud": 19.3559570439811,
    "longitud": -99.6453738062074,
    "zoom":7
  }],
  "jal":[{
    "id": "14",
    "estado": "Jalisco",
    "latitud": 20.5807631542951,
    "longitud": -103.613239025264,
    "zoom":7
  }],
  "hid":[{
    "id": "13",
    "estado": "Hidalgo",
    "latitud": 20.4795566792041,
    "longitud": -98.8871130681166,
    "zoom":7
  }],
  "gro":[{
    "id": "12",
    "estado": "Guerrero",
    "latitud": 17.6680042948879,
    "longitud": -99.9218331449048,
    "zoom":7
  }],
  "gua":[{
    "id": "11",
    "estado": "Guanajuato",
    "latitud": 20.9054320440142,
    "longitud": -101.012614352738,
    "zoom":7
  }],
  "dur":[{
    "id": "10",
    "estado": "Durango",
    "latitud": 24.9236104009366,
    "longitud": -104.913398569583,
    "zoom":6
  }],
  "col":[{
    "id": "06",
    "estado": "Colima",
    "latitud": 19.1304107700011,
    "longitud": -104.117279165105,
    "zoom":8.5
  }],
  "coa":[{
    "id": "05",
    "estado": "Coahuila de Zaragoza",
    "latitud": 27.2954429751085,
    "longitud": -102.04403868252,
    "zoom":6
  }],
  "cmx":[{
    "id": "09",
    "estado": "Ciudad de México",
    "latitud": 19.2768896359624,
    "longitud": -99.1394111892088,
    "zoom":9
  }],
  "chh":[{
    "id": "08",
    "estado": "Chihuahua",
    "latitud": 28.8085380501793,
    "longitud": -106.468939535184,
    "zoom":6
  }],
  "chp":[{
    "id": "07",
    "estado": "Chiapas",
    "latitud": 16.485239866127,
    "longitud": -92.472911819518,
    "zoom":6.5
  }],
  "cam":[{
    "id": "04",
    "estado": "Campeche",
    "latitud": 18.8405542432502,
    "longitud": -90.360277308127,
    "zoom":7
  }],
  "bcs":[{
    "id": "03",
    "estado": "Baja California Sur",
    "latitud": 25.91866936903,
    "longitud": -112.066214667607,
    "zoom":6
  }],
  "bcn":[{
    "id": "02",
    "estado": "Baja California",
    "latitud": 30.5509234246141,
    "longitud": -115.097530488933,
    "zoom":6
  }],
  "agu":[{
    "id": "01",
    "estado": "Aguascalientes",
    "latitud": 22.0064410847765,
    "longitud": -102.361937749603,
    "zoom":9
  }]
};
      function initMap() {
         map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: {
            lat: 23.877435178885975,
            lng: -102.62050005000003
          },
          styles:[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dadada"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "road.local",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#c9c9c9"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  }
]
        });


         fetch(rutaApp+'recursos/MEXICO')
                  .then(response => response.text())
                  .then((data) => {

            map.data.addGeoJson(JSON.parse(data));
     map.data.setStyle(function (feature) {
        //var color = feature.getProperty('fillColor');
        return {
            //fillColor: 'blue',
            //strokeWeight: 5,
            //paths: poligono,
            strokeColor: "#4d4dff",
            //strokeOpacity: 0.8,
            strokeWeight: 1.5,
            fillColor: "#4d4dff",
            fillOpacity: 0.05
        };
    });
                  })

        var input = document.getElementById('autocomplete');
      var autocomplete = new google.maps.places.Autocomplete(input,{types: ['geocode']});
      google.maps.event.addListener(autocomplete, 'place_changed', function(){
         var place = autocomplete.getPlace();
        var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map);

      })

      }
      function ubicarIncidente() {
        //document.getElementById('latitud').value=lat;
        //document.getElementById('longitud').value=long;
        var coordenads= document.getElementById("coordenadas").value;
        console.log(coordenads);
        var rescord=JSON.parse(coordenads);
        var la= document.getElementById("latitud").value;
        console.log("latitudddddd",la);
        var lo= document.getElementById("longitud").value;
        console.log("longituddddddd",lo);
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: rescord,
            mapTypeId: 'satellite'
        });
        //alert("Arrastre el icono para determinar la ubicacion del incidente");
        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: rescord
        });
        marker.addListener('mouseup', toggleBounce);
      }





Vue.component('modal', {
  template: '#modal-template'
})

        var app = new Vue({
          el: '#app-formulario',
          components: {
            Multiselect: VueMultiselect.default,

          },
          data: {
//******* Variables para cargar el incidente y estado ******//
            nombreIncidente : null,
            idIncidente : null,
            nombreEstado : null,
            prefijoEdo : null,
            nombreLocalidades : null,
            idUsuario : null,
            fecha : null,
            hora : null,
            incidentes : JSON.parse('{!! $incidentes !!}'),
            estados : JSON.parse('{!! $estados !!}'),
            localidades : [],
//******* Variables para el registro de un nuevo incidente ******//
            descripcion:null,
            coordenadas:null,
            latitud:null,
            longitud:null,
            otroLugar : null,
            fechaOcurrencia:null,
            horaOcurrencia:null,
            personasAfectadas:null,
            personasEvacuadas:null,
            personasDesaparecidas:null,
            personasLesionadas:null,
            personasFallecidas:null,
            medidasControl : null,
            danosColaterales : null ,
            infraestructuraAfectada : null,
            afectacionVial : null,
            radioNivelImpacto:null,
            tiposeguimiento:null,
            dependencia : null,
            nombretrabdep : null,
            cargotrabdep : null,

            busquedaLugares: "México ",
            markers: [],
            camposVacios: [],
            tituloModal:null,
            showModal: false,

          },
          methods: {

            customLabel (lugaresafectados) {

                return `${lugaresafectados.edo} - ${lugaresafectados.mun} - ${lugaresafectados.loc}`
            },

            dibujarEstado(){
                console.log(rutaApp + 'recursos/' + this.prefijoEdo);
                fetch(rutaApp + 'recursos/' + this.prefijoEdo)
                    .then(response => response.text())
                    .then((data) => {

                        map.data.forEach(function(feature) {
                            map.data.remove(feature);
                        });

                        map.data.addGeoJson(JSON.parse(data));
                        map.data.setStyle({
                            strokeColor: "#4d4dff",
                            strokeWeight: 1.5,
                            fillColor: "#4d4dff",
                            fillOpacity: 0.05
                        });

                        var geojson = centroZoom[this.prefijoEdo][0];
                        console.log(geojson);
                        console.log({lat:geojson['longitud'], lng:geojson['latitud']});
                        map.setCenter({lat:geojson['latitud'], lng:geojson['longitud']});
                        map.setZoom(parseFloat(geojson['zoom']));
                })

            },

            nuevoIncidente: function(){
                if(this.nombreIncidente == null  && this.nombreEstado == null){

                    document.getElementById("alerta").innerHTML = "Selecciona el incidente y el estado !";

                }else if(this.nombreIncidente != null  && this.nombreEstado == null){

                    document.getElementById("alerta").innerHTML = "Selecciona el Estado !";

                }else{

                    document.getElementById("alerta").innerHTML = "";
                    window.csrf_token = "{{ csrf_token() }}";
                    axios.post(rutaApp+"nuevoincidente",{
                        headers:{
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': window.csrf_token
                        },data:{
                            nombreIncidente: this.nombreIncidente,
                            nombreEstado: this.nombreEstado,

                        }}).then((response) =>{
                            console.log(response.data);
                            respuesta = response.data;
                            this.fecha = respuesta.fecha;
                            this.hora = respuesta.hora;
                            this.nombreIncidente = respuesta.nombreIncidente;
                            this.idIncidente = respuesta.idIncidente;
                            this.nombreEstado = respuesta.nombreEstado;
                            this.prefijoEdo = respuesta.prefijoEdo;
                            this.idUsuario = respuesta.idUsuario;
                            this.localidades = respuesta.localidades;
                            this.nombreLocalidades = undefined;
                            var prefijoBusqueda = this.busquedaLugares = (this.nombreEstado+", México ");

                            // Prefijo para la busqueda de lugares.     \\
                            $("#autocomplete").keydown(function(e) {
                                var field=this;
                                setTimeout(function () {
                                    if(field.value.indexOf(prefijoBusqueda) !== 0) {
                                        $(field).val(prefijoBusqueda);
                                    }
                                }, 1);
                            });

                            // Cargar el GeoJson del estado seleccionado.       \\
                            this.dibujarEstado();

                        },(error) =>{
                            console.log("error");
                        })
                }
            },

            seleccionarLocalidad:function(){

                var infowindow = new google.maps.InfoWindow();

                // Remover todos los marcadores del mapa.       \\
                for (var i = 0; i < this.markers.length; i++ ) {
                    this.markers[i].setMap(null);
                }
                this.markers = [];

                // Recorrer los nuevos marcadores y dibujarlos.     \\
                for (var x = 0; x < this.nombreLocalidades.length; x++ ){

                    var localidad = this.nombreLocalidades[x];
                    this.latitud = parseFloat(localidad.lat);
                    this.longitud = parseFloat(localidad.lon);
                    this.coordenadas = {lat:this.longitud, lng:this.latitud};

                    marker = new google.maps.Marker({
                        map: map,
                        draggable: true,
                        animation: google.maps.Animation.DROP,
                        position: this.coordenadas,
                        title: localidad.loc
                    });

                    this.markers.push(marker);

                    google.maps.event.addListener(marker, 'click', (function(marker,x){
                        return function() {
                            infowindow.setContent('<div><h2 style="color:#000000;" > '+this.title+' </h2></div>');
                            infowindow.open(map,this);
                        }
                    })(marker,x));
                };
            },

            validarFormulario:function(e){
                if (this.descripcion && this.nombreLocalidades && this.afectacionVial && this.infraestructuraAfectada &&
                    this.danosColaterales && this.medidasControl && this.dependencia && this.nombretrabdep && this.cargotrabdep) {

                    this.tituloModal = 'Registro con exito !';
                    this.registrarIncidente();

                }else{
                    this.camposVacios = [];
                    this.tituloModal = 'Completa los siguientes campos.';

                    if(!this.descripcion){
                        this.camposVacios.push('Descripcion.');
                    }
                    if(!this.nombreLocalidades){
                        this.camposVacios.push('Lugares afectados.');
                    }
                    if(!this.afectacionVial){
                        this.camposVacios.push('Afectacion vial.');
                    }
                    if(!this.infraestructuraAfectada){
                        this.camposVacios.push('Infraestructura afectada.');
                    }
                    if(!this.danosColaterales){
                        this.camposVacios.push('Daños colaterales.');
                    }
                    if(!this.medidasControl){
                        this.camposVacios.push('Medidas de control.');
                    }
                    if(!this.dependencia){
                        this.camposVacios.push('Dependencia.');
                    }
                    if(!this.nombretrabdep){
                        this.camposVacios.push('Nombre del empleado.');
                    }
                    if(!this.cargotrabdep){
                        this.camposVacios.push('Cargo del empleado.');
                    }
                    this.showModal=true;
                }

                e.preventDefault();
            },

            registrarIncidente: function() {

                window.csrf_token = "{{ csrf_token() }}";
                axios.post(rutaApp+"registroincidente",{
                    headers:{
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': window.csrf_token
                    },
                    data:{
                        idUsuario : this.idUsuario,
                        idIncidente : this.idIncidente,
                        descripcion : this.descripcion,
                        prefijoEdo : this.prefijoEdo,
                        nombreLocalidades : JSON.stringify(this.nombreLocalidades),
                        otro : this.otroLugar,
                        latitud : this.longitud,
                        longitud : this.latitud,
                        fechaOcurrencia : this.fecha,
                        horaOcurrencia : this.hora,
                        afectacionVial : this.afectacionVial,
                        infraestructuraAfectada : this.infraestructuraAfectada,
                        danosColaterales : this.danosColaterales,
                        status : document.getElementById('status_incidente').value,
                        tipoSeguimiento : parseInt(document.getElementById('tiposeguimiento').value),
                        radioNivelImpacto : parseInt(document.querySelector('input[name="radioNivelImpacto"]:checked').value),
                        medidasControl : this.medidasControl,
                        personasAfectadas : this.personasAfectadas,
                        personasLesionadas : this.personasLesionadas,
                        personasFallecidas : this.personasFallecidas,
                        personasDesaparecidas : this.personasDesaparecidas,
                        personasEvacuadas : this.personasEvacuadas,
                        dependencia : this.dependencia,
                        nombretrabdep : this.nombretrabdep,
                        cargotrabdep : this.cargotrabdep,
                        }
                    }).then((response) =>{
                        console.log(response.data);
                        this.showModal = true;
                        this.fecha = null;
                        this.hora = null;
                        this.idIncidente = null;
                        this.nombreEstado = null;
                        this.prefijoEdo = null;
                        this.descripcion=null;
                        this.nombreLocalidades = undefined;
                        this.nombreIncidente = undefined;
                        this.nombreEstado = undefined;
                        this.localidades = [];
                        this.coordenadas = null;
                        this.latitud = null;
                        this.longitud = null;
                        this.otro = null;
                        this.busquedaLugares='México';
                        this.horaRegistro = null;
                        this.horaOcurrencia = null;
                        this.personasAfectadas = null;
                        this.personasEvacuadas = null;
                        this.personasDesaparecidas = null;
                        this.personasLesionadas = null;
                        this.personasFallecidas = null;
                        this.danosColaterales = null ;
                        this.infraestructuraAfectada = null;
                        this.afectacionVial = null;
                        this.radioNivelImpacto = null;
                        this.tiposeguimiento = null;
                        this.medidasControl = null;
                        this.dependencia = null;
                        this.nombretrabdep = null;
                        this.cargotrabdep = null;

                        initMap();

                    },(error) =>{
                        console.log("error");
                    })
            }
          },
        })


    </script>

<!--*************************************************-->
    <script type="text/javascript" src="{{ asset('js/funciones/ubicacion.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAe5gzNGneaWmWLzmZs6bFKNlwdCTr0Odk&libraries=places&callback=initMap"></script>
@endsection
