<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
//Usuarios
Route::get('Usuarios.index','WEB\UsuariosController@listar_usuarios_U')->name('Usuarios.index');
Route::get('Usuarios.indexA','WEB\UsuariosController@listar_usuarios_A')->name('Usuarios.indexA');
Route::get('Usuarios.indexP','WEB\UsuariosController@listar_usuarios_P')->name('Usuarios.indexP');
Route::get('Usuarios.create','WEB\UsuariosController@Usuarios_vista')->name('Usuarios.vista');
Route::get('/crear','WEB\UsuariosController@registrar_usuario')->name('Usuarios.registrar');
Route::get('layout','WEB\UsuariosController@actualizar_usuario')->name('Usuarios.actualizar');
Route::get('Usuarios.index/{IDUSUARIO}/eliminar','WEB\UsuariosController@eliminar_usuario')->name('Usuarios.eliminar');
Route::get('/{IDUSUARIO}','WEB\UsuariosController@buscar_usuario')->name('Usuarios.buscar');

//Imagenes
Route::get('Imagenes.indexE/listar','WEB\ImagenesController@listar_empresas')->name('Imagenes.indexE');
Route::get('Imagenes.indexE/{IDEMPRESA}/Verificar','WEB\ImagenesController@verificar_imagen')->name('Imagenes.verificar');
Route::get('Imagenes.index/listarProductos','WEB\ImagenesController@listar_productos')->name('Imagenes.index');
Route::get('Imagenes.index/{IDPRODUCTOS}/VerificarProducto','WEB\ImagenesController@verificar_imagen_P')->name('Imagenes.verificarProducto');

//Empresas
Route::get('Empresas.index/listarEmpresa','WEB\EmpresasController@index')->name('Empresas.index');
Route::get('Empresas.create/crear','WEB\EmpresasController@vistaCrear')->name('Empresas.vistaCrear');
Route::get('Empresas.index/crear','WEB\EmpresasController@registrar')->name('Empresas.crear');
Route::get('Empresas.index/{ID}','WEB\EmpresasController@eliminarEmpresas')->name('Empresas.eliminar');
Route::get('/{ID}/actualizar','WEB\EmpresasController@vistaEditar')->name('Empresas.vistaEditar');
Route::get('Empresa.index/listar','WEB\EmpresasController@editarEmpresa')->name('Empresas.editarEmpresa');
Route::get('Empresa.index/cambiarEstado/{IDEMPRESA}','WEB\EmpresasController@cambiar_estado_Empresa')->name('Empresas.cambiarEstadoEmpresa');


//Categorias
Route::get('registrarCatEmp/registrar','WEB\Cat_EmpresasController@registrarCat')->name('Cat_Empresas.registrar');
Route::get('Cat_empresas.index/{ID}','WEB\Cat_EmpresasController@eliminarCategoria')->name('eliminarCat');
Route::get('EditarCategoriaEmpresas/{ID}','WEB\Cat_EmpresasController@vistaEditarCat')->name('editarCat');
Route::get('/EditarCat/editar','WEB\Cat_EmpresasController@editarCategoria')->name('editarCategoria');
Route::get('Cat_empresas/lista','WEB\Cat_EmpresasController@index')->name('categorias.index');
Route::get('Cat_empresas.create/crear','WEB\Cat_EmpresasController@vistaCrear')->name('Cat_Empresas.vistaCrear');

//Vistas Pedidos y detalles pedidos.
Route::get('/Enviados/Pedidos','WEB\PedidoController@indexE')->name('pedidosE');
Route::get('/Enproceso/Pedidos','WEB\PedidoController@indexP')->name('pedidosP');
Route::get('/Entregados/Pedidos','WEB\PedidoController@indexF')->name('pedidosF');
Route::get('/Anulados/Pedidos','WEB\PedidoController@indexA')->name('pedidosA');

//Detalles pedido
Route::get('/Detalles/Pedidos','WEB\DetallePedidoController@index')->name('detalleP');

//Horarios
Route::get('/RegistrarHorario/Crear','WEB\HorariosController@registrar_horarios')->name('Horarios.registrar');
Route::get('/VistaCrearHorario/{IDEMPRESA}','WEB\HorariosController@vistaCrearHorario')->name('Horarios.vistaCrearHorario');

//Categorias Productos
Route::get('/VistaCatProductos/ver','WEB\CatProductosController@index')->name('probar');
Route::get('/productos/empresa/{ID}','WEB\CatProductosController@productos')->name('productosEmpresa');


//PRODUCTOS
Route::get('/Productoslistar/{id}','WEB\ProductosController@index')->name('productos.listar');
Route::get('/cambiarestadoProducto/{ID}','WEB\ProductosController@cambiar_estado_Producto')->name('productos.estado');
Route::get('/verificarImagen/{ID}','WEB\ProductosController@verificar_imagen')->name('productos.imagen');
Route::get('/vistaCrear/{id}','WEB\ProductosController@vista_crear')->name('productos.Crear');
Route::get('/regstrar/Producto','WEB\ProductosController@registrar_productos')->name('productos.Registrar');
Route::get('/eliminar/Producto/{ID}','WEB\ProductosController@eliminarProducto')->name('productos.Eliminar');



//Direcciones
Route::get('/VistaCrearDirecciones/{IDUSUARIO}','WEB\DireccionesController@vistaCrearDireccion')->name('Direcciones.vistaCrearDireccion');
Route::get('/RegistarDireccion/crear','WEB\DireccionesController@registrar_direcciones')->name('Direcciones.registrar_direcciones');
Route::get('/VistaActualizarDirecciones/{IDUSUARIO}','WEB\DireccionesController@Vista_Actualizar_direcciones')->name('Direcciones.vistaActualizarDireccion');






