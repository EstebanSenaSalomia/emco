@extends('admin.plantilla.main')
@section('title',$terreno->nombre)
@section('marca2','active')

@section('content')
<hr>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Información</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Fotos</a>
	  </li>
	  
	</ul>
	<div class="tab-content" id="myTabContent">
	  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	  	<div>
	  	<ul class="list-group">
	  	  <li class="list-group-item disabled">Datos del proyecto</li>
	  	  <li class="list-group-item"><h5>Numero de Viabilidad: <b>{{$terreno->numero_vb}}</b></h5></li>
	  	  <li class="list-group-item"><h5>Numero de Presupuesto: <b>{{$terreno->numero_pre}}</b></h5></li>
	  	  <li class="list-group-item"><h5>Numero de Orden: <b>{{$terreno->numero_ot}}</b></h5></li>
	  	  <li class="list-group-item"><h5>Direccion: <b>{{$terreno->direccion}}</b></h5></li>
	  	  <li class="list-group-item"><h5>localidad: <b>{{$terreno->localidad}}</b></h5></li>
	  	  <li class="list-group-item"><h5>Red: <b>{{$terreno->red}}</b></h5></li>
	  	  <li class="list-group-item"><h5>Tipo de trabajo: <b>{{$terreno->tipo_trabajo}}</b></h5></li>
	  	  <li class="list-group-item"><h5>Responable: </h5></li>
	  	</ul>
	  	</div>
	  </div>
	  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
	  	<div class="row">
	  	<div class="col-sm-6 col-md-3">
	  		<img src="{{asset('recursos/images/logo.png')}}" alt="..." class="img-thumbnail">
	  	</div>
	  	<div class="col-sm-6 col-md-3"">
	  		<img src="{{asset('recursos/images/logo.png')}}" alt="..." class="img-thumbnail">
	  	</div>
	  	<div class="col-sm-6 col-md-3"">
	  		<img src="{{asset('recursos/images/logo.png')}}" alt="..." class="img-thumbnail">
	  	</div>
	  	<div class="col-sm-6 col-md-3"">
	  		<img src="{{asset('recursos/images/logo.png')}}" alt="..." class="img-thumbnail">
	  	</div>
	  	<div class="col-sm-6 col-md-3"">
	  		<img src="{{asset('recursos/images/logo.png')}}" alt="..." class="img-thumbnail">
	  	</div>
	  	</div>
	  {!!Form::open(['route'=>'frontController.store','method'=>'POST','files'=>true])!!}
		  	<div class="form-group">
		  	    <label for="exampleFormControlFile1">Ingresar imagen</label>
		  	    <input type="file" class="form-control-file" id="exampleFormControlFile1">
		  	</div>
		  </div>
		</div>
	  {!!Form::close()!!}
	<div class="row">
		<div class="col-sm-12">
			@include('front.comentarios')
		</div>
	</div>
@endsection
