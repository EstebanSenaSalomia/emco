@extends('admin.plantilla.main')
@section('title','Revisiones en terreno')
@section('marca2','active')
@section('content')

<p>&nbsp</p>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><strong>IMPORTAR / EXPORTAR</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.importar')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
            
                     <div class="form-group row">
                            <label for="exportar" class="col-sm-3 col-form-label">Exportar</label>
                            <div class="col-sm-9">
                                <a href="{{route('admin.exportar')}}" class="btn btn-primary btn-sm active  " role="button" aria-pressed="true" id="exportar">Exportar</a> 
                            </div>
                     </div>
                     <div class="form-group row">
                            <label for="importar" class="col-sm-3 col-form-label">Importar</label>
                            <div class="col-sm-9">
                                  {!!Form::file('importar',['class'=>'form-control-plaintext','readonly','id'=>'importar'] )!!}
                            </div>
                     </div>
            </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        {!!Form::submit('Subir',['class'=>'btn btn-primary'])!!}
                </div>
            </form>	
        </div>
    </div>
</div>
        <!-- Modal --><!-- Modal --><!-- Modal --><!-- Modal --><!-- Modal --><!-- Modal -->
<div class="card">
	<div class="card-body">
		{!! Form::open(['route'=>'admin.viabilidad.index','method'=>'GET','class'=>''])!!}
			{{ csrf_field() }}
  			<div class="form-row align-items-right">
				@if (Auth::User()->admin() or Auth::User()->gestor())  
  					<div class="col-sm-3">
						<a href="{{route('viabilidad.create')}}" class="btn btn-outline-primary btn-block">Crear proyecto</a>
					</div>
					<div class="col-sm-3 text-center">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
							importar / exportar
						</button>
					</div>	  
  				@endif
  				<div class="col-sm-6">
			        <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
			      	<div class="input-group">
			       		<div class="input-group-prepend">
			          		<div class="input-group-text"><i class="fa fa-search"></i></div>
						</div>
			       		{!! Form::text('search',null,['class'=>'form-control mr-sm-2','placeholder'=>'VB, PRE, OT, Nombre, Dirección, Red, Estado','aria-label'=>'Search','id'=>"inlineFormInputGroupUsername"])!!}
					  </div>
  				</div>
  			</div>	
  		{!! Form::close()!!}	
	    <p>&nbsp</p>
		<div class="table-responsive d-none d-md-block">
		  	<table class="table table-hover ">
				<thead>
					<th>RESPONSABLE</th>
					<th>VIABILIDAD</th>
					<th>PRESUPUESTO</th>
					<th>ORDEN</th>
					<th>NOMBRE</th>
					<th>DIRECCION</th>
					<th>RED</th>
					<th>FECHA REQUERIDA</th>
					<th>VER</th>		
				</thead>
				<tbody>
					@foreach($viabilidades as $viabilidad)
					@if ($viabilidad->estado=='Terminada')
						@php
							$estado="table-secondary";
						@endphp
					@else
						@php
							$estado="";
						@endphp
					@endif
					
					@if ($viabilidad->estado=='Activa' or (Auth::User()->type != 'supervisor'))
					@php
					$year = $date->year;
					$month = $date->month;
					$day = $date->day;
					$fr_year = $viabilidad->fecha_reque->year;
					$fr_month = $viabilidad->fecha_reque->month;
					$fr_day = $viabilidad->fecha_reque->day;
					$restaday = $fr_day-$day;
					$restamonth = $fr_month-$month;
					$restayear = $fr_year-$year;
					$ultimodia = $ultimo->day;
					$lastDay = $ultimodia-$day;
					if($restayear>=1){
						$fr_month = $fr_month + $month;
						$restamonth = $fr_month-$month;
					}
				
					if($restamonth>=1){
						$fr_day = $fr_day + $day;
						$fr_day = $fr_day + $lastDay;
						$restaday = $fr_day-$day;
					}
					if($restaday>=1 and $restaday<3 and $restamonth<=1){
						$restantes = true;
					}else{
						$restantes = false;
					}
					@endphp
					<tr class="{{$estado}}">
						<td>{{$viabilidad->user->name}}</td>
						<td>{{$viabilidad->numero_vb}}</td>
						<td>{{$viabilidad->numero_pre}}</td>
						<td>{{$viabilidad->numero_ot}}</td>
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

						@if($viabilidad->fecha_reque->lessThan($date) and $viabilidad->estado=="Activa")
						<td class="p-3 mb-1 text-danger">{{$viabilidad->fecha_reque->toFormattedDateString()}}</td>
				
						@elseif($viabilidad->fecha_reque->greaterThan($date) and $viabilidad->estado=="Activa" and !$restantes)
							<td class="p-3 mb-1 text-success">{{$viabilidad->fecha_reque->toFormattedDateString()}}</td>
							
						@elseif( ($viabilidad->estado=="Activa") or $viabilidad->fecha_reque->equalTo($date) and $restantes)
							<td class="p-3 mb-1 text-warning">{{$viabilidad->fecha_reque->toFormattedDateString()}}</td>   
						@else
							<td class="p-3 mb-1 text-info">{{$viabilidad->fecha_reque->toFormattedDateString()}}</td>
						@endif
						<td><a class="btn btn-outline-info" href="{{route('terreno.index',$viabilidad->id)}}"><i class="fa fa-eye"></i></a></td>
						@if (Auth::User()->admin() or Auth::User()->gestor())
						@if ($viabilidad->estado=='Terminada')
							<td>
								<a href="{{route('admin.viabilidad.active',$viabilidad->id)}}" data-toggle="tooltip" data-placement="top" title="Reinyectar" class="btn btn-outline-primary"><i class="fa fa-chevron-circle-up"></i></a>
							</td>
						@else
							<td>
								<a href="{{route('viabilidad.edit',$viabilidad->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-outline-dark"><i class="fa fa-edit"></i></a>
							</td>
							<td>	
								<a href="{{route('admin.viabilidad.destroy',$viabilidad->id)}}" data-toggle="tooltip" data-placement="top" title="Terminar" onclick="return confirm('¿Estas seguro de terminar este proyecto?')" class="btn btn-outline-success"><i class="fa fa-calendar-check"></i></a>
							</td>
							@if(Auth::user()->admin())
							<td>	
								<a href="{{route('admin.viabilidad.eliminar',$viabilidad->id)}}" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="return confirm('¿Estas seguro de eliminar este proyecto?')" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
							</td>
							@endif			
						@endif
						@endif
					</tr>
					@endif
					@endforeach
				</tbody>
		   </table>
			<div class="mx-auto">
				{{$viabilidades->appends(Request::all())->render("pagination::bootstrap-4")}}
			</div>		
		</div>
        <div class="d-block d-sm-none d-none d-sm-block d-md-none">	 
       	    <div id="accordion">
       	    @foreach($viabilidades as $viabilidad)
   	        	@if ($viabilidad->estado=='Terminada')
   	        		@php
   	        			$estado="table-secondary";
   	        		@endphp
   	        	@else
   	    			@php
   	        			$estado="";
   	        		@endphp
   	        	@endif
				   @if ($viabilidad->estado=='Activa' or (Auth::User()->type != 'supervisor'))
				   @php
					$year = $date->year;
					$month = $date->month;
					$day = $date->day;
					$fr_year = $viabilidad->fecha_reque->year;
					$fr_month = $viabilidad->fecha_reque->month;
					$fr_day = $viabilidad->fecha_reque->day;
					$restaday = $fr_day-$day;
					$restamonth = $fr_month-$month;
					$restayear = $fr_year-$year;
					$ultimodia = $ultimo->day;
					$lastDay = $ultimodia-$day;
					if($restayear>=1){
						$fr_month = $fr_month + $month;
						$restamonth = $fr_month-$month;
					}
				
					if($restamonth>=1){
						$fr_day = $fr_day + $day;
						$fr_day = $fr_day + $lastDay;
						$restaday = $fr_day-$day;
					}
					if($restaday>=1 and $restaday<3 and $restamonth<=1){
						$restantes = true;
					}else{
						$restantes = false;
					}
					@endphp
		        	<div class="card">
		        	    <div class="card-header {{$estado}}" id="heading{{$viabilidad->id}}">
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
								  <li class="list-group-item"><span class="font-weight-bold">Responsable</span> {{$viabilidad->user->name}}</li>	
									
			        	          <li class="list-group-item"><span class="font-weight-bold">Numero VB:</span> {{$viabilidad->numero_vb}}</li>
			        	          <li class="list-group-item"><span class="font-weight-bold">Numero PRE:</span> {{$viabilidad->numero_vb}}</li>
			        	          <li class="list-group-item"><span class="font-weight-bold">Numero OT:</span> {{$viabilidad->numero_vb}}</li>
			        	          <li class="list-group-item"><span class="font-weight-bold">Nombre:</span> {{$viabilidad->nombre}}</li>
			        	          <li class="list-group-item"><span class="font-weight-bold">Dirección:</span> {{$viabilidad->direccion}}</li>
								  @if ($viabilidad->red == 'fibra')
								  	   <li class="list-group-item"><span class="font-weight-bold">Red:</span> {{$viabilidad->red}}  <i class="fa fa-wifi"></i></li>
								  @elseif($viabilidad->red =='cobre')
								  	   <li class="list-group-item"><span class="font-weight-bold">Red:</span> {{$viabilidad->red}}  <i class="fas fa-phone"></i></li>
								  @else
								  	   <li class="list-group-item"><span class="font-weight-bold">Red:</span> {{$viabilidad->red}}  <i class="fas fa-tv"></i></li>	   
								  @endif
								  @if($viabilidad->fecha_reque->lessThan($date) and $viabilidad->estado=="Activa")
									<li class="list-group-item text-danger"><span class="font-weight-bold">{{$viabilidad->fecha_reque->toFormattedDateString()}}</span> 

									@elseif($viabilidad->fecha_reque->greaterThan($date) and $viabilidad->estado=="Activa" and !$restantes)
									
										<li class="list-group-item text-success"><span class="font-weight-bold">{{$viabilidad->fecha_reque->toFormattedDateString()}}</span> 
										
									@elseif( ($viabilidad->estado=="Activa") or $viabilidad->fecha_reque->equalTo($date) and $restantes)
										<li class="list-group-item text-warning"><span class="font-weight-bold">{{$viabilidad->fecha_reque->toFormattedDateString()}}</span> 
									@else
									<li class="list-group-item text-info"><span class="font-weight-bold">{{$viabilidad->fecha_reque->toFormattedDateString()}}</span> 
									@endif
			        	        

			        	          <li class="list-group-item"><span class="font-weight-bold"></span> <a href="{{route('terreno.index',$viabilidad->id)}}"><i class="fa fa-eye"></i></a></li>
								@if (Auth::User()->admin() or Auth::User()->gestor())
			        	          <li class="list-group-item">
			        	          	@if ($viabilidad->estado=='Terminada')
          								
  									<a href="{{route('admin.viabilidad.active',$viabilidad->id)}}" data-toggle="tooltip" data-placement="top" title="Reinyectar" class="btn btn-outline-primary"><i class="fa fa-chevron-circle-up"></i></a>
          								
          							@else
          								
      									<a href="{{route('viabilidad.edit',$viabilidad->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-outline-dark"><i class="fa fa-edit"></i></a>
      						
										  <a href="{{route('admin.viabilidad.destroy',$viabilidad->id)}}" data-toggle="tooltip" data-placement="top" title="Terminar" onclick="return confirm('¿Estas seguro de terminar este proyecto?')" class="btn btn-outline-success"><i class="fa fa-calendar-check"></i></a>
										  
										 <a href="{{route('admin.viabilidad.eliminar',$viabilidad->id)}}"
											data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="return confirm('¿Estas seguro de Eliminar este proyecto?')" class="btn btn-outline-danger"><i class="fa fa-trash"></i>
										</a> 
          			              				
          							@endif
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
        		{{$viabilidades->appends(Request::all())->render("pagination::simple-bootstrap-4")}}
        	</div>
        </div>
    </div>
</div>
@endsection