<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Session;

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
        $NOMBRE = $request->NOMBRE;
        $DETALLE = $request->DETALLE; 
        Session::put('nombreCategoria',$NOMBRE);
        Session::put('descripcionCategoria',$DETALLE);
        if($request->hasFile('FOTO')){      
         $archivo=$request->file('FOTO');
        $FOTO=$archivo->getClientOriginalName();
        $archivo->move(public_path().'/images/categoriasdeEmpresas/',$FOTO);
        $FOTO='images/categoriasdeEmpresas/'.$FOTO;}
        else{
            $FOTO = $request->FOTO; 
        }
        $existe_nombre=DB::table('cat_empresas')->where('NOMBRE',$NOMBRE)->get();
        if(count($existe_nombre)==0){
            DB::table( 'cat_empresas' )->insert(
                [
                    'NOMBRE' => $NOMBRE,
                    'DETALLE' => $DETALLE,
                    'FOTO' => $FOTO
                ]
            );
            Session::forget('nombreCategoria');
            Session::forget('descripcionCategoria');
            return redirect( route( 'categorias.index' ) ) ->with( 'succes', 'Creado' );
        }else{
            return redirect( route ('Cat_Empresas.vistaCrear')) ->with( 'informacion', 'Categoria ya existe' ); 
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
              $FOTO='images/categoriasdeEmpresas/'.$FOTO;}else{
                $FOTO = $request->FOTOE;}
                $existe=DB::table('cat_empresas')->where('IDCATEGORIA',$IDCATEGORIA)->get();
                foreach($existe as $exis){
                    $nombre=$exis->NOMBRE;
                }
                if($nombre==$NOMBRE){
                    DB::table( 'cat_empresas' )->where( 'IDCATEGORIA', $IDCATEGORIA )
                    ->update(
                        [
                            'NOMBRE' => $NOMBRE,
                            'DETALLE' => $DETALLE,
                            'FOTO' => $FOTO,
                        ]
                    );
                    return redirect( route( 'categorias.index' ) ) ->with( 'informacion', 'Categoría actualizada' );
                }else{
                    $nombre_existe=DB::table('cat_empresas')->where('NOMBRE',$NOMBRE)->get();
                    if(count($nombre_existe)==0){
                        DB::table( 'cat_empresas' )->where( 'IDCATEGORIA', $IDCATEGORIA )
                        ->update(
                            [
                                'NOMBRE' => $NOMBRE,
                                'DETALLE' => $DETALLE,
                                'FOTO' => $FOTO,
                            ]
                        );
                        return redirect( route( 'categorias.index' ) ) ->with( 'informacion', 'Categoría actualizada' );
                    } else{
                        return redirect( route('editarCat',$IDCATEGORIA) ) ->with( 'informacion', 'Categoría ya existe' );

                    }
                }         
    }
    public function indexCat($ID) {
        $empresas = DB::table( 'empresa' )->Where('IDCATEGORIA',$ID)->get();
        $categorias = DB::table('cat_empresas')->Where('IDCATEGORIA',$ID)->get();
        $horarios = DB::table('horarios')->get();
        return view( 'Cat_empresas.IndexEmpresaCat', compact( 'empresas','categorias','horarios') );
    }   
}