@extends('layouts.app')

@section('content')
 <div class="help-header" ></div>
    <div class="container free-bird">
        <div class="row">

<div class="card col-md-12 col-lg-12 col-sm-12 mx-auto float-xs-none white z-depth-5 hoverable py-2 px-2">
    <div class="card-block" >
      
 <div class="form-header red darken-3 z-depth-5 hoverable">
            <h3><i class="fa fa-user-plus"></i><strong> Registrarse</strong></h3>
        </div>

                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                       <div class="md-form">
                            <i class="fa fa-user-circle prefix"></i>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                      <label for="name" data-success"Correcto" data-error"Incorrecto">Nombre</label>   
                            </div>
                            @if ($errors->has('name'))
                                     <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
                                      {{ $errors->first('name', ':message') }}
                                    </center></div>
                                @endif
                       
<br/>
                        <div class="md-form">
                            <i class="fa fa-envelope prefix"></i>
                                <input id="email" type="email" class="form-control validate" name="email" value="{{ old('email') }}" required>
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
                       
<br/>

                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                                <input id="password-confirm" type="password" class="form-control validate" name="password_confirmation" required>
                                                 <label for="password-confirml" data-success"Correcto" data-error"Incorrecto">Confirmar</label>   
                            </div>
                            @if ($errors->has('password-confirm'))
                                     <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>

                                      {{ $errors->first('password-confirm', ':message') }}
                                    </div>
                                @endif
                       
<br/>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-unique">
                                    <i class="fa fa-user-plus left"></i> Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
