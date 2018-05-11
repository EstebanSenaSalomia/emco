@extends('admin/plantilla/main')
<div id="bg-login">
@section('title','Inicio de sesión')
@section('content')
<div class="container ">

<h4 id="fuente" class="text-center">Inicio de sesión</h4>  
<div class="card border-secondary mb-3 col-sm-12 col-md-8 offset-md-2">
  <div class="card-body">

	{!! Form::open(['route'=>'admin.auth.login','method'=>'POST'])!!}
	<div class="form-group">
	    {!! Form::label('email','E-mail')!!}
	    {!! Form::email('email',null,['class'=>'form-control','required', 'placeholder'=>'Ingresa tu email'])!!}
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
	<img src="{{asset('recursos/images/logo_emco.jpg')}}" class="img-thumbnail" alt="Responsive image">
</div>
</div>
</div>

@endsection


