<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatEmpresasController extends Controller {
    public function get_categoriasEmpresas() {

        $categorias = DB::table( 'cat_empresas' )->orderBy( 'NOMBRE' )->get();
        if ( count( $categorias ) != 0 ) {
            return response()->json( $categorias, 200 );
        } else {
            $error = ['message' => 'No se han encontrado datos de categorias'];
            return response()->json( $error, 400 );
        }
    }

    public function listar_nombres() {

        $categorias = DB::table( 'cat_empresas' )->orderBy( 'NOMBRE' )->get();

        if ( count( $categorias ) != 0 ) {
            $nombres = $categorias->pluck( 'NOMBRE' );
            return response()->json( $nombres, 200 );
        } else {
            $error = ['message' => 'No se han encontrado datos de categorias'];
            return response()->json( $error, 400 );
        }
    }

    public function registrar_Cat_Empresas( Request $request ) {

        $NOMBRE = $request->NOMBRE;
        $DETALLE = $request->DETALLE;
        $FOTO = $request->FOTO;

        DB::table( 'cat_empresas' )->insert(
            [
                'NOMBRE' => $NOMBRE,
                'DETALLE' => $DETALLE,
                'FOTO' => $FOTO
            ]
        );
        $mensaje = ['message' => 'Categoria ingresada'];
        return response()->json( $mensaje, 200 );
    }

    public function actualizar_Cat_Empresas( Request $request ) {
        $IDCATEGORIA = $request->IDCATEGORIA;
        $NOMBRE = $request->NOMBRE;
        $DETALLE = $request->DETALLE;
        $FOTO = $request->FOTO;
        $existe = DB::table( 'cat_empresas' )
        ->where( 'IDCATEGORIA', $IDCATEGORIA )->get();
        if ( count( $existe ) != 0 ) {
            DB::table( 'cat_empresas' )
            ->where( 'IDCATEGORIA', $IDCATEGORIA )
            ->update(
                [
                    'NOMBRE' => $NOMBRE,
                    'DETALLE' => $DETALLE,
                    'FOTO' => $FOTO
                ]
            );
            $mensaje = ['message' => 'Categoria actualizada'];
            return response()->json( $mensaje, 200 );
        } else {
            $error = ['message' => 'Categoria no encontrada'];
            return response()->json( $error, 400 );
        }

    }

    public function buscar_categoria( $NOMBRE ) {

        $existe = DB::table( 'cat_empresas' )
        ->where( 'IDCATEGORIA', $NOMBRE )->get();
        if ( count( $existe ) != 0 ) {
            return response()->json( $existe, 200 );
        } else {
            $error = ['message' => 'Categoria no encontrada'];
            return response()->json( $error, 400 );
        }

    }

}
