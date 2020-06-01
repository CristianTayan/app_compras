<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
class ProductosController extends Controller
{
    public function index($id)
    {
        $productos = DB::table('productos')->where('IDEMPRESA', $id)->get();
        $categorias = DB::table('cat_productos')->where('IDEMPRESA', $id)->get();
        $empresas=DB::table('empresa')->where('IDEMPRESA', $id)->get();
        $detallesProductos=DB::table('detalles_producto')->get();
        return view('Productos.index', compact('productos', 'categorias','empresas','detallesProductos'));
    }

    public function cambiar_estado_Producto($ID)
    {
        $estado = DB::table('productos')->where('IDPRODUCTO', $ID)->get();
        foreach ($estado as $e) {
            if ($e->ESTADO ==  'S') {
                DB::table('productos')
                    ->where('IDPRODUCTO', $ID)
                    ->update([
                        'ESTADO' => 'N'
                    ]);
                return redirect(route('productos.listar', $e->IDEMPRESA));
            } else {
                DB::table('productos')
                    ->where('IDPRODUCTO', $ID)
                    ->update([
                        'estado' => 'S'
                   ]);
                return redirect(route('productos.listar', $e->IDEMPRESA));
            }
        }
    }
    public function verificar_imagen($ID)
    {
        $estado = DB::table('productos')->where('IDPRODUCTO', $ID)->get();
        foreach ($estado as $e) {
            if ($e->VERIFICAR_IMG ==  'S') {
                DB::table('productos')
                    ->where('IDPRODUCTO', $ID)
                    ->update([
                        'VERIFICAR_IMG' => 'N'
                    ]);
                return redirect(route('productos.listar', $e->IDEMPRESA));
            } else {
                DB::table('productos')
                    ->where('IDPRODUCTO', $ID)
                    ->update([
                        'VERIFICAR_IMG' => 'S'
                   ]);
                return redirect(route('productos.listar', $e->IDEMPRESA));
            }
        }
    }
    public function vista_crear($id){
        
        $categorias = DB::table('cat_productos')->where('IDEMPRESA', $id)->get();
        $empresas = DB::table('empresa')->where('IDEMPRESA', $id)->get();
        return view('Productos.create', compact( 'categorias','empresas'));
    }

    public function registrar_productos( Request $request ) {
       
       
        $IDCATEGORIA = $request->IDCATEGORIA;
        $NOMBRE = $request->NOMBRE;
        $IDEMPRESA = $request->IDEMPRESA;
        $DESCRIPCION = $request->DESCRIPCION;
        $COSTO = $request->COSTO;
        Session::put('nombreProductos',$NOMBRE);
        Session::put('descripcionProductos',$DESCRIPCION);
        Session::put('costoProducto',$COSTO);
        $ESTADO = 'S';
        $DETALLE = 'N';
        $CREATED_AT = Carbon::now();

        if($request->hasFile('FOTO')){
            $archivo=$request->file('FOTO');
        $FOTO=$archivo->getClientOriginalName();
        $archivo->move(public_path().'/images/producto/',$FOTO);
        $FOTO='images/producto/'.$FOTO;}

        DB::table( 'productos' )->insert(
            [
                'IDCATEGORIA' => $IDCATEGORIA,
                'IDEMPRESA' =>$IDEMPRESA,   
                'NOMBRE' => $NOMBRE,
                'DESCRIPCION' => $DESCRIPCION,
                'COSTO' => $COSTO,
                'FOTO' => $FOTO,
                'ESTADO' => $ESTADO,
                'DETALLE' => $DETALLE,
                'CREATED_AT' => $CREATED_AT
            ]
        );
        Session::forget('nombreProductos');
        Session::forget('descripcionProductos');
        Session::forget('costoProducto');
        return redirect( route( 'productos.listar',$IDEMPRESA ) ) ->with( 'succes', 'Producto creado' );
    }

    public function eliminarProducto($ID){
        $estado = DB::table('productos')->where('IDPRODUCTO', $ID)->get();
               DB::table( 'productos' )->where( 'IDPRODUCTO', $ID ) ->delete();
        
        
        foreach ($estado as $e) {
        return redirect( route( 'productos.listar',$e->IDEMPRESA ) ) ->with( 'eliminado', 'Eliminado' );
        }

        
    }
    public function actualizar_productos( Request $request ) {
       
        $IDEMPRESA=$request->IDEMPRESA;
        $IDCATEGORIA=$request->IDCATEGORIA;
        $IDPRODUCTO=$request->IDPRODUCTO;
        $NOMBRE = $request->NOMBRE;
        $DESCRIPCION = $request->DESCRIPCION;
        $COSTO = $request->COSTO; 
        $CREATED_AT = Carbon::now();
        if($request->hasFile('FOTO')){
            $archivo=$request->file('FOTO');
        $FOTO=$archivo->getClientOriginalName();
        $archivo->move(public_path().'/images/producto/',$FOTO);
        $FOTO='images/producto/'.$FOTO;} else{
            $FOTO = $request->FOTOE;
        }

        DB::table( 'productos' )
        ->where('IDPRODUCTO',$IDPRODUCTO)
        ->update(
            [
                  
                'NOMBRE' => $NOMBRE,
                'DESCRIPCION' => $DESCRIPCION,
                'COSTO' => $COSTO,
                'FOTO' => $FOTO,
                'IDCATEGORIA' => $IDCATEGORIA,
                'CREATED_AT' => $CREATED_AT
            ]
        );
        
        return redirect( route( 'productos.listar',$IDEMPRESA ) ) ->with( 'informacion', 'Actualizado' );
    }
    public function vistaEditarProd($id){
        $categorias = DB::table('cat_productos')->get();
        $productos = DB::table('productos')->where('IDPRODUCTO', $id)->get();
        return view('Productos.edit', compact( 'categorias','productos'));
    }

    public function indexE() {
        $empresas = DB::table( 'empresa' )->get();
        $categorias = DB::table('cat_empresas')->get();
      
        return view( 'Productos.indexE', compact( 'empresas','categorias') );
    }
}