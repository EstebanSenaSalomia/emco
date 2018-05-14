@extends('admin.plantilla.main')
	@section('title','Crear Viabilidad')

@section('content')
	
	<div class="card text-center">
	  <div class="card-body">
		{!! Form::open(['action'=>'ViabilidadController@store','method'=>'POST'])!!}
		
		<div class="form-group row">
			{!! Form::label('name','Numero VB',['class'=>'col-sm-2 col-form-label'])!!}
			 <div class="col-sm-10">
				{!! Form::text('name',null,['class'=>'form-control','required'])!!}
			</div>
		</div>	
		
		<div class="form-group row">
			{!! Form::label('email','Nombre',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::email('email',null,['class'=>'form-control','required'])!!}
			</div>	
		</div>
		
		<div class="form-group row">
			{!! Form::label('password','Direccion',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::password('password',['class'=>'form-control','required'])!!}
			</div>	
		</div>

		<div class="form-group row">
			{!! Form::label('telefono','Usuario',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::text('telefono',null,['class'=>'form-control','required'])!!}
			</div>	
		</div>

		<div class="form-group row">
			{!! Form::label('type','tipo',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::select('type',['contratista'=>'Contratista','supervisor'=>'Supervisor','admin'=>'Administrador'],null,['placeholder' => 'Selecciona un tipo...','required','class'=>'custom-select']) !!}
			</div>
		</div>	
		<div class="text-center">
			{!!Form::submit('Guardar',['class'=>'btn btn-outline-success'])!!}
		</div>
		{!! Form::close() !!}
	</div>
	</div>

@endsection