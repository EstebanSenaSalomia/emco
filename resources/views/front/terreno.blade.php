@extends('admin.plantilla.main')
@section('title','VB-'.$terreno->nombre)
@section('marca2','active')

@section('content')
	
	<div class="row">
		<div class="col-md-4 col-sm-6">
			
		<img src="{{asset('recursos/images/logo.png')}}" alt="..." class="img-thumbnail">
		</div>
		<div class="col-md-4 col-sm-6">
			
		<img src="{{asset('recursos/images/logo.png')}}" alt="..." class="img-thumbnail">	
		</div>
		<div class="col-md-4 col-sm-6">
			
		<img src="{{asset('recursos/images/logo.png')}}" alt="..." class="img-thumbnail">	
		</div>
		<div class="col-md-4 col-sm-6">
			
		<img src="{{asset('recursos/images/logo.png')}}" alt="..." class="img-thumbnail">
		</div>
		<div class="col-md-4 col-sm-6">
			
		<img src="{{asset('recursos/images/logo.png')}}" alt="..." class="img-thumbnail">	
		</div>
		<div class="col-md-4 col-sm-6">
			
		<img src="{{asset('recursos/images/logo.png')}}" alt="..." class="img-thumbnail">	
		</div>
	</div>

@endsection