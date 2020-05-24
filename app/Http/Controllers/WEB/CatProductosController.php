<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatProductosController extends Controller {
    public function index( $id ) {
        $empresas = DB::table( 'empresa' )->where( 'IDEMPRESA', $id )->get();
        $categorias = DB::table( 'cat_productos' )->where( 'IDEMPRESA', $id )->get();
        return view( 'CatProductos.index', compact( 'empresas', 'categorias' ) );
    }

    public function registrarCatProd( Request $request ) {
        $IDEMPRESA = $request->IDEMPRESA;
        $NOMBRE = $request->NOMBRE;
        $DETALLE = $request->DETALLE;
        DB::table( 'cat_productos' )->insert(
            [
                'IDEMPRESA'=>$IDEMPRESA,
                'NOMBRE' => $NOMBRE,
                'DETALLE' => $DETALLE,

            ]
        );
        
        return redirect( route( 'productos.Crear', $IDEMPRESA ) ) ->with( 'succes', 'Categoría de productos creado' );
    }

    public function vistaCrearCategoriaP( $id ) {
        $empresas = DB::table( 'empresa' )->where( 'IDEMPRESA', $id )->get();
        $categorias = DB::table( 'cat_productos' )->where( 'IDEMPRESA', $id )->get();
        return view( 'CatProductos.create', compact( 'empresas', 'categorias' ) );
    }

    public function indexCategoriaP( $id ) {
        $empresas = DB::table( 'empresa' )->where( 'IDEMPRESA', $id )->get();
        $categorias = DB::table( 'cat_productos' )->where( 'IDEMPRESA', $id )->get();
        return view( 'CatProductos.indexCatP', compact( 'empresas', 'categorias' ) );
    }

    public function registrarCatProdEmp( Request $request ) {
        $IDEMPRESA = $request->IDEMPRESA;
        $NOMBRE = $request->NOMBRE;
        $DETALLE = $request->DETALLE;
        DB::table( 'cat_productos' )->insert(
            [
                'IDEMPRESA'=>$IDEMPRESA,
                'NOMBRE' => $NOMBRE,
                'DETALLE' => $DETALLE,

            ]
        );
        $mensaje = ['message' => 'Se registro exitosamente'];
        return redirect( route( 'CategoriaP.listar', $IDEMPRESA ) ) ->with( 'succes', 'Categoría de productos creado' );
    }
    

}