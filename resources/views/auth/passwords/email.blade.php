@extends('admin/plantilla/main')
	<div id="bg-login">
	@section('title','Solicitud contraseña')
	@section('content')
	<div class="container ">

	@if (session('status'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>ATENCIÓN!</strong>
			<li>{{ session('status') }}</li> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif

	<h4 id="fuente" class="text-center">Solicitud<br> cambio de contraseña</h4>  
	<div class="card border-secondary mb-3 col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
	  <div class="card-body">

		{!! Form::open(['route'=>'password.email','method'=>'POST'])!!}
		{{ csrf_field() }}
		<div class="form-group">
		    {!! Form::label('email','E-mail')!!}
		    {!! Form::email('email',null,['class'=>'form-control','required', 'placeholder'=>'Ingresa tu correo electronico'])!!}
		  </div>
		 <p>&nbsp</p>
		 <div class="text-center">
				{!!Form::submit('Solicitar',['class'=>'btn btn-outline-primary btn-block'])!!}
			</div>
			{!! Form::close() !!}
		</div>
		<img src="{{asset('recursos/images/logo.png')}}" class="rounded mx-auto d-block" alt="Cargando">
	</div>
	</div>
	</div>
@endsection
