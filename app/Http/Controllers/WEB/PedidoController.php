<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PedidoController extends Controller {
    public function indexE() {
        $empresas = DB::table('empresa')->get();
        $pedidos = DB::table( 'pedido' )->where( 'ESTADO', 'E' )->get();
        $usuarios = DB::table( 'usuarios' )->get();
        $direcciones = DB::table( 'direcciones' )->get();
        return view( 'Pedido.index', compact( 'pedidos', 'usuarios', 'direcciones','empresas' ) );
    }

    public function indexP() {
        $empresas = DB::table('empresa')->get();
        $pedidos = DB::table( 'pedido' )->where( 'ESTADO', 'P' )->get();
        $usuarios = DB::table( 'usuarios' )->get();
        $direcciones = DB::table( 'direcciones' )->get();
        return view( 'Pedido.indexP', compact( 'pedidos', 'usuarios', 'direcciones','empresas' ) );

    }

    public function indexF() {
        $empresas = DB::table('empresa')->get();
        $pedidos = DB::table( 'pedido' )->where( 'ESTADO', 'F' )->get();
        $usuarios = DB::table( 'usuarios' )->get();
        $direcciones = DB::table( 'direcciones' )->get();
        return view( 'Pedido.indexF', compact( 'pedidos', 'usuarios', 'direcciones','empresas'  ) );
    }

    public function indexA() {
        $empresas = DB::table('empresa')->get();
        $pedidos = DB::table( 'pedido' )->where( 'ESTADO', 'A' )->get();
        $usuarios = DB::table( 'usuarios' )->get();
        $direcciones = DB::table( 'direcciones' )->get();
        return view( 'Pedido.indexA', compact( 'pedidos', 'usuarios', 'direcciones','empresas'  ) );

    }

    public function indexC() {
        $empresas = DB::table('empresa')->get();
        $pedidos = DB::table( 'pedido' )->where( 'ESTADO', 'C' )->get();
        $usuarios = DB::table( 'usuarios' )->get();
        $direcciones = DB::table( 'direcciones' )->get();

        return view( 'Pedido.indexC', compact( 'pedidos', 'usuarios', 'direcciones','empresas'  ) );

    }

    public function rango( Request $request ) {
        $INICIO = $request->INICIO;

        $FIN = $request->FIN;

        $usuarios = DB::table( 'usuarios' )->get();
        $direcciones = DB::table( 'direcciones' )->get();
        $pedidos = DB::table( 'pedido' )->whereBetween( 'FECHA_ENTREGA', [$INICIO.' 00:00:00', $FIN.' 23:59:59'] )
        ->where( 'ESTADO', 'F' )
        ->get();
        return view( 'Pedido.rangoPedidosF', compact( 'pedidos', 'usuarios', 'direcciones' ) );
    }

    public function indexGeneralPedidos() {
        return view( 'Pedido.indexGeneralPedidos' );
    }

    public function indexPrincipal() {
        $empresas = DB::table( 'empresa' )->get();
        return view( 'Pedido.indexPrincipal', compact( 'empresas' ) );
    }

    public function enviadosEmpresa($ID){
        $empresas =  DB::table('empresa')->where('IDEMPRESA',$ID)->get();
        $pedidos = DB::table( 'pedido' )->where( 'ESTADO', 'E' )->where('IDEMPRESA',$ID)->get();
        $usuarios = DB::table( 'usuarios' )->get();
        $direcciones = DB::table( 'direcciones' )->get();
        return view( 'Pedido.index', compact( 'pedidos', 'usuarios', 'direcciones','empresas' ) );
    }
    
    public function enProcesoEmpresa($ID){
        $empresas =  DB::table('empresa')->where('IDEMPRESA',$ID)->get();
        $pedidos = DB::table( 'pedido' )->where( 'ESTADO', 'P' )->where('IDEMPRESA',$ID)->get();
        $usuarios = DB::table( 'usuarios' )->get();
        $direcciones = DB::table( 'direcciones' )->get();
        return view( 'Pedido.indexP', compact( 'pedidos', 'usuarios', 'direcciones','empresas' ) );
    }
    
    public function enCaminoEmpresa($ID){
        $empresas = DB::table('empresa')->where('IDEMPRESA',$ID)->get();
        $pedidos = DB::table( 'pedido' )->where( 'ESTADO', 'C' )->where('IDEMPRESA',$ID)->get();
        $usuarios = DB::table( 'usuarios' )->get();
        $direcciones = DB::table( 'direcciones' )->get();
        return view( 'Pedido.indexC', compact( 'pedidos', 'usuarios', 'direcciones' ,'empresas') );
    }
    
    public function finalizadosEmpresa($ID){
        $empresas = DB::table('empresa')->where('IDEMPRESA',$ID)->get();
        $pedidos = DB::table( 'pedido' )->where( 'ESTADO', 'F' )->where('IDEMPRESA',$ID)->get();
        $usuarios = DB::table( 'usuarios' )->get();
        $direcciones = DB::table( 'direcciones' )->get();
        return view( 'Pedido.indexF', compact( 'pedidos', 'usuarios', 'direcciones','empresas'  ) );
    }
    
    public function anuladosEmpresa($ID){
        $empresas = DB::table('empresa')->where('IDEMPRESA',$ID)->get();
        $pedidos = DB::table( 'pedido' )->where( 'ESTADO', 'A' )->where('IDEMPRESA',$ID)->get();
        $usuarios = DB::table( 'usuarios' )->get();
        $direcciones = DB::table( 'direcciones' )->get();
        return view( 'Pedido.indexA', compact( 'pedidos', 'usuarios', 'direcciones','empresas' ) );
    }
}