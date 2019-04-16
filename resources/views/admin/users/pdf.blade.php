<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista de usuario</title>
	<link type="text/css" rel="stylesheet" href='recursos/bootstrap/css/bootstrap.css'  media="screen,projection"/>	
</head>
<body>
	<div>
		<h3 class="text-center">Listado de usuarios</h3>
	</div>
	<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">NOMBRE</th>
	      <th scope="col">CEDULA</th>
	      <th scope="col">EMAIL</th>
	      <th scope="col">TELEFONO</th>
	      <th scope="col">EMPRESA</th>

	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($users as $user)
			<tr>
			  <td>{{$user->id}}</td>
			  <td>{{$user->name}}</td>
			  <td>{{$user->cedula}}</td>
			  <td>{{$user->email}}</td>
			  <td>{{$user->telefono}}</td>
			  <td>{{$user->empresa}}</td>	 	
			</tr>
	  	@endforeach
	    
	  </tbody>
	</table>

</body>
</html>