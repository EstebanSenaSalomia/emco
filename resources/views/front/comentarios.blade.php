
	@foreach ($comentario as $com)
		<ul>
			<li>{{$com->contenido}}</li>
		</ul>
	@endforeach

{!! Form::open(['action'=>'FrontController@storeComentario','METHOD'=>'POST'])!!}
	   <div class="card text-center">
	     <div class="card-header">
	       {{$terreno->nombre}}
	     </div>
	     <div class="card-body">
	      
	       <div class="form-group">
       		    {!! Form::label('comentario','Seguimiento',[])!!}
       		    {!! Form::textarea('comentario',null,['class'=>'form-control','form-control'])!!}
	       	</div>
	       	{!! Form::number('viabilidad_id',$terreno->id,['class'=>'form-control','form-control','hidden'])!!}
	       {!!Form::submit('Guardar',['class'=>'btn btn-outline-success'])!!}
	       <a type="reset" class="btn btn-outline-dark">limpiar</a>
	     </div>
	     <div class="card-footer text-muted">
	       
	     </div>
	   </div>
{!!Form::close()!!}


