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
Route::get('Usuarios.create/{tipo}','WEB\UsuariosController@Usuarios_vista')->name('Usuarios.vista');
Route::get('crear/usuario','WEB\UsuariosController@registrar_usuario')->name('Usuarios.registrar');
Route::get('layout','WEB\UsuariosController@actualizar_usuario')->name('Usuarios.actualizar');
Route::get('Usuarios.index/{IDUSUARIO}/eliminar','WEB\UsuariosController@eliminar_usuario')->name('Usuarios.eliminar');
Route::get('/{IDUSUARIO}','WEB\UsuariosController@buscar_usuario')->name('Usuarios.buscar');
Route::get('EnviarCodigo/{IDUSUARIO}','WEB\UsuariosController@enviar_sms')->name('Usuarios.enviarCodigo');
Route::get('Verificacion/Usuario','WEB\UsuariosController@verificar_usuario')->name('Usuarios.verificar_usuario');
Route::get('Usuario.index/cambiarEstado/{IDUSUARIO}','WEB\UsuariosController@cambiar_estado_Usuario')->name('Usuario.cambiarEstadoUusuario');


//Imagenes
Route::get('Imagenes.indexE/listar','WEB\ImagenesController@listar_empresas')->name('Imagenes.indexE');
Route::get('Imagenes.indexE/{IDEMPRESA}/Verificar','WEB\ImagenesController@verificar_imagen')->name('Imagenes.verificar');
Route::get('Imagenes.index/listarProductos','WEB\ImagenesController@listar_productos')->name('Imagenes.index');
Route::get('Imagenes.index/{IDPRODUCTOS}/VerificarProducto','WEB\ImagenesController@verificar_imagen_P')->name('Imagenes.verificarProducto');

//Empresas
Route::get('Empresas.index/listarEmpresas','WEB\EmpresasController@index')->name('Empresas.index');
Route::get('Empresas.create/crear','WEB\EmpresasController@vistaCrear')->name('Empresas.vistaCrear');
Route::post('Empresas.index/crearE','WEB\EmpresasController@registrar')->name('Empresas.crear');
Route::post('Empresas.index/crear','WEB\EmpresasController@registrarEmpresas')->name('Empresas.CrearCategorias');
Route::get('Empresas.index/{ID}','WEB\EmpresasController@eliminarEmpresas')->name('Empresas.eliminar');
Route::get('/{ID}/actualizar','WEB\EmpresasController@vistaEditar')->name('Empresas.vistaEditar');
Route::post('Empresa.index/listar','WEB\EmpresasController@editarEmpresa')->name('Empresas.editarEmpresa');
Route::get('Empresa.index/cambiarEstado/{IDEMPRESA}','WEB\EmpresasController@cambiar_estado_Empresa')->name('Empresas.cambiarEstadoEmpresa');
Route::get('Empresa.index/agregar/{ID}','WEB\EmpresasController@vistaCrearEmpresaCat')->name('Empresas.agregarEmpCat');
Route::post('EmpresaCat/agregar','WEB\EmpresasController@registrarE')->name('Empresas.registarE');

//Categorias
Route::post('registrarCatEmp/registrar','WEB\Cat_EmpresasController@registrarCat')->name('Cat_Empresas.registrar');
Route::get('Cat_empresas.index/{ID}','WEB\Cat_EmpresasController@eliminarCategoria')->name('eliminarCat');
Route::get('EditarCategoriaEmpresas/{ID}','WEB\Cat_EmpresasController@vistaEditarCat')->name('editarCat');
Route::post('/EditarCat/editar','WEB\Cat_EmpresasController@editarCategoria')->name('editarCategoria');
Route::get('Cat_empresas/lista','WEB\Cat_EmpresasController@index')->name('categorias.index');
Route::get('Cat_empresas.create/crear','WEB\Cat_EmpresasController@vistaCrear')->name('Cat_Empresas.vistaCrear');
Route::get('CategoriasEmpresas/categoria/{ID}','WEB\Cat_EmpresasController@indexCat')->name('Empresas.indexCat');


//Pedido
Route::get('/Enviados/Pedidos','WEB\PedidoController@indexE')->name('pedidosE');
Route::get('/Enproceso/Pedidos','WEB\PedidoController@indexP')->name('pedidosP');
Route::get('/Entregados/Pedidos','WEB\PedidoController@indexF')->name('pedidosF');
Route::get('/Anulados/Pedidos','WEB\PedidoController@indexA')->name('pedidosA');
Route::get('/Encamino/Pedidos','WEB\PedidoController@indexC')->name('pedidosC');

//Detalles pedido
Route::get('/DetallesPedidos/{idPedido}','WEB\DetallePedidoController@index')->name('detalleP');



//Horarios
Route::get('/RegistrarHorario/Crear','WEB\HorariosController@registrar_horarios')->name('Horarios.registrar');
Route::get('/VistaCrearHorario/{IDEMPRESA}','WEB\HorariosController@vistaCrearHorario')->name('Horarios.vistaCrearHorario');

//Categorias Productos
Route::get('/listar/Catproductos/{id}','WEB\CatProductosController@index')->name('Catproductos.listar');
Route::get('/crear/Catproductos','WEB\CatProductosController@registrarCatProd')->name('Catproductos.crear');
Route::get('/crear/CategoriaProductos/{id}','WEB\CatProductosController@vistaCrearCategoriaP')->name('CategoriaP.vistaCrear');
Route::get('/listar/CategoriaProductos/{id}','WEB\CatProductosController@indexCategoriaP')->name('CategoriaP.listar');
Route::get('/registrar/Catproductos/{id}','WEB\CatProductosController@registrarCatProdEmp')->name('Catproductos.registrar');
Route::get('/productos/empresa/{ID}','WEB\CatProductosController@productos')->name('productosEmpresa');


//PRODUCTOS
Route::get('/Productoslistar/{id}','WEB\ProductosController@index')->name('productos.listar');
Route::get('/cambiarestadoProducto/{ID}','WEB\ProductosController@cambiar_estado_Producto')->name('productos.estado');
Route::get('/verificarImagen/{ID}','WEB\ProductosController@verificar_imagen')->name('productos.imagen');
Route::get('/vistaCrear/{id}','WEB\ProductosController@vista_crear')->name('productos.Crear');
Route::post('/regstrar/Producto','WEB\ProductosController@registrar_productos')->name('productos.Registrar');
Route::post('/actualizar/Producto','WEB\ProductosController@actualizar_productos')->name('productos.Actualizar');
Route::get('/eliminar/Producto/{ID}','WEB\ProductosController@eliminarProducto')->name('productos.Eliminar');
Route::get('/listar/EmpresasP','WEB\ProductosController@indexE')->name('Empresas.indexE');
Route::get('/vistaEditar/Producto/{id}','WEB\ProductosController@vistaEditarProd')->name('productos.Editar');

//Detalles producto
Route::get('/DetallesProductoslistar/{IDPRODUCTO}','WEB\DetallesProductosController@index')->name('Detallesproductos.listar');
Route::get('/DetallesProductos/Registrar','WEB\DetallesProductosController@Registrar')->name('Detallesproductos.Registrar');
Route::get('/DetallesProductoseliminar/{IDDETALLE}','WEB\DetallesProductosController@eliminar')->name('Detallesproductos.eliminar');

//Direcciones editar_direcciones
Route::get('/VistaCrearDirecciones/{IDUSUARIO}','WEB\DireccionesController@vistaCrearDireccion')->name('Direcciones.vistaCrearDireccion');
Route::get('/RegistarDireccion/crear','WEB\DireccionesController@registrar_direcciones')->name('Direcciones.registrar_direcciones');
Route::get('Actualizardirecciones/{IDUSUARIO}/lista','WEB\DireccionesController@Vista_Actualizar_direcciones')->name('Direcciones.vistaActualizarDireccion');
Route::get('Actualizar/usuario','WEB\DireccionesController@editar_direcciones')->name('Direcciones.actualizar');

//Transportitas
Route::get('/index/Transportistas','WEB\TransportistasController@index')->name('Transportistas.listar');
Route::get('/vista/Transportistas','WEB\TransportistasController@vistaCrear')->name('Transportistas.crear');
Route::post('/registrar/Transportistas','WEB\TransportistasController@registrarTransportista')->name('Transportistas.registrar');
Route::get('/eliminar/Transportistas/{id}','WEB\TransportistasController@eliminarTransportista')->name('Transportistas.eliminar');
Route::get('/vistaeditar/Transportistas/{id}','WEB\TransportistasController@vistaEditar')->name('Transportistas.editar');
Route::get('/actualizar/Transportistas','WEB\TransportistasController@actualizarTransportista')->name('Transportistas.actualizar');





