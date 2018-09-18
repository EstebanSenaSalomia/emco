@extends('admin.plantilla.main')
@section('title','Revisiones en terreno')
@section('marca2','active')

@section('content')
<p>&nbsp</p>
<div class="card">
	<div class="card-body">
  			{!! Form::open(['route'=>'viabilidad.index','method'=>'GET','class'=>''])!!}
  			<div class="form-row align-items-right">
  				<div class="col-sm-6">
  					<a href="{{route('viabilidad.create')}}" class="btn btn-outline-info btn-block">Crear proyecto</a>
  				</div>
  				<div class="col-sm-6">
			      <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
			      	<div class="input-group">
			       		<div class="input-group-prepend">
			          		<div class="input-group-text"><i class="fa fa-search"></i></div>
			        	</div>
			       		 {!! Form::text('numero_vb',null,['class'=>'form-control mr-sm-2','placeholder'=>'Igresar numero de VB','aria-label'=>'Search','id'=>"inlineFormInputGroupUsername"])!!}
			      	</div>
  				</div>
  			</div>	
  			{!! Form::close()!!}	
	    <p>&nbsp</p>
		<div class="table-responsive d-none d-md-block">
		  <table class="table table-hover ">
		    <thead>
		    	<th>NUMERO</th>
		    	<th>NOMBRE</th>
		    	<th>DIRECCION</th>
		    	<th>RED</th>
		    	<th>FECHA REQUERIDA</th>
		    	<th>LINK</th>		
		    </thead>
		    <tbody>
		    	@foreach($viabilidades as $viabilidad)
				<tr>
					<td>{{$viabilidad->numero_vb}}</td>
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
					<td><a href="{{route('terreno.index',$viabilidad->id)}}">Ver más</a></td>
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
		
		  <div class="mx-auto">
			{{$viabilidades->render("pagination::bootstrap-4")}}
		</div>		
		</div>
        <div class="d-block d-sm-none d-none d-sm-block d-md-none">	 
       	    <div id="accordion">
       	    @foreach($viabilidades as $viabilidad)	
		        	<div class="card">
		        	    <div class="card-header " id="heading{{$viabilidad->id}}">
		        	      <h5 class="mb-0 text-truncate">
		        	        <button class="btn btn-link collapsed " data-toggle="collapse" data-target="#{{$viabilidad->id}}" aria-expanded="false" aria-controls="{{$viabilidad->id}}">
						        
		        	          	 {{$viabilidad->numero_vb."-".$viabilidad->nombre}}
		        	          	
		        	        </button>
		        	      </h5>
		        	    </div> 
		        		{{-- el loop->index me devuelve el indice del ciclo en el que estoy --}}
		        	     <div id="{{$viabilidad->id}}" class="collapse" aria-labelledby="heading{{$viabilidad->id}}" data-parent="#accordion">
			        	    <div class="card-body">
			        	        <ul class="list-group list-group-flush">
			        	          <li class="list-group-item"><span class="font-weight-bold">Numero VB:</span> {{$viabilidad->numero_vb}}</li>
			        	          <li class="list-group-item"><span class="font-weight-bold">Nombre:</span> {{$viabilidad->nombre}}</li>
			        	          <li class="list-group-item"><span class="font-weight-bold">Dirección:</span> {{$viabilidad->direccion}}</li>
								  @if ($viabilidad->red == 'fibra')
								  	   <li class="list-group-item"><span class="font-weight-bold">Red:</span> {{$viabilidad->red}}  <i class="fa fa-wifi"></i></li>
								  @elseif($viabilidad->red =='cobre')
								  	   <li class="list-group-item"><span class="font-weight-bold">Red:</span> {{$viabilidad->red}}  <i class="fas fa-phone"></i></li>
								  @else
								  	   <li class="list-group-item"><span class="font-weight-bold">Red:</span> {{$viabilidad->red}}  <i class="fas fa-tv"></i></li>	   
								  @endif
			        	          <li class="list-group-item"><span class="font-weight-bold">Vencimiento:</span> {{$viabilidad->fecha_reque}}</li>
			        	          <li class="list-group-item">
			        	          		<a href="{{route('viabilidad.edit',$viabilidad->id)}}" class="btn btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
			        	          		<a href="{{route('admin.viabilidad.destroy',$viabilidad->id)}}" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="return confirm('¿Estas seguro de eliminar este usuario?')" class="btn btn-outline-danger"><i class="fa fa-trash-alt"></i></a>
			        	          </li>
			        	        </ul>
			        	    </div>
		        	    </div>
		        	</div> 
        	@endforeach
        	</div>
        	<p>&nbsp</p>
        	<div class="mx-auto pagination justify-content-center" style="width: 200px";>
        		{{$viabilidades->render("pagination::simple-bootstrap-4")}}
        	</div>
        </div>
    </div>
</div>
@endsection