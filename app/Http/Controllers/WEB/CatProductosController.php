<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class CatProductosController extends Controller {
    public function index( $id ) {
        $empresas = DB::table( 'empresa' )->where( 'IDEMPRESA', $id )->get();
        $categorias = DB::table( 'cat_productos' )->where( 'IDEMPRESA', $id )->get();
        return view( 'CatProductos.index', compact( 'empresas', 'categorias' ) );
    }

    public function registrarCatProd( Request $request ) {
        $IDEMPRESA = $request->IDEMPRESA;
        $NOMBRE = $request->NOMBRE;
        $DETALLE = $request->DETALLE;
        Session::put('CatProdNombre',$NOMBRE);
        Session::put('CatProdDetalle',$DETALLE);
        Session::put('CatProdIdEmpresa',$IDEMPRESA);
        $datos=DB::table('cat_productos')->where('IDEMPRESA',$IDEMPRESA)
        ->where('NOMBRE',$NOMBRE)->get();
        if(count($datos)==0){
            DB::table( 'cat_productos' )->insert(
                [
                    'IDEMPRESA'=>$IDEMPRESA,
                    'NOMBRE' => $NOMBRE,
                    'DETALLE' => $DETALLE,
    
                ]
            );  
            Session::forget('CatProdNombre');
            Session::forget('CatProdDetalle');
            Session::forget('CatProdIdEmpresa');
            return redirect( route( 'productos.Crear', $IDEMPRESA ) ) ->with( 'succes', 'Categoría de productos creado' );
        }else{
        return redirect( Route('Catproductos.listar',$IDEMPRESA)) ->with( 'informacion', 'Categoría de productos ya existe' );

        }

        
    }

    public function vistaCrearCategoriaP( $id ) {
        $empresas = DB::table( 'empresa' )->where( 'IDEMPRESA', $id )->get();
        $categorias = DB::table( 'cat_productos' )->where( 'IDEMPRESA', $id )->get();
        return view( 'CatProductos.create', compact( 'empresas', 'categorias' ) );
    }

    public function indexCategoriaP( $id ) {
        $empresas = DB::table( 'empresa' )->where( 'IDEMPRESA', $id )->get();
        $categorias = DB::table( 'cat_productos' )->where( 'IDEMPRESA', $id )->get();
        return view( 'CatProductos.indexCatP', compact( 'empresas', 'categorias' ) );
    }

    public function registrarCatProdEmp( Request $request ) {
        $IDEMPRESA = $request->IDEMPRESA;
        $NOMBRE = $request->NOMBRE;
        $DETALLE = $request->DETALLE;
        Session::put('CatProdNombre',$NOMBRE);
        Session::put('CatProdDetalle',$DETALLE);
        Session::put('CatProdIdEmpresa',$IDEMPRESA);
        $datos=DB::table('cat_productos')->where('IDEMPRESA',$IDEMPRESA)
        ->where('NOMBRE',$NOMBRE)->get();
        if(count($datos)==0){
            DB::table( 'cat_productos' )->insert(
                [
                    'IDEMPRESA'=>$IDEMPRESA,
                    'NOMBRE' => $NOMBRE,
                    'DETALLE' => $DETALLE,
    
                ]
            );  
            Session::forget('CatProdNombre');
            Session::forget('CatProdDetalle');
            Session::forget('CatProdIdEmpresa');
            return redirect( route( 'CategoriaP.listar', $IDEMPRESA ) ) ->with( 'succes', 'Categoría de productos creado' );
        }else{
        return redirect( Route('CategoriaP.vistaCrear',$IDEMPRESA)) ->with( 'informacion', 'Categoría de productos ya existe' );

        }
  
    }
    
    
    public function editarCategoriaAdminstracion( Request $request ) {
        $IDCATEGORIA = $request->IDCATEGORIA;
        $IDEMPRESA = $request->IDEMPRESA;
        $NOMBRE = $request->NOMBRE;
        $DETALLE = $request->DETALLE;

       $datos=DB::table('cat_productos')->where('IDCATEGORIA',$IDCATEGORIA)->get();
       foreach($datos as $dato){
           $nombre=$dato->NOMBRE;
       }
       if($nombre==$NOMBRE){
           DB::table( 'cat_productos' )
           ->where( 'IDCATEGORIA', $IDCATEGORIA )
           ->update(
               [
                   'IDEMPRESA'=>$IDEMPRESA,
                   'NOMBRE' => $NOMBRE,
                   'DETALLE' => $DETALLE,
   
               ]
           );
           
           return redirect( route( 'productos.Crear', $IDEMPRESA ) ) ->with( 'succes', 'Actualizado correctamente' );
        }else{
           $existe=DB::table('cat_productos')->where('IDEMPRESA',$IDEMPRESA)
           ->where('NOMBRE',$NOMBRE)->get();
           if(count($existe)==0){
               DB::table( 'cat_productos' )
               ->where( 'IDCATEGORIA', $IDCATEGORIA )
               ->update(
                   [
                       'IDEMPRESA'=>$IDEMPRESA,
                       'NOMBRE' => $NOMBRE,
                       'DETALLE' => $DETALLE,
       
                   ]
               );
               
               return redirect( route( 'productos.Crear', $IDEMPRESA ) ) ->with( 'succes', 'Actualizado correctamente' );
            }else{
               return redirect( Route( 'CategoriaProductosVista',$IDCATEGORIA) ) ->with( 'informacion', 'Categoría ya existe' );

           }
       }
       
        
    }
    public function VistaCategoriasProductos( $idCategoria ) {

        $categorias = DB::table( 'cat_productos' )->where( 'IDCATEGORIA', $idCategoria )->get();
        return view( 'CatProductos.editAdministrarCat', compact( 'categorias' ) );
    }

    public function ActualizarCategoriaEmpresa( Request $request ) {
       
         $IDCATEGORIA = $request->IDCATEGORIA;
         $IDEMPRESA = $request->IDEMPRESA;
         $NOMBRE = $request->NOMBRE;
         $DETALLE = $request->DETALLE;

        $datos=DB::table('cat_productos')->where('IDCATEGORIA',$IDCATEGORIA)->get();
        foreach($datos as $dato){
            $nombre=$dato->NOMBRE;
        }
        if($nombre==$NOMBRE){
            DB::table( 'cat_productos' )
            ->where( 'IDCATEGORIA', $IDCATEGORIA )
            ->update(
                [
                    'IDEMPRESA'=>$IDEMPRESA,
                    'NOMBRE' => $NOMBRE,
                    'DETALLE' => $DETALLE,
    
                ]
            );
            
               return redirect( route( 'CategoriaP.listar', $IDEMPRESA ) ) ->with( 'succes', 'Actualizado correctamente' );
        }else{
            $existe=DB::table('cat_productos')->where('IDEMPRESA',$IDEMPRESA)
            ->where('NOMBRE',$NOMBRE)->get();
            if(count($existe)==0){
                DB::table( 'cat_productos' )
                ->where( 'IDCATEGORIA', $IDCATEGORIA )
                ->update(
                    [
                        'IDEMPRESA'=>$IDEMPRESA,
                        'NOMBRE' => $NOMBRE,
                        'DETALLE' => $DETALLE,
        
                    ]
                );
                
                   return redirect( route( 'CategoriaP.listar', $IDEMPRESA ) ) ->with( 'succes', 'Actualizado correctamente' );
            }else{
                return redirect( Route( 'CategoriaProduto.VistaEmpresaProd',$IDCATEGORIA) ) ->with( 'informacion', 'Categoría ya existe' );

            }
        }
         
    }

    public function VistaProductosCategoria( $idCategoria ) {

        $categorias = DB::table( 'cat_productos' )->where( 'IDCATEGORIA', $idCategoria )->get();
        return view( 'CatProductos.editEmpreProducto', compact( 'categorias' ) );
    }
    public function eiminarCatProducto($ID){
        $catProducto = DB::table('cat_productos')->where( 'IDCATEGORIA', $ID )->get();
        foreach($catProducto as $cat){
            $IDEMP = $cat->IDEMPRESA;
        }        
            DB::table( 'cat_productos' )->where( 'IDCATEGORIA', $ID ) ->delete();
           return redirect( route( 'Catproductos.listar', $IDEMP ) ) ->with( 'eliminado', 'Eliminado' );
    
    }
    
    public function eiminarCatProductoIndex($ID){
            $catProducto = DB::table('cat_productos')->where( 'IDCATEGORIA', $ID )->get();
            foreach($catProducto as $cat){
                $IDEMP = $cat->IDEMPRESA;
            }        
                DB::table( 'cat_productos' )->where( 'IDCATEGORIA', $ID ) ->delete();
               return redirect( route( 'CategoriaP.listar', $IDEMP ) ) ->with( 'eliminado', 'Eliminado' );
        
     }
    
}