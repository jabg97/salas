@extends('layouts.app')

@section('content')
  <div class="administrator-header" ></div>
    <div class="container free-bird">
        <div class="row">

<div class="card col-md-12 col-lg-12 col-sm-12 mx-auto float-xs-none white z-depth-5 hoverable py-2 px-2">
    <div class="card-block" >
      
 <div class="form-header red darken-3 z-depth-5 hoverable">
            <h3><i class="fa fa-info-circle"></i><strong> Informacion Equipo #{{ $equipo->id }} de {{ $sala->nombre }}</strong></h3>
        </div>
<center>

  <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
<ul class="list-group z-depth-4 hoverable">
<li class="list-group-item active dark-header z-depth-4 hoverable">
<i class="fa fa-desktop left lead"></i>&nbsp;<strong>Equipo #{{ $equipo->id }}</strong></li>
<a href="{{ URL::to('salas/' . $sala->id) }}" class="list-group-item"><strong>Sala: </strong>&nbsp; {{ $sala->nombre }}</a>
  <li class="list-group-item z-depth-4 hoverable"><strong>Procesador: </strong>&nbsp; {{ $equipo->tipo_procesador }}</li>
  <li class="list-group-item z-depth-4 hoverable"><strong>Memoria RAM: </strong>&nbsp; {{ $equipo->ram }} GB</li>
  <li class="list-group-item z-depth-4 hoverable"><strong>Disco Duro: </strong>&nbsp; {{ $equipo->hdd }} GB</li>
  <li class="list-group-item z-depth-4 hoverable"><strong>Monitor: </strong>&nbsp; {{ $equipo->monitor }}</li>
  <li class="list-group-item z-depth-4 hoverable"><strong>Fecha Mantenimiento: </strong>&nbsp; {{ $equipo->fecha_mantenimiento }}</li>
  <li class="list-group-item z-depth-4 hoverable"><strong>Observacion: </strong>&nbsp; {{ $equipo->observacion }}</li>
  <li class="list-group-item z-depth-4 hoverable">
  @if ($equipo->activo)
    <h1><span class="badge teal"><i class="fa fa-plug" aria-hidden="true"></i> Activo</span></h1>
@else
  <h1><span class="badge pink"><i class="fa fa-power-off" aria-hidden="true"></i> Inactivo</span></h1>
@endif
  </li>
  @if(Auth::user()->hasAnyRole(['ROLE_ADMINISTRADOR','ROLE_COORDINADOR']))
  <li class="list-group-item z-depth-4 hoverable">
         <a class="btn btn-unique waves-light hoverable" href="{{ URL::to('equipos/' . $equipo->id . '/edit') }}">Editar</a>
 {{ Form::open(array('url' => 'equipos/' . $equipo->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit("Eliminar", array('class' => 'btn btn-danger waves-effect hoverable')) }}
                {{ Form::close() }}
 
  </li>
  @endif
</ul>
</div>
</center>
  </div>
    </div>
    </div>
 </div>
@endsection
