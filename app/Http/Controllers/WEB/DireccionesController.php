<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class DireccionesController extends Controller {
    public function vistaCrearDireccion( $IDUSUARIO ) {
        $direccionesID = DB::table( 'usuarios' )->where( 'IDUSUARIO', $IDUSUARIO )->get();

        return view( 'Direcciones.create', compact( 'direccionesID' ) );
    }

    public function registrar_direcciones( Request $request ) {
        $IDUSUARIO = $request-> IDUSUARIO;
        $COORDENADAX = $request-> COORDENADAX;
        $COORDENADAY = $request-> COORDENADAY; 
        $CALLE_PRINCIPAL = $request-> CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request-> CALLE_SECUNDARIA;
        $DIRECCION = $CALLE_PRINCIPAL.' - '.$CALLE_SECUNDARIA;
        $NRO_DOMICILIO  = $request-> NRO_DOMICILIO;
        
      
        $Tipo_Usuario=DB::table('Usuarios')
        ->where('IDUSUARIO',$IDUSUARIO)->get();
       
        DB::table( 'direcciones' )->insert(
            [
                'IDUSUARIO' => $IDUSUARIO,
                'COORDENADAX' => $COORDENADAX,
                'COORDENADAY' => $COORDENADAY,
                'DIRECCION' => $DIRECCION,
                'CALLE_PRINCIPAL' =>$CALLE_PRINCIPAL,
                'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                'NRO_DOMICILIO'  => $NRO_DOMICILIO,
                
               

            ]
        );
        foreach($Tipo_Usuario as $tipo){
            $tipoU=$tipo->TIPO_USUARIO;
            if ( $tipoU == 'U' ) {
                return redirect( route( 'Usuarios.index' ) );
            }
            if ( $tipoU== 'A' ) {
                return redirect( route( 'Usuarios.indexA' )) ;
            }
            if ( $tipoU == 'P' ) {
                return redirect( route( 'Usuarios.indexP' ) );
            }
        }
       
       
    }
    public function editar_direcciones( Request $request) {
        $IDDIRECCION=$request-> IDDIRECCION;
        $COORDENADAX = $request-> COORDENADAX;
        $COORDENADAY = $request-> COORDENADAY;
        $CALLE_PRINCIPAL = $request-> CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request-> CALLE_SECUNDARIA;
        $DIRECCION = $CALLE_PRINCIPAL.' - '.$CALLE_SECUNDARIA;
        $NRO_DOMICILIO  = $request-> NRO_DOMICILIO;
        $IDUSUARIO = $request-> IDUSUARIO;
      

        DB::table( 'direcciones' )
        ->where('IDDIRECCION',$IDDIRECCION)
        ->update(
            [
                
                'COORDENADAX' => $COORDENADAX,
                'COORDENADAY' => $COORDENADAY,
                'DIRECCION' => $DIRECCION,
                'CALLE_PRINCIPAL' =>$CALLE_PRINCIPAL,
                'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                'NRO_DOMICILIO'  => $NRO_DOMICILIO,
                
               

            ]
        );
        $Tipo_Usuario=DB::table('Usuarios')
        ->where('IDUSUARIO',$IDUSUARIO)->get();
        foreach($Tipo_Usuario as $tipo){
            $tipoU=$tipo->TIPO_USUARIO;
            if ( $tipoU == 'U' ) {
                return redirect( route( 'Usuarios.index' ) );
            }
            if ( $tipoU== 'A' ) {
                return redirect( route( 'Usuarios.indexA' )) ;
            }
            if ( $tipoU == 'P' ) {
                return redirect( route( 'Usuarios.indexP' ) );
            }
        }
        


    }
    public function Vista_Actualizar_direcciones($IDDIRECCION){
        $DireccionEditar=DB::table('direcciones')
        ->where('IDDIRECCION',$IDDIRECCION)->get();

        foreach($DireccionEditar as $direccion){
         $idUsuario=$direccion->IDUSUARIO;
        }

        $DatosUsuario=DB::table('usuarios')->where('IDUSUARIO',$idUsuario)->get();
        return view( 'Direcciones.edit', compact( 'DireccionEditar','DatosUsuario' ) );
    }
}
