<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductosController extends Controller
{
    public function index($id)
    {
        $productos = DB::table('productos')->where('IDEMPRESA', $id)->get();
        $categorias = DB::table('cat_productos')->where('IDEMPRESA', $id)->get();
        return view('Productos.index', compact('productos', 'categorias'));
    }

    public function cambiar_estado_Producto($ID)
    {
        $estado = DB::table('productos')->where('IDPRODUCTO', $ID)->get();
        foreach ($estado as $e) {
            if ($e->ESTADO ==  'S') {
                DB::table('productos')
                    ->where('IDPRODUCTO', $ID)
                    ->update([
                        'ESTADO' => 'N'
                    ]);
                return redirect(route('productos.listar', $e->IDEMPRESA));
            } else {
                DB::table('productos')
                    ->where('IDPRODUCTO', $ID)
                    ->update([
                        'estado' => 'S'
                   ]);
                return redirect(route('productos.listar', $e->IDEMPRESA));
            }
        }
    }
    public function verificar_imagen($ID)
    {
        $estado = DB::table('productos')->where('IDPRODUCTO', $ID)->get();
        foreach ($estado as $e) {
            if ($e->VERIFICAR_IMG ==  'S') {
                DB::table('productos')
                    ->where('IDPRODUCTO', $ID)
                    ->update([
                        'VERIFICAR_IMG' => 'N'
                    ]);
                return redirect(route('productos.listar', $e->IDEMPRESA));
            } else {
                DB::table('productos')
                    ->where('IDPRODUCTO', $ID)
                    ->update([
                        'VERIFICAR_IMG' => 'S'
                   ]);
                return redirect(route('productos.listar', $e->IDEMPRESA));
            }
        }
    }
    public function vista_crear($id){
        
        $categorias = DB::table('cat_productos')->where('IDEMPRESA', $id)->get();
        return view('Productos.create', compact( 'categorias'));
    }

    public function registrar_productos( Request $request ) {
       
       
        $IDCATEGORIA = $request->IDCATEGORIA;
        $NOMBRE = $request->NOMBRE;
        $IDEMPRESA = $request->IDEMPRESA;
        $DESCRIPCION = $request->DESCRIPCION;
        $COSTO = $request->COSTO;
        $FOTO = $request->FOTO;
        $FOTO = 'producto/'.$FOTO;
        $ESTADO = 'S';
        $DETALLE = 'N';
        $CREATED_AT = Carbon::now();

        DB::table( 'productos' )->insert(
            [
                'IDCATEGORIA' => $IDCATEGORIA,
                'IDEMPRESA' =>$IDEMPRESA,   
                'NOMBRE' => $NOMBRE,
                'DESCRIPCION' => $DESCRIPCION,
                'COSTO' => $COSTO,
                'FOTO' => $FOTO,
                'ESTADO' => $ESTADO,
                'DETALLE' => $DETALLE,
                'CREATED_AT' => $CREATED_AT
            ]
        );
        $mensaje = ['message' => 'Se registro exitosamente'];
        return redirect( route( 'productos.listar',$IDEMPRESA ) ) ->with( 'succes', 'Creado' );
    }

    public function eliminarProducto($ID){
        $estado = DB::table('productos')->where('IDPRODUCTO', $ID)->get();
               DB::table( 'productos' )->where( 'IDPRODUCTO', $ID ) ->delete();
        
        
        foreach ($estado as $e) {
        return redirect( route( 'productos.listar',$e->IDEMPRESA ) ) ->with( 'succes', 'Eliminado' );
        }

        
    }
    public function actualizar_productos( Request $request ) {
       
       
        $IDCATEGORIA = $request->IDCATEGORIA;
        $NOMBRE = $request->NOMBRE;
        $IDEMPRESA = $request->IDEMPRESA;
        $DESCRIPCION = $request->DESCRIPCION;
        $COSTO = $request->COSTO;
        $FOTO = $request->FOTO;
        $FOTO = 'producto/'.$FOTO;
        $ESTADO = 'S';
        $DETALLE = 'N';
        $CREATED_AT = Carbon::now();

        DB::table( 'productos' )->update(
            [
                'IDCATEGORIA' => $IDCATEGORIA,
                'IDEMPRESA' =>$IDEMPRESA,   
                'NOMBRE' => $NOMBRE,
                'DESCRIPCION' => $DESCRIPCION,
                'COSTO' => $COSTO,
                'FOTO' => $FOTO,
                'ESTADO' => $ESTADO,
                'DETALLE' => $DETALLE,
                'CREATED_AT' => $CREATED_AT
            ]
        );
        $mensaje = ['message' => 'Se actualizo exitosamente'];
        return redirect( route( 'productos.listar',$IDEMPRESA ) ) ->with( 'succes', 'Creado' );
    }
    public function vistaEditarProd($id){
        $categorias = DB::table('cat_productos')->get();
        $productos = DB::table('productos')->where('IDEMPRESA', $id)->get();
        return view('Productos.edit', compact( 'categorias','productos'));
    }

}
