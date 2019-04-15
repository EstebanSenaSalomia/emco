@extends('admin.plantilla.main')
@section('title',$terreno->nombre)
@section('marca2','active')
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
	    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Información</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Fotos</a>
	  </li>
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
	  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
	  	<div class="row">
	  	
	  		@foreach ($terreno->images as $image)
	  		<div class="col-sm-6 col-md-3 img">
	  			<span>
	  			<img style="width: 300px;  height: 200px;" src="/images/viabilidades/{{$image->name}}" alt="..." class="img-thumbnail">

	  			{!! Form::open(['route'=>['images.destroy',$image->id],'method'=>'DELETE']) !!}
					@if (Auth::User()->gestor() or Auth::User()->id == $image->user->id)
					<a href=""><div class="btn btn-outline-danger btn-lg btn_eliminar"><i class="fa fa-trash"></i></div></a>
					@endif
					<a class="btn btn-outline-dark btn-lg" data-toggle="modal" data-target="#exampleModalCenter{{$loop->index}}" data-toggle="tooltip" data-placement="bottom" title="zoom"><i class="fa fa-search-plus"></i></a> 
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
		  
		    <div class="form-group mx-sm-3 mb-2">
		     
		      {!!Form::file('image[]',['class'=>'form-control-file','multiple','id' => 'exampleFormControlFile1'])!!}
		      {!!Form::number('viabilidad_id',$terreno->id,['class'=>'form-control','form-control','hidden'])!!}
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