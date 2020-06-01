
@php
  session_start();  
@endphp
<header class="main-header">

    <!-- Logo -->
<a href="{{route('Login.vista')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
     <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">
                @if (Session::has('status'))  
                {{Session::get('status')}}             
                  @endif
              </span>
            </a>
           
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
            <p>Administrador</p>
             <a href="{{ route('Logout.Cerrar') }}" class="btn btn-default btn-sm btn-flat pull-center ">Cerrar sesión</a>
              </li>
              
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>