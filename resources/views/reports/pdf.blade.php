@extends('layouts.pdf')

@section('content')

 @if ($sala)
<h3 class="text-danger"><strong> Equipos de {{ $sala->nombre }}</strong></h3> 
@else
<h3 class="text-primary"><strong> Mantenimiento {{\Carbon\Carbon::now()->format('Y-m-d')}}</strong></h3>
@endif
<br>
               <div class="table-responsive table-hover table-striped">
<table class="table">
    <thead class="dark-header">
        <tr>
            <th>#</th>
            <th>Sistema Operativo</th>
            <th>Fecha Mantenimiento</th>
            <th>Dias</th>
            <th>Activo</th>        
        </tr>
    </thead>
    <tbody>
    @foreach($equipos as $key => $value)
        <tr>
            <th>{{ $value->id }}</th>
            <td>{{ $value->so }}</td> 
            <td>{{ $value->fecha_mantenimiento }}</td>
            <td>{{ Carbon\Carbon::parse($value->fecha_mantenimiento)->diffForHumans() }}</td>
            <td>
             @if ($value->activo)
    <h4><span class="badge teal">Activo</span></h4>
@else
  <h4><span class="badge pink">Inactivo</span></h4>
@endif
            </td>                    
        </tr>
    @endforeach
    </tbody>
</table>
</div>

@endsection
