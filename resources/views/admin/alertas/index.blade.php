@extends('admin.plantilla.main')
	@section('title','Avances')
	@section('marca5','active')
@section('content')

 <div class="text-muted text-center">
	En esta sección puedes acceder rapidamente a los avances, puedes ir borrandolos una vez ya no sean necesarios, recuerda que estos quedan registrado en la sección inferior de cada proyecto.
  </div>
  
	<p>&nbsp</p>
	{!! Form::open(['route'=>'admin.alert','method'=>'GET','class'=>''])!!}
	{{ csrf_field() }}
	<div class="form-row align-items-right">
		<div class="col-sm-6 offset-md-6">
				<label class="sr-only" for="inlineFormInputGroupUsername">alertas</label>
					<div class="input-group">
						<div class="input-group-prepend">
						<div class="input-group-text"><i class="fa fa-search"></i></div>
					</div>
						{!! Form::text('buscar',null,['class'=>'form-control mr-sm-2','placeholder'=>'ingresa nombre del proyecto','aria-label'=>'Search','id'=>"inlineFormInputGroupUsername"])!!}
					</div>
			</div>
	</div>
	<h5><i class="fa fa-envelope-open"></i>  <span class="badge badge-primary"> {{count($alerts)}}</span></h5>
	
	{!! Form::close()!!}

	@foreach($alerts as $alert)
	
		<div class="list-group">
		  <div " class="list-group-item list-group-item-action flex-column align-items-start">
		    <div class="d-flex w-100 justify-content-between">
		      <h6 class="mb-1">{{$alert->user->name}} realizó un avance en <strong>{{$alert->viabilidad->nombre}}</strong></h6>
		      <hr>
		      <small>{{$alert->created_at->diffForHumans()}}</small>
		    </div>
		    @if($alert->comentario_id != null)
				<p class="mb-3">{{$alert->comentario->contenido}}</p>
			@else
				<p class="mb-3">Se han subido nuevas imagenes o archivos</p>
		    @endif
		    
		    <small class="float-right">

		    	<a href="{{route('admin.alert.eliminar',$alert->id)}}" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="return confirm('¿Estas seguro de eliminar este Avance?')" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>

		    	<a href="{{route('terreno.index',['id'=>$alert->viabilidad->id])}}" data-toggle="tooltip" data-placement="top" title="Ver" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
		    </small>
		  </div>
	
		</div>

	@endforeach
@endsection