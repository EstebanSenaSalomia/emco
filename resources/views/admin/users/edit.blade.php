@extends('admin.plantilla.main')
	@section('title','Editar Usuario ')

@section('content')
	<div class="card text-center">
	  <div class="card-body">
		{!! Form::open(['route'=>['users.update',$user],'method'=>'PUT']) !!}
		
		<div class="form-group row">
			{!! Form::label('name','Nombre completo',['class'=>'col-sm-2 col-form-label'])!!}
			 <div class="col-sm-10">
				{!! Form::text('name',$user->name,['class'=>'form-control','required'])!!}
			</div>
		</div>	
		
		<div class="form-group row">
			{!! Form::label('email','E-mail',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::email('email',$user->email,['class'=>'form-control','required'])!!}
			</div>	
		</div>

		<div class="form-group row">
			{!! Form::label('cedula','Cedula',['class'=>'col-sm-2 col-form-label'])!!}
			 <div class="col-sm-10">
				{!! Form::text('cedula',$user->cedula,['class'=>'form-control','required'])!!}
			</div>
		</div>

		<div class="form-group row">
			{!! Form::label('telefono','Telefono',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::text('telefono',$user->telefono,['class'=>'form-control','required'])!!}
			</div>	
		</div>

		<div class="form-group row">
			{!! Form::label('type','tipo',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::select('type',['contratista'=>'Contratista','supervisor'=>'Supervisor','admin'=>'Administrador'],$user->type,['placeholder' => 'Selecciona un tipo...','required','class'=>'custom-select']) !!}
			</div>
		</div>	
		<div class="form-group row">
			{!! Form::label('empresa','empresa',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::select('empresa',['Emcomunitel'=>'Emcomunitel','HB'=>'HB','P Y P'=>'P Y P'],$user->empresa,['placeholder' => 'Selecciona la empresa a la cual pertence el usuario','required','class'=>'custom-select']) !!}
			</div>
		</div>
		<div class="text-center">
			{!!Form::submit('Guardar',['class'=>'btn btn-outline-success btn-lg'])!!}
		</div>
		{!! Form::close() !!}
	</div>
	</div>
@endsection