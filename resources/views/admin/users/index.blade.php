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
		<div class="table-responsive">
		  <table class="table table-hover">
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
						<div class=""><i class="fas fa-binoculars"></i>  {{$user->type}}</div>
					@else
						<div class=""><i class="fas fa-building"></i>  {{$user->type}}</div>
					@endif
					</td>
					<td>{{$user->telefono}}</td>
					<td>
						<a href="{{route('users.edit',$user->id)}}" class="btn btn-outline-dark"><i class="fa fa-edit"></i></a>
						<a href="{{route('admin.users.destroy',$user->id)}}"  onclick="return confirm('¿Estas seguro de liminar este usuario?')" class="btn btn-outline-danger"><i class="fa fa-trash-alt"></i></a>
              		</td>
				</tr>
	          @endforeach
		    </tbody>
		  </table>
		
		  <div class="mx-auto" style="width: 200px;">
			{{$users->render("pagination::bootstrap-4")}}
		</div>		
		</div>
	  </div>
	</div>
@endsection