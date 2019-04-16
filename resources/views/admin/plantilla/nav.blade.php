  @if (Auth::check())
  {{-- expr --}}
<nav class="navbar navbar-expand-md navbar-dark nav-color justify-content-between fixed-top">
    <a class="navbar-brand" href="{{url('/')}}">
    <img src="{{asset('recursos/images/logo2.png')}}" width="50" height="30" class="d-inline-block align-top" alt="">
    
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto text-center">

      <li class="nav-item @yield('marca2')">
        <a class="nav-link" href="{{route('admin.viabilidad.index')}}"> <i class="fa fa-eye"></i> P. Externa</a>
      </li>

      <li class="nav-item">
          <a class="nav-link @yield('marca6') "  href="{{route('masivos.index')}}"><i class="fa fa-eye"></i> Masivos
            <span class="badge badge-light"></span>
          </a>
      </li>
     
      <li class="nav-item">
          <a class="nav-link @yield('marca4')"  href="{{route('asignacion.index')}}"><i class="fa fa-hand-point-right"></i> Asignaciones</a>
      </li>

      @if(Auth::user()->gestor())
      <li class="nav-item">
          <a class="nav-link @yield('marca5') "  href="{{route('admin.alert')}}"><i class="fa fa-comment"></i> Avances
            <span class="badge badge-light"></span>
          </a>
      </li>
         
      @endif

      @if (Auth::user()->admin()) {{-- admin es una funcion de el modelo user --}}
      <li class="nav-item @yield('marca3')">
        <a class="nav-link" href="{{route('users.index')}}"><i class="fa fa-users"></i> Usuarios</a>
      </li>
      @endif
<<<<<<< HEAD
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle @yield('marca4')" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-hand-point-right"></i> Asignaciones</a>
          <div class="dropdown-menu">
            @if(Auth::user()->type != 'supervisor')
                <a class="dropdown-item" href="{{route('asignacion.index')}}">Bandeja</a>
            @else
                <a class="dropdown-item" href="{{route('asignacion.index')}}">Mi bandeja</a>
            @endif
            
            
          </div>
        </li>
=======


>>>>>>> 2df378eac9d47a4696da71a1304ebee78a1aa496
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


