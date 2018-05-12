@extends('admin.plantilla.main')
	@section('title','Editar Viabilidad')

@section('content')
	
	<div class="card text-center">
	  <div class="card-body">
		{!! Form::open(['route'=>['viabilidad.update',$viabilidades],'method'=>'PUT'])!!}
		
		<div class="form-group row">
			{!! Form::label('numero','Numero VB',['class'=>'col-sm-2 col-form-label'])!!}
			 <div class="col-sm-10">
				{!! Form::text('numero',$viabilidades->numero,['class'=>'form-control','required'])!!}
			</div>
		</div>	
		
		<div class="form-group row">
			{!! Form::label('nombre','Nombre',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::text('nombre',$viabilidades->nombre,['class'=>'form-control','required'])!!}
			</div>	
		</div>
		
		<div class="form-group row">
			{!! Form::label('direccion','Direccion',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::text('direccion',$viabilidades->direccion,['class'=>'form-control','required'])!!}
			</div>
		</div>

		<div class="form-group row">
			{!! Form::label('red','Red',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::select('red',['fibra'=>'Fibra','cobre'=>'Cobre','television'=>'Television'],$viabilidades->red,['placeholder' => 'Selecciona tipo de red...','required','class'=>'custom-select']) !!}
			</div>
		</div>	
		<div class="text-center">
			{!!Form::submit('Actualizar',['class'=>'btn btn-outline-success'])!!}
		</div>
		{!! Form::close() !!}
	</div>
	</div>

@endsection