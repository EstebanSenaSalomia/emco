@extends('admin.plantilla.main')
@section('title','lista de viabilidades')
@section('marca2','active')

@section('content')
<p>&nbsp</p>
	<div class="card">
	  <div class="card-body">
	 
  			{!! Form::open(['route'=>'viabilidad.index','method'=>'GET','class'=>''])!!}
  			<div class="form-row align-items-right">
  				<div class="col-sm-6">
  						<a href="{{route('viabilidad.create')}}" class="btn btn-outline-info btn-block">Crear Viabilidad</a>
  				</div>
  				<div class="col-sm-6">
			      <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
			      	<div class="input-group">
			       		<div class="input-group-prepend">
			          		<div class="input-group-text"><i class="fa fa-search"></i></div>
			        	</div>
			       		 {!! Form::text('numero',null,['class'=>'form-control mr-sm-2','placeholder'=>'Igresar numero de VB','aria-label'=>'Search','id'=>"inlineFormInputGroupUsername"])!!}
			      	</div>
  				</div>
  			</div>	
  			{!! Form::close()!!}	
	    <p>&nbsp</p>
		<div class="table-responsive">
		  <table class="table table-hover ">
		    <thead>
		    	<th>NUMERO</th>
		    	<th>NOMBRE</th>
		    	<th>DIRECCION</th>
		    	<th>RED</th>
		    	<th>FECHA REQUERIDA</th>
		    </thead>
		    <tbody>
		    	@foreach($viabilidades as $viabilidad)
				<tr>
					<td>{{$viabilidad->numero}}</td>
					<td>{{$viabilidad->nombre}}</td>
					<td>{{$viabilidad->direccion}}</td>
					<td>
					@if($viabilidad->red == 'fibra')
						<div class=""><i class="fa fa-wifi"></i>  {{$viabilidad->red}}</div>
					@elseif($viabilidad->red =='cobre')
						<div class=""><i class="fas fa-phone"></i>  {{$viabilidad->red}}</div>
					@else
						<div class=""><i class="fas fa-tv"></i>  {{$viabilidad->red}}</div>
					@endif
					</td>
					<td>{{$viabilidad->fecha_reque}}</td>
					<td>
						<a href="{{route('viabilidad.edit',$viabilidad->id)}}" class="btn btn-outline-dark"><i class="fa fa-edit"></i></a>	
					</td>
					<td>	
						<a href="{{route('admin.viabilidad.destroy',$viabilidad->id)}}"  onclick="return confirm('¿Estas seguro de liminar este usuario?')" class="btn btn-outline-danger"><i class="fa fa-trash-alt"></i></a>
              		</td>
				</tr>
	          @endforeach
		    </tbody>
		  </table>
		
		  <div class="mx-auto" style="width: 200px;">
			{{$viabilidades->render("pagination::bootstrap-4")}}
		</div>		
		</div>
	  </div>
	</div>
@endsection