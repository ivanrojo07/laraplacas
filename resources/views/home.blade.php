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
@section('contenido')
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <!--================================================
        ==               DETECCIÓN SECTION                ==
        =================================================-->
        <div class="col-md-6 col-lg-6 ">
            <div class="capsula">
                <article id="imagenes">
                    <div class="row encabezado-aseguradoras">
                        <div class="col-lg-12">
                            <span><strong>Detección</strong></span>
                        </div>
                    </div>
                    <div class="box row">
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <img id="imgVel" alt="Imagen Velocidad" name="imgvelocidad" src="images/CAMvel.png" >
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <img id="imgPlaca" alt="Imagen Placa" name = "imgplacas" align="center" src="images/CAMpla.png">
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <!--================================================
        ==           RECONOCIMIENTO SECTION               ==
        =================================================-->
        <div class="col-md-6 col-lg-6">
            <div class="capsula">
                <article id="reconocimiento">
                    <div class="row encabezado-aseguradoras">
                        <div class="col-lg-12">
                            <!--img align="left" style="" src="img/reconocimiento.png" id="imgPalomita"-->
                            <span><strong>Reconocimiento</strong></span>
                        </div>
                    </div>
                    <div id="rec" class=" box row">
                        <div>
                            <form id="formvalidacion" name="formulariovalidacion">
                                <!--@@ Agregado por Catalina -->
                                <!--Input para mostrar y editar la placa-->
                                <div name="caracteres">
                                    <input readonly type="text"  name="PlacaEdit" id="idEdit" maxlength="8" minlength="5" onclick="valida()"  class="uppercase" >
                                </div>
                                <!--Fin de input para mostrar y editar la placa-->
                                <div>
                                    <input id="textmotivos" name="textmotivos" class="esconder texto-contenedor" placeholder="Introduce los motivos" onclick="valida()">
                                </div>
                                <!--++++++++++++++++++++++++++++++++++++++++++-->
                                <!-- BOTONES "DESCARTAR", "FIRMAR" y "EDITAR" -->
                                <!--++++++++++++++++++++++++++++++++++++++++++-->
                                <div class="row rowButtons" align="center">
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" id="btnDivDescartar">
                                        <button class="btn btn-default botonExportar btn-md" id="buttondescartar2" name="buttondescartar2" type="button" onclick="descarta();"> Descartar </button>
                                        <!-- MENSAJES DE VALIDACIÓN -->
                                        <div class="errorPlaca" style="margin-top: 5%; margin-left: 10%;" >
                                            <label id="msjerror" class="error esconder"></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" id="btncambiar">
                                        <button class="btn btn-default botonExportar btn-md" id="buttonfirmar" name="buttonfirmar" onblur="valestatus(-1)" onclick="valestatus(3);enviaForm();"
                                        > &nbsp; Firmar &nbsp;</button>
                                        <input type="hidden" name="valores" id="valores">
                                        <input type="hidden" name="estatus" id="estatus">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" id="refcambiar"  >
                                        <button class="btn btn-default botonExportar btn-md pull-right" id="buttoneditar"  style="border-radius: 2px;" onclick="editable();">Editar</button>
                                    </div>
                                    <div>
                                        <label id="msjerror" class="error esconder"></label>
                                    </div>
                                </div>
                            </form> <!--Fin del formulario-->
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <!--================================================
       ==               REGISTRO SECTION                 ==
       =================================================-->
        <div class=" col-lg-6 col-md-6">
            <div class="capsula">
                <article class="" id="placas">
                    <div class="row encabezado-aseguradoras">
                        <div class="col-lg-12" >
                            <!--img align="left" style="" src="img/registro.png" id="imgRegistro"-->
                            <span align="center" >
                                <strong> Registro </strong>
                            </span>
                        </div>
                        <div class="" id="winBusqueda" align="center">
                            <form  name="formBuscarPlaca" method="post"  >
                                <div id="ver">
                                    <div class="col-lg-12">
                                        <h2>
                                            <span>
                                                <strong> Buscar placa</strong>
                                            </span>
                                            <span>
                                                <button id="HideBusqueda">

                                                </button>
                                            </span>
                                        </h2>
                                    </div>
                                    <div>
                                        <input id="siglePlate" minlength="5" maxlength="7" type="text" name="bucaPlate" class="uppercase">
                                        <input type="submit" value="buscar" name="btnBuscar" id="findSingle">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="box row">
                        <table class="encabezado-plateList" style="width:100%; color: #f58220; margin-bottom: 1%;" >
                            <tr>
                                <td align="center" style="padding-left: 14%;  padding-top: 1%;  "><strong> Placa</strong></td>
                                <td align="center" style="padding-right: 15%;  padding-top: 1%; "><strong> Información</strong></td>
                            </tr>
                        </table>

                        <div align="center" id="ListaPlacas" style="font-size: 5px; text-align:left; background-color: transparent; width: 100%; height: 100%; "  >
                            <div align="left" style=" width: 100%; height: 102%; overflow-y: scroll;">

                                <table class="plateList" style="width: 100%; height: 100%; color:white">
                                    <tbody>
                                    @foreach($usuarios as $key=>$usuario)
                                        @if($usuario->name)
                                    <tr style=" cursor:pointer; border-top: 1px solid white;">
                                        <td align="center" style=" padding-left: 5%;">
                                            <span style="color:#ff8200; font-weight:bold; padding-top:5%">{{$usuario->name}}</span>
                                        </td>
                                        <td align="left">
                                            <span style="color:#f58220; padding-left: 30%; "><span style="color: white;"> Sistema: </span>{{ $usuario->email }} 11 </span>
                                            <br>
                                            <span style="color:#f58220; padding-left: 30%; "><span style="color: white;"> Fecha: </span>{{ $usuario->apellido_paterno }}30/09/2014 </span>
                                            <br>
                                            <span style="color:#f58220; padding-left: 30%; "><span style="color: white;"> Hora: </span> {{ $usuario->apellido_paterno }} 06:19:09 </span>
                                            <br>
                                            <span style="color:#f58220; padding-left: 30%; "><span style="color: white;"> Carril: </span> {{ $usuario->apellido_paterno }} 1 </span>
                                            <br>
                                            <span style="color:#f58220; padding-left: 30%; "><span style="color: white;"> Velocidad: </span> {{ $usuario->apellido_paterno }} 121 </span>
                                            <br>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </article>
            </div>
        </div >
        <!--================================================
        ==             INFORMACIÓN SECTION                ==
        =================================================-->
        <div class=" col-lg-6 col-md-6">
            <div class="capsula">
            <article id="informacion">
                <div class="row encabezado-aseguradoras">
                    <div class="col-lg-12">
                        <!--img align="left" style="" src="img/informacion.png" id="imgLapicito"-->
                        <span><strong> Información</strong></span>
                    </div>
                </div>
                <div class="box row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cajita divrepuve"> <!--AGREGADO RECINETEMENTE 24_1_2017-->
                            <div class="row ajustar">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <span id="marca" > Marca </span>
                                        </div>

                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                <span id="marcaRepuve" style="color: white;">-</span>
                                            </div>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <span id="clase">Clase</span>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                            <span id="claseRepuve" style="color: white;">-</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ajustar">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <span id="modelo">Modelo</span>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                            <span id="modeloRepuve" style="color: white;">-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <span id="niv">NIV</span>
                                        </div>
                                        <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                            <span id="nivRepuve" style="color: white;">-</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ajustar">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <span id="anio">Año</span>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                            <span id="anioRepuve" style="color: white;">-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <span id="version">Versión</span>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                            <span id="versionRepuve" style="color: white;">-</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ajustar">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <span id="tipo">Tipo</span>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                            <span id="tipoRepuve" style="color: white;">-</span>
                                        </div>
                                    </div>
                                </div>
                                <div id="divRobado" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <span id="robado" >Robado</span>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                            <div id="divColorRobado" class="indicadorRobo" style="overflow: hidden;">
                                                <span id="robadoRepuve" style="color: white;">-</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 3%; margin-bottom: 8%">
                            <div class="row" >
                                <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-7" >
                                    <div id="app">
                                        <mapa-vias>

                                        </mapa-vias>
                                    </div>
                            </div>
                                <div class=" col-lg-5 col-md-5 col-sm-5 col-xs-5 ">
                                <div class="cajita infoCaja">
                                    <div class="contInformacion">
                                        <div style="margin-top:0%;margin-left:0%;" align="center"> <!-- agregadorecientemente -->
                                            <span style="margin-top:30%;" id="encabezado-infor" ><strong > Información</strong></span>
                                        </div>
                                    </div>
                                    <div class="" style="padding-top:0%;height:87%">
                                        <table class="tableInfo" style="width:100%;height:100%;margin-top:0%;"> <!--AGREGADO RECIENTEMENTE se quito el style de la tabla-->
                                            <tr >
                                                <td>
                                                    <span style="color: #f58220; padding-left: 1.5%;">Placa: </span>
                                                    <span id="inPlate" style="color: white;">PLACA</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span style="color: #f58220; padding-left: 1.5%;">Sistema: </span>
                                                    <span id="inSistema" style="color: white;">SISTEMA</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span style="color: #f58220; padding-left: 1.5%;">Direccion: </span><span id="inUbicacion" style="color: white;"> UBICACIÓN</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span style="color: #f58220; padding-left: 1.5%;">Carril: </span><span id="inCarril" style="color: white;">CARRIL</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span style="color: #f58220; padding-left: 1.5%;">Velocidad: </span><span id="inVelocidad" style="color: white;">VELOCIDAD</span > <span style="color: white;"> km/h </span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div> <!-- fin de div que engloba todo-->
@endsection
@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_Ev0haW8nP_ToX5KahzvGPWrqT02PWRI" ></script>
    <script src="{{ asset("js/app.js") }}"> </script>

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


@endsection
