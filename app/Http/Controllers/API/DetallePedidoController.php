<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetallePedido extends Controller {
    public function get_detallesPedido() {
        $detalles = DB::table( 'detalles_pedido' )->orderBy( 'IDPEDIDO' )->get();
        if ( count( $detalles ) != 0 ) {
            return response()->json( $detalles, 200 );
        } else {
            $error = ['message' => 'No se encuentran detalles de pedidos registrados'];
            return response()->json( $error, 400 );
        }
    }

    public function registrar_detallesPedido( Request $request ) {
        $IDPEDIDO = $request-> IDPEDIDO;
        $ID_PRODUCTO = $request-> ID_PRODUCTO ;
        $CANTIDAD = $request-> CANTIDAD;

        DB::table( 'detalles_pedido' )->insert(
            [
                'IDPEDIDO' => $IDPEDIDO,
                'ID_PRODUCTO' => $ID_PRODUCTO,
                'CANTIDAD' => $CANTIDAD,

            ]
        );
        $mensaje = ['message' => 'Detalle de pedidos ingresado '];
        return response()->json( $mensaje, 200 );
    }

    public function actualizar_detallesPedido( Request $request ) {
        $IDDETALLE = $request-> IDDETALLE;
        $IDPEDIDO = $request-> IDPEDIDO;
        $ID_PRODUCTO = $request-> ID_PRODUCTO ;
        $CANTIDAD = $request-> CANTIDAD;
        $existe = DB::table( 'detalles_pedido' )
        ->where( 'IDDETALLE', $IDDETALLE )->get();
        if ( count( $existe ) != 0 ) {
            DB::table( 'detalles_pedido' )
            ->where( 'IDDETALLE', $IDDETALLE )
            ->update(
                [
                    'IDPEDIDO' => $IDPEDIDO,
                    'ID_PRODUCTO' => $ID_PRODUCTO,
                    'CANTIDAD' => $CANTIDAD
                ]
            );
            $mensaje = ['message' => 'Detalle de pedidos actualizado '];
            return response()->json( $mensaje, 200 );
        } else {
            $mensaje = ['message' => 'Detalle de pedidos no encontrada '];
            return response()->json( $mensaje, 400 );

        }

    }

    public function eliminar_detallePedidos( $IDDETALLE ) {
        $existe = DB::table( 'detalles_pedido' )
        ->where( 'IDDETALLE', $IDDETALLE )->get();
        if ( count( $existe ) != 0 ) {
            DB::table( 'detalles_pedido' )
            ->where( 'IDDETALLE', $IDDETALLE )->delete();
            $mensaje = ['message' => 'Detalle de pedido eliminado'];
            return response()->json( $mensaje, 200 );
        } else {
            $mensaje = ['message' => 'Detalle de pedido no encontrado'];
            return response()->json( $mensaje, 400 );

        }
    }

}
