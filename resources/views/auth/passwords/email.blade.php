@extends('layouts.app')

@section('content')
  <div class="password-header" ></div>
    <div class="container free-bird">
        <div class="row">

<div class="card col-md-12 col-lg-12 col-sm-12 mx-auto float-xs-none white z-depth-5 hoverable py-2 px-2">
    <div class="card-block" >
      
 <div class="form-header red darken-3 z-depth-5 hoverable">
            <h3><i class="fa fa-unlock"></i><strong> Reiniciar Contraseña</strong></h3>
        </div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class='error alert bg-primary dark-header waves-light text-white z-depth-4 hoverable imenn'> <span style="color:white !important;" class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-info-circle left'></i>&nbsp;&nbsp;Informacion!</strong>
                            {{ session('status') }}
                       </center></div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                                 <div class="md-form">
                            <i class="fa fa-envelope prefix"></i>
                                <input id="email" type="email" class="form-control validate" name="email"  value="{{ old('email') }}" required autofocus>
                      <label for="email" data-success"Correcto" data-error"Email Invalido">E-Mail</label>   
                            </div>
                            @if ($errors->has('email'))
                                     <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
                                      {{ $errors->first('email', ':message') }}
                                    </center></div>
                                @endif
                       
<br/>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                               <button type="submit" class="btn btn-unique">
                                    <i class="fa fa-send left"></i> Enviar
                                </button>
                            </div>
                        </div>
                      
                    </form>
        </div>
    </div>
</div>
@endsection
