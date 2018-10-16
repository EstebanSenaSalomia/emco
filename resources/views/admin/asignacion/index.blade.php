@extends('admin.plantilla.main')
	@section('title','Asignaciones')
	@section('marca4','active')
@section('content')

<div id="accordion1">
    <div id="accordion">

    @foreach ($asignarvbs as $asignarvb) 
    @if (Auth::User()->gestor() or Auth::User()->id == $asignarvb->user->id)
        
        <div class="card">
            <div class="card-header" id="heading{{$asignarvb->id}}">
                <h5 class="mb-0">
                    <button class="btn btn-link " data-toggle="collapse" data-target="#collapse{{$asignarvb->id}}" aria-expanded="true" aria-controls="collapse{{$asignarvb->id}}">
                        Responsable: <span class="">{{$asignarvb->user->name}}</span> 
                    </button>
                    <a href="{{-- {{route('admin.users.destroy',$user->id)}} --}}#" data-toggle="tooltip" data-placement="bottom" title="Agregar" class="btn btn-outline-success float-right"><i class="fa fa-plus"></i></a>
                </h5>
            </div>
            <div id="collapse{{$asignarvb->id}}" class="collapse" aria-labelledby="heading{{$asignarvb->id}}" data-parent="#accordion1">
                <div class="card-body">
                    <div id="accordion">
                        @foreach ($asignarvb->viabilidades as $viabilidad)

                         @if ($viabilidad->estado=='Activa' or (Auth::User()->type != 'supervisor'))
                       
                              <ul class="list-group">
                              <li class="list-group-item"><a href="{{route('terreno.index',['id'=>$viabilidad->id])}}"><h5>{{$viabilidad->nombre}}</h5></a> <h6>{{$viabilidad->direccion}}</h6></h5></li>
                              </ul>
                        
                        @endif
                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
       @endif
    @endforeach  
</div>
  {{--  <div id="accordion"> 
    @foreach($asignarvbs as $asignarvb)	
    	<div class="card">
    	    <div class="card-header" id="heading{{$asignarvb->id}}">
    	      <h5 class="mb-0">
    	        <button class="btn btn-link" data-toggle="collapse" data-target="#{{$asignarvb->id}}" aria-expanded="false" aria-controls="{{$asignarvb->id}}">
    	         Responsable: <span class="font-weight-bold">{{$asignarvb->user->name}}</span> 
    	        </button>
    	      </h5>
    	    </div> 
    		el loop->index me devuelve el indice del ciclo en el que estoy 
    	     <div id="{{$asignarvb->id}}" class="collapse" aria-labelledby="heading{{$asignarvb->id}}" data-parent="#accordion">
        	    <div class="card-body">
                    <div class="accordion">
                        @foreach ($asignarvb->viabilidades as $viabilidad)
                            <div class="card">
                                <div class="card-header" id="headin{{$asignarvb->id}}">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#h{{$asignarvb->id}}" aria-expanded="false" aria-controls="{{$asignarvb->id}}">
                                     Responsable: <span class="font-weight-bold">{{$asignarvb->user->name}}</span> 
                                    </button>
                                  </h5>
                                </div>
                                <div id="h{{$asignarvb->id}}" class="collapse" aria-labelledby="headin{{$asignarvb->id}}" data-parent="#accordion">
                            </div>
                            <div class="card-body">
                                
                            </div>
                        @endforeach
                    </div>
        	        <ul class="list-group list-group-flush">
        	          
						@foreach ($asignarvb->viabilidades as $viabilidad)
                            <li class="list-group-item"><span class="font-weight-bold">Numero:  </span>
							<td>{{$viabilidad->numero}}</td><br>
                            <li class="list-group-item"><span class="font-weight-bold">Nombre:  </span>
                            <td>{{$viabilidad->nombre}}</td><br>
                            <li class="list-group-item"><span class="font-weight-bold">Fecha Requerida:  </span>
                            <td>{{$viabilidad->fecha_reque}}</td><br>
                            <li class="list-group-item"><span class="font-weight-bold">Dirección:  </span>
                            <td>{{$viabilidad->direccion}}</td><br>		
						@endforeach
        	          </li>
        	             <li class="list-group-item">
        	          		<a href="{{route('users.edit',$user->id)}}" class="btn btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
        	          		<a href="{{route('admin.users.destroy',$user->id)}}" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="return confirm('¿Estas seguro de eliminar este usuario?')" class="btn btn-outline-danger"><i class="fa fa-trash-alt"></i></a>
        	          </li> 
        	        </ul> 
        	    </div>
    	    </div>
    	</div>
    @endforeach
</div> --}}
	    	{{-- @foreach($asignarvbs as $asignarv)
			<tr>
				
					@foreach ($asignarv->viabilidades as $element)
						<td>{{$element->numero}}</td>			
					@endforeach
			
				
			</tr>
	      @endforeach --}}
	
@endsection