@extends('admin.plantilla.main')
@section('title',$viabilidades->nombre)
@section('content')
<div class="alert alert-info alert-dismissible fade show" id="alert" role="alert">
   Imagen eliminada correctamente
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@if (Auth::User()->admin() or Auth::User()->gestor())
    <div class="card col-sm-2">
    	<a href="{{route('viabilidad.edit',$terreno->id)}}" class="btn btn-outline-info btn-block">Editar</a>
    </div>
@endif

<hr>

	<ul class="nav nav-tabs" id="myTab" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Datos del proyecto</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Archivos</a>
	  </li>
<<<<<<< HEAD
	  @if (Auth::User()->admin() or Auth::User()->gestor())
		   <li class="nav-item">
		    <a class="nav-link " id="editar-tab" data-toggle="tab" href="#editar" role="tab" aria-controls="editar" aria-selected="false">Editar</a>
		  </li>
	  @endif	  
	</ul>
	<div class="tab-content" id="myTabContent">

	<div class="tab-pane fade" id="editar" role="tabpanel" aria-labelledby="editar-tab">
		@include('admin.viabilidad.edit',[''=>'$terreno->id'])
	</div>	
	  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	  	<div>

	  	<ul class="list-group">
	  	  <li class="list-group-item disabled">Datos del proyecto</li>
	  	  <li class="list-group-item"><h5>Fecha requerida: <b>{{$terreno->fecha_reque->toFormattedDateString()}}</b></h5></li>
	  	  <li class="list-group-item"><h5>Numero de Viabilidad: <b>{{$terreno->numero_vb}}</b></h5></li>
	  	  <li class="list-group-item"><h5>Numero de Presupuesto: <b>{{$terreno->numero_pre}}</b></h5></li>
	  	  <li class="list-group-item"><h5>Numero de Orden: <b>{{$terreno->numero_ot}}</b></h5></li>
	  	  <li class="list-group-item"><h5>Direccion: <b>{{$terreno->direccion}}</b></h5></li>
	  	  <li class="list-group-item"><h5>localidad: <b>{{$terreno->localidad}}</b></h5></li>
	  	  <li class="list-group-item"><h5>Red: <b>{{$terreno->red}}</b></h5></li>
	  	  <li class="list-group-item"><h5>Tipo de trabajo: <b>{{$terreno->tipo_trabajo}}</b></h5></li>
	  	  <li class="list-group-item"><h5>Responable: <b>{{$terreno->user->name}}</b></h5></li>
	  	</ul>
	  	</div>
	  </div>
	  <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
			hola
	  </div>
=======
	 
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
							<li class="list-group-item"><h5>Area: <b>{{$viabilidades->area}}</b></h5></li>
							<li class="list-group-item"><h5>Contacto: <b>{{$viabilidades->contacto}}</b></h5></li>
							<li class="list-group-item"><h5>Numero contacto: <b>{{$viabilidades->contacto_num}}</b></h5></li>
							@foreach($users as $user)
								<li class="list-group-item"><h5>Responable {{$loop->iteration}}: <b>{{$user}}</b></h5></li>
							@endforeach
							
						</ul>	

					</div>

				</div>
	 <p>&nbsp</p>
			@if (Auth::User()->gestor())
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
>>>>>>> 2df378eac9d47a4696da71a1304ebee78a1aa496
	  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
	  	<div class="row">
	  		@foreach ($viabilidades->images as $image)
	  		<div class="col-sm-12 col-md-2 img">
	  			<span>
	  			@if(strcmp($image->extension, "xlsx") === 0 or strcmp($image->extension, "xls") === 0)

	  				<img style="width: 100px;  height: 100px;" src="/images/viabilidades/xcel.png" alt="..." class="img-thumbnail">

	  			@elseif(strcmp($image->extension, "pdf") === 0)	

	  				<img style="width: 100px;  height: 100px;" src="/images/viabilidades/pdf.png" alt="..." class="img-thumbnail">

	  			@elseif(strcmp($image->extension, "docx") === 0 or strcmp($image->extension, "doc") === 0)	

	  				<img style="width: 100px;  height: 100px;" src="/images/viabilidades/word.png" alt="..." class="img-thumbnail">	

	  			@elseif(strcmp($image->extension, "rar") === 0 or strcmp($image->extension, "zip") === 0)	

	  				<img style="width: 100px;  height: 100px;" src="/images/viabilidades/zip.jpg" alt="..." class="img-thumbnail">	

	  			@else 
	  				<img style="width: 100px;  height: 100px;" src="/images/viabilidades/{{$image->name}}" alt="..." class="img-thumbnail">			

	  			@endif	
	  			
					{!! Form::open(['route'=>['images.destroy',$image->id],'method'=>'DELETE']) !!}
					{{ csrf_field() }}
					@if (Auth::User()->gestor() or Auth::User()->id == $image->user->id)
					<a href=""><div class="btn btn-outline-danger btn-sm btn_eliminar"><i class="fa fa-trash"></i></div></a>
					@endif
					<a href=" {{route('image.download',$image->id)}} "><div class="btn btn-outline-primary btn-sm"><i class="fa fa-download"></i></div></a>
					<a class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$loop->index}}" data-toggle="tooltip" data-placement="bottom" title="zoom"><i class="fa fa-search-plus"></i></a> 
					<small><strong>{{$image->created_at->toDateString()}}</strong></small>
	  			{!!Form::close()!!}
				</span>
	  		</div>

	  		<div class="modal fade" id="exampleModalCenter{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  		  <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
	  		    <div class="modal-content">
	  		      <div class="modal-header">
	  		      	<h4 class="modal-title" id="exampleModalLongTitle">{{$image->viabilidad->nombre}}</h4>
	  		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  		          <span aria-hidden="true">&times;</span>
	  		        </button>
	  		      </div>
	  		      <div class="modal-body">
	  		      	<ul>
	  		      		<li>Cargado: {{$image->user->name}}</li>
	  		      		<li>Fecha: {{$image->created_at->toDateString()}}</li>
	  		      		<li>Hora:  {{$image->created_at->toTimeString()}}</li>
	  		      		<li>Nombre Archivo:  {{$image->name}}</li>
	  		      	</ul>
	  		      	<div class="text-center">
	  		        @if(strcmp($image->extension, "xlsx") === 0 or strcmp($image->extension, "xls") === 0)

    	  				<img style="width: 200px;  height: 200px;" src="/images/viabilidades/xcel.png" alt="..." class="img-thumbnail">

    	  			@elseif(strcmp($image->extension, "pdf") === 0)	

    	  				<img style="width: 200px;  height: 200px;" src="/images/viabilidades/pdf.png" alt="..." class="img-thumbnail">

    	  			@elseif(strcmp($image->extension, "docx") === 0 or strcmp($image->extension, "doc") === 0)	

    	  				<img style="width: 200px;  height: 200px;" src="/images/viabilidades/word.png" alt="..." class="img-thumbnail">	

    	  			@elseif(strcmp($image->extension, "rar") === 0 or strcmp($image->extension, "zip") === 0)	

    	  				<img style="width: 200px;  height: 200px;" src="/images/viabilidades/zip.jpg" alt="..." class="img-thumbnail">		

    	  			@else 

    	  				<img  src="/images/viabilidades/{{$image->name}}" alt="..." class="img-thumbnail">

    	  			@endif
    	  			</div>	
	  		      </div>
	  		      <div class="modal-footer">
	  		      	<a href=" {{route('image.download',$image->id)}} "><div class="btn btn-outline-primary btn-sm" ><i class="fa fa-download"></i></div></a>
	  		        
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
		     {!!Form::close()!!}
		     <small>Tamaño maximo de archivo 5mb</small>
		</div>

		 
		 
	<div class="row">
		<div class="col-sm-12">
			@include('front.comentarios')
		</div>
	</div>
@endsection
{{-- hay que tratar de hacer el include de la vista editar 
como hacer el include apropiado? --}}