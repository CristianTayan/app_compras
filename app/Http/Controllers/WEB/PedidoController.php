<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function indexE() {
        $pedidos = DB::table( 'pedido' )->where('ESTADO','E')->get();
        $usuarios = DB::table('usuarios')->get();
        $direcciones = DB::table('direcciones')->get();
        return view( 'Pedido.index', compact( 'pedidos','usuarios','direcciones' ) );
    }
    public function indexP() {
        $pedidos = DB::table( 'pedido' )->where('ESTADO','P')->get();
        $usuarios = DB::table('usuarios')->get();
        $direcciones = DB::table('direcciones')->get();
        return view( 'Pedido.indexP', compact( 'pedidos','usuarios','direcciones' ) );
    
    }    public function indexF() {
            $pedidos = DB::table( 'pedido' )->where('ESTADO','F')->get();
            $usuarios = DB::table('usuarios')->get();
            $direcciones = DB::table('direcciones')->get();
            return view( 'Pedido.indexF', compact( 'pedidos','usuarios','direcciones' ) );
    }   
    public function indexA() {
        $pedidos = DB::table( 'pedido' )->where('ESTADO','A')->get();
        $usuarios = DB::table('usuarios')->get();
        $direcciones = DB::table('direcciones')->get();
        return view( 'Pedido.indexA', compact( 'pedidos','usuarios','direcciones' ) );
    
    }

    public function indexC() {
        $pedidos = DB::table( 'pedido' )->where('ESTADO','C')->get();
        $usuarios = DB::table('usuarios')->get();
        $direcciones = DB::table('direcciones')->get(); 
        return view( 'Pedido.indexA', compact( 'pedidos','usuarios','direcciones' ) );
    
    }
}
