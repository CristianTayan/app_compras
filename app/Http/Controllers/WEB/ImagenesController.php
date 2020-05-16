<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Twilio\Rest\Client;

class ImagenesController extends Controller {
    public function listar_empresas() {
        $empresas = DB::table( 'empresa' )->where( 'VERIFICAR_IMG', 'N' )->get();
        return view( 'Imagenes.indexE', compact( 'empresas' ) );
    }
    public function verificar_imagen($IDEMPRESA){
        DB::table('empresa')
        ->where('IDEMPRESA',$IDEMPRESA)
        ->update([
            'VERIFICAR_IMG'=>'S'
        ]);
        return redirect( route( 'Imagenes.indexE' ) )->with( 'succes', 'Imagen verificada' );
    }
    public function listar_productos() {
        $productos = DB::table( 'productos' )->where( 'VERIFICAR_IMG', 'N' )->get();
        return view( 'Imagenes.index', compact( 'productos' ) );
    }
    public function verificar_imagen_P($IDPRODUCTO){
        DB::table('productos')
        ->where('IDPRODUCTO',$IDPRODUCTO)
        ->update([
            'VERIFICAR_IMG'=>'S'
        ]);
        return redirect( route( 'Imagenes.index' ) )->with( 'succes', 'Imagen verificada' );
    }
}
