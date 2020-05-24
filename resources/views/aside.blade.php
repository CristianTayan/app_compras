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

        <li class="treeview {{ !Route::is('Usuarios.index') ?: 'active' }} || {{!Route::is('Usuarios.indexA') ?: 'active'}} || {{!Route::is('Usuarios.indexP') ?: 'active'}}">
          <a href="{"><i class="fa fa-user"></i> <span>Usuarios</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ !Route::is('Usuarios.index') ?: 'active'}}"><a href="{{Route('Usuarios.index')}}">Usuarios aplicación</a></li>
            <li class="{{ !Route::is('Usuarios.indexA') ?: 'active'}}"><a href="{{Route('Usuarios.indexA')}}">Administradores</a></li>
            <li class="{{ !Route::is('Usuarios.indexP') ?: 'active'}}"><a href="{{Route('Usuarios.indexP')}}">Proveedores</a></li>
          </ul>
        </li>
  
      <li class="{{ !Route::is('categorias.index') ?: 'active'}}"><a href="{{Route('categorias.index')}}"><i class="fa fa-list"></i> <span>Categorias</span></a></li>
      <li class="{{ !Route::is('Empresas.index') ?: 'active'}}"><a href="{{Route('Empresas.index')}}"><i class="fa fa-building"></i> <span>Empresas</span></a></li>
      <li class="{{ !Route::is('Empresas.indexE') ?: 'active'}}"><a href="{{Route('Empresas.indexE')}}"><i class=" fa fa-shopping-cart"></i> <span>Productos</span></a></li>
            

     <!-- Validar imagenes <li class="treeview {{ !Route::is('Imagenes.indexE') ?: 'active' }} || {{!Route::is('Imagenes.index') ?: 'active'}}" >
        <a href="#"><i class="fa fa-image"></i> <span>Validar Imágenes</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ !Route::is('Imagenes.indexE') ?: 'active'}}"><a href="{{Route('Imagenes.indexE')}}">Empresas</a></li>
          <li class="{{ !Route::is('Imagenes.index') ?: 'active'}}"><a href="{{Route('Imagenes.index')}}">Productos</a></li> 
        </ul>
      </li>-->
      <li class="treeview {{ !Route::is('pedidosE') ?: 'active' }} || {{!Route::is('pedidosP') ?: 'active'}}
       || {{!Route::is('pedidosF') ?: 'active'}} || {{!Route::is('pedidosA') ?: 'active'}}">
        <a href=""><i class="fa fa-send "></i> <span>Pedido</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ !Route::is('pedidosE') ?: 'active' }}"><a href="{{Route('pedidosE')}}">Pedidos enviados</a></li>
          <li class="{{ !Route::is('pedidosP') ?: 'active' }}"><a href="{{Route('pedidosP')}}">Pedidos en proceso</a></li>
          <li class="{{ !Route::is('pedidosF') ?: 'active' }}"><a href="{{Route('pedidosF')}}">Pedidos Finalizados</a></li>
          <li class="{{  Route::is('pedidosA') ?: 'active' }}"><a href="{{Route('pedidosA')}}">Pedidos Anulados</a></li>
        
        </ul>

      </li>
    
    <li class="{{ !Route::is('Transportistas.listar') ?: 'active'}}"><a href="{{Route('Transportistas.listar')}}"><i class="fa fa-car"></i> <span>Transportistas</span></a></li>
    </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
