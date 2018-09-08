<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link type="text/css" rel="stylesheet" href="{{asset('recursos/bootstrap/css/bootstrap.css')}}"  media="screen,projection"/>
   <link type="text/css" rel="stylesheet" href="{{asset('recursos/bootstrap/css/main.css')}}"  media="screen,projection"/>
    <title>error 401</title>
  </head>
  <body>
   <div class="container">

      
   <div class="card text-center">
     <div class="card-header">
       Error 401
     </div>
     <div class="card-body">
       <h5 class="card-title">Acceso restringido</h5>
       <p class="card-text">No tienes acceso a esta zona</p>
       
       <a href="{{URL('/')}}" class="btn btn-primary">Volver</a>
     </div>
     
   </div>
  </div>
   
    <script type="text/javascript" src="{{asset('recursos/bootstrap/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('recursos/bootstrap/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('recursos/bootstrap/js/bootstrap.js')}}"></script>
  </body>
</html>