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
                    <imgvelplaca-component></imgvelplaca-component>
                </article>
            </div>
        </div>

        <!--================================================
        ==           RECONOCIMIENTO SECTION               ==
        =================================================-->
        <div class="col-md-6 col-lg-6">
            <div class="capsula">
                <article id="reconocimiento">
                    <reconocimiento-component></reconocimiento-component>
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
                <article id="placas">
                    <div class="box row">

                        <div align="center" id="ListaPlacas" style="font-size: 5px; text-align:left; background-color: transparent; width: 100%; height: 100%; "  >
                            <div align="left" style=" width: 100%; height: 102%; overflow-y: scroll;">
                                <tablaplacas-component></tablaplacas-component>
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
                <infoplaca-component></infoplaca-component>
            </article>
            </div>
        </div>
    </div> <!-- fin de div que engloba todo-->
@endsection
@section('scripts')

    {{--<script src="{{ asset("js/app.js") }}"> </script>--}}

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
