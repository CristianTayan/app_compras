<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller {

    public function login( Request $request ) {
        $CORREO = $request->CORREO;
        $CONTRASENA = base64_encode( $request->CONTRASENA );

        $usuario_existe= DB::table( 'usuarios' )
        ->where( 'CORREO', $CORREO )
        ->where( 'CONTRASENA', $CONTRASENA )
        ->get();
        if ( count( $usuario_existe ) != 0 ) {
            foreach ($usuario_existe as $Userid) {
                $id=$Userid->IDUSUARIO;
                $nombreu=$Userid->NOMBRE;
                $tipo_u=$Userid->TIPO_USUARIO;
                $correo=$Userid->CORREO;
                if($tipo_u=='P'){
                $datos = DB::table( 'empresa' )
                ->where( 'IDUSUARIO', $id )->get();
                foreach($datos as $dato){
                    $nombreEmpresa=$dato->NOMBRE;
                    $coordenadax=$dato->COORDENADAX;
                    $coordenaday=$dato->COORDENADAY;
                    $idEmpresa=$dato->IDEMPRESA;
                }
                $mensaje = ['message' => 'Bienvenido: '.$nombreu,'ID Usuario: '.$id,'Correo: '.$correo,'Nombre: '.$nombreEmpresa,
                'IDEMPRESA: '.$idEmpresa,'Coordenada x: '.$coordenadax,'Coordenada y: '.$coordenaday];
                return response()->json( $mensaje, 200 ); 
                }
                if($tipo_u=='A'){
            $mensaje = ['message' => 'Bienvenido:'.$nombreu,'ID Usuario: '.$id,'Correo: '.$correo,];
            return response()->json( $mensaje, 200 );  
                    } 
                    if($tipo_u=='U'){
                        $mensaje = ['message' => 'Bienvenido'.$nombreu,'ID Usuario: '.$id,'Correo: '.$correo,];
                        return response()->json( $mensaje, 200 );  
                                } 
            }
            $mensaje = ['message' => 'Bienvenido'.$nombre];
            return response()->json( $mensaje, 200 );
        } else {
            $mensaje = ['message' => 'Acceso denegado'];
            return response()->json( $mensaje, 400 );
        }
    }

}
