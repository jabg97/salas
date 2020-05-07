@extends('layouts.app')

@section('content')
  <div class="administrator-header" ></div>
    <div class="container free-bird">
        <div class="row">

<div class="card col-md-12 col-lg-12 col-sm-12 mx-auto float-xs-none white z-depth-5 hoverable py-2 px-2">
    <div class="card-block" >
      
 <div class="form-header red darken-3 z-depth-5 hoverable">
            <h3><i class="fa fa-home"></i><strong> Pagina Principal</strong></h3>
        </div>
 <center>
           

  
  <div class="row">
@if(Auth::user()->hasAnyRole(['ROLE_ADMINISTRADOR','ROLE_COORDINADOR']))
<div class="col-md-8 col-lg-8">
<div class="card z-depth-4 hoverable">
    <div class="card-header dark-header white-text z-depth-4 hoverable">
       <i class="fa fa-wrench left lead"></i><strong> Reporte Mantenimiento</strong>
    </div>
    <div class="card-block">
        <h5 class="card-title">Lista de Equipos activos con fecha de mantenimiento de mas de una semana.</h5>
@if (count($equipos) > 0)
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
        <a href="{{ URL::to('reportes/pdf/mantenimiento') }}" class="btn btn-lg  btn-unique waves-effect hoverable"><i class='fa fa-file-pdf-o left'></i> Reporte Pdf</a>  
        <a href="{{ URL::to('reportes/excel/mantenimiento') }}" class="btn btn-lg  btn-success waves-effect hoverable"><i class='fa fa-file-excel-o left'></i>  Reporte Excel</a>  
</div>
@else
 <div class='error alert bg-primary dark-header waves-light text-white z-depth-4 hoverable imenn'> <span style="color:white !important;" class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-info-circle left'></i>&nbsp;&nbsp;Informacion!</strong>
    No hay equipos que necesiten manteninimiento
    </center></div>
@endif

    </div>
</div>
</div>


  <div class="col-md-4 col-lg-4">
@endif

@if(Auth::user()->hasRole('ROLE_PROFESOR'))
<div class="col-md-1 col-lg-1"></div>
<div class="col-md-10 col-lg-10">
@endif

<div class="card z-depth-4 hoverable">
    <div class="card-header dark-header white-text z-depth-4 hoverable">
       <i class="fa fa-file-text-o left lead"></i><strong> Resumen del Sistema</strong>
    </div>
    <div class="card-block">
        <h5 class="card-title">Resumen de salas y equipos.</h5>
<ul class="list-group">

<li class="list-group-item">
 <h4><span class="badge teal"><i class="fa fa-plug" aria-hidden="true"></i> {{ $activo }} </span></h4>&nbsp; Equipos Activos

</li>

<li class="list-group-item">
 <h4><span class="badge pink"><i class="fa fa-power-off" aria-hidden="true"></i> {{ $inactivo }} </span></h4>&nbsp; Equipos Inactivos

</li>

<li class="list-group-item">
 <h4><span class="badge green"><i class="fa fa-check" aria-hidden="true"></i> {{ $cantidad_disponible }} </span></h4>&nbsp; Salas Disponibles

</li>
<li class="list-group-item">
 <h4><span class="badge blue-grey"><i class="fa fa-wrench" aria-hidden="true"></i> {{ $cantidad_mantenimiento }} </span></h4>&nbsp; Salas en Mantenimiento 

</li>
<li class="list-group-item">
 <h4><span class="badge indigo"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $cantidad_clase }} </span></h4>&nbsp; Salas en Clase

</li>
<li class="list-group-item">
 <h4><span class="badge red"><i class="fa fa-times" aria-hidden="true"></i> {{ $cantidad_cerrada }} </span></h4>&nbsp; Salas Cerradas

</li>


</ul>

    </div>
</div>
</div></div>

 </center>  

  
  </div>
    </div>
    </div>

@endsection

