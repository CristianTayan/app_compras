<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
 public function vistaReporte(){
     $empresas = DB::table('empresa')->get();
     $transportistas = DB::table('transportistas')->get();
     return view('Reportes.indexReportes', compact('empresas','transportistas'));
 }
public function reporte1(Request $request){
    $INICIO = $request->INICIO;
    $IDEMPRESA = $request->IDEMPRESA;
    $FIN = $request->FIN;

    $transportistas = DB::table('transportistas')->get();
    $empresa = DB::table('empresa')->where('IDEMPRESA',$IDEMPRESA)->get();
    $usuarios = DB::table( 'usuarios' )->get();
    $direcciones = DB::table( 'direcciones' )->get();
    $pedidos = DB::table( 'pedido' )->whereBetween( 'FECHA_ENTREGA', [$INICIO.' 00:00:00', $FIN.' 23:59:59'] )
    ->where( 'ESTADO', 'F' )
    ->where( 'IDEMPRESA', $IDEMPRESA )
    
    ->get();
    $pdf = \PDF::loadView('Reportes.reporteEmpresas',compact('usuarios','direcciones','pedidos','INICIO','FIN','empresa','transportistas'));
           
            return $pdf->stream("EmpresaPedidos.pdf");

}
public function reporte2(Request $request){
    $INICIO = $request->INICIO;
    $IDTRANSPORTISTA = $request->IDTRANSPORTISTA;
    $FIN = $request->FIN;

    $transportistas = DB::table('transportistas')
    ->where('IDTRANSPORTISTA', $IDTRANSPORTISTA)
    ->get();
    $trasportistas = DB::table('transportistas')->where('IDTRANSPORTISTA',$IDTRANSPORTISTA)->get();
    $empresas = DB::table('empresa')->get();
    $usuarios = DB::table( 'usuarios' )->get();
    $direcciones = DB::table( 'direcciones' )->get();
    $pedidos = DB::table( 'pedido' )->whereBetween( 'FECHA_ENTREGA', [$INICIO.' 00:00:00', $FIN.' 23:59:59'] )
    ->where( 'ESTADO', 'F' )
    ->where( 'IDTRANSPORTISTA', $IDTRANSPORTISTA )
    
    ->get();
    $pdf = \PDF::loadView('Reportes.reporteTransportista',compact('usuarios','direcciones','pedidos','INICIO','FIN','empresas','transportistas'));
           
            return $pdf->stream("TransportistaPedidos.pdf");

}
}