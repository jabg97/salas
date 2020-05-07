@extends('layouts.app')

@section('content')
<div class="error-header" ></div>
    <div class="container free-bird">
        <div class="row">

<div class="card col-md-10 col-lg-10 col-sm-10 mx-auto float-xs-none white z-depth-5 hoverable py-2 px-2">
    <div class="card-block" >
      
 <div class="form-header red darken-3 z-depth-5 hoverable">
            <h1 class="nb-error-title"><i class="fa fa-exclamation-circle left"></i><strong> Error 403</strong></h1>
        </div>


  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

     <center> <h4 class="nb-error-sub">No tiene permiso para acceder...</h4></center>
     
 <div class="view card-photo error-img">
<div class="subimg">
<img src="{{ asset('img/exception/403.png') }}" class="img-fluid lost-error-img" alt="403"/>
                    </div>
                    </div>
                    <br>
      <div class="error-desc">

         <ul class="list-inline text-center text-sm">
         <li class="list-inline-item">
           Lo sentimos, pero usted no tiene permiso para acceder a esta pagina.
           </li>
           <li class="list-inline-item">
           prueba actualizando la pagina o dando click en el link para volver a la pagina principal.
           </li>
           
           <br>
           <li class="list-inline-item link-error-page"><a href="{{ URL::to('home') }}" class="text-muted"><i class="fa fa-home left"></i> Pagina principal</a>
           </li>

        </ul>
        </div>
     
      </div>

    </div>


    </div>
</div>
 </div>

@endsection