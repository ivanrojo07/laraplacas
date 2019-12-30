<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('/favicon.ico') }}" />
    <title>@yield('titulo')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/normalizev8.0.0.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/jquery-ui.1.12.1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('images/open-iconic-master/font/css/open-iconic-bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout1.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/panel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="css/global-icons.css">
    <!--link rel="stylesheet" type="text/css" href="{{ asset('images/open-iconic-master/font/css/open-iconic-bootstrap.css') }}"-->
    <!--link rel="stylesheet" type="text/css" href="{{ asset('css/layout-master.css') }}"-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.css') }}">


    <style type="text/css">
    </style>
    @yield('estilos')
  </head>
  <body>
    <section id="page">
    @section('cabecera')
      <header class="cabecera"style="max-width:auto">
        <div class="row">
          @if (Session::has('nombreusuario'))
          <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
            <a href="{{ url('/dashboard') }}" title="Inicio">
              <img src="{{ asset('images/Claro360logo-03.png') }}" class="img-fluid" alt="claro-360">
            </a>
          </div>

          <div class="col-5 col-sm-5 col-md-6 col-lg-6 col-xl-6">
            <!--img src="{{ asset('images/logo_Sanborns2.png') }}"  class="img-fluid" alt="Sanborns" style="min-width:95px;height:55px;float:right;padding:5px"--->
          </div>

          <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 text-center" style="padding-left:5px">
            <div class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Opciones" style="float:center">
              <img src="{{ asset('images/open-iconic-master/png/person-6x.png') }}" style="width: 40px;">

              </a>
              @if (Session::get('tipo_usuario') == 0)
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('/administrador') }}">Opciones avanzadas</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/logout') }}">Cerrar Sesión</a>
              </div>
              @else
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('/logout') }}">Cerrar Sesión</a>
              </div>
              @endif
            </div>
          </div>
          @else
          <div class="col-6">
            <a href="{{ url('/dashboard') }}" title="Inicio">
              <img src="{{ asset('images/Claro360logo-03.png') }}" class="img-fluid" alt="claro-360">
            </a>
          </div>
          <div class="col-6" style="float:right">
            <!--img src="{{ asset('images/logo_Sanborns2.png') }}" class="img-fluid" alt="Sanborns" style="float:right"-->
          </div>
          @endif
        </div>
      </header>
    @show
    <main>
    {{-- Contenido General de cada vista  --}}
    <div class="container-fluid contenido">
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
</main>
</section>
    <script type="text/javascript" src="{{ asset('js/vendor/jquery-3.2.1.slim.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vendor/popper-1.12.9.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vendor/jquery-ui.1.12.1.js') }}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{--
      * Configuracion de script date piker en español
      * Configuracion de la ruta de la aplicacion --}}
    <script type="text/javascript">
      var rutaApp = '{!! url('/') !!}' + '/';
      $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd-mm-yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
       };
       $.datepicker.setDefaults($.datepicker.regional['es']);
    </script>

    <script type="text/javascript">
      var iplocal=" {{ Session::get('iplocal') }}";
    </script>


      @php
      $ip =  substr(Session::get('iplocal'), 0, 6);
     // echo $ip;
      @endphp
      @if(Session::get('iplocal')=='187.237.42.198' || Session::get('iplocal')=='187.237.42.201' || Session::get('iplocal')=='::1' || $ip =='172.17' || $ip =='172.19')
         <-- script type="text/javascript" src="{{ asset('js/config-srvr-video.js') }}" -- ><--/script>
      @else
        <--script type="text/javascript" src="{{ asset('js/config-srvr-videoexteno.js') }}"--><--/script>

      @endif

    @yield('scripts')
  </body>
</html>
