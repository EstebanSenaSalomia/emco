@extends('admin.plantilla.main')
@section('title','lista de usuarios')
@section('marca3','active')

@section('content')
	<div class="card">
	  <div class="card-body">
	    <a href="" class="btn btn-outline-info btn-lg btn-block">Crear usuario</a>
		<div class="table-responsive">
		  <table class="table">
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

						<div class="cyan-text"><i class="material-icons left">face</i>{{$user->type}}</div>
					
					@else
						
						<div class="pink-text"><i class="material-icons left">tag_faces</i>{{$user->type}}</div>

					@endif
					</td>
					<td>
						<a href="{{route('users.edit',$user->id)}}" class="btn btn-warning"></a>
						<a href="{{route('admin.users.destroy',$user->id)}}"  onclick="return confirm('¿Estas seguro de liminar este usuario?')" class="waves-effect orange darken-4 btn"><i class="material-icons center">delete</i></a>
              		</td>
				</tr>
	          @endforeach
		    </tbody>
		  </table>
		</div>

	  </div>
	</div>
@endsection