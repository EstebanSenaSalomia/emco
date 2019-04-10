@extends('admin.plantilla.main')
	@section('title','Asignaciones')
	@section('marca4','active')
@section('content')

@foreach($viabilidades as $viabilidad)
  @if ($viabilidad->estado=='Activa' and $viabilidad->user_id==Auth::user()->id or (Auth::User()->type != 'supervisor'))
    
     <div class="list-group">
      <a href="{{route('terreno.index',['id'=>$viabilidad->id])}}" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">{{$viabilidad->nombre}}</h5>
          <small>Asignado {{$viabilidad->created_at->diffForHumans()}}<br>
            @if ($viabilidad->estado=="Terminada")
                <span id="color">Estado {{$viabilidad->estado}}</span></small>
            @else
                <span id="color2">Estado {{$viabilidad->estado}}</span></small>
            @endif
          
        </div>
        <p class="mb-1">Requerida {{$viabilidad->fecha_reque->toFormattedDateString()}}</small>
      </a>
    </div>
      
  @endif

@endforeach
	
@endsection