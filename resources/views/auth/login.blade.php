@extends('layouts.app')

@section('content')
  <div class="password-header" ></div>
    <div class="container free-bird">
        <div class="row">

<div class="card col-md-12 col-lg-12 col-sm-12 mx-auto float-xs-none white z-depth-5 hoverable py-2 px-2">
    <div class="card-block" >
      
 <div class="form-header red darken-3 z-depth-5 hoverable">
            <h3><i class="fa fa-user-circle"></i><strong> Iniciar Sesion</strong></h3>
        </div>

                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}


                            <div class="md-form">
                            <i class="fa fa-envelope prefix"></i>
                                <input id="email" type="email" class="form-control validate" name="email" value="{{ old('email') }}" required autofocus>
                                               <label for="email" data-success"Correcto" data-error"Email Invalido">E-Mail</label>   
                            </div>
                            @if ($errors->has('email'))
                                     <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>

                                      {{ $errors->first('email', ':message') }}
                                    </center></div>
                                @endif
                       
<br/>
                            <div class="md-form">
                            <i class="fa fa-unlock-alt prefix"></i>
                                <input id="password" type="password" class="form-control validate" name="password" required>
            <label for="password" data-success"Correcto" data-error"Incorrecto">Contraseña</label>
                            </div>
                             @if ($errors->has('password'))
                                       <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
                            {{ $errors->first('password', ':message') }}
                                 </center></div>
                                @endif
              
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-unique">
                                    <i class="fa fa-sign-in left"></i> Iniciar Sesion
                                </button>

                                <a class="btn btn-danger" href="{{ route('password.request') }}">
                                   <i class="fa fa-unlock left"></i> ¿Olvidaste tu Contraseña?
                                </a>
                            </div>
                        </div>

<center> 
<div class="col-md-1 col-lg-1"></div>
<div class="col-md-10 col-lg-10">

<div class="card z-depth-4 hoverable">
    <div class="card-header dark-header white-text z-depth-4 hoverable">
       <i class="fa fa-users left lead"></i><strong> Lista de Usuarios</strong>
    </div>
    <div class="card-block">
        <h5 class="card-title">Lista de usuarios y roles del Seeder.</h5>
      <div class="table-responsive table-hover table-striped">
<table class="table">
    <thead class="dark-header">
        <tr>
            <th>E-Mail</th>
            <th>Password</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>     
     <tr><td>administrador@example.com</td> <td>administrador</td> <td>ROLE_ADMINISTRADOR</td></tr>
 <tr><td>coordinador@example.com</td> <td>coordinador</td> <td>ROLE_COORDINADOR</td></tr>
  <tr><td>profesor@example.com</td> <td>profesor</td> <td>ROLE_PROFESOR</td></tr>
   </tr>
 </tbody>
</table>
</div>
 </div>
</div>
</div></div>

 </center> 
                    </form>
  </div>
    </div>
    </div>

@endsection
