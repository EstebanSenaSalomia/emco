@extends('admin.plantilla.main')
	@section('title','Nueva asignación')
	@section('marca4','active')

@section('content')
	<div class="card text-center">
	  <div class="card-body">
		{!! Form::open(['action'=>'AsignacionController@store','method'=>'POST'])!!}
		<div class="row">
			<div class="col-sm-6">
				{!! Form::label('user_id','Usuario',['class'=>'col-sm-2 col-form-label'])!!}
				{!! Form::select('user_id',$users,null,['placeholder' => 'Selecciona un usuario...','required','class'=>'custom-select select-user']) !!}
				<p>&nbsp</p>
			</div>

			<div class="col-sm-6">
				{!! Form::label('viabilidad_id','Seleccionar VB',['class'=>'col-form-label'])!!}
				{!! Form::select('viabilidad_id[]',$viabilidades,null,['required','class'=>'form-control select-viabilidad','multiple','aria-describedby'=>"emailHelp"]) !!}
			</div>
		</div>	

		<p>&nbsp</p>
		<div class="text-center">
			{!!Form::submit('Guardar',['class'=>'btn btn-outline-success'])!!}
		</div>
		{!! Form::close() !!}
	</div>
	</div>
@endsection