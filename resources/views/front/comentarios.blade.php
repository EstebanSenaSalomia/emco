<hr>
{!! Form::open(['action'=>'FrontController@storeComentario','METHOD'=>'POST','id'=>'myForm'])!!}
{{ csrf_field() }}
	   <div class="card">
	     <div class="card-header text-center">
	       Observaciones - {{$viabilidades->nombre}}
	     </div>
	     <div class="card-body">
	      
	       <div class="form-group col-md-7 mx-auto">
       		    {!! Form::label('comentario','Seguimiento',[])!!}
       		    {!! Form::textarea('comentario',null,['class'=>'textarea-content form-control'])!!}
	       	</div>
	       	<div class="row">
	       		<div class="col-md-6">
			       	
	       		</div>
	       </div>
	     </div>
	     <div class="card-footer text-center">
		       	{!! Form::number('viabilidad_id',$viabilidades->id,['class'=>'form-control','form-control','hidden'])!!}
		       	{!!Form::submit('Guardar',['class'=>'btn btn-outline-success'])!!}
	       		<a type="reset" onclick="formReset()" class="btn btn-outline-dark">limpiar</a>
	     </div>
	   </div>
{!!Form::close()!!}
 <p>&nbsp</p>
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



