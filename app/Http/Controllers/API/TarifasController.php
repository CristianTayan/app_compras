<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TarifasController extends Controller
{
 public function valor_envio($DistaciaPedido){
    $DistaciaPedido = str_replace(",", ".", $DistaciaPedido);
    $tarifas=DB::table('tarifas')->get();
    
    if($DistaciaPedido <= 5){
     foreach($tarifas as $tarifa){
        $distancia=$tarifa->DISTACIA;
       
        if($DistaciaPedido <= $distancia){
            $valor=$tarifa->VALOR;
        return response()->json( $valor, 200 );
        }
}
    }else{
        $diferencia=$DistaciaPedido-5;
        $valor=2.55+($diferencia*0.20);
        return response()->json( $valor, 200 );
    }
   
 }
}
