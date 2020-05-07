<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

  @section('styles')
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/mdb.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/user/style.css') }}" type="text/css">
    @show
</head>
<body>
    <div id="app">
        <nav class="navbar hoverable navbar-toggleable-md navbar-light fixed-top scrolling-navbar">
        <div class="container">          
            <span class="navbar-brand">
                <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </span>

               <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarNav1">
        @if (Auth::guest())
        <ul class="navbar-nav mr-auto">
        </ul>
        @else
            <ul class="navbar-nav mr-auto">
                    @if (\Request::is('/') || \Request::is('home'))  
  <li class="nav-item waves-effect active">
    @else
    <li class="nav-item waves-effect">
    @endif
                    <a class="nav-link waves-effect" href="{{ URL::to('home') }}"><i class="fa fa-home left"></i>&nbsp;Pagina Principal</a>
                </li>

@role('ROLE_ADMINISTRADOR')
 @if (\Request::is('administrador/users') || \Request::is('administrador/users/*'))   
  <li class="nav-item waves-effect active">
    @else
    <li class="nav-item waves-effect">
    @endif
                  <a id="ir" class="nav-link waves-effect" href="{{ route('entrust-gui::users.index') }}"><i class="fa fa-users left"></i>&nbsp;Usuarios</a>
                </li>

       @if (\Request::is('administrador/roles') || \Request::is('administrador/roles/*'))   
  <li class="nav-item waves-effect active">
    @else
    <li class="nav-item waves-effect">
    @endif
                  <a id="ir" class="nav-link waves-effect" href="{{ route('entrust-gui::roles.index') }}"><i class="fa fa-sitemap left"></i>&nbsp;Roles</a>
                </li>

 @if (\Request::is('administrador/permissions') || \Request::is('administrador/permissions/*'))   
  <li class="nav-item waves-effect active">
    @else
    <li class="nav-item waves-effect">
    @endif
                  <a id="ir" class="nav-link waves-effect" href="{{ route('entrust-gui::permissions.index') }}"><i class="fa fa-cogs left"></i>&nbsp;Permisos</a>
                </li>
@endrole

             @if (\Request::is('equipos') || \Request::is('equipos/*'))   
  <li class="nav-item waves-effect active">
    @else
    <li class="nav-item waves-effect">
    @endif
                  <a id="ir" class="nav-link waves-effect" href="{{ URL::to('equipos') }}"><i class="fa fa-desktop left"></i>&nbsp;Equipos</a>
                </li>

    
             @if (\Request::is('salas') || \Request::is('salas/*'))  
  <li class="nav-item waves-effect active">
    @else
    <li class="nav-item waves-effect">
    @endif
                  <a id="ir" class="nav-link waves-effect" href="{{ URL::to('salas') }}"><i class="fa fa-university left"></i>&nbsp;Salas</a>
                </li>

                
            </ul>
            @endif
         
            <ul class="navbar-nav nav-flex-left">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                          @if (\Request::is('login'))  
  <li class="nav-item waves-effect active">
    @else
    <li class="nav-item waves-effect">
    @endif
                  <a id="ir" class="nav-link waves-effect" href="{{ route('login') }}"><i class="fa fa-sign-in left"></i>&nbsp;Login</a>
                </li>
                  @if (\Request::is('register'))  
  <li class="nav-item waves-effect active">
    @else
    <li class="nav-item waves-effect">
    @endif
                  <a id="ir" class="nav-link waves-effect" href="{{ route('register') }}"><i class="fa fa-user-plus left"></i>&nbsp;Registrarse</a>
                </li>
                        @else
                             <li class="nav-item dropdown nombre btn-group">
                    <a class="nav-link dropdown-toggle waves-effect" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong><i class="fa fa-user-circle left"></i>&nbsp;{{ Auth::user()->name }}</strong></a>
                    <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
                         <a class="dropdown-item waves-effect hoverable" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         <i class="fa fa-sign-out left"></i>&nbsp;Cerrar Sesion</a>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </div>
                </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
   <div class="administrator-header" ></div>
    <div class="container free-bird">
        <div class="row">

<div class="card col-md-12 col-lg-12 col-sm-12 mx-auto float-xs-none white z-depth-5 hoverable py-2 px-2">
    <div class="card-block" >
      
 <div class="form-header red darken-3 z-depth-5 hoverable">
  @if (\Request::is('administrador/users') || \Request::is('administrador/users/*')) 
            <h3><i class="fa fa-users"></i><strong> Gestion de Usuarios</strong></h3>
             @elseif (\Request::is('administrador/roles') || \Request::is('administrador/roles/*')) 
              <h3><i class="fa fa-sitemap"></i><strong> Gestion de Roles</strong></h3>
               @elseif (\Request::is('administrador/permissions') || \Request::is('administrador/permissions/*'))   
 <h3><i class="fa fa-cogs"></i><strong> Gestion de Permisos</strong></h3>
            @endif
        </div>
        @include('entrust-gui::partials.notifications')
        @yield('content')
   </div>
    </div>
    </div>
@section('javascript')
  <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>
<script language="javascript">
(function() {
  $('select').select2();
})();
</script>
  @show
</body>
</html>
