<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleProdController extends Controller {
    public function registrar_detalle_prod( Request $request ) {
        $IDPRODUCTO = $request->IDPRODUCTO;
        $NOMBRE = $request->NOMBRE;
        $COSTO = $request->COSTO;

        DB::table( 'detalles_producto' )->insert(
            [
                'IDPRODUCTO' => $IDPRODUCTO,
                'NOMBRE' => $NOMBRE,
                'COSTO' => $COSTO

            ]
        );
        $mensaje = ['message' => 'Detalle de productos ingresado'];
        return response()->json( $mensaje, 200 );
    }

    public function get_detalle_prod() {
        $detalle = DB::table( 'detalles_producto' )->orderBy( 'NOMBRE' )->get();
        if ( count( $detalle ) != 0 ) {
            return response()->json( $detalle, 200 );
        } else {
            $error = ['message' => 'Detalle de productos no encontrado'];
            return response()->json( $error, 400 );
        }
    }

    public function actualizar_detalle_prod( Request $request ) {
        $IDDETALLE = $request->IDDETALLE;
        $IDPRODUCTO = $request->IDPRODUCTO;
        $NOMBRE = $request->NOMBRE;
        $COSTO = $request->COSTO;

        $nombre_existe = DB::table( 'detalles_producto' )->where( 'IDDETALLE', $IDDETALLE )->get();
        if ( count( $nombre_existe ) != 0 ) {
            DB::table( 'detalles_producto' )
            ->where( 'IDDETALLE', $IDDETALLE )
            ->update(
                [
                    'IDPRODUCTO' => $IDPRODUCTO,
                    'NOMBRE' => $NOMBRE,
                    'COSTO' => $COSTO
                ]
            );
            $mensaje = ['message' => 'Detalle de productos actualizado'];
            return response()->json( $mensaje, 200 );
        } else {
            $error = ['message' => 'Actualizacion Incorrecta'];
            return response()->json( $error, 400 );
        }
    }

    public function listar_detalle_prod( Request $request ) {

        $detalles = DB::table( 'detalles_producto' )->select( 'NOMBRE' )->get();
        if ( count( $detalles ) != 0 ) {
            $nombre = $detalles->pluck( 'NOMBRE' );
            return response()->json( $nombre, 200 );
        } else {
            $error = ['message' => 'Detalles de productos no encontrado'];
            return response()->json( $error, 400 );
        }
    }

    public function detalle_producto( $idProd ) {
        $detalles = DB::table( 'detalles_producto' )->where( 'IDPRODUCTO', $idProd )->get();
        if ( count( $detalles ) != 0 ) {
            echo Carbon::now();
            return response()->json( $detalles, 200 );

        } else {
            $error = ['message' => 'Detalles de producto no encontrados'];
            return response()->json( $error, 400 );

        }
    }

    public function eliminar_detalle( Request $request ) {
        $IDDETALLE = $request->IDDETALLE;
        $eliminar = DB::table( 'detalles_producto' )->where( 'IDDETALLE', $IDDETALLE )->get();
        if ( count( $eliminar ) != 0 ) {
            DB::table( 'detalles_producto' )
            ->where( 'IDDETALLE', $IDDETALLE )
            ->delete();
            $mensaje = ['message' => 'DETALLE ELIMINADO'];
            return response()->json( $mensaje, 200 );
        } else {
            $mensaje = ['message' => 'No se realizo la transaccion'];
            return response()->json( $mensaje, 400 );
        }
    }

}
