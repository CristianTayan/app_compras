<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        DB::table( 'detalles_producto' )->insert(
            [
                'IDPRODUCTO' => $IDPRODUCTO,
                'NOMBRE' => $DETALLE,
                'COSTO' => $COSTO
            ]
        );

        return redirect( route( 'Detallesproductos.listar',$IDPRODUCTO ) ) ->with( 'succes', 'Detalle producto creado' );
    }
    public function eliminar($IDDETALLE){
       $listaID=DB::table( 'detalles_producto')->where('IDDETALLE',$IDDETALLE)->get();
       foreach($listaID as $id){
        $IDPRODUCTO=$id->IDPRODUCTO;
       }
        DB::table( 'detalles_producto')->where('IDDETALLE',$IDDETALLE)->delete();

        return redirect( route( 'Detallesproductos.listar',$IDPRODUCTO ) ) ->with( 'eliminado', 'Eliminado' );
    }
    
}
