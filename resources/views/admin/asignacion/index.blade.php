@extends('admin.plantilla.main')
	@section('title','Asignaciones')
	@section('marca4','active')
@section('content')
@if (Auth::User()->admin() or Auth::User()->gestor())
    {!! Form::open(['route'=>'asignacion.index','method'=>'GET'])!!}
    {{ csrf_field() }}
    <div class="card">
            <div class="card-header">
              Filtra por responsable de proyecto
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-10">
                        {!! Form::select('user_id',$users,null,['required','placeholder'=>'Selecciona una opción','class'=>'select-create card-text']) !!}
                        {!!Form::submit('buscar',['class'=>'btn btn-outline-primary'])!!}
                    </div>
                    {{-- <div class="col-sm-2">
                        <a type="button" class="btn btn-outline-info" href="{{route('viabilidad.asignacion.export','$user->id')}}">exportar</a>
                    </div> --}}
                      
               </div>       
            </div>
    </div>
    {!!Form::close()!!} 
@endif

@foreach($viabilidades as $viabilidad)
    {{-- {{$loop->iteration}} --}}
     <div class="list-group">
      <a href="{{route('terreno.index',['id'=>$viabilidad->id])}}" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">{{$viabilidad->nombre}}</h5>
          
            @if ($viabilidad->estado=="Terminada")
                <span id="color">Estado {{$viabilidad->estado}}</span></small>
            @else
                <small>Asignado {{$viabilidad->created_at->diffForHumans()}}<br>
                <span id="color2">Estado {{$viabilidad->estado}}</span></small>
            @endif
        </div>
        @php
            $year = $date->year;
            $month = $date->month;
            $day = $date->day;
            $fr_year = $viabilidad->fecha_reque->year;
            $fr_month = $viabilidad->fecha_reque->month;
            $fr_day = $viabilidad->fecha_reque->day;
            $restaday = $fr_day-$day;
            $restamonth = $fr_month-$month;
            $restayear = $fr_year-$year;
            $ultimodia = $ultimo->day;
            $lastDay = $ultimodia-$day;
            if($restayear>=1){
                $fr_month = $fr_month + $month;
                $restamonth = $fr_month-$month;
            }
            
            if($restamonth>=1){
                $fr_day = $fr_day + $day;
                $fr_day = $fr_day + $lastDay;
                $restaday = $fr_day-$day;
            }
            if($restaday>=1 and $restaday<3 and $restamonth<=1){
                $restantes = true;
            }else{
                $restantes = false;
            }
        @endphp
        @if($viabilidad->fecha_reque->lessThan($date) and $viabilidad->estado=="Activa")
            <p class="p-3 mb-1 bg-danger text-white">Requerida {{$viabilidad->fecha_reque->toFormattedDateString()}}</p>
            
        @elseif($viabilidad->fecha_reque->greaterThan($date) and $viabilidad->estado=="Activa" and !$restantes)
             <p class="p-3 mb-1 bg-success text-white">Requerida {{$viabilidad->fecha_reque->toFormattedDateString()}}</p>
             
        @elseif( ($viabilidad->estado=="Activa") or $viabilidad->fecha_reque->equalTo($date) and $restantes)
              <p class="p-3 mb-1 bg-warning text-white">Requerida {{$viabilidad->fecha_reque->toFormattedDateString()}}</p>   
        @else
             <p class="p-3 mb-1 bg-info text-white">Requerida {{$viabilidad->fecha_reque->toFormattedDateString()}}</p>
        @endif
      </a>
    </div>

      



@endforeach

<p>&nbsp</p>
<div class="mx-auto pagination justify-content-center" style="width: 200px";>
    {{$viabilidades->appends(Request::all())->render("pagination::simple-bootstrap-4")}}
</div>
	
@endsection