@extends('admin.plantilla.main')
@section('title','lista de usuarios')
@section('marca3','active')

@section('content')
	<div class="card">
	  <div class="card-body">
	    <a href="{{route('users.create')}}" class="btn btn-outline-info btn-lg btn-block">Crear usuario</a>
		<div class="table-responsive">
		  <table class="table table-hover">
		    <thead>
		    	<th>ID</th>
		    	<th>NOMBRE</th>
		    	<th>E-MAIL</th>
		    	<th>TIPO</th>
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
					<td>
						<a href="{{route('users.edit',$user->id)}}" class="btn btn-outline-dark"><i class="fa fa-edit"></i></a>
						<a href="{{route('admin.users.destroy',$user->id)}}"  onclick="return confirm('¿Estas seguro de liminar este usuario?')" class="btn btn-outline-danger"><i class="fa fa-trash-alt"></i></a>
              		</td>
				</tr>
	          @endforeach
		    </tbody>
		  </table>
		</div>
	  </div>
	</div>
@endsection