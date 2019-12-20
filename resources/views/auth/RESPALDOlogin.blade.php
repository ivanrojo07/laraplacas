@extends('layout_master')

@section('barnavegacion')
           <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/login" style="color:black !important;">Login</a>
            </li>
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/register" style="color:black !important;">Registrar</a>
            </li>
@endsection


@section('contenidoincidente')

@include('auth.inlogin')

@endsection
