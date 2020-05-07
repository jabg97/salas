@extends('layouts.app')

@section('content')

<div class="administrator-header" ></div>
    <div class="container free-bird">
        <div class="row">

<div class="card col-md-12 col-lg-12 col-sm-12 mx-auto float-xs-none white z-depth-5 hoverable py-2 px-2">
    <div class="card-block" >
      
 <div class="form-header red darken-3 z-depth-5 hoverable">
            <h3><i class="fa fa-university"></i><strong> Crear una Sala</strong></h3>
        </div>
<center>

  <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">

{{ Form::open(array('url' => 'salas')) }}

<div class="md-form">
        {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control validate')) }}
        {{ Form::label('nombre', 'Nombre', array('data-error' => 'Incorrecto','data-success' => 'Correcto')) }}
    </div>
    
    @if ($errors->has('nombre'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('nombre', ':message') }}
    </center></div>
    @endif
<br/>
     <div class="md-form">
        {{ Form::text('ubicacion', Input::old('ubicacion'), array('class' => 'form-control validate')) }}
        {{ Form::label('ubicacion', 'Ubicacion', array('data-error' => 'Incorrecto','data-success' => 'Correcto')) }}
    </div>
@if ($errors->has('ubicacion'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('ubicacion', ':message') }}
    </center></div>
    @endif
<br/>

     <div class="md-form">
        {{ Form::text('encargado', Input::old('encargado'), array('class' => 'form-control validate','title' => 'Solo letras','pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{1,50}")) }}
        {{ Form::label('encargado', 'Encargado', array('data-error' => 'Incorrecto','data-success' => 'Correcto')) }}
    </div>
@if ($errors->has('encargado'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('encargado', ':message') }}
    </center></div>
    @endif
<br/>


<div class="md-form">
        {{ Form::number('capacidad', Input::old('capacidad'), array('class' => 'form-control validate','title' => 'Ingrese Solo numeros','pattern' => '[0-9]')) }}
        {{ Form::label('capacidad', 'Capacidad', array('data-error' => 'Solo numeros','data-success' => 'Correcto')) }}
    </div>

    @if ($errors->has('capacidad'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('capacidad', ':message') }}
    </center></div>
    @endif
<br/>
    
<div class="form-group">
        {{ Form::label('estado', 'Estado') }}
        <br/>
        {{ Form::select('estado', array('1' => 'Disponible', '2' => 'Mantenimiento', '3' => 'En Clase', '4' => 'Cerrada'), Input::old('estado'), array('class' => 'form-control custom-select')) }}
    </div>
    @if ($errors->has('estado'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('estado', ':message') }}
    </center></div>
    @endif
<br/>



<div class="form-group">
{{ Form::label('videobeam', 'VideoBeam') }}
<br/>
        <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-success active">
        {{ Form::radio('videobeam','1', true) }} Si
  </label>
  <label class="btn btn-danger">
    {{ Form::radio('videobeam','0', false) }} No
  </label>
</div>
    </div>
    @if ($errors->has('videobeam'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('videobeam', ':message') }}
    </center></div>
    @endif
<br/>
 
    {{ Form::submit('Crear Sala', array('class' => 'btn btn-unique')) }}

{{ Form::close() }}

</div>
</center>
  </div>
    </div>
    </div>
</div>
@endsection