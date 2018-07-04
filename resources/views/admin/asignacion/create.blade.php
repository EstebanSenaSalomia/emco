@extends('admin.plantilla.main')
	@section('title','Nueva asignación')
	@section('marca4','active')
@section('content')

<div class="card text-center">
	  <div class="card-body">
		{!! Form::open(['action'=>'AsignacionController@store','method'=>'POST'])!!}
		<div class="row">
			<div class="col-sm-6">
				{!! Form::label('user_id','Usuario',['class'=>'col-form-label'])!!}
				{!! Form::select('user_id',$users,null,['placeholder' => 'Selecciona un usuario...','required','class'=>'custom-select select-user']) !!}
				<p>&nbsp</p>
			</div>

			<div class="col-sm-6">
				{!! Form::label('viabilidad_id','Seleccionar VB',['class'=>'col-form-label'])!!}
				{!! Form::select('viabilidad_id[]',$viabilidades,null,['required','class'=>'form-control select-viabilidad','multiple']) !!}
			</div>
		</div>
		<p>&nbsp</p>
		<div class="row">
			<div class="col-sm-12 col-md-6 offset-md-3">
				<h6>Selecciona una prioridad (opcional)</h6>
				
			<div class="form-check form-check-inline">
			  {!! Form::radio('radio', '1', null,['class'=>'form-check-input','id'=>'inlineRadio1'])!!}
			  <i class="fas fa-check-circle text-success"></i><p>&nbsp</p>
			  {!! Form::label('radio','1',['class'=>'form-check-label', 'for'=>'inlineRadio1'])!!}
			</div>
			<div class="form-check form-check-inline">
			  {!! Form::radio('radio', '2', null,['class'=>'form-check-input','id'=>'inlineRadio2'])!!}
			  <i class="fas fa-bell text-warning"></i><p>&nbsp</p>
			  {!! Form::label('radio','2',['class'=>'form-check-label', 'for'=>'inlineRadio2'])!!}
			</div>
			<div class="form-check form-check-inline">
			  {!! Form::radio('radio', '3', null,['class'=>'form-check-input','id'=>'inlineRadio3'])!!}
			  <i class="fas fa-exclamation-circle text-danger"></i><p>&nbsp</p>
			  {!! Form::label('radio','3',['class'=>'form-check-label', 'for'=>'inlineRadio3'])!!}
			</div>
			</div>
		</div>

		<p>&nbsp</p>
		<div class="text-center">
			{!!Form::submit('Asignar',['class'=>'btn btn-outline-success'])!!}
		</div>
		{!! Form::close() !!}
	</div>
	</div>  
@endsection