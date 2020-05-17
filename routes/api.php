<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the 'api' middleware group. Enjoy building your API!
|
*/

//CATEGORIAS
Route::post( 'registrar_Cat_Empresas', 'API\CatEmpresasController@registrar_Cat_Empresas' );
Route::post( 'actualizar_Cat_Empresas', 'API\CatEmpresasController@actualizar_Cat_Empresas' );
Route::get( 'get_categorias', 'API\CatEmpresasController@get_categoriasEmpresas' );
Route::get( 'listar_nombres', 'API\CatEmpresasController@listar_nombres' );
Route::get( 'buscar_categoria/{NOMBRE}', 'API\CatEmpresasController@buscar_categoria' );

//EMPRESA
Route::post( 'registrar_empresa', 'API\EmpresasController@registrar_empresa' );
Route::get( 'get_empresas', 'API\EmpresasController@get_empresas' );
Route::post( 'actualizar_empresa', 'API\EmpresasController@actualizar_empresa' );
Route::get( 'buscar_empresa/{nombre_empresa}', 'API\EmpresasController@buscar_empresa' );
Route::get( 'listar_empresas', 'API\EmpresasController@listar_empresas' );
Route::get( 'empresas_por_categoria/{nombre_categoria}', 'API\EmpresasController@empresas_por_categoria' );
Route::get( 'cambiar_estado_empresas/{nombre}', 'API\EmpresasController@cambiar_estado_empresas' );

//CLASIFICACIONES ES DE LA TABLA CAT_PRODUCTOS
Route::post( 'registrar_clasificacion', 'API\ClasificacionController@registrar_clasificacion' );
Route::get( 'get_clasificacion/{idempresa}', 'API\ClasificacionController@get_clasificacion' );
Route::post( 'actualizar_clasificacion', 'API\ClasificacionController@actualizar_clasificacion' );
//Busca las categorias que tiene la empresa por ID de la empresa
Route::get( 'cat_prod_empresa/{idEmpresa}', 'API\ClasificacionController@cat_prod_empresa' );

//USUARIOS
Route::get( 'get_usuarios', 'API\UsuariosController@get_usuarios' );
Route::get( 'buscar_correo/{correo}', 'API\UsuariosController@buscar_correo' );
Route::get( 'cambiar_estado_usuario/{correo}', 'API\UsuariosController@cambiar_estado_usuario' );
Route::post( 'registrar_usuario', 'API\UsuariosController@registrar_usuario' );
Route::post( 'actualizar_usuario', 'API\UsuariosController@actualizar_usuario' );
Route::post( 'verificar_usuario', 'API\UsuariosController@verificar_usuario' );
Route::get( 'enviar_sms/{IDUSUARIO}', 'API\UsuariosController@enviar_sms' );

//LOGIN
Route::post( 'login', 'API\LoginController@login' );

//DIRECCIONES
Route::post( 'registrar_direcciones', 'API\DireccionesController@registrar_direcciones' );
Route::get( 'get_direcciones', 'API\DireccionesController@get_direcciones' );
Route::post( 'actualizar_direcciones', 'API\DireccionesController@actualizar_direcciones' );
Route::post( 'eliminar_direcciones', 'API\DireccionesController@eliminar_direcciones' );
//Lista los clientes con sus direcciones
Route::get( 'listar_clientes_direcciones', 'API\DireccionesController@listar_clientes_direcciones' );

//HORARIOS
Route::post( 'registrar_horarios', 'API\HorariosController@registrar_horarios' );
Route::get( 'get_horarios', 'API\HorariosController@get_horarios' );
Route::post( 'actualizar_horarios', 'API\HorariosController@actualizar_horarios' );
//Muestra si la empresa esta abierta o cerrada
Route::get( 'abierto_cerrado/{IDEMPRESA}', 'API\HorariosController@abierto_cerrado' );

// VISTAS
//Muestra la información del restaurante por el ID, las categorias que tiene y los productos de acuerdo a al Id de la categoria
Route::post( 'restaurante_producto', 'API\VistasController@restaurante_producto' );
//Muestra la informacion del producto y de que empresa es
Route::get( 'informacion_producto/{IDPRODUCTO}', 'API\VistasController@informacion_producto' );
Route::get( 'productos_lista', 'API\VistasController@productos_lista' );

//PRODUCTOS
Route::post( 'registrar_productos', 'API\ProductosController@registrar_productos' );
Route::post( 'actualizar_productos', 'API\ProductosController@actualizar_productos' );
Route::get( 'get_productos/{idempresa}', 'API\ProductosController@get_productos' );
//Muestra los productos de acuerdo a la clasificacion que tiene la empresa
Route::get( 'productos_clasificacion/{clasificacion}', 'API\ProductosController@productos_clasificacion' );
Route::get( 'cambiar_estado_producto/{idProd}', 'API\ProductosController@cambiar_estado_producto' );
Route::get( 'cambiar_estado_detalle/{idProd}', 'API\ProductosController@cambiar_estado_producto' );

//PEDIDOS
Route::post( 'registrar_pedidos', 'API\PedidosController@registrar_pedidos' );
Route::get( 'atender_pedidos/{IDPEDIDO}', 'API\PedidosController@atender_pedidos' );
Route::get( 'finalizar_pedidos/{IDPEDIDO}', 'API\PedidosController@finalizar_pedidos' );
Route::get( 'anular_pedidos/{IDPEDIDO}', 'API\PedidosController@anular_pedidos' );

//DETALLE PRODUCTO
Route::post( 'registrar_detalle_prod', 'API\DetalleProdController@registrar_detalle_prod' );
Route::get( 'get_detalle_prod', 'API\DetalleProdController@get_detalle_prod' );
Route::post( 'actualizar_detalle_prod', 'API\DetalleProdController@actualizar_detalle_prod' );
//Lista solo los nombres de los detalles
Route::get( 'listar_detalle_prod', 'API\DetalleProdController@listar_detalle_prod' );
//Lista los detalles de un producto ingresado por el id
Route::get( 'detalle_producto/{idProd}', 'API\DetalleProdController@detalle_producto' );
Route::post( 'eliminar_detalle', 'API\DetalleProdController@eliminar_detalle' );

//DETALLE PEDIDOS
Route::get( 'get_detallesPedido', 'API\DetallePedidoController@get_detallesPedido' );
Route::post( 'registrar_detallesPedido', 'API\DetallePedidoController@registrar_detallesPedido' );
Route::post( 'actualizar_detallesPedido', 'API\DetallePedidoController@actualizar_detallesPedido' );
Route::get( 'eliminar_detallePedidos/{IDDETALLE}', 'API\DetallePedidoController@eliminar_detallePedidos' );

//Favoritos
Route::post( 'agregar_favorito', 'API\favoritosController@agregar_favorito' );
Route::post( 'eliminar_favorito', 'API\favoritosController@eliminar_favorito' );
Route::post( 'verificar_favorito', 'API\favoritosController@verificar_favorito' );

