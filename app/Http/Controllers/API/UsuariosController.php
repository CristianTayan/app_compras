<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nexmo\Laravel\Facade\Nexmo;
use Carbon\Carbon;
use Twilio\Rest\Client;


class UsuariosController extends Controller {
    public function get_usuarios() {
        $usuarios = DB::table( 'usuarios' )->orderBy( 'NOMBRE' )->get();
        if ( count( $usuarios ) != 0 ) {
            return response()->json( $usuarios, 200 );
        } else {
            $error = ['message' => 'No se ha encontrado un usuarios'];
            return response()->json( $error, 404 );
        }
    }

    public function registrar_usuario( Request $request ) {
        $NOMBRE = $request->nombre;
        $CORREO = $request->correo;
        $CELULAR = $request->celular;
        $CELULAR=substr($CELULAR, 1);
        $CELULAR='+593'.$CELULAR;
        $CONTRASENA=base64_encode($request->contrasena);
        $TIPO_USUARIO = 'U';
        $ESTADO = 'S';
        $SESION = $request->correo;
        $VERIFICACION='N' ;
        $CREATED_AT=carbon::now();
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
            $Num = '';
            $pattern = '1234567890';
            $max = strlen($pattern)-1;
            for($i=0;$i < 6;$i++) $Num .= $pattern{mt_rand(0,$max)};

             $num=$Num;

        $CODIGO=$num;

        $correo_existe = DB::table( 'usuarios' )->where( 'CORREO', $CORREO )->get();
        $celular_existe = DB::table( 'usuarios' )->where( 'CELULAR', $CELULAR )->get();

        if ( $CORREO ) {
            if ( count( $correo_existe ) == 0 ) {
                if ( count( $celular_existe ) == 0 ) {

                    $client->messages->create($CELULAR,
                    ['from' => $twilio_number, 'body' =>'Código de verificación app_compras'.$CODIGO ] );

                    DB::table( 'usuarios' )->insert(
                        [
                            'NOMBRE' => $NOMBRE,
                            'CORREO' => $CORREO,
                            'CELULAR' => $CELULAR,
                            'CONTRASENA' => $CONTRASENA,
                            'TIPO_USUARIO' => $TIPO_USUARIO,
                            'ESTADO' => $ESTADO,
                            'SESION' => $SESION,
                            'CODIGO' => $CODIGO,
                            'VERIFICACION' => $VERIFICACION,
                            'CREATED_AT' => $CREATED_AT,

                        ]
                    );

                    $mensaje = ['message' => 'Usuario registrado'];
                    return response()->json( $mensaje, 200 );
                } else {
                    $mensaje = ['message' => 'El número de celular ya se encuentra registrado'];
                    return response()->json( $mensaje, 400 );
                }
            } else {
                $mensaje = ['message' => 'Ya existe un usuario con este correo'];
                return response()->json( $mensaje, 400 );
            }
        } else {
            $mensaje = ['message' => 'El correo es inválido'];
            return response()->json( $mensaje, 400 );
        }
    }


    public function verificar_usuario(Request $request){
        $CORREO=$request->CORREO;
        $CODIGO=$request->CODIGO;
        $confirmar= DB::table('usuarios')
        ->where('CORREO',$CORREO)
        ->where('CODIGO',$CODIGO)->get();

        if(count($confirmar)!=0){
            DB::table( 'usuarios' )
            ->where( 'CORREO', $CORREO )
            ->update(
                [
                    'VERIFICACION' => 'S'

                ]
            );
            $mensaje = ['message' => 'Usuario Confirmado'];
            return response()->json( $mensaje, 200 );
        } else{
            $mensaje = ['message' => 'Código no válido'];
            return response()->json( $mensaje, 400 );
        }
    }

    public function enviar_sms($IDUSUARIO){

        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $Datos=DB::table('usuarios')->where('IDUSUARIO',$IDUSUARIO)
        ->select('CODIGO','CELULAR')->get();
        foreach($Datos as $d){
            $CODIGO=$d->CODIGO;
            $CELULAR=$d->CELULAR;
        }
        if(count($Datos)!=0){
            $client->messages->create($CELULAR,
            ['from' => $twilio_number, 'body' =>'Código de verificación app_compras'.$CODIGO ] );
            $mensaje = ['message' => 'Mensaje enviado'];
            return response()->json( $mensaje, 200 );
        } else{
            $mensaje = ['message' => 'Mensaje no enviado'];
            return response()->json( $mensaje, 400 );
        }
    }


    public function actualizar_usuario( Request $request ) {
        $nombre = $request->nombre;
        $correo = $request->correo;
        $contrasena = base64_encode( $request->contrasena );
        $celular = $request->celular;
        $celular_existe = DB::table( 'usuarios' )->where( 'celular', $celular )->get();

        if(count($celular_existe)==0){
        DB::table( 'usuarios' )
        ->where( 'correo', $correo )
        ->update( ['nombre' => $nombre,
        'contrasena' => $contrasena,
        'celular' => $celular
        ] );
        $mensaje = ['message' => 'Actualizacion exitosa'];
        return response()->json( $mensaje, 200 );
        } else{
            $mensaje = ['message' => 'El número celular ya se encuentra registrado'];
        return response()->json( $mensaje, 400 );
        }

    }
    public function buscar_correo( $correo ) {
        $usuario = DB::table( 'usuarios' )->where( 'correo', $correo )->get();
        if(count($usuario)!=0){
            return response()->json( $usuario, 200 );
        } else{
            $mensaje = ['message' => 'No se encuentra usuarios registrados con ese correo'];
            return response()->json( $mensaje, 400 );
        }

    }

    public function cambiar_estado_usuario ($correo){

    $estado=DB::table( 'usuarios' )->where( 'correo', $correo )->where( 'estado', 's' )->get();


    if(count($estado)!=0){
        DB::table( 'usuarios' )
        ->where( 'correo', $correo )
        ->update( ['estado' => 'n'

        ] );
        $mensaje = ['message' => 'Cambio de estado exitoso'];
            return response()->json( $mensaje, 200 );
    } else {
        DB::table( 'usuarios' )
        ->where( 'correo', $correo )
        ->update( ['estado' => 's'

        ] );
        $mensaje = ['message' => 'Cambio de estado exitoso'];
        return response()->json( $mensaje, 200 );
    }

    }

}
