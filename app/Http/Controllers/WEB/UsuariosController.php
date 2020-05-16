<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Twilio\Rest\Client;

class UsuariosController extends Controller {

    public function listar_usuarios_U() {
        $usuarios = DB::table( 'usuarios' )->where( 'TIPO_USUARIO', 'U' )->get();
        return view( 'Usuarios.index', compact( 'usuarios' ) );
    }

    public function listar_usuarios_A() {
        $usuarios = DB::table( 'usuarios' )->where( 'TIPO_USUARIO', 'A' )->get();
        return view( 'Usuarios.index', compact( 'usuarios' ) );
    }

    public function listar_usuarios_p() {
        $usuarios = DB::table( 'usuarios' )->where( 'TIPO_USUARIO', 'P' )->get();
        return view( 'Usuarios.index', compact( 'usuarios' ) );
    }

    public function Usuarios_vista() {
        return view( 'Usuarios.create' );
    }
    public function Usuarios_vista_actualizar() {

        return view( 'Usuarios.edit' );
    }

    public function eliminar_usuario( $IDUSUARIO ) {

        $Tipos_Usuario = DB::table( 'usuarios' )->where( 'IDUSUARIO', $IDUSUARIO )->get();

        foreach ( $Tipos_Usuario as $tipo ) {
            $nombre = $tipo->TIPO_USUARIO;
        }

        echo $nombre;

        if ( $nombre == 'U' ) {
            DB::table( 'usuarios' )->where( 'IDUSUARIO', $IDUSUARIO )->delete();
            return redirect( route( 'Usuarios.index' ) )->with( 'elminar', 'Usuario eliminado' );
        }
        if ( $nombre == 'A' ) {
            DB::table( 'usuarios' )->where( 'IDUSUARIO', $IDUSUARIO )->delete();
            return redirect( route( 'Usuarios.indexA' ) )->with( 'eliminar', 'Administrador eliminado' );

        }
        if ( $nombre == 'P' ) {
            DB::table( 'usuarios' )->where( 'IDUSUARIO', $IDUSUARIO )->delete();
            return redirect( route( 'Usuarios.indexP' ) )->with( 'eliminar', 'Proveedor eliminado' );

        }

    }

    public function buscar_usuario( $IDUSUARIO ) {
        $Usuarios = DB::table( 'usuarios' )->where( 'IDUSUARIO', $IDUSUARIO )->get();

        return view( 'Usuarios.edit' )->with( 'Usuarios', $Usuarios );
    }

    public function actualizar_usuario( Request $request ) {
        $IDUSUARIO = $request->IDUSUARIO;
        $NOMBRE = $request->NOMBRE;
        $CORREO = $request->CORREO;
        $CELULAR = $request->CELULAR;
        $count = strlen( $CELULAR );
        echo $count;
        echo $IDUSUARIO;
        if ( $count == 10 ) {
            $CELULAR = substr( $CELULAR, 1 );
            $CELULAR = '+593'.$CELULAR;
        } else {
            $CELULAR = $request->CELULAR;
        }
        $CONTRASENA = base64_encode( $request->CONTRASENA );
        $TIPO_USUARIO = $request->TIPO_USUARIO;
        $ESTADO = 'S' ;
        $SESION = 'sesion' ;
        $VERIFICACION = $request->VERIFICACION ;
        $CREATED_AT = carbon::now();
        $correo_existe = DB::table( 'usuarios' )->where( 'CORREO', $CORREO )->get();
        $datos_repetidos=DB::table( 'usuarios' )
        ->select('CELULAR','CORREO')
        ->where( 'IDUSUARIO', $IDUSUARIO )->get();
        foreach($datos_repetidos as $dato){
            $correo=$dato->CORREO;
            $celular=$dato->CELULAR;
        }
        
        
        $celular_existe = DB::table( 'usuarios' )->where( 'CELULAR', $CELULAR )->get();

        if ( filter_var( $CORREO, FILTER_VALIDATE_EMAIL ) ) {
            if ( count( $correo_existe ) == 0 || $correo==$CORREO ) {
                if ( count( $celular_existe ) == 0 || $celular==$CELULAR) {

                    DB::table( 'usuarios' )
                    ->where( 'IDUSUARIO', $IDUSUARIO )
                    ->update(
                        [
                            'NOMBRE' => $NOMBRE,
                            'CORREO' => $CORREO,
                            'CELULAR' => $CELULAR,
                            'CONTRASENA' => $CONTRASENA,
                            'TIPO_USUARIO' => $TIPO_USUARIO,
                            'ESTADO' => $ESTADO,
                            'SESION' => $SESION,
                            'VERIFICACION' => $VERIFICACION,
                            'CREATED_AT' => $CREATED_AT

                        ]
                    );

                    if ( $TIPO_USUARIO == 'U' ) {
                        return redirect( route( 'Usuarios.index' ) )->with( 'succes', 'Usuario actualizado' );
                    }
                    if ( $TIPO_USUARIO == 'A' ) {
                        return redirect( route( 'Usuarios.indexA' ) )->with( 'succes', 'Administrador actualizado' );
                    }
                    if ( $TIPO_USUARIO == 'P' ) {
                        return redirect( route( 'Usuarios.indexP' ) )->with( 'succes', 'Proveedor actualizado' );
                    }
                } else {
                    //CELULAR EXISTE
                    return redirect( route( 'Usuarios.buscar',$IDUSUARIO ) )->with( 'Info', 'El número celular ya se encuentra registrado' );
                }
            } else {
                //CORREO EXISTE
                return redirect( route( 'Usuarios.buscar',$IDUSUARIO ) )->with( 'Info', 'El correo ya se encuentra registrado' );
            }
        } else {
            //CORREO NO VALIDO
            return redirect( route( 'Usuarios.buscar' ,$IDUSUARIO) )->with( 'Info', 'El correo no es válido' );
        }

    }

    public function registrar_usuario( Request $request ) {
        $NOMBRE = $request->NOMBRE;
        $CORREO = $request->CORREO;
        $CELULAR = $request->CELULAR;
        $CELULAR = substr( $CELULAR, 1 );
        $CELULAR = '+593'.$CELULAR;
        $CONTRASENA = base64_encode( $request->CONTRASENA );
        $TIPO_USUARIO = $request->TIPO_USUARIO;
        $ESTADO = 'S' ;
        $SESION = 'sesion' ;
        $VERIFICACION = 'N' ;
        $CREATED_AT = carbon::now();
        $account_sid = getenv( 'TWILIO_SID' );
        $auth_token = getenv( 'TWILIO_AUTH_TOKEN' );
        $twilio_number = getenv( 'TWILIO_NUMBER' );
        $client = new Client( $account_sid, $auth_token );
        $Num = '';
        $pattern = '1234567890';
        $max = strlen( $pattern )-1;
        for ( $i = 0; $i < 6; $i++ ) {
            $Num .= $pattern {
                mt_rand( 0, $max )}
                ;
            }
            $num = $Num;
            $CODIGO = $num;
            $correo_existe = DB::table( 'usuarios' )->where( 'CORREO', $CORREO )->get();
            $celular_existe = DB::table( 'usuarios' )->where( 'CELULAR', $CELULAR )->get();

            if ( filter_var( $CORREO, FILTER_VALIDATE_EMAIL ) ) {
                if ( count( $correo_existe ) == 0 ) {
                    if ( count( $celular_existe ) == 0 ) {

                        // $client->messages->create( $CELULAR,
                        // ['from' => $twilio_number, 'body' =>'Código de verificación app_compras'.$CODIGO ] );

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

                        if ( $TIPO_USUARIO == 'U' ) {
                            return redirect( route( 'Usuarios.index' ) )->with( 'succes', 'Usuario creado' );
                        }
                        if ( $TIPO_USUARIO == 'A' ) {
                            return redirect( route( 'Usuarios.indexA' ) )->with( 'succes', 'Administrador creado' );
                        }
                        if ( $TIPO_USUARIO == 'P' ) {
                            return redirect( route( 'Usuarios.indexP' ) )->with( 'succes', 'Proveedor creado' );
                        }
                    } else {
                        //CELULAR EXISTE
                        return redirect( route( 'Usuarios.vista' ) )->with( 'Info', 'El número celular ya se encuentra registrado' );
                    }
                } else {
                    //CORREO EXISTE
                    return redirect( route( 'Usuarios.vista' ) )->with( 'Info', 'El correo ya se encuentra registrado' );
                }
            } else {
                //CORREO NO VALIDO
                return redirect( route( 'Usuarios.vista' ) )->with( 'Info', 'El correo no es válido' );
            }
        }

    }
