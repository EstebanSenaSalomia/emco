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
			       	{!! Form::text('name',null,['class'=>'form-control mr-sm-2','placeholder'=>'Igresar nombre','aria-label'=>'Search','id'=>"inlineFormInputGroupUsername"])!!}
			    </div>
			</div>
		</div>	
		{!! Form::close()!!}	
	    <p>&nbsp</p>
	    <div class="table-responsive d-none d-md-block">
			<table class="table table-hover ">
			    <thead>
			    	<th>ID</th>
			    	<th>NOMBRE</th>
			    	<th>E-MAIL</th>
			    	<th>TIPO</th>
			    	<th>TELEFONO</th>
			    </thead>
				<tbody>
			    	@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>
						@if($user->type == 'admin')
							<div class=""><i class="fa fa-user-secret"></i>  {{$user->type}}</div>
						@elseif($user->type =='supervisor')
							<div class=""><i class="fa fa-binoculars"></i>  {{$user->type}}</div>
						@else
							<div class=""><i class="fa fa-building"></i>  {{$user->type}}</div>
						@endif
						</td>
						<td>{{$user->telefono}}</td>
						<td>
							<a href="{{route('users.edit',$user->id)}}" class="btn btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
							<a href="{{route('admin.users.destroy',$user->id)}}" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="return confirm('¿Estas seguro de eliminar este usuario?')" class="btn btn-outline-danger"><i class="fa fa-trash-alt"></i></a>
	              		</td>
					</tr>
		            @endforeach
				</tbody>
		    </table>
				<div class="mx-auto">
					{{$users->render("pagination::bootstrap-4")}}
				</div>		
		</div>
        <div class="d-block d-sm-none d-none d-sm-block d-md-none">	 
       	    @foreach($users as $user)	
	            <div id="accordion{{$user->id}}">
		        	<div class="card">
		        	    <div class="card-header" id="heading{{$user->id}}">
		        	      <h5 class="mb-0">
		        	        <button class="btn btn-link" data-toggle="collapse" data-target="#{{$user->id}}" aria-expanded="false" aria-controls="{{$user->id}}">
		        	           {{$user->name}}
		        	        </button>
		        	      </h5>
		        	    </div> 
		        		{{-- el loop->index me devuelve el indice del ciclo en el que estoy --}}
		        	     <div id="{{$user->id}}" class="collapse" aria-labelledby="heading{{$user->id}}" data-parent="#accordion{{$user->id}}">
			        	    <div class="card-body">
			        	        <ul class="list-group list-group-flush">
			        	          <li class="list-group-item">id: {{$user->id}}</li>
			        	          <li class="list-group-item">email: {{$user->email}}</li>
								  @if ($user->type == 'admin')
								  	   <li class="list-group-item">Rol: {{$user->type}}  <i class="fa fa-user-secret"></i></li>
								  @elseif($user->type =='supervisor')
								  	   <li class="list-group-item">Rol: {{$user->type}}  <i class="fa fa-binoculars"></i></li>
								  @else
								  	   <li class="list-group-item">Rol: {{$user->type}}  <i class="fa fa-building"></i></li>	   
								  @endif
			        	          <li class="list-group-item">Rol: {{$user->type}}</li>
			        	          <li class="list-group-item">Telefono: {{$user->telefono}}</li>
			        	          <li class="list-group-item">
			        	          		<a href="{{route('users.edit',$user->id)}}" class="btn btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
			        	          		<a href="{{route('admin.users.destroy',$user->id)}}" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="return confirm('¿Estas seguro de eliminar este usuario?')" class="btn btn-outline-danger"><i class="fa fa-trash-alt"></i></a>
			        	          </li>
			        	        </ul>
			        	    </div>
		        	    </div>
		        	</div>
	        	</div> 
        	@endforeach
        	<p>&nbsp</p>
        	<div class="mx-auto pagination justify-content-center" style="width: 200px";>
        		{{$users->render("pagination::simple-bootstrap-4")}}
        	</div>
        </div>	
	</div>
</div>

@endsection