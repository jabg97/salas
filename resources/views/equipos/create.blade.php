@extends('layouts.app')

@section('content')

<div class="administrator-header" ></div>
    <div class="container free-bird">
        <div class="row">

<div class="card col-md-12 col-lg-12 col-sm-12 mx-auto float-xs-none white z-depth-5 hoverable py-2 px-2">
    <div class="card-block" >
      
 <div class="form-header red darken-3 z-depth-5 hoverable">
            <h3><i class="fa fa-desktop"></i><strong> Crear un Equipo</strong></h3>
        </div>
<center>

  <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">

{{ Form::open(array('url' => 'equipos')) }}

<div class="md-form">
        {{ Form::number('ram', Input::old('ram'), array('class' => 'form-control validate','title' => 'Ingrese solo numeros','pattern' => '[0-9]')) }}
        {{ Form::label('ram', 'Memoria RAM (GB)', array('data-error' => 'Solo numeros','data-success' => 'Correcto')) }}
    </div>

    @if ($errors->has('ram'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('ram', ':message') }}
    </center></div>
    @endif
<br/>
    <div class="md-form">
        {{ Form::number('hdd', Input::old('hdd'), array('class' => 'form-control validate','title' => 'Ingrese solo numeros','pattern' => '[0-9]')) }}
        {{ Form::label('hdd', 'Disco Duro (GB)', array('data-error' => 'Solo numeros','data-success' => 'Correcto')) }}
    </div>

    @if ($errors->has('hdd'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('hdd', ':message') }}
    </center></div>
    @endif
<br/>
 <div class="md-form">
        {{ Form::text('so', Input::old('so'), array('class' => 'form-control validate')) }}
        {{ Form::label('so', 'Sistema Operativo', array('data-error' => 'Incorrecto','data-success' => 'Correcto')) }}
    </div>
    
    @if ($errors->has('so'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('so', ':message') }}
    </center></div>
    @endif
<br/>
     <div class="md-form">
        {{ Form::text('monitor', Input::old('monitor'), array('class' => 'form-control validate')) }}
        {{ Form::label('monitor', 'Monitor', array('data-error' => 'Incorrecto','data-success' => 'Correcto')) }}
    </div>
@if ($errors->has('monitor'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('monitor', ':message') }}
    </center></div>
    @endif
<br/>

<div class="md-form">
        {{ Form::textarea('observacion', Input::old('observacion'), array('class' => 'form-control validate md-textarea','size' => '30x5')) }}
        {{ Form::label('observacion', 'Observacion', array('data-error' => 'Incorrecto','data-success' => 'Correcto')) }}
    </div>

    @if ($errors->has('observacion'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('observacion', ':message') }}
    </center></div>
    @endif
    <br/>

<div class="form-group">
        {{ Form::label('sala', 'Sala') }}
        <br/>
        {{ Form::select('sala',$salas, Input::old('tipo_procesador'), array('class' => 'form-control custom-select')) }}
    </div>
 @if ($errors->has('sala'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('sala', ':message') }}
    </center></div>
    @endif
<br/>
    
<div class="form-group">
        {{ Form::label('tipo_procesador', 'Tipo de Procesador') }}
        <br/>
        {{ Form::select('tipo_procesador', array('1' => 'x86', '2' => 'x64', '3' => 'arm', '4' => 'arm64'), Input::old('tipo_procesador'), array('class' => 'form-control custom-select')) }}
    </div>
    @if ($errors->has('tipo_procesador'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('tipo_procesador', ':message') }}
    </center></div>
    @endif
<br/>

 <div class="form-group">
        {{ Form::label('fecha_mantenimiento', 'Fecha Mantenimiento') }}
        {{ Form::date('fecha_mantenimiento',\Carbon\Carbon::now(), array('class' => 'form-control validate')) }}
    </div>
@if ($errors->has('fecha_mantenimiento'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('fecha_mantenimiento', ':message') }}
    </center></div>
    @endif
<br/>


<div class="form-group">
{{ Form::label('activo', 'Activo') }}
<br/>
        <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-success active">
        {{ Form::radio('activo','1', true) }} Activo
  </label>
  <label class="btn btn-danger">
    {{ Form::radio('activo','0', false) }} Inactivo
  </label>
</div>
    </div>
    @if ($errors->has('activo'))
   <div class='error alert bg-danger waves-effect text-white z-depth-4 hoverable imenn'> <span  class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-times left'></i>&nbsp;&nbsp;Error!</strong>
    {{ $errors->first('activo', ':message') }}
    </center></div>
    @endif
<br/>
 
    {{ Form::submit('Crear Equipo', array('class' => 'btn btn-unique')) }}

{{ Form::close() }}

</div>
</center>
  </div>
    </div>
    </div>
</div>
@endsection