<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class DetallesProductosController extends Controller
{
    public function index($IDPRODUCTO)
    {
        $productos=DB::table('productos')->where('IDPRODUCTO', $IDPRODUCTO)->get();
        $detallesProductos=DB::table('detalles_producto')->where('IDPRODUCTO', $IDPRODUCTO)->get();
        $empresas = DB::table( 'empresa' )
        ->join ( 'productos', 'empresa.IDEMPRESA', '=', 'productos.IDEMPRESA' )
        ->where( 'IDPRODUCTO', $IDPRODUCTO )
        ->get();
        
        return view('DetallesProducto.index', compact('detallesProductos','productos','empresas'));
    }

    public function Registrar(Request $request){
        $IDPRODUCTO=$request->IDPRODUCTO;
        $DETALLE=$request->DETALLE;
        $COSTO=$request->COSTO;
        Session::put('DetalleProdDetalle',$DETALLE);
        Session::put('DetalleProdCosto',$COSTO);
        Session::put('DetalleProdID',$IDPRODUCTO);

        DB::table( 'detalles_producto' )->insert(
            [
                'IDPRODUCTO' => $IDPRODUCTO,
                'NOMBRE' => $DETALLE,
                'COSTO' => $COSTO
            ]
        );
        Session::forget('DetalleProdDetalle');
        Session::forget('DetalleProdCosto');
        Session::forget('DetalleProdID');
        return redirect( route( 'Detallesproductos.listar',$IDPRODUCTO ) ) ->with( 'succes', 'Detalle producto creado' );
    }
    public function Actualizar(Request $request){
     
        $DETALLE=$request->DETALLE;
        $COSTO=$request->COSTO;
        $IDDETALLE=$request->IDDETALLE;
        $IDPRODUCTO=$request->IDPRODUCTO;
        DB::table( 'detalles_producto' )
        ->where('IDDETALLE',$IDDETALLE)
        ->update(
            [
                
                'NOMBRE' => $DETALLE,
                'COSTO' => $COSTO
            ]
        );

        return redirect( route( 'Detallesproductos.listar',$IDPRODUCTO ) ) ->with( 'succes', 'Detalle producto actualizado' );
    }
    public function eliminar($IDDETALLE){
       $listaID=DB::table( 'detalles_producto')->where('IDDETALLE',$IDDETALLE)->get();
       foreach($listaID as $id){
        $IDPRODUCTO=$id->IDPRODUCTO;
       }
        DB::table( 'detalles_producto')->where('IDDETALLE',$IDDETALLE)->delete();

        return redirect( route( 'Detallesproductos.listar',$IDPRODUCTO ) ) ->with( 'eliminado', 'Eliminado' );
    }
    public function cargardatos($IDDETALLE){
        $datos=DB::table( 'detalles_producto' )
        ->where('IDDETALLE',$IDDETALLE)->get();
        
        $productos = DB::table( 'detalles_producto' )
        ->join ( 'productos', 'detalles_producto.IDPRODUCTO', '=', 'productos.IDPRODUCTO' )
        ->where( 'IDDETALLE', $IDDETALLE )
        ->get();
    
        return view('DetallesProducto.edit', compact('datos','productos'));
    }
}
