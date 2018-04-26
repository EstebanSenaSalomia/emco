<nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-between">
  <a class="navbar-brand" href="{{url('/')}}">
    <img src="{{asset('recursos/images/marca2.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
    EMCOMUNITEL S.A.S.
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto text-center">
      <li class="nav-item @yield('marca1')">
        <a class="nav-link " href="#"><i class="fa fa-database"></i> Ordenes</a>
      </li>
      <li class="nav-item @yield('marca2')">
        <a class="nav-link" href="#"> <i class="fa fa-eye"></i> Viabilidades</a>
      </li>
      <li class="nav-item @yield('marca3')">
        <a class="nav-link" href="{{route('users.index')}}"><i class="fa fa-users"></i> Usuarios</a>
      </li>
    </ul>
    <span class="navbar-text text-center">
      Realiza los seguimientos a las ordenes y viabilidades
    </span>
    
  </div>
</nav>
<p>&nbsp</p>