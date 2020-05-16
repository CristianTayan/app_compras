<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class favoritosController extends Controller {
    public function agregar_favorito( Request $request ) {
        $IDEMPRESA = $request->IDEMPRESA;
        $IDUSUARIO = $request->IDUSUARIO;
        $existe = DB::table( 'favoritos' )
        ->where( 'IDEMPRESA', $IDEMPRESA )
        ->where( 'IDUSUARIO', $IDUSUARIO )->get();
        if ( count( $existe ) == 0 ) {
            DB::table( 'favoritos' )->insert( [
                'IDEMPRESA'=>$IDEMPRESA,
                'IDUSUARIO'=>$IDUSUARIO
            ] );
            $mensaje = ['message' => 'Se registro exitosamente'];
            return response()->json( $mensaje, 200 );
        } else {
            $mensaje = ['message' => 'Ya se encuentra en favoritos '];
            return response()->json( $mensaje, 400 );
        }
    }

    public function eliminar_favorito( Request $request ) {
        $IDEMPRESA = $request->IDEMPRESA;
        $IDUSUARIO = $request->IDUSUARIO;
        $existe = DB::table( 'favoritos' )
        ->where( 'IDEMPRESA', $IDEMPRESA )
        ->where( 'IDUSUARIO', $IDUSUARIO )->get();
        if ( count( $existe ) != 0 ) {
            DB::table( 'favoritos' )
            ->where( 'IDEMPRESA', $IDEMPRESA )
            ->where( 'IDUSUARIO', $IDUSUARIO )->delete();
            $mensaje = ['message' => 'Favorito eliminado'];
            return response()->json( $mensaje, 200 );
        } else {
            $mensaje = ['message' => 'No existe información que eliminar '];
            return response()->json( $mensaje, 400 );
        }
    }

    public function verificar_favorito( Request $request ) {
        $IDEMPRESA = $request->IDEMPRESA;
        $IDUSUARIO = $request->IDUSUARIO;
        $existe = DB::table( 'favoritos' )
        ->where( 'IDEMPRESA', $IDEMPRESA )
        ->where( 'IDUSUARIO', $IDUSUARIO )->get();
        if ( count( $existe ) != 0 ) {

            $mensaje = ['message' => 'Si'];
            return response()->json( $mensaje, 200 );
        } else {
            $mensaje = ['message' => 'No '];
            return response()->json( $mensaje, 400 );
        }
    }

}
