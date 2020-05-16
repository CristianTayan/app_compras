<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VistasController extends Controller {
    public function restaurante_producto  ( Request $request ) {
        $IDEMPRESA = $request->IDEMPRESA;
        $IDCATEGORIA = $request->IDCATEGORIA;
        $listar_restaurante = DB::table( 'empresa' )
        ->join ( 'horarios', 'empresa.IDHORARIO', '=', 'horarios.IDHORARIO' )
        ->select( 'empresa.NOMBRE', 'horarios.HORARIO_CONCAT', 'FOTO' )
        ->where( 'IDEMPRESA', $IDEMPRESA )
        ->get();

        $listar_cat_productos = DB::table( 'cat_productos' )
        ->where( 'IDEMPRESA', $IDEMPRESA )
        ->select( 'NOMBRE' )
        ->get();

        $listar_productos = DB::table( 'productos' )
        ->where( 'IDCATEGORIA', $IDCATEGORIA )
        ->select( 'NOMBRE', 'DESCRIPCION', 'COSTO', 'FOTO' )
        ->get();

        $restaurante_productos = $listar_restaurante->concat( $listar_cat_productos )->concat( $listar_productos ) ;
        if ( count( $restaurante_productos ) != 0 ) {
            return response()->json( $restaurante_productos, 200 );
        } else {
            $error = ['message' => 'No existen productos'];
            return response()->json( $error, 400 );
        }
    }

    public function informacion_producto( $IDPRODUCTO ) {
        $listar_productos = DB::table( 'productos' )
        ->join ( 'cat_productos', 'cat_productos.IDCATEGORIA', '=', 'productos.IDCATEGORIA' )
        ->join ( 'empresa', 'empresa.IDEMPRESA', '=', 'cat_productos.IDEMPRESA' )
        ->where( 'IDPRODUCTO', $IDPRODUCTO )
        ->select( 'productos.NOMBRE', 'empresa.NOMBRE as Nombre_Empresa', 'DESCRIPCION', 'COSTO', 'productos.FOTO' )
        ->get();

        if ( count( $listar_productos ) != 0 ) {
            return response()->json( $listar_productos, 200 );
        } else {
            $error = ['message' => 'No existen datos'];
            return response()->json( $error, 400 );
        }
    }
    public function productos_lista()
    {
        
        
        
        return response()->json( $nombres_empresa, 200 );

    }

}
