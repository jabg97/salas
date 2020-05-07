@extends('layouts.app')

@section('content')
  <div class="administrator-header" ></div>
    <div class="container free-bird">
        <div class="row">

<div class="card col-md-12 col-lg-12 col-sm-12 mx-auto float-xs-none white z-depth-5 hoverable py-2 px-2">
    <div class="card-block" >
      
 <div class="form-header red darken-3 z-depth-5 hoverable">
            <h3><i class="fa fa-university"></i><strong> Lista de Salas</strong></h3>
        </div>
<center>

  <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
@if (Session::has('message'))
<div class='error alert bg-primary dark-header waves-light text-white z-depth-4 hoverable imenn'> <span style="color:white !important;" class="close" data-dismiss="alert" aria-label="close">&times;</span><center><strong> <i class='fa fa-1x fa-info-circle left'></i>&nbsp;&nbsp;Informacion!</strong>
    {{ Session::get('message') }}
     </center></div>
@endif

<div class="table-responsive table-hover table-striped">
<table class="table">
    <thead class="dark-header">
        <tr>
            <td>#</td>
            <td>Nombre</td>
            <td>Estado</td>        
            <td>Info</td>
        </tr>
    </thead>
    <tbody>
    
    @foreach($salas as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nombre }}</td>
            <td>

 @if ($value->estado == "disponible")
        <h4><span class="badge green"><i class="fa fa-check" aria-hidden="true"></i> Disponible</span></h4>
    @elseif ($value->estado == "mantenimiento")
        <h4><span class="badge blue-grey"><i class="fa fa-wrench" aria-hidden="true"></i> Mantenimiento</span></h4>
    @elseif ($value->estado == "en clase")
        <h4><span class="badge indigo"><i class="fa fa-clock-o" aria-hidden="true"></i> En clase</span></h4>
    @else
        <h4><span class="badge red"><i class="fa fa-times" aria-hidden="true"></i> Cerrada</span></h4>
@endif
            </td>                    
            <td>
                <a class="btn btn-unique btn-sm waves-effect hoverable" href="{{ URL::to('salas/' . $value->id) }}"><i class='fa fa-info-circle left'></i> Info</a>               
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $salas->links() !!}
</div>

  @if(Auth::user()->hasAnyRole(['ROLE_ADMINISTRADOR','ROLE_COORDINADOR']))
<br/><br/>

  
  <div class="row">


  <div class="col-md-12 col-lg-12">
<div class="card z-depth-4 hoverable">
    <div class="card-header bg-success white-text z-depth-4 hoverable">
       <i class="fa fa-plus left lead"></i><strong> Registrar Sala</strong>
    </div>
    <div class="card-block">
        <h5 class="card-title">Ingresar los datos para registrar una nueva sala.</h5>

  <div class="div_insert">
        <a href="{{ URL::to('salas/create') }}" class="btn btn-lg  btn-success waves-effect hoverable"><i class='fa fa-plus left'></i> Registrar</a>  
</div>
    </div>
</div>
</div></div>
@endif
</div>
</center>
  </div>
    </div>
    </div>

@endsection