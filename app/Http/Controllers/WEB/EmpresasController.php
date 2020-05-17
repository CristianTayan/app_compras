<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresasController extends Controller {
    public function index() {
        $empresas = DB::table( 'view_empresa_categoria' )->get();
        return view( 'Empresas.index', compact( 'empresas' ) );
    }

    public function vistaCrear() {
        $categorias = DB::table( 'cat_empresas' )->get();
        $proveedores = DB::table( 'usuarios' )
        ->where( 'TIPO_USUARIO', 'P' )
        ->get();
        return view( 'Empresas.create', compact( 'categorias', 'proveedores' ) );

    }

    public function registrar( Request $request ) {
        $IDCATEGORIA = $request->IDCATEGORIA;
        $IDUSUARIO = $request->IDUSUARIO;
        $NOMBRE = $request->NOMBRE;
        $COORDENADAX = $request->COORDENADAX;
        $COORDENADAY = $request->COORDENADAY;
        $DIRECCION = $request->DIRECCION;
        $CALLE_PRINCIPAL = $request->CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request->CALLE_SECUNDARIA;
        $FOTO = $request->FOTO;
        $FOTO = 'empresa/'.$FOTO;


        $nombre_existe = DB::table( 'empresa' )->where( 'NOMBRE', $NOMBRE )->get();
        if ( count( $nombre_existe ) == 0 ) {

            DB::table( 'empresa' )->insert(
                [
                    'IDCATEGORIA' => $IDCATEGORIA,
                    'IDUSUARIO' => $IDUSUARIO,
                    'NOMBRE' => $NOMBRE,
                    'COORDENADAX' => $COORDENADAX,
                    'COORDENADAY' => $COORDENADAY,
                    'DIRECCION' => $DIRECCION,
                    'CALLE_PRINCIPAL' => $CALLE_PRINCIPAL,
                    'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                    'FOTO' => $FOTO
                ]
            );
            $mensaje = ['message' => 'Se registro exitosamente'];
            return redirect( route( 'Empresas.index' ) ) ->with( 'succes', 'Creado' );
        } else
        $mensaje = ['message' => 'Nombre de empresa ya registrado'];
        return redirect( route( 'Empresas.index' ) ) ->with( 'error', 'No exitoso' );
    }

    public function eliminarEmpresas( $ID ) {

        DB::table( 'empresa' )->where( 'IDEMPRESA', $ID ) ->delete();
        $mensaje = ['message' => 'Se elimino correctamente'];
        return redirect( route( 'Empresas.index' ) ) ->with( 'succes', 'Eliminado' );

    }

    public function editarEmpresa( Request $request ) {

        $IDEMPRESA = $request ->IDEMPRESA;
        $IDUSUARIO = $request ->IDUSUARIO;
        $IDCATEGORIA = $request->IDCATEGORIA;
        $NOMBRE = $request->NOMBRE;
        $COORDENADAX = $request->COORDENADAX;
        $COORDENADAY = $request->COORDENADAY;
        $DIRECCION = $request->DIRECCION;
        $CALLE_PRINCIPAL = $request->CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request->CALLE_SECUNDARIA;

        $FOTO = $request->FOTO;
        $FOTO = '/empresa/'.$FOTO;

        $existe = DB::table( 'empresa' )
        ->where( 'IDEMPRESA', $IDEMPRESA )->get();
        echo $NOMBRE;
        if ( count( $existe ) != 0 ) {
            echo $DIRECCION;
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

            $mensaje = ['message' => 'Se actualizo exitosamente'];
            return redirect( route( 'Empresas.index' ) ) ->with( 'succes', 'ACTUALIZADO' );
        } else
        $mensaje = ['message' => 'No se actualizo correctamente'];
        return redirect( route( 'Empresas.index' ) ) ->with( 'error', 'No exitoso' );

    }

    public function vistaEditar( $ID ) {
        $emp = DB::table( 'empresa' )->where( 'IDEMPRESA', $ID ) ->get();
        $categorias = DB::table( 'cat_empresas' )->get();
        $proveedores = DB::table( 'usuarios' )
        ->where( 'TIPO_USUARIO', 'P' )->get();

        return view( 'Empresas.edit', compact( 'emp', 'categorias', 'proveedores' ) );
    }

}
