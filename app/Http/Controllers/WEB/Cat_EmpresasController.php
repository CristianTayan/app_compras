<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cat_EmpresasController extends Controller {
    public function index() {
        $categorias = DB::table( 'cat_empresas' )->get();
        return view( 'Cat_Empresas.index', compact( 'categorias' ) );
    }

    public function vistaCrear() {

        return view( 'Cat_Empresas.create' );

    }

    public function registrarCat( Request $request ) {

        $NOMBRE = $request->NOMBRE;
        $DETALLE = $request->DETALLE;
        $FOTO = $request->FOTO;
        $FOTO = 'categorias/'.$FOTO;

        DB::table( 'cat_empresas' )->insert(
            [
                'NOMBRE' => $NOMBRE,
                'DETALLE' => $DETALLE,
                'FOTO' => $FOTO
            ]
        );
        $mensaje = ['message' => 'Se registro exitosamente'];
        return redirect( route( 'categorias.index' ) ) ->with( 'succes', 'Creado' );
    }

    public function eliminarCategoria( $ID ) {

        DB::table( 'cat_empresas' )->where( 'IDCATEGORIA', $ID ) ->delete();
        $mensaje = ['message' => 'Se elimino correctamente'];
        return redirect( route( 'categorias.index' ) ) ->with( 'succes', 'Eliminado' );

    }

    public function vistaEditarCat( $ID ) {

        $categorias = DB::table( 'cat_empresas' )->where( 'IDCATEGORIA', $ID )->get();
        return view( 'Cat_empresas.edit', compact( 'categorias' ) );
    }

    public function editarCategoria( Request $request ) {
        $IDCATEGORIA = $request->IDCATEGORIA;
        $NOMBRE = $request->NOMBRE;
        $DETALLE = $request->DETALLE;
        $FOTO = $request->FOTO;

        $existe = DB::table( 'cat_empresas' )->where( 'IDCATEGORIA', $IDCATEGORIA )->get();
        if ( count( $existe ) != 0 ) {
            DB::table( 'cat_empresas' )->where( 'IDCATEGORIA', $IDCATEGORIA )
            ->update(
                [
                    'NOMBRE' => $NOMBRE,
                    'DETALLE' => $DETALLE,
                    'FOTO' => $FOTO,
                ]
            );

            $mensaje = ['message' => 'Se actualizo exitosamente'];
            return redirect( route( 'categorias.index' ) ) ->with( 'succes', 'ACTUALIZADO' );
        } else
        $mensaje = ['message' => 'No se actualizo correctamente'];
        return redirect( route( 'categorias.index' ) ) ->with( 'error', 'No exitoso' );
    }
}