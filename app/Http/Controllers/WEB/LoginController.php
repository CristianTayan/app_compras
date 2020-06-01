<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class LoginController extends Controller

{
    public function viewIndex() {
        $usuarios=DB::table('usuarios')->get();
        $total=count($usuarios);
        $empresas=DB::table('empresa')->get();
        $totalEmpresa=count($empresas);
        $empresastop=DB::table('view_productos_top')->get();
       return view('index',compact( 'total','totalEmpresa','empresastop' ));     
    }

    public function viewIndexDenegado() {
        return view('auth/login');     
     }

    public function login( Request $request ) {
        $CORREO = $request->CORREO;
        $CONTRASENA = base64_encode( $request->CONTRASENA );

        $usuario_existe= DB::table( 'usuarios' )
        ->where( 'CORREO', $CORREO )
        ->where( 'CONTRASENA', $CONTRASENA )
        ->get();
        if ( count( $usuario_existe ) != 0 ) {
            foreach ($usuario_existe as $Userid) {
               
                $nombreu=$Userid->NOMBRE;
                $tipo_u=$Userid->TIPO_USUARIO; 
                }
                if($tipo_u=='A'){
            return redirect(route('Login.vista'))->with('status', $nombreu);  
                    }else { 
                        return redirect(route('Login.vistaAuntentificacion'))->with('Denegado','Credenciales incorrectas');
                    }  
                       
            } else { 
                return redirect(route('Login.vistaAuntentificacion'))->with('Denegado','Credenciales incorrectas');
            } 
         
    }
}
