<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HorariosController extends Controller {
    public function get_horarios() {
        $horarios = DB::table( 'horarios' )->get();
        if ( count( $horarios ) != 0 ) {
            return response()->json( $horarios, 200 );
        } else {
            $error = ['message' => 'No se ha encontrado horarios'];
            return response()->json( $error, 400 );
        }
    }

    public function registrar_horarios( Request $request ) {
        $IDEMPRESA=$request->DIA_INICIO;
        $DIA_INICIO = $request->DIA_INICIO;
        $DIA_FIN = $request->DIA_FIN;
        $HORA_INICIO = $request->HORA_INICIO;
        $HORA_FIN = $request->HORA_FIN;
        $HORARIO_CONCAT = 'Abierto de '.$DIA_INICIO.' a '.$DIA_FIN.' de '.$HORA_INICIO.' a ' .$HORA_FIN;
        $SESION = $request->SESION;
        $CREATED_AT = Carbon::now();

        DB::table( 'horarios' )->insert(
            [
                'IDEMPRESA' =>$IDEMPRESA,
                'DIA_INICIO' => $DIA_INICIO,
                'DIA_FIN' => $DIA_FIN,
                'HORA_INICIO' => $HORA_INICIO,
                'HORA_FIN' => $HORA_FIN,
                'HORARIO_CONCAT' => $HORARIO_CONCAT,
                'SESION' => $SESION,
                'CREATED_AT' => $CREATED_AT

            ]
        );
        $mensaje = ['message' => 'Horario registrado'];
        return response()->json( $mensaje, 200 );
    }

    public function actualizar_horarios( Request $request ) {
        $IDEMPRESA=$request->DIA_INICIO;
        $IDHORARIO = $request->IDHORARIO;
        $DIA_INICIO = $request->DIA_INICIO;
        $DIA_FIN = $request->DIA_FIN;
        $HORA_INICIO = $request->HORA_INICIO;
        $HORA_FIN = $request->HORA_FIN;
        $HORARIO_CONCAT = 'Abierto de '.$DIA_INICIO.' a '.$DIA_FIN.' de '.$HORA_INICIO.' a ' .$HORA_FIN;
        $SESION = $request->SESION;
        $CREATED_AT = Carbon::now();
        $existe = DB::table( 'horarios' )
        ->where( 'IDHORARIO', $IDHORARIO )->get();
        if ( count( $existe ) != 0 ) {
            DB::table( 'horarios' )
            ->where( 'IDHORARIO', $IDHORARIO )
            ->update(
                [
                    'IDEMPRESA' =>$IDEMPRESA,
                    'DIA_INICIO' => $DIA_INICIO,
                    'DIA_FIN' => $DIA_FIN,
                    'HORA_INICIO' => $HORA_INICIO,
                    'HORA_FIN' => $HORA_FIN,
                    'HORARIO_CONCAT' => $HORARIO_CONCAT,
                    'SESION' => $SESION,
                    'CREATED_AT' => $CREATED_AT
                ]
            );
            $mensaje = ['message' => 'Horario actualizado'];
            return response()->json( $mensaje, 200 );
        } else {
            $mensaje = ['message' => 'Horario no encontrado'];
            return response()->json( $mensaje, 400 );
        }
    }
    
       

    public function abierto_cerrado( $IDEMPRESA ) {
       
        
        setlocale( LC_ALL ,"es_es.utf-8"  );
        $dia_actual = strftime( '%A');
        $dia_actual = ucwords( $dia_actual );
       
        $horarioEmpresa = DB::table( 'horarios' )
        ->where( 'IDEMPRESA', $IDEMPRESA )
        ->select()->get();
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
        $contarD = count( $dias );
        foreach ( $horarioEmpresa as $ho ) {
            $DIA_INICIO = $ho->DIA_INICIO;
            $DIA_FIN = $ho->DIA_FIN;
            $HORA_INICIO = $ho->HORA_INICIO;
            $HORA_FIN = $ho->HORA_FIN;
            $Hora_I = strtotime( $HORA_INICIO );
            $HI = date( 'H', $Hora_I );
            $MI = date( 'i', $Hora_I );
            $Hora_F = strtotime( $HORA_FIN );
            $HF = date( 'H', $Hora_F );
            $MF = date( 'i', $Hora_F );
            $hactual = Carbon::now();
            $inicio = Carbon::createFromTime( $HI, $MI );
            $fin = Carbon::createFromTime( $HF, $MF );

            for ( $i = 0; $i < $contarD; $i++ ) {
                if ( $dias[$i] == $DIA_INICIO ) {
                    $diaIC = $i+1;
                  
                }
                if ( $dias[$i] == $DIA_FIN ) {
                    $diaFC = $i+1;
                }
                if ( $dias[$i] == $dia_actual ) {
                    $diaA = $i+1;
                }
                
            }
        }
        
        if ( $diaIC <= $diaA && $diaFC >= $diaA ) {
            if ( $hactual >= $inicio && $hactual <= $fin ) {
                
                $mensaje = ['message' => 'Abierto'];
                return response()->json( $mensaje, 200 );
            } else
            $mensaje = ['message' => 'Cerrado abre a las '. $HI.':'.$MI.' y cierra '.$HF.':'.$MF];
            return response()->json( $mensaje, 200 );
        } else {
            
            $mensaje = ['message' => 'Cerrado abre de '.$DIA_INICIO.' a '.$DIA_FIN];
            return response()->json( $mensaje, 200,[],JSON_UNESCAPED_UNICODE );
        }

    }

}