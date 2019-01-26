@extends('admin.plantilla.main')
@section('welcome')
   
<div class="container">
   <div class="card text-center">
     <div class="card-header">
       <h4 id="fuente">¡Bienvenido!</h4>
     </div>
     <div class="card-body">
       <img src="{{asset('recursos/images/logo.png')}}" width="180" class="rounded mx-auto d-block" alt="Cargando">
       <p class="card-text">EMCOMUNITEL S.A.S.</p>
     </div>
     <div class="card-footer text-muted">
        Desde esta aplicaron web podrás hacer los avances requeridos a todos los proyectos que se generen
     </div>
   </div>
</div>   
@endsection