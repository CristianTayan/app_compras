<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PedidosController extends Controller {
    public function registrar_pedidos( Request $request ) {

        $IDUSUARIO = $request->IDUSUARIO;
        $IDDIRECCION = $request->IDDIRECCION;
        $ESTADO = 'E';
        $SUBTOTAL = $request->SUBTOTAL;
        $COSTO_ENVIO = $request->COSTO_ENVIO;
        $TOTAL = $SUBTOTAL+$COSTO_ENVIO;
        $FECHA_CREACION = Carbon::now();

        DB::table( 'pedido' )->insert(
            [

                'IDUSUARIO' => $IDUSUARIO,
                'IDDIRECCION' => $IDDIRECCION,
                'ESTADO' => $ESTADO,
                'SUBTOTAL' => $SUBTOTAL,
                'COSTO_ENVIO' => $COSTO_ENVIO,
                'TOTAL' => $TOTAL,
                'FECHA_CREACION' => $FECHA_CREACION,
            ]
        );
        $mensaje = ['message' => 'Pedido ingresado '];
        return response()->json( $mensaje, 200 );
    }

    public function atender_pedidos( $IDPEDIDO ) {

        DB::table( 'pedido' )->where( 'IDPEDIDO', $IDPEDIDO )
        ->update(
            [
                'ESTADO' => 'P',
                'FECHA_RECEPCION' => Carbon::now()

            ]
        );
        $mensaje = ['message' => 'Pedido en proceso'];
        return response()->json( $mensaje, 200 );
    }

    public function finalizar_pedidos( $IDPEDIDO ) {
        DB::table( 'pedido' )->where( 'IDPEDIDO', $IDPEDIDO )
        ->update(
            [
                'ESTADO' => 'F',
                'FECHA_ENTREGA' => Carbon::now()

            ]
        );
        $mensaje = ['message' => 'Pedido finalizado'];
        return response()->json( $mensaje, 200 );
    }

    public function anular_pedidos( $IDPEDIDO ) {
        DB::table( 'pedido' )->where( 'IDPEDIDO', $IDPEDIDO )
        ->update(
            [
                'ESTADO' => 'A',

            ]
        );
        $mensaje = ['message' => 'Pedido anulado'];
        return response()->json( $mensaje, 200 );
    }

}
