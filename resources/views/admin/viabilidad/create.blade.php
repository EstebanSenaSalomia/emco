@extends('admin.plantilla.main')
	@section('title','Crear Viabilidad')

@section('content')
	
	<div class="card text-center">
	  <div class="card-body">
		{!! Form::open(['action'=>'ViabilidadController@store','method'=>'POST'])!!}
		
		<div class="form-group row">
			{!! Form::label('numero','Numero VB',['class'=>'col-sm-2 col-form-label'])!!}
			 <div class="col-sm-10">
				{!! Form::text('numero','VB-',['class'=>'form-control','required'])!!}
			</div>
		</div>	
		
		<div class="form-group row">
			{!! Form::label('nombre','Nombre',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::text('nombre',null,['class'=>'form-control','required'])!!}
			</div>	
		</div>
		
		<div class="form-group row">
			{!! Form::label('direccion','Direccion',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::text('direccion',null,['class'=>'form-control','required'])!!}
			</div>
		</div>

		<div class="form-group row">
			{!! Form::label('red','Red',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::select('red',['fibra'=>'Fibra','cobre'=>'Cobre','television'=>'Television'],null,['placeholder' => 'Selecciona tipo de red...','required','class'=>'custom-select']) !!}
			</div>
		</div>

		<div class="form-group row">
			{!! Form::label('fecha_reque','Fecha requerida',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::date('fecha_reque',null,['class'=>'form-control','required'])!!}
			</div>
		</div>

		<div class="text-center">
			{!!Form::submit('Guardar',['class'=>'btn btn-outline-success'])!!}
		</div>
		{!! Form::close() !!}
	</div>
	</div>

@endsection