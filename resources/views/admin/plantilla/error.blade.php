
	@if(count($errors)>0)
		@foreach($errors->all() as $error)
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>ATENCIÓN!</strong>
			  <li>{{$error}}</li> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<br>
		@endforeach
	@endif

