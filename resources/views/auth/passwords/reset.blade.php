@extends('admin/plantilla/main')
	<div id="bg-login">
	@section('title','Nueva contraseña')
	@section('content')
	<div class="container ">

	<h4 id="fuente" class="text-center">Ingresa tu nueva contraseña</h4>  
	<div class="card border-secondary mb-3 col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
	  <div class="card-body">

		{!! Form::open(['route'=>'password.send','method'=>'POST'])!!}
		{{ csrf_field() }}
		<div class="form-group">
		    {!! Form::label('email','E-mail')!!}
		    {!! Form::email('email',$email,['class'=>'form-control','required', 'placeholder'=>'Ingresa tu correo electronico'])!!}
		  </div>
		 

          {!! Form::text('token',$token,['hidden'])!!}
          
          <div class="form-group">
		    {!! Form::label('password','Contraseña')!!}
		    {!! Form::password('password',['class'=>'form-control','required','placeholder'=>'*******'])!!}
		  </div>
		 
          <div class="form-group">
		    {!! Form::label('password_conformation','Confirmar contraseña')!!}
		    {!! Form::password('password_confirmation',['class'=>'form-control','required','placeholder'=>'*******'])!!}
          </div>
        
		 <p>&nbsp</p>
		 <div class="text-center">
				{!!Form::submit('Cambiar contraseña',['class'=>'btn btn-outline-primary btn-block'])!!}
			</div>
			{!! Form::close() !!}
		</div>
		<img src="{{asset('recursos/images/logo.png')}}" class="rounded mx-auto d-block" alt="Cargando">
	</div>
	</div>
	</div>
@endsection
