<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DireccionesController extends Controller {
    public function vistaCrearDireccion( $IDUSUARIO ) {
        $direccionesID = DB::table( 'usuarios' )->where( 'IDUSUARIO', $IDUSUARIO )->get();

        return view( 'Direcciones.create', compact( 'direccionesID' ) );
    }

    public function registrar_direcciones( Request $request ) {
        $IDUSUARIO = $request-> IDUSUARIO;
        $COORDENADAX = $request-> COORDENADAX;
        $COORDENADAY = $request-> COORDENADAY;
        $DIRECCION = $request-> DIRECCION;
        $CALLE_PRINCIPAL = $request-> CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request-> CALLE_SECUNDARIA;
        $NRO_DOMICILIO  = $request-> NRO_DOMICILIO;
        $INSTRUCCIONES = $request-> INSTRUCCIONES;
      

        DB::table( 'direcciones' )->insert(
            [
                'IDUSUARIO' => $IDUSUARIO,
                'COORDENADAX' => $COORDENADAX,
                'COORDENADAY' => $COORDENADAY,
                'DIRECCION' => $DIRECCION,
                'CALLE_PRINCIPAL' =>$CALLE_PRINCIPAL,
                'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                'NRO_DOMICILIO'  => $NRO_DOMICILIO,
                'INSTRUCCIONES' => $INSTRUCCIONES,
               

            ]
        );

        return redirect( Route( 'Usuarios.index' ) );

    }
    public function editar_direcciones( Request $request) {
        
        $COORDENADAX = $request-> COORDENADAX;
        $COORDENADAY = $request-> COORDENADAY;
        $DIRECCION = $request-> DIRECCION;
        $CALLE_PRINCIPAL = $request-> CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request-> CALLE_SECUNDARIA;
        $NRO_DOMICILIO  = $request-> NRO_DOMICILIO;
        $INSTRUCCIONES = $request-> INSTRUCCIONES;
      

        DB::table( 'direcciones' )
        ->where('direcciones',$IDDIRECCION)
        ->update(
            [
                
                'COORDENADAX' => $COORDENADAX,
                'COORDENADAY' => $COORDENADAY,
                'DIRECCION' => $DIRECCION,
                'CALLE_PRINCIPAL' =>$CALLE_PRINCIPAL,
                'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                'NRO_DOMICILIO'  => $NRO_DOMICILIO,
                'INSTRUCCIONES' => $INSTRUCCIONES,
               

            ]
        );

        return redirect( Route( 'Usuarios.index' ) );

    }
    public function Vista_Actualizar_direcciones($IDDIRECCION){
        $DireccionEditar=DB::table('direcciones')
        ->where('IDDIRECCION',$IDDIRECCION)->get();
        return view( 'Direcciones.edit', compact( 'DireccionEditar' ) );
    }
}
