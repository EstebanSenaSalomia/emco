@extends('admin.plantilla.main')
@section('title',$viabilidades->nombre)
@section('marca2','active')
@section('content')
<div class="alert alert-info alert-dismissible fade show" id="alert" role="alert">
   Imagen eliminada correctamente
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

	<ul class="nav nav-tabs" id="myTab" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Datos del proyecto</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Fotos</a>
	  </li>	  
	</ul>
	<div class="tab-content" id="myTabContent">
	
	  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	  	<div>
				@php
            	$year = $date->year;
            	$month = $date->month;
				$day = $date->day;
				$fr_year = $viabilidades->fecha_reque->year;
				$fr_month = $viabilidades->fecha_reque->month;
				$fr_day = $viabilidades->fecha_reque->day;
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
				<div class="row">
					
					<div class="col-md-6">
						<ul class="list-group">
							
							@if($viabilidades->fecha_reque->lessThan($date) and $viabilidades->estado=="Activa")
							<li class="list-group-item text-danger"><h5>Fecha requerida: <b>{{$viabilidades->fecha_reque->toFormattedDateString()}}</b></h5></li>
					         
							@elseif($viabilidades->fecha_reque->greaterThan($date) and $viabilidades->estado=="Activa" and !$restantes)
							<li class="list-group-item text-success"><h5>Fecha requerida: <b>{{$viabilidades->fecha_reque->toFormattedDateString()}}</b></h5></li>
								
							@elseif( ($viabilidades->estado=="Activa") or $viabilidades->fecha_reque->equalTo($date) and $restantes)
							<li class="list-group-item text-warning"><h5>Fecha requerida: <b>{{$viabilidades->fecha_reque->toFormattedDateString()}}</b></h5></li>   
							@else
							<li class="list-group-item text-info"><h5>Fecha requerida: <b>{{$viabilidades->fecha_reque->toFormattedDateString()}}</b></h5></li>
							@endif
					  	  <li class="list-group-item"><h5>Numero de Viabilidad: <b>{{$viabilidades->numero_vb}}</b></h5></li>
					  	  <li class="list-group-item"><h5>Numero de Presupuesto: <b>{{$viabilidades->numero_pre}}</b></h5></li>
					  	  <li class="list-group-item"><h5>Numero de Orden: <b>{{$viabilidades->numero_ot}}</b></h5></li>
					  	  <li class="list-group-item"><h5>Direccion: <b>{{$viabilidades->direccion}}</b></h5></li>
					  	  <li class="list-group-item"><h5>localidad: <b>{{$viabilidades->localidad}}</b></h5></li>
						</ul>	

					</div>
					<div class="col-md-6">
						<ul class="list-group">
							
							<li class="list-group-item"><h5>Red: <b>{{$viabilidades->red}}</b></h5></li>
							<li class="list-group-item"><h5>Tipo de trabajo: <b>{{$viabilidades->tipo_trabajo}}</b></h5></li>
							<li class="list-group-item"><h5>Contacto: <b>{{$viabilidades->contacto}}</b></h5></li>
							<li class="list-group-item"><h5>Numero contacto: <b>{{$viabilidades->contacto_num}}</b></h5></li>
							<li class="list-group-item"><h5>Responable: <b>{{$viabilidades->user->name}}</b></h5></li>
						</ul>	

					</div>

				</div>
	 <p>&nbsp</p>
			@if (Auth::User()->admin() or Auth::User()->gestor())
			<div class="row mx-auto">
				<div class="card col-sm-4 col-md-1">
					<a href="{{route('viabilidad.edit',$viabilidades->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-outline-dark"><i class="fa fa-edit"></i></a>
				</div>
				<div class="card col-sm-4 col-md-1">
					<a href="{{route('admin.viabilidad.destroy',$viabilidades->id)}}" data-toggle="tooltip" data-placement="top" title="Terminar" onclick="return confirm('¿Estas seguro de terminar este proyecto?')" class="btn btn-outline-success"><i class="fa fa-calendar-check"></i></a>
				</div>
				<div class="card col-sm-4 col-md-1">
					<a href="{{route('admin.viabilidad.eliminar',$viabilidades->id)}}" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="return confirm('¿Estas seguro de eliminar este proyecto?')" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
				</div>
			</div>
			
	    @endif
	  	</div>
		</div> 
	  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
	  	<div class="row">
	  	
	  		@foreach ($viabilidades->images as $image)
	  		<div class="col-sm-6 col-md-2 img">
	  			<span>
	  			<img style="width: 200px;  height: 100px;" src="/images/viabilidades/{{$image->name}}" alt="..." class="img-thumbnail">

					{!! Form::open(['route'=>['images.destroy',$image->id],'method'=>'DELETE']) !!}
					{{ csrf_field() }}
					@if (Auth::User()->gestor() or Auth::User()->id == $image->user->id)
					<a href=""><div class="btn btn-outline-danger btn-sm btn_eliminar"><i class="fa fa-trash"></i></div></a>
					@endif
					<a class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$loop->index}}" data-toggle="tooltip" data-placement="bottom" title="zoom"><i class="fa fa-search-plus"></i></a> 
	  			{!!Form::close()!!}
				</span>
	  		</div>
	  		<div class="modal fade" id="exampleModalCenter{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  		  <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
	  		    <div class="modal-content">
	  		      <div class="modal-header">
	  		      	<h4 class="modal-title" id="exampleModalLongTitle">Cargado por: {{$image->user->name}}</h4>
	  		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  		          <span aria-hidden="true">&times;</span>
	  		        </button>
	  		      </div>
	  		      <div class="modal-body">
	  		      	{{$image->created_at->diffForHumans()}}
	  		        <img src="/images/viabilidades/{{$image->name}}" alt="..." class="img-thumbnail">
	  		      </div>
	  		      <div class="modal-footer">
	  		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	  		      </div>
	  		    </div>
	  		  </div>
	  		</div>	
	  		@endforeach
	  		
			</div>
			
	  	<hr>
	   {!!Form::open(['action'=>'ImageController@store','method'=>'POST','files'=>true,'class'=>'form-inline'])!!} 
		 {{ csrf_field() }}
		    <div class="form-group mx-sm-3 mb-2">
		     
		      {!!Form::file('image[]',['class'=>'form-control-file','multiple','id' => 'exampleFormControlFile1'])!!}
		      {!!Form::number('viabilidad_id',$viabilidades->id,['class'=>'form-control','form-control','hidden'])!!}
		    </div>
		     {!!Form::submit('Subir',['class'=>'btn btn-outline-primary'])!!}
		</div>
		 {!!Form::close()!!} 
		 
	<div class="row">
		<div class="col-sm-12">
			@include('front.comentarios')
		</div>
	</div>
@endsection
{{-- hay que tratar de hacer el include de la vista editar 
como hacer el include apropiado? --}}