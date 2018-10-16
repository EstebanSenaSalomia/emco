  @if (Auth::check())
  {{-- expr --}}
<nav class="navbar navbar-expand-md navbar-dark nav-color justify-content-between fixed-top">
    <a class="navbar-brand" href="{{url('/')}}">
    <img src="{{asset('recursos/images/marca2.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
    EMCOMUNITEL S.A.S.
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto text-center">
      {{-- <li class="nav-item @yield('marca1')">
        <a class="nav-link " href="#"><i class="fa fa-database"></i> Ordenes</a>
      </li> --}}
      <li class="nav-item @yield('marca2')">
        <a class="nav-link" href="{{route('admin.viabilidad.index')}}"> <i class="fa fa-eye"></i> Terreno</a>
      </li>
      @if (Auth::user()->admin()) {{-- admin es una funcion de el modelo user --}}
        <li class="nav-item @yield('marca3')">
        <a class="nav-link" href="{{route('users.index')}}"><i class="fa fa-users"></i> Usuarios</a>
      </li>
      @endif
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @yield('marca4')" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-hand-point-right"></i> Asignaciones</a>
          <div class="dropdown-menu">
            @if(Auth::user()->type != 'supervisor')
                <a class="dropdown-item" href="{{route('asignacion.index')}}">Bandeja</a>
                <a class="dropdown-item" href="{{route('asignacion.create')}}">Asignar</a>
            @else
                <a class="dropdown-item" href="{{route('asignacion.index')}}">Mi bandeja</a>
            @endif
            
            
          </div>
        </li>
    </ul>
    <div class="my-2 my-lg-0">
      <div class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i>  {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('admin.auth.logout')}}">Cerrar Sesión</a>
        </div>
      </div>
    </div>
  </div>
</nav>
@endif
<p>&nbsp</p>
