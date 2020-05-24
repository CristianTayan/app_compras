<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class Cat_EmpresasController extends Controller {
    public function index() {
        $categorias = DB::table( 'cat_empresas' )
        ->orderBy('IDCATEGORIA', 'desc')->get();
        return view( 'Cat_Empresas.index', compact( 'categorias' ) );
    }

    public function vistaCrear() {

        return view( 'Cat_Empresas.create' );

    }

    public function registrarCat( Request $request ) {
       
        
       
        if($request->hasFile('FOTO')){
            $NOMBRE = $request->NOMBRE;
            $DETALLE = $request->DETALLE;
         $archivo=$request->file('FOTO');
        $FOTO=$archivo->getClientOriginalName();
        $archivo->move(public_path().'/images/categoriasdeEmpresas/',$FOTO);
        $FOTO='images/categoriasdeEmpresas/'.$FOTO;
            DB::table( 'cat_empresas' )->insert(
                [
                    'NOMBRE' => $NOMBRE,
                    'DETALLE' => $DETALLE,
                    'FOTO' => $FOTO
                ]
            );
            
            return redirect( route( 'categorias.index' ) ) ->with( 'succes', 'Creado' );
        }
    }

    public function eliminarCategoria( $ID ) {

        DB::table( 'cat_empresas' )->where( 'IDCATEGORIA', $ID ) ->delete();
        $mensaje = ['message' => 'Se elimino correctamente'];
        return redirect( route( 'categorias.index' ) ) ->with( 'eliminado', 'Eliminado' );

    }

    public function vistaEditarCat( $ID ) {

        $categorias = DB::table( 'cat_empresas' )->where( 'IDCATEGORIA', $ID )->get();
        return view( 'Cat_empresas.edit', compact( 'categorias' ) );
    }

    public function editarCategoria( Request $request ) {
        $IDCATEGORIA = $request->IDCATEGORIA;
        $NOMBRE = $request->NOMBRE;
        $DETALLE = $request->DETALLE;
        
        if($request->hasFile('FOTO')){
            
         $archivo=$request->file('FOTO');
        $FOTO=$archivo->getClientOriginalName();
        $archivo->move(public_path().'/images/categoriasdeEmpresas/',$FOTO);
        $FOTO='images/categoriasdeEmpresas/'.$FOTO;
        DB::table( 'cat_empresas' )->where( 'IDCATEGORIA', $IDCATEGORIA )
        ->update(
            [
                'NOMBRE' => $NOMBRE,
                'DETALLE' => $DETALLE,
                'FOTO' => $FOTO,
            ]
        );
            
            return redirect( route( 'categorias.index' ) ) ->with( 'informacion', 'Categoría actualizada' );
        }  else{
            $FOTO = $request->FOTOE;
            DB::table( 'cat_empresas' )->where( 'IDCATEGORIA', $IDCATEGORIA )
        ->update(
            [
                'NOMBRE' => $NOMBRE,
                'DETALLE' => $DETALLE,
                'FOTO' => $FOTO,
            ]
        ); 
        return redirect( route( 'categorias.index' ) ) ->with( 'informacion', 'Categoría actualizada' );
        }
    }
    public function indexCat($ID) {
        $empresas = DB::table( 'empresa' )->Where('IDCATEGORIA',$ID)->get();
        $categorias = DB::table('cat_empresas')->Where('IDCATEGORIA',$ID)->get();
        $horarios = DB::table('horarios')->get();
        return view( 'Cat_empresas.IndexEmpresaCat', compact( 'empresas','categorias','horarios') );
    }   
}