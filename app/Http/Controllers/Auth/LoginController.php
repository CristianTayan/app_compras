<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class LoginController extends Controller
{
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
                    Session::put('status', $nombreu);
            return redirect(route('Login.vista')); 
            
            
                    }else { 
                        session::put('Denegado', 'Credenciales incorrectas');
                        return redirect(route('Login.vistaAuntentificacion'))->with('Denegado','Credenciales incorrectas');
                    }  
                       
            } else { 
                return redirect(route('Login.vistaAuntentificacion'))->with('Denegado','Credenciales incorrectas');
            } 
         
    }
    public function Cerrar_Logout()
    {
        
        Session::forget('status');

     
        return redirect(route('inicio'));

    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
}
