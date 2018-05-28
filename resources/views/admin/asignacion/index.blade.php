@extends('admin.plantilla.main')
	@section('title','Nueva asignación')
	@section('marca4','active')
@section('content')

<table class="table table-hover ">
		    <thead>
		    	<th>ID</th>
		    	<th>NOMBRE</th>
		    	<th>E-MAIL</th>
		    	<th>TIPO</th>
		    	<th>TELEFONO</th>
		    </thead>
		    <tbody>
		    	@foreach($viabilidades as $viabilidad)
				<tr>
					<td>{{ $viabilidad->id}}</td>
					<td>{{ $viabilidad->numero}}</td>
					<td>{{ $viabilidad->nombre}}</td>
					<td>{{ $viabilidad->direccion}}</td>
				</tr>
	          @endforeach
		    </tbody>
		  </table>
@endsection