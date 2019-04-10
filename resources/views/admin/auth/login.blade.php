@extends('admin/plantilla/main')
	<div id="bg-login">
	@section('title','Inicio de sesión')
	@section('content')
	<div class="container ">

	<h4 id="fuente" class="text-center">Inicio de sesión</h4>  
	<div class="card border-secondary mb-3 col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
	  <div class="card-body">

		{!! Form::open(['route'=>'admin.auth.login','method'=>'POST'])!!}
		{{ csrf_field() }}
		<div class="form-group">
		    {!! Form::label('cedula','Usuario')!!}
		    {!! Form::text('cedula',null,['class'=>'form-control','required', 'placeholder'=>'Ingresa tu cedula'])!!}
		  </div>
		  <div class="form-group">
		    {!! Form::label('password','Contraseña')!!}
		    {!! Form::password('password',['class'=>'form-control','required','placeholder'=>'*******'])!!}
		  </div>
		 <p>&nbsp</p>
		 <div class="text-center">
				{!!Form::submit('Ingresar',['class'=>'btn btn-outline-primary btn-block'])!!}
			</div>
			{!! Form::close() !!}
		</div>
	<a class="dropdown-item" href="{{route('password.cambio')}}">¿Olvidaste la contraseña?</a>
		<img src="{{asset('recursos/images/logo.png')}}" width="190" height="200" class="rounded mx-auto d-block" alt="Cargando">
	</div>
	
	</div>
	</div>
@endsection

