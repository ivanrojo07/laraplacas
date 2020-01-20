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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/normalizev8.0.0.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/jquery-ui.1.12.1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <!--link rel="stylesheet" type="text/css" href="css/global-icons.css"-->
    <!--link rel="stylesheet" type="text/css" href="{{ asset('images/open-iconic-master/font/css/open-iconic-bootstrap.css') }}"-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout-master.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/global-icons.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style type="text/css">
        .ocultar{
          display:none;
        }
        body{
            color: #333;
        }
        /*
        div{
         border: 1px solid gray;
         color: white;
        }*/
        .list-group-item{
         /*padding-top: 3%;
         padding-bottom:3%;
          margin-top: 1%;
          margin-bottom: 1%;
          background-color: #737373;
          color: white;/*/
          border-bottom: 4px solid #40474f;
        }
        span{
          padding-left:3%;
        }

        .encabezado{
          background-color: black;
          padding-top: 2%;
          padding-bottom: 2%;
          font-size: 20px !important;
          font-family: Arial, Helvetica, sans-serif;
          border: 1px solid gray;
        }


    </style>
    @yield('estilos')
  </head>
  <body>
    <div id="app">

      <!-- parte superior izquierda en la que se contendra el logo del cliente -->
      <section id="page">
        <header  class="cabecera text-center">
          <div id="hambmenu">
          <a role="button"  onclick="funcion_aparecer()">
                  <span id="fonthamb" class="glbl glbl-menu"  ></span>
                <!--span id="fonthambclass="glbl glbl-menu" role="button"></span-->
          </a>
          </div>

        </header>
        <header2>
          <!-- parte superoir derecha en donde s eencuentra el nombre del proyecto  y la sesion con la que entra al sistema -->
          @section('cabecera')
          <header class="cabecera hidden-md-down">
              <div class="row">
                  <div class="col-8 col-sm-8 col-md-7 col-lg-6 col-xl-8 text-right">
             <a href="{{ url('/dashboard') }}" title="Inicio">

            </a>
                  </div>
                  <div class="col-4 col-sm-4 col-md-5 col-lg-6 col-xl-4" >
                      <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                        @guest
                            @else
                            <div class="botonlogin align-self-middle" style="text-align: end;margin-top: 4px;">

                            </div>

                        @endguest
                    </ul>
                 </div>
              </div>
        </header>
        @show
        </header2>
        <header3  class="cabecera text-center">
              <div class="row">
                  <div class="col-10 col-sm-10 col-md-5 col-lg-10 col-xl-10" >
                      <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                        @guest
                            @else
                          <div class="row">
                            <div class="botonlogin align-self-middle nsis col-4 col-sm-4 col-md-5 col-lg-6 col-xl-8">
                               <h1 style="color: #40474f;font: 16px arial;">Incidentes</h1>
                              <!--a role="button"  onclick="funcion_aparecer()" title="Salir" style="">
                              </a-->
                            </div>
                            <div class="botonlogin align-self-middle nuser col-4 col-sm-4 col-md-5 col-lg-6 col-xl-4">
                               <h1 style="color: #40474f;font: 16px arial;">{{ Auth::user()->name }}</h1>
                                @if(Auth::user()->token != 'null' && Auth::user()->token != '')
                                  <script>window.location = "{{ route('developer.dashboard') }}";</script>
                                @else

                                @endif

                              <!--a role="button"  onclick="funcion_aparecer()" title="Salir" style="">
                              </a-->
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
        </header3>
        <nav class="nav nav-tabs " id="nav-tab" style="">
          <div style="">
                <!--span class="glbl glbl-search" role="button" style=" float:right" title="Buscar"></span-->
            <a href="{{ route('home') }}"><span role="button" class="glbl glbl-home" title="Inicio"></span></a>
            <a href="{{ route('home') }}"><span role="button" class="glbl glbl-search" title="Inicio"></span></a>
            <a href="{{ route('home') }}"><span role="button" class="glbl glbl-more" title="Inicio"></span></a>
          </div>
        </nav>
        <nav3 id="sidebar">
          @yield('sidebar')
        </nav3>
        <main class="py-2">
          <!-- modal de login -->
          <div id="miModal" href="{{ route('logout') }}" >
              <div class="logoutbutton" style="text-align: end">
              <!--span aria-hidden="true" id="botoncerrar"  >&nbsp;&times;&nbsp;</span-->
                   <span onclick="funcion_cerrar()"role="button" style="background: transparent;border: none; color: #40474f; font-size: 26px;" class="glbl glbl-close"  title="Cerrar"></span>
                        <div id="sesionmodal">
                          @guest
                              @else
                              <div class="botonlogin">
                                Incidentes | {{ Auth::user()->name }}
                              </div>

                          @endguest
                        </div>
              </div>
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link nav-option" href="#">Posibles Multas</a>
                  <a class="nav-link nav-option" href="#">Busqueda de Placas</a>
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
          <div id="container-fluid">
          {{-- Contenido General de cada vista  --}}
            @guest
              <div class="content">
                <div class="title m-b-md incidentes" >
                  <a href="{{ route('login') }}">Login</a>
                  <a href="{{ route('register') }}">Registrar</a>
                </div>
              </div>
            @else
            @endguest
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
          </div>
        </main>
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
    <script type="text/javascript" src="{{ asset('js/controlmodal.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/togglefect.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vendor/jquery-ui.1.12.1.js') }}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}
    {{-- <script src="https://unpkg.com/vue-multiselect@2.1.0"></script> --}}
    <script type="text/javascript" src="{{ asset('js/jquery-validation-1.17.0/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-validation-1.17.0/messages_es.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
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
    @yield('scripts')
  </body>
</html>
