@extends('admin.plantilla.main')
@section('title','lista de usuarios')
@section('marca3','active')

@section('content')
<p>&nbsp</p>

<div class="card">
	<div class="card-body">
		{!! Form::open(['route'=>'users.index','method'=>'GET','class'=>''])!!}
		<div class="form-row align-items-right">
			<div class="col-sm-6">
				<a href="{{route('users.create')}}" class="btn btn-outline-info btn-block">Crear usuario</a>
			</div>
			<div class="col-sm-6">
		    	<label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
		      	<div class="input-group">
			       	<div class="input-group-prepend">
			        	<div class="input-group-text"><i class="fa fa-search"></i></div>
			        </div>
			       	{!! Form::text('cedula',null,['class'=>'form-control mr-sm-2','placeholder'=>'Ingresar cedula','aria-label'=>'Search','id'=>"inlineFormInputGroupUsername"])!!}
			    </div>
			</div>
		</div>	
		{!! Form::close()!!}	
	    <p>&nbsp</p>
	    <div class="table-responsive d-none d-md-block">
			<table class="table table-hover ">
			    <thead>
			    	
			    	<th>NOMBRE</th>
			    	<th>E-MAIL</th>
			    	<th>CEDULA</th>
			    	<th>TIPO</th>
			    	<th>TELEFONO</th>
			    	<TH>EMPRESA</TH>
			    </thead>
				<tbody>
			    	@foreach($users as $user)
			    	@if ($user->estado_usu==0)
			    		@php
			    			$estado="table-secondary";
			    		@endphp
			    	@else
						@php
			    			$estado="";
			    		@endphp
			    	@endif
			    	@if (Auth::user()->id != $user->id)
			    		
					<tr class="{{$estado}}">
						
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->cedula}}</td>
						<td>
						@if($user->type == 'admin')
							<div class=""><i class="fa fa-user-secret"></i>  {{$user->type}}</div>
						@elseif($user->type =='supervisor')
							<div class=""><i class="fa fa-binoculars"></i>  {{$user->type}}</div>
						@else
							<div class=""><i class="fa fa-hand-point-left"></i>  {{$user->type}}</div>
						@endif
						</td>
						<td>{{$user->telefono}}</td>
						<td>{{$user->empresa}}</td>
						@if ($user->estado_usu==0)
							<td>
								<a href="{{route('admin.users.active',$user->id)}}" data-toggle="tooltip" data-placement="bottom" title="Activar" onclick="return confirm('¿Estas seguro de activar este usuario?')" class="btn btn-outline-primary"><i class="fa fa-check-circle"></i></a>
							</td>
						@else
							<td>
								<a href="{{route('users.edit',$user->id)}}" class="btn btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>

								<a href="{{route('admin.users.destroy',$user->id)}}" data-toggle="tooltip" data-placement="bottom" title="Bloquear" onclick="return confirm('¿Estas seguro de bloquear este usuario?')" class="btn btn-outline-danger"><i class="fa fa-ban"></i></a>
		              		</td>
						@endif
						
					</tr>
					@endif
		            @endforeach
				</tbody>
		    </table>
				<div class="mx-auto">
					{{$users->render("pagination::bootstrap-4")}}
				</div>		
		</div>
        <div class="d-block d-sm-none d-none d-sm-block d-md-none">	 
       	   <div id="accordion"> 
       	    @foreach($users as $user)
       	        	@if ($user->estado_usu==0)
       	        		@php
       	        			$estado="color-card-acordion";//con esto llamo en nombre de una clase en main
       	        		@endphp
       	        	@else
       	    			@php
       	        			$estado="";
       	        		@endphp
       	        	@endif
       	        	@if (Auth::user()->id != $user->id)	
		        	<div class="card">
		        	    <div class="card-header {{$estado}}" id="heading{{$user->id}}">
		        	      <h5 class="mb-0">
		        	        <button class="btn btn-link " data-toggle="collapse" data-target="#{{$user->id}}" aria-expanded="false" aria-controls="{{$user->id}}">
		        	           {{$user->name}}
		        	        </button>
		        	      </h5>
		        	    </div> 
		        		{{-- el loop->index me devuelve el indice del ciclo en el que estoy --}}
		        	     <div id="{{$user->id}}" class="collapse" aria-labelledby="heading{{$user->id}}" data-parent="#accordion">
			        	    <div class="card-body">
			        	        <ul class="list-group list-group-flush">
			        	          <li class="list-group-item"><span class="font-weight-bold">Nombre:</span> {{$user->name}}</li>
			        	          <li class="list-group-item"><span class="font-weight-bold">E-mail:</span> {{$user->email}}</li>
								  @if ($user->type == 'admin')
								  	   <li class="list-group-item"><span class="font-weight-bold">Rol:</span> {{$user->type}}  <i class="fa fa-user-secret"></i></li>
								  @elseif($user->type =='supervisor')
								  	   <li class="list-group-item"><span class="font-weight-bold">Rol:</span> {{$user->type}}  <i class="fa fa-binoculars"></i></li>
								  @else
								  	   <li class="list-group-item"><span class="font-weight-bold">Rol:</span> {{$user->type}}  <i class="fa fa-building"></i></li>	   
								  @endif
			        	        
			        	          <li class="list-group-item"><span class="font-weight-bold">Telefono:</span> {{$user->telefono}}</li>
			        	          <li class="list-group-item"><span class="font-weight-bold">Empresa:</span> {{$user->empresa}}</li>
			        	          <li class="list-group-item">
	    	          				@if ($user->estado_usu==0)
	    	          					
	    	          						<a href="{{route('admin.users.active',$user->id)}}" data-toggle="tooltip" data-placement="bottom" title="Activar" onclick="return confirm('¿Estas seguro de activar este usuario?')" class="btn btn-outline-primary"><i class="fa fa-check-circle"></i></a>
	    	          					
	    	          				@else
	    	          					
	    	          						<a href="{{route('users.edit',$user->id)}}" class="btn btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
	    	          						<a href="{{route('admin.users.destroy',$user->id)}}" data-toggle="tooltip" data-placement="bottom" title="Bloquear" onclick="return confirm('¿Estas seguro de bloquear este usuario?')" class="btn btn-outline-danger"><i class="fa fa-ban"></i></a>
	    	                        	
	    	          				@endif
			        	          </li>
			        	        </ul>
			        	    </div>
		        	    </div>
		        	</div>
		        	@endif
        	@endforeach
        	</div>
        	<p>&nbsp</p>
        	<div class="mx-auto pagination justify-content-center" style="width: 200px";>
        		{{$users->render("pagination::simple-bootstrap-4")}}
        	</div>
        </div>	
	</div>
</div>

@endsection