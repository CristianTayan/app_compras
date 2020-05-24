<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetallePedidoController extends Controller
{
    public function index($idPedido) {
        $det_pedido = DB::table( 'view_detalle_pedidos' )->where('IDPEDIDO',$idPedido)->get();
        return view( 'Detalle_Pedido.index', compact( 'det_pedido' ) );
    }
}
