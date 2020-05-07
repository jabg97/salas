<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

   <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/mdb.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" type="text/css">

</head>

<body>

    <!--Navbar-->
        <nav class="navbar hoverable navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">
        <div class="container">          
            <span class="navbar-brand">
                <a class="navbar-brand">
                     <i class="fa fa-desktop left"></i>&nbsp;   {{ config('app.name', 'Laravel') }}
                    </a>
                </span>

               <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarNav1">
      
        <ul class="navbar-nav mr-auto">
        </ul>
      
         
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
                     <a class="dropdown-item hoverable waves-effect" href="{{ route('home') }}">
                                         <i class="fa fa-home left"></i>&nbsp;Pagina Principal</a>
                                        </a>
                         <a class="dropdown-item hoverable waves-effect" href="{{ route('logout') }}"
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
    <!--/.Navbar-->

    <!--Carousel Wrapper-->
    <div id="carousel-example-3" class="carousel slide carousel-fade white-text" data-ride="carousel" data-interval="false">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-3" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-3" data-slide-to="1"></li>
            <li data-target="#carousel-example-3" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">

            <!-- First slide -->
            <div class="carousel-item active view hm-black-light" style="background-image: url('{{ asset("img/home/1.jpg") }}'); background-repeat: no-repeat; background-size: cover;">

                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeInUp col-md-12">
                        <li>
                            <h1 class="h1-responsive flex-item font-bold">{{ config('app.name', 'Laravel')}}</h1>
                            <li>
                                <p class="flex-item">Sistema de control para las salas de sistemas</p>
                            </li>
                            
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            <!-- /.First slide -->

            <!-- Second slide -->
            <div class="carousel-item view hm-black-light" style="background-image: url('{{ asset("img/home/2.jpg") }}'); background-repeat: no-repeat; background-size: cover;">

                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeInUp col-md-12">
                        <li>
                            <h1 class="h1-responsive flex-item font-bold">¿No tienes una cuenta?</h1>
                        </li>
                        <li>
                            <p class="flex-item">Registrate ya!</p>
                        </li>
                        <li>
                            <a target="_blank" href="{{ route('register') }}" class="btn btn-primary btn-lg flex-item" rel="nofollow">Registrate</a>
                        </li>
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            <!-- /.Second slide -->

            <!-- Third slide -->
            <div class="carousel-item view hm-black-light" style="background-image:url('{{ asset("img/home/3.jpg") }}'); background-repeat: no-repeat; background-size: cover;">

                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeInUp col-md-12">
                        <li>
                            <h1 class="h1-responsive flex-item font-bold">Bienvenido</h1></li>
                        <li>
                            <p class="flex-item">Inicia Sesion</p>
                        </li>
                        <li>
                            <a target="_blank" href="{{ route('login') }}" class="btn btn-default btn-lg flex-item" rel="nofollow">Inicia Sesion</a>
                        </li>
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            <!-- /.Third slide -->
            
        </div>
        <!--/.Slides-->

        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-3" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-3" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->
    
    <!--/.Main layout-->

 <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <script language="javascript">
    new WOW().init();
    </script>

</body>

</html>