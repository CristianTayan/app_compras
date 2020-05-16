<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClasificacionController extends Controller {
    public function registrar_clasificacion( Request $request ) {

        $IDEMPRESA = $request->IDEMPRESA;
        $NOMBRE = $request->NOMBRE;
        $DETALLE = $request->DETALLE;

        DB::table( 'cat_productos' )->insert(
            [
                'IDEMPRESA' => $IDEMPRESA,
                'NOMBRE' => $NOMBRE,
                'DETALLE' => $DETALLE

            ]
        );
        $mensaje = ['message' => 'Categoria de productos ingresada'];
        return response()->json( $mensaje, 200 );
    }

    public function get_clasificacion() {
        $clasificacion = DB::table( 'cat_productos' )->orderBy( 'NOMBRE' )->get();
        if ( count( $clasificacion ) != 0 ) {
            return response()->json( $clasificacion, 200 );
        } else {
            $error = ['message' => 'No se ha encontrado categorias de productos'];
            return response()->json( $error, 400 );
        }
    }

    public function actualizar_clasificacion( Request $request ) {

        $IDCATEGORIA = $request->IDCATEGORIA;
        $IDEMPRESA = $request->IDEMPRESA;
        $NOMBRE = $request->NOMBRE;
        $DETALLE = $request->DETALLE;

        $nombre_existe = DB::table( 'cat_productos' )->where( 'NOMBRE', $NOMBRE )->get();
        if ( count( $nombre_existe ) == 0 ) {
            DB::table( 'cat_productos' )
            ->where( 'IDCATEGORIA', $IDCATEGORIA )
            ->update(
                [
                    'IDEMPRESA' => $IDEMPRESA,
                    'NOMBRE' => $NOMBRE,
                    'DETALLE' => $DETALLE
                ]
            );

            $mensaje = ['message' => 'Categoria de productos actualizada'];
            return response()->json( $mensaje, 200 );
        } else {
            $error = ['message' => 'Categoria de productos no encontrada'];
            return response()->json( $error, 400 );
        }
    }

    //Lista las categorias de cada empresa

    public function cat_prod_empresa( $idEmpresa ) {
        $nombres = DB::table( 'cat_productos' )->where( 'IDEMPRESA', $idEmpresa )->get();
        if ( count( $nombres ) != 0 ) {
            return response()->json( $nombres, 200 );
        } else {
            $error = ['message' => 'No se ha encontrado categorias de productos para esta empresa'];
            return response()->json( $error, 400 );
        }
    }
}
