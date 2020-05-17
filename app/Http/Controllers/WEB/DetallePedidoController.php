<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetallePedidoController extends Controller
{
    public function index() {
        $det_pedido = DB::table( 'detalles_pedido' )->get();
        $productos = DB::table('productos')->get();
        return view( 'Detalle_Pedido.index', compact( 'det_pedido','productos' ) );
    }
}
