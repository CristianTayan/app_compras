<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresasController extends Controller {
    public function registrar_empresa( Request $request ) {

        $IDCATEGORIA = $request->IDCATEGORIA;
        $IDUSUARIO = $request->IDUSUARIO;
        $NOMBRE = $request->NOMBRE;
        $COORDENADAX = $request->COORDENADAX;
        $COORDENADAY = $request->COORDENADAY;
        $DIRECCION = $request->DIRECCION;
        $CALLE_PRINCIPAL = $request->CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request->CALLE_SECUNDARIA;

        $FOTO = $request->FOTO;

        $nombre_existe = DB::table( 'empresa' )->where( 'NOMBRE', $NOMBRE )->get();
        if ( count( $nombre_existe ) == 0 ) {

            DB::table( 'empresa' )->insert(
                [
                    'IDCATEGORIA' => $IDCATEGORIA,
                    'IDUSUARIO' => $IDUSUARIO,
                    'NOMBRE' => $NOMBRE,
                    'COORDENADAX' => $COORDENADAX,
                    'COORDENADAY' => $COORDENADAY,
                    'DIRECcION' => $DIRECCION,
                    'CALLE_PRINCIPAL' => $CALLE_PRINCIPAL,
                    'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                    'CELULAR' => $CELULAR,
                    'CORREO' => $CORREO,
                    'FOTO' => $FOTO

                ]
            );
            $mensaje = ['message' => 'Se registro exitosamente'];
            return response()->json( $mensaje, 200 );
        } else
        $mensaje = ['message' => 'Nombre de empresa ya registrado'];
        return response()->json( $mensaje, 400 );
    }

    public function get_empresas() {
        $empresa = DB::table( 'empresa' )->orderBy( 'NOMBRE' )->where( 'ESTADO', 'S' )->get();
        if ( count( $empresa ) != 0 ) {
            return response()->json( $empresa, 200 );
        } else {
            $error = ['message' => 'Datos de empresas no encontrados'];
            return response()->json( $error, 400 );
        }
    }

    public function actualizar_empresa( Request $request ) {
        $IDEMPRESA = $request->IDEMPRESA;
        $IDCATEGORIA = $request->IDCATEGORIA;
        $IDUSUARIO = $request->IDUSUARIO;
        $NOMBRE = $request->NOMBRE;
        $COORDENADAX = $request->COORDENADAX;
        $COORDENADAY = $request->COORDENADAY;
        $DIRECCION = $request->DIRECCION;
        $CALLE_PRINCIPAL = $request->CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request->CALLE_SECUNDARIA;
        $IDHORARIO = $request->IDHORARIO;
        $FOTO = $request->FOTO;

        $existe = DB::table( 'empresa' )
        ->where( 'IDUSUARIO', $IDEMPRESA )->get();
        if ( count( $existe ) != 0 ) {
            DB::table( 'empresa' )
            ->where( 'IDEMPRESA', $IDEMPRESA )
            ->update(
                ['IDCATEGORIA' => $IDCATEGORIA,
                'IDUSUARIO' => $IDUSUARIO,
                'NOMBRE' => $NOMBRE,
                'COORDENADAX' => $COORDENADAX,
                'COORDENADAY' => $COORDENADAY,
                'DIRECCION' => $DIRECCION,
                'CALLE_PRINCIPAL' => $CALLE_PRINCIPAL,
                'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                'FOTO' => $FOTO]
            );

            $mensaje = ['message' => 'Empresa actualizada'];
            return response()->json( $mensaje, 200 );
        } else {
            $mensaje = ['message' => 'Empresa no encontrada '];
            return response()->json( $mensaje, 400 );
        }

    }

    public function buscar_empresa( $nombreEmpresa ) {
        $empresa = DB::table( 'view_empresa_categoria' )->where( 'IDEMPRESA', $nombreEmpresa )->get();
        if ( count( $empresa ) != 0 ) {
            return response()->json( $empresa, 200 );
        } else {
            $error = ['message' => 'No se ha encontrado empresas con ese nombre'];
            return response()->json( $error, 400 );
        }
    }

    public function listar_empresas( Request $request ) {

        $nombres_empresas = DB::table( 'empresa' )->select( 'NOMBRE' )->where( 'ESTADO', 'S' )->get();
        if ( count( $nombres_empresas ) != 0 ) {
            $nombre = $nombres_empresas->pluck( 'NOMBRE' );
            return response()->json( $nombre, 200 );
        } else {
            $error = ['message' => 'Empresas no encontradas'];
            return response()->json( $error, 400 );
        }
    }

    public function empresas_por_categoria( $categoria ) {
        $nombres = DB::table( 'view_empresa_categoria' )->where( 'IDCATEGORIA', $categoria )->get();
        if ( count( $nombres ) != 0 ) {
            return response()->json( $nombres, 200 );
        } else {
            $error = ['message' => 'No se ha encontrado empresas con esta categoría'];
            return response()->json( $error, 400 );
        }
    }
    public function cambiar_estado_empresas( $nombre ) {
        $estado = DB::table( 'empresa' )->where( 'NOMBRE', $nombre )->where( 'ESTADO', 's' )->get();
        if ( count( $estado ) != 0 ) {
            DB::table( 'empresa' )
            ->where( 'NOMBRE', $nombre )
            ->update( [
                'ESTADO' => 'N'
            ] );
            $mensaje = ['message' => 'Empresa en estado INACTIVO'];
            return response()->json( $mensaje, 200 );
        } else {
            DB::table( 'empresa' )
            ->where( 'NOMBRE', $nombre )
            ->update( [
                'estado' => 'S'

            ] );
            $mensaje = ['message' => 'Cambio de estado a ACTIVO'];
            return response()->json( $mensaje, 200 );
        }
    }
}
