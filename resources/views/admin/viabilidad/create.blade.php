@extends('admin.plantilla.main')
	@section('title','Crear proyecto')

@section('content')
	
	<div class="card text-center">
	  <div class="card-body">
		{!! Form::open(['action'=>'ViabilidadController@store','method'=>'POST'])!!}
		{{ csrf_field() }}
		<div class="form-group row">
			{!! Form::label('users','Responsable',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::select('users[]',$user,null,['required','class'=>'select-create','multiple']) !!}
			</div>
		</div>
		
		<div class="form-group row">
			{!! Form::label('numero_vb','Numero VB',['class'=>'col-sm-2 col-form-label'])!!}
			 <div class="col-sm-10">
				{!! Form::text('numero_vb',null,['class'=>'form-control'])!!}
			</div>
		</div>

		<div class="form-group row">
			{!! Form::label('numero_pre','Numero PRE',['class'=>'col-sm-2 col-form-label'])!!}
			 <div class="col-sm-10">
				{!! Form::text('numero_pre',null,['class'=>'form-control'])!!}
			</div>
		</div>

		<div class="form-group row">
			{!! Form::label('numero_ot','Numero OT',['class'=>'col-sm-2 col-form-label'])!!}
			 <div class="col-sm-10">
				{!! Form::text('numero_ot',null,['class'=>'form-control'])!!}
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
			{!! Form::label('contacto','Contacto',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::text('contacto',null,['class'=>'form-control','required'])!!}
			</div>
		</div>

		<div class="form-group row">
			{!! Form::label('contacto_num','Numero de contacto',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::text('contacto_num',null,['class'=>'form-control','required'])!!}
			</div>
		</div>

		<div class="form-group row">
			{!! Form::label('red','Red',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::select('red',['fibra'=>'Fibra','cobre'=>'Cobre','television'=>'Television'],null,['placeholder' => 'Selecciona tipo de red...','required','class'=>'custom-select']) !!}
			</div>
		</div>

		<div class="form-group row">
			{!! Form::label('localidad','Localidad',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::select('localidad',['Alcala'=>'Alcala','Andalucia'=>'Andalucia','Ansermanuevo'=>'Ansermanuevo','Argelia'=>'Argelia','Bolivar'=>'Bolivar','Buenaventura'=>'Buenaventura','Buga'=>'Buga','Bugalagrande'=>'Bugalagrande','Caicedonia'=>'Caicedonia','Cali'=>'Cali','Calima'=>'Calima','Candelaria'=>'Candelaria','Cartago'=>'Cartago','Dagua'=>'Dagua','El_Aguila'=>'El_Aguila','El_Cairo'=>'El_Cairo','El_Cerrito'=>'El_Cerrito','El_Dovio'=>'El_Dovio','Florida'=>'Florida','Ginebra'=>'Ginebra','Guacari'=>'Guacari','Jamundi'=>'Jamundi','La_Cumbre'=>'La_Cumbre','La_Union'=>'La_Union','La_Victoria'=>'La_Victoria','Obando'=>'Obando','Palmira'=>'Palmira','Pradera'=>'Pradera','Restrepo'=>'Restrepo','Riofrío'=>'Riofrío','Roldanillo'=>'Roldanillo','San_Pedro'=>'San_Pedro','Sevilla'=>'Sevilla','Toro'=>'Toro','Trujillo'=>'Trujillo','Tulua'=>'Tulua','Ulloa'=>'Ulloa','Versalles'=>'Versalles','Vijes'=>'Vijes','Yotoco'=>'Yotoco','Yumbo'=>'Yumbo','Zarzal'=>'Zarzal'],null,['placeholder' => 'Selecciona localidad...','required','class'=>'select-user']) !!}
			</div>
		</div>

		<div class="form-group row">
			{!! Form::label('fecha_reque','Fecha requerida',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::date('fecha_reque',null,['class'=>'form-control','required'])!!}
			</div>
		</div>
		

		<div class="form-group row">
			{!! Form::label('tipo_trabajo','tipo_trabajo',['class'=>'col-sm-2 col-form-label'])!!}
			<div class="col-sm-10">
				{!! Form::select('tipo_trabajo',['Mantenimiento'=>'Mantenimiento','Construccion'=>'Construcción','Viabilidad'=>'Viabilidad'],null,['placeholder' => 'Selecciona tipo trabajo...','required','class'=>'custom-select']) !!}
			</div>
		</div>

		<div class="text-center">
			{!!Form::submit('Guardar',['class'=>'btn btn-outline-success'])!!}
		</div>
		{!! Form::close() !!}
	</div>
	</div>	

@endsection
@section('js')
	<script>
		$('.select-create').chosen({
			max_selected_options:3,
			placeholder_text_multiple:"Seleccione Un maximo de 3 responsables",
		    no_results_text: "Oops, no hay resultados!",
		    width: "100%"
		});
	</script>
@endsection