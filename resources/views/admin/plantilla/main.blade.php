<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title','default')</title>

    <!-- Bootstrap -->
      <link type="text/css" rel="stylesheet" href="{{asset('recursos/bootstrap/css/bootstrap.css')}}"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="{{asset('recursos/bootstrap/css/main.css')}}"  media="screen,projection"/>
     

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @include('admin.plantilla.nav')
    <!-- Grey with black text -->
    

    <section>
      <div class="container">
        <div class="card text-center">
          <div class="card-body">
            <h4> @yield('title')</h4>
          </div>
        </div>
      <!--flass -->
      @include('admin.plantilla.error')
      @yield('content')
      </div>
    </section>
    
    
    @include('admin.plantilla.footer')

    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="{{asset('recursos/bootstrap/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('recursos/bootstrap/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('recursos/bootstrap/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('recursos/bootstrap/js/main.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>