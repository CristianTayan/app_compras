<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DireccionesController extends Controller {
    public function get_direcciones() {
        $direcciones = DB::table( 'direcciones' )->orderBy( 'CALLE_PRINCIPAL' )->get();
        if ( count( $direcciones ) != 0 ) {
            return response()->json( $direcciones, 200 );
        } else {
            $error = ['message' => 'No se encuentran direcciones registradas'];
            return response()->json( $error, 400 );
        }
    }

    public function registrar_direcciones( Request $request ) {
        $IDUSUARIO = $request-> IDUSUARIO;
        $COORDENADAX = $request-> COORDENADAX;
        $COORDENADAY = $request-> COORDENADAY;
        $DIRECCION = $request-> DIRECCION;
        $CALLE_PRINCIPAL = $request-> CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request-> CALLE_SECUNDARIA;
        // $NRO_DOMICILIO  = $request-> NRO_DOMICILIO;
        // $INSTRUCCIONES = $request-> INSTRUCCIONES;
        $CREATED_AT = Carbon::now();

        DB::table( 'direcciones' )->insert(
            [
                'IDUSUARIO' => $IDUSUARIO,
                'COORDENADAX' => $COORDENADAX,
                'COORDENADAY' => $COORDENADAY,
                'DIRECCION' => $DIRECCION,
                'CALLE_PRINCIPAL' =>$CALLE_PRINCIPAL,
                'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                // 'NRO_DOMICILIO'  => $NRO_DOMICILIO,
                // 'INSTRUCCIONES' => $INSTRUCCIONES,
                'CREATED_AT' => $CREATED_AT

            ]
        );
        $mensaje = ['message' => 'Dirección ingresada'];
        return response()->json( $mensaje, 200 );

    }

    public function actualizar_direcciones( Request $request ) {
        $IDUSUARIO = $request-> IDUSUARIO;
        $COORDENADAX = $request-> COORDENADAX;
        $COORDENADAY = $request-> COORDENADAY;
        $DIRECCION = $request-> DIRECCION;
        $CALLE_PRINCIPAL = $request-> CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request-> CALLE_SECUNDARIA;
        $NRO_DOMICILIO  = $request-> NRO_DOMICILIO;
        $INSTRUCCIONES = $request-> INSTRUCCIONES;
        $existe = DB::table( 'direcciones' )
        ->where( 'IDUSUARIO', $IDUSUARIO )->get();
        if ( count( $existe ) != 0 ) {
            DB::table( 'direcciones' )
            ->where( 'IDUSUARIO', $IDUSUARIO )
            ->update(
                [
                    'COORDENADAX' => $COORDENADAX,
                    'COORDENADAY' => $COORDENADAY,
                    'DIRECCION' => $DIRECCION,
                    'CALLE_PRINCIPAL' =>$CALLE_PRINCIPAL,
                    'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                    'NRO_DOMICILIO'  => $NRO_DOMICILIO,
                    'INSTRUCCIONES' => $INSTRUCCIONES
                ]
            );
            $mensaje = ['message' => 'Dirección actualizada'];
            return response()->json( $mensaje, 200 );
        } else {
            $mensaje = ['message' => 'Dirección no encontrada '];
            return response()->json( $mensaje, 400 );
        }

    }

    public function eliminar_direcciones( Request $request ) {
        $IDUSUARIO = $request-> IDUSUARIO;
        $direccion_eliminar = DB::table( 'direcciones' )->where( 'IDUSUARIO', $IDUSUARIO )->get();
        if ( count( $direccion_eliminar ) != 0 ) {
            DB::table( 'direcciones' )
            ->where( 'IDUSUARIO', $IDUSUARIO )
            ->delete();
            $mensaje = ['message' => 'DIRECCIÓN ELIMINADA'];
            return response()->json( $mensaje, 200 );
        } else {
            $mensaje = ['message' => 'No se realizo la transaccion'];
            return response()->json( $mensaje, 400 );
        }
    }

    public function listar_clientes_direcciones() {
        $direcciones_listar = DB::table( 'usuarios' )
        ->join( 'direcciones', 'usuarios.IDUSUARIO', '=', 'direcciones.IDUSUARIO' )
        ->select( 'usuarios.NOMBRE', 'usuarios.CORREO', 'direcciones.DIRECCION' )
        ->get();
        if ( count( $direcciones_listar ) != 0 ) {
            return response()->json( $direcciones_listar, 200 );
        } else {
            $error = ['message' => 'No se encuentran asignadas direcciones'];
            return response()->json( $error, 400 );
        }

    }

}