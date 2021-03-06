<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
class HorariosController extends Controller
{
    public function vistaCrearHorario( $IDEMPRESA ) {
        $horariosID = DB::table( 'empresa' )->where( 'IDEMPRESA', $IDEMPRESA )->get();

        return view( 'Horarios.create', compact( 'horariosID' ) );
    }

    public function registrar_horarios( Request $request ) {
        $IDEMPRESA = $request->IDEMPRESA;
        $DIA_INICIO = $request->DIA_INICIO;
        $DIA_FIN = $request->DIA_FIN;
        $HORA_INICIO = $request->HORA_INICIO;
        $HORA_FIN = $request->HORA_FIN;
        $HORARIO_CONCAT = $DIA_INICIO.' a '.$DIA_FIN.' de '.$HORA_INICIO.' a ' .$HORA_FIN;
        $SESION = $request->SESION;
        $CREATED_AT = Carbon::now();

        DB::table( 'horarios' )->insert(
            [
                'IDEMPRESA' => $IDEMPRESA,
                'DIA_INICIO' => $DIA_INICIO,
                'DIA_FIN' => $DIA_FIN,
                'HORA_INICIO' => $HORA_INICIO,
                'HORA_FIN' => $HORA_FIN,
                'HORARIO_CONCAT' => $HORARIO_CONCAT,
                'SESION' => $SESION,
                'CREATED_AT' => $CREATED_AT

            ]
        );
        return redirect( route( 'Empresas.index' ) );
    }

    public function vistaEditarHorario( $IDHORARIO ) {
        $horarios = DB::table( 'horarios' )->where( 'IDHORARIO', $IDHORARIO )->get();

        return view( 'Horarios.edit', compact( 'horarios') );
    }

    public function editar_horarios( Request $request ) {
        $IDHORARIO = $request->IDHORARIO;
        $DIA_INICIO = $request->DIA_INICIO;
        $DIA_FIN = $request->DIA_FIN;
        $HORA_INICIO = $request->HORA_INICIO;
        $HORA_FIN = $request->HORA_FIN;
        $HORARIO_CONCAT = $DIA_INICIO.' a '.$DIA_FIN.' de '.$HORA_INICIO.' a ' .$HORA_FIN;
        $CREATED_AT = Carbon::now();

        DB::table( 'horarios' )
        ->where('IDHORARIO',$IDHORARIO)
        ->update(
            [
                
                'DIA_INICIO' => $DIA_INICIO,
                'DIA_FIN' => $DIA_FIN,
                'HORA_INICIO' => $HORA_INICIO,
                'HORA_FIN' => $HORA_FIN,
                'HORARIO_CONCAT' => $HORARIO_CONCAT,
                'CREATED_AT' => $CREATED_AT

            ]
        );
        return redirect( route( 'Empresas.index' ) );
    }


}
