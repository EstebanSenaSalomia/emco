<hr>
	@foreach ($comentario as $com)
	   <div class="card">
	     <div class="card-header">
	       <i class="fa fa-user-circle"><h6>{{$com->user->name}}</h6></i>
	     </div>
	     <div class="card-body">
	       <p class="card-text">{{$com->contenido}}</p>
	     </div>
	     <div class="card-footer text-muted">
	        {{$com->created_at->diffForHumans()}}
	      </div>
	   </div>
	   <hr>
	@endforeach

{!! Form::open(['action'=>'FrontController@storeComentario','METHOD'=>'POST','id'=>'myForm'])!!}
{{ csrf_field() }}
	   <div class="card">
	     <div class="card-header text-center">
	       Observaciones - {{$viabilidades->nombre}}
	     </div>
	     <div class="card-body">
	      
	       <div class="form-group">
       		    {!! Form::label('comentario','Seguimiento',[])!!}
       		    {!! Form::textarea('comentario',null,['class'=>'textarea-content form-control'])!!}
	       	</div>
	       	{!! Form::number('viabilidad_id',$viabilidades->id,['class'=>'form-control','form-control','hidden'])!!}
	       {!!Form::submit('Guardar',['class'=>'btn btn-outline-success'])!!}
	       <a type="reset" onclick="formReset()" class="btn btn-outline-dark">limpiar</a>
	     </div>
	     <div class="card-footer text-muted">
	       
	     </div>
	   </div>
{!!Form::close()!!}



