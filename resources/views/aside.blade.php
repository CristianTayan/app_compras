<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      
      
      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Administrador</li>
        <!-- Optionally, you can add icons to the links -->
      <li ><a href="{{Route('categorias.index')}}"><i class="fa fa-list"></i> <span>Categorias</span></a></li>
      <li ><a href="{{Route('Empresas.index')}}"><i class="fa fa-building"></i> <span>Empresas</span></a></li>

      <li class="treeview">
        <a href="{{Route('Usuarios.index')}}"><i class="fa fa-user"></i> <span>Usuarios</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{Route('Usuarios.index')}}">Usuarios aplicación</a></li>
          <li><a href="{{Route('Usuarios.indexA')}}">Administradores</a></li>
          <li><a href="{{Route('Usuarios.indexP')}}">Proveedores</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-image"></i> <span>Validar Imágenes</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{Route('Imagenes.indexE')}}">Empresas</a></li>
          <li><a href="{{Route('Imagenes.index')}}">Productos</a></li> 
        </ul>
      </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
