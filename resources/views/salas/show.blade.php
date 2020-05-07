@extends('layouts.app')

@section('content')
  <div class="administrator-header" ></div>
    <div class="container free-bird">
        <div class="row">

<div class="card col-md-12 col-lg-12 col-sm-12 mx-auto float-xs-none white z-depth-5 hoverable py-2 px-2">
    <div class="card-block" >
      
 <div class="form-header red darken-3 z-depth-5 hoverable">
            <h3><i class="fa fa-info-circle"></i><strong> Informacion Sala #{{ $sala->id }}</strong></h3>
        </div>
<center>
  <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
<ul class="list-group z-depth-4 hoverable">
<li class="list-group-item active dark-header z-depth-4 hoverable">
 <i class="fa fa-university left lead"></i>&nbsp;<strong>Sala #{{ $sala->id }}</strong></li>
<li class="list-group-item z-depth-4 hoverable"><strong>Nombre: </strong>&nbsp; {{ $sala->nombre }}</li>
  <li class="list-group-item z-depth-4 hoverable"><strong>Ubicacion: </strong>&nbsp; {{ $sala->ubicacion }}</li>
  <li class="list-group-item z-depth-4 hoverable"><strong>Encargado: </strong>&nbsp; {{ $sala->encargado }}</li>
  <li class="list-group-item z-depth-4 hoverable"><strong>Capacidad: </strong>&nbsp; {{ $sala->capacidad }}</li>
  <li class="list-group-item z-depth-4 hoverable">
  <strong>VideoBeam: </strong>&nbsp;
   @if ($sala->videobeam)
    <span class="badge teal"><i class="fa fa-check" aria-hidden="true"></i> Si</span>
@else
  <span class="badge pink"><i class="fa fa-times" aria-hidden="true"></i> No</span>
@endif
  </li>
  <li class="list-group-item z-depth-4 hoverable">
  @if ($sala->estado == "disponible")
        <h1><span class="badge green"><i class="fa fa-check" aria-hidden="true"></i> Disponible</span></h1>
    @elseif ($sala->estado == "mantenimiento")
        <h1><span class="badge blue-grey"><i class="fa fa-wrench" aria-hidden="true"></i> Mantenimiento</span></h1>
    @elseif ($sala->estado == "en clase")
        <h1><span class="badge indigo"><i class="fa fa-clock-o" aria-hidden="true"></i> En clase</span></h1>
    @else
        <h1><span class="badge red"><i class="fa fa-times" aria-hidden="true"></i> Cerrada</span></h1>
@endif
  </li>
  @if(Auth::user()->hasAnyRole(['ROLE_ADMINISTRADOR','ROLE_COORDINADOR']))
  <li class="list-group-item z-depth-4 hoverable">
         <a class="btn btn-unique waves-light hoverable" href="{{ URL::to('salas/' . $sala->id . '/edit') }}">Editar</a>
 
      @if (count($equipos) > 0) 
         <button  class="disabled btn btn-danger waves-effect hoverable"
         data-toggle="tooltip" data-placement="bottom" title="No se puede eliminar salas que tengan equipos">Eliminar</button>
                @else
 {{ Form::open(array('url' => 'salas/' . $sala->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit("Eliminar", array('class' => 'btn btn-danger waves-effect hoverable')) }}
                {{ Form::close() }}
                @endif
 
  </li>
   @endif
</ul>

  <br/><br/>
      @if (count($equipos) > 0)
  <div class="row">
  <div class="col-md-12 col-lg-12">
<div class="card z-depth-4 hoverable">
    <div class="card-header dark-header white-text z-depth-4 hoverable">
       <i class="fa fa-desktop left lead"></i><strong> Equipos {{ $sala->nombre }}</strong>
    </div>
    <div class="card-block">
        <h5 class="card-title">lista de equipos de {{ $sala->nombre }}.</h5>

  <div class="table-responsive table-hover table-striped">
<table class="table">
    <thead class="dark-header">
        <tr>
            <td>#</td>
            <td>Sistema Operativo</td>
            <td>Fecha Mantenimiento</td>
            <td>Dias</td>
            <td>Activo</td>        
            <td>Info</td>
        </tr>
    </thead>
    <tbody>
    @foreach($equipos as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->so }}</td> 
            <td>{{ $value->fecha_mantenimiento }}</td>
            <td>{{ Carbon\Carbon::parse($value->fecha_mantenimiento)->diffForHumans() }}</td>
            <td>
             @if ($value->activo)
    <h4><span class="badge teal"><i class="fa fa-plug" aria-hidden="true"></i> Activo</span></h4>
@else
  <h4><span class="badge pink"><i class="fa fa-power-off" aria-hidden="true"></i> Inactivo</span></h4>
@endif
            </td>                    
            <td>
                <a class="btn btn-unique btn-sm waves-effect hoverable" href="{{ URL::to('equipos/' . $value->id) }}"><i class='fa fa-info-circle left'></i> Info</a>               
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
<div class="div_insert">
        <a href="{{ URL::to('reportes/pdf/sala/'.$sala->id) }}" class="btn btn-lg  btn-unique waves-effect hoverable"><i class='fa fa-file-pdf-o left'></i> Reporte Pdf</a>  
        <a href="{{ URL::to('reportes/excel/sala/'.$sala->id) }}" class="btn btn-lg  btn-success waves-effect hoverable"><i class='fa fa-file-excel-o left'></i>  Reporte Excel</a>  
</div>
    </div>
</div>
</div></div>
@else
<div class='error alert bg-primary dark-header waves-light text-white z-depth-4 hoverable imenn'> <span style="color:white !important;" class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-info-circle left'></i>&nbsp;&nbsp;Informacion!</strong>
    {{ $sala->nombre }} no tiene equipos
    </center></div>
@endif
</div>
</center>
  </div>
    </div>
    </div>
 </div>
@endsection
