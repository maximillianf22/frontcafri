<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="user-profile treeview">
        <a href="index.html">
          <img src="{{ asset('assets/administrator/images/user5-128x128.jpg')}}" alt="user">
          <span>Daniel García</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-user"></i>Perfil</a></li>
          <li><a href="{{route('admin.roles')}}"><i class="fa fa-users"></i> Roles y perfiles</a></li>
          <li><a href="{{route("admin.permisos")}}"><i class="fa fa-unlock"></i> Permisos</a></li>
          <li><a href="{{route('getLogout')}}"><i class="fa fa-power-off mr-5"></i> Cerrar sesión</a></li>
        </ul>
      </li>
      <li class="header nav-small-cap">MENU</li>
      <!--
      <li>
        <a href="{{ Request::is('administrator') || Request::is('administrator/*') ? 'active' : '' }}">
          <i class="fa fa-dashboard"></i> <span>Inicio</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
      </li>
      -->
      <!--
      @foreach ($modules as $listModule)
        <li class="{{ Request::is($listModule->url) || Request::is($listModule->url . '/*') ? 'active' : '' }}">
          <a href="{{ url($listModule->url) }}">
            <i class="{{$listModule->icon}}"></i> <span>{{$listModule->name}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
      @endforeach
      -->
      <li class="treeview_">
        <a href="{{route('admin.customers')}}">
        <i class="lni-users"></i> Mis Clientes
        </a>
      </li>

      <li class="treeview_">
        <a href="{{route('admin.store.products')}}">
          <i class="lni-cart"></i> Mis Productos
        </a>
      </li>

      
     

      <li class="treeview_">
        <a href="{{route('admin.orders')}}">
        <i class="lni-ticket-alt"></i> Pedidos
        </a>
      </li>
      <li class="treeview_">
        <a href="{{route('admin.category')}}">
        <i class="lni-list"></i> Categorias
        </a>
      </li>

      <li class="treeview_">
        <a href="{{route('admin.unidad.medidas')}}">
          <i class="lni-postcard"></i> Unidades de Medida
        </a>
      </li>

      <li class="treeview_">
        <a href="{{route('admin.sliders')}}">
          <i class="lni-postcard"></i> Slider
        </a>
      </li>

      {{-- <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>App</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../app/app-chat.html"><i class="fa fa-circle-thin"></i>Chat app</a></li>
          <li><a href="../app/app-contact.html"><i class="fa fa-circle-thin"></i>Contact / Employee</a></li>
          <li><a href="../app/app-ticket.html"><i class="fa fa-circle-thin"></i>Support Ticket</a></li>
          <li><a href="../app/calendar.html"><i class="fa fa-circle-thin"></i>Calendar</a></li>
          <li><a href="../app/profile.html"><i class="fa fa-circle-thin"></i>Profile</a></li>
          <li><a href="../app/userlist-grid.html"><i class="fa fa-circle-thin"></i>Userlist Grid</a></li>
          <li><a href="../app/userlist.html"><i class="fa fa-circle-thin"></i>Userlist</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-envelope"></i> <span>Mailbox</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../mailbox/mailbox.html"><i class="fa fa-circle-thin"></i>Inbox</a></li>
          <li><a href="../mailbox/compose.html"><i class="fa fa-circle-thin"></i>Compose</a></li>
          <li><a href="../mailbox/read-mail.html"><i class="fa fa-circle-thin"></i>Read</a></li>
        </ul>
      </li> --}}
    </ul>
  </section>
</aside>
