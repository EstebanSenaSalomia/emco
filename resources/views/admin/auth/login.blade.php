@extends('admin/plantilla/main')
@section('title','Login')

@section('content')
	
	<div class="card text-center">
	  <div class="card-body">
		{!! Form::open(['route'=>'admin.auth.login','method'=>'POST'])!!}
	
		<div class="form-group row">
			{!! Form::label('email','E-mail',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::email('email',null,['class'=>'form-control','required'])!!}
			</div>	
		</div>
		
		<div class="form-group row">
			{!! Form::label('password','Contraseña',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::password('password',['class'=>'form-control','required'])!!}
			</div>	
		</div>

		<div class="text-center">
			{!!Form::submit('Ingresar',['class'=>'btn btn-outline-primary'])!!}
		</div>
		{!! Form::close() !!}
	</div>
	</div>

@endsection

