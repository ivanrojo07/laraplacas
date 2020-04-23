@extends('2layout_master')
@section('titulo')
    Posibles Multas
@endsection
@section('estilos')
@endsection
@section('sidebar')
	<!--=====================================================
    ==               Sección de información                ==
    ==                    y busqueda                       ==
    ======================================================-->
    <!-- LLAMADA AL COMPONENTE MENUCOMPONENT -->
    <menu-component></menu-component>
@endsection
@section('contenido')
    <div class="w-100">
        <!--================================================
        ==           RECONOCIMIENTO SECTION               ==
        =================================================-->
        <div class="w-100">
            <div class="capsula">
                <!-- LLAMADA AL COMPONENTE TABCONTENT COMPONENT -->
                <tabcontent-component></tabcontent-component>  
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        const btnToggle = document.querySelector('.toggle-btn');


btnToggle.addEventListener('click', function () {
  document.getElementById('sidebar').classList.toggle('active');
  document.getElementById('hidden-menu').classList.toggle('show');

});

    </script>
@endsection
