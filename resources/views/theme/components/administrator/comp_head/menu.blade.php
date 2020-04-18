
  <a href="{{route('admin.dashboard')}}" class="logo">
    <b class="logo-mini">
      <span class="light-logo text-center"><img src="{{ asset('content/upload/theme/logo_slogan.png')}}" width="70%" alt="logo"></span>
      
    </b>
    <span class="logo-lg">
    <!--
      <img src="{{ asset('assets/administrator/images/logo-light-text.png')}}" alt="logo" class="light-logo">
      <img src="{{ asset('assets/administrator/images/logo-dark-text.png')}}" alt="logo" class="dark-logo">
    -->
    </span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Menu</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="search-box">
          <a class="nav-link hidden-sm-down" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
          <form class="app-search" style="display: none;">
            <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
          </form>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ Auth::User()->nameUser }} 
            <img src="{{ asset('assets/administrator/images/user5-128x128.jpg')}}" class="user-image rounded-circle" alt="User Image">
          </a>
          <ul class="dropdown-menu scale-up">
            <li class="user-header">
              <img src="{{ asset('assets/administrator/images/user5-128x128.jpg')}}" class="float-left rounded-circle" alt="User Image">
              <p>
                <a href="{{route('account.index')}}" target="new">{{Auth::user()->nameUser . ' ' . Auth::user()->lastnameUser}}</a>
                <small class="mb-5">{{Auth::user()->identificacion}}</small>
                <!--
                <a href="{{route('admin.users.edit',Auth::user()->id)}}" class="btn btn-danger btn-sm btn-rounded">Ver perfil</a>
                -->
              </p>
            </li>
            <li class="user-body">
              <div class="row no-gutters">
                @if(Auth::user()->id==1)
                <div class="col-12 text-left">
                  <a href="{{route('admin.users.sistema')}}"><i class="fa fa-users"></i>Usuarios Sistema </a>
                </div>
                @endif

                
                <div role="separator" class="divider col-12"></div>
                <div class="col-12 text-left">
                  <a href="{{route('getLogout')}}"><i class="fa fa-power-off"></i> Cerrar sesión</a>
                </div>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
