@extends('admin.plantilla.main')
	@section('title','Asignaciones')
	@section('marca4','active')
@section('content')

 <div class="table-responsive">
	<table class="table table-hover ">
	    <thead>
	    	<th>VIABILIDAD</th>
	    	<th>RESPOSABLE</th>
	    	<th>FECHA DE ASIGNACION</th>
	    	<th>FECHA REQUERIDA</th>
	    	<th>PRIORIDAD</th>
	    </thead>
	    <tbody>
	    	@foreach($asignarvb as $asignarv)
			<tr>
				<td>{{$asignarv->viabilidades->nombre}}</td>
				<td>{{$asignarv->}}</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
	      @endforeach
	    </tbody>
	  </table>
</div> 

	
@endsection