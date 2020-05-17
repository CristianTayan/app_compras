<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $mensaje = [];
        $CORREO = $request->correo;
        $CONTRASENA = base64_encode($request->contrasena);

        $usuario_existe = DB::table('usuarios')
            ->where('CORREO', $CORREO)
            ->where('CONTRASENA', $CONTRASENA)
            ->get();
        if (count($usuario_existe) != 0) {
            foreach ($usuario_existe as $Userid) {
                $id = $Userid->IDUSUARIO;
                $nombreu = $Userid->NOMBRE;
                $tipo_u = $Userid->TIPO_USUARIO;
                $correo = $Userid->CORREO;
                $celular = $Userid->CELULAR;
                if ($tipo_u == 'P') {
                    $datos = DB::table('empresa')
                        ->where('IDUSUARIO', $id)->get();
                    foreach ($datos as $dato) {
                        $nombreEmpresa = $dato->NOMBRE;
                        $coordenadax = $dato->COORDENADAX;
                        $coordenaday = $dato->COORDENADAY;
                        $idEmpresa = $dato->IDEMPRESA;
                        $fotoEmpresa = $dato->FOTO;
                    }
                    $mensaje[] = array(
                        'nombre' => $nombreu, 'idusuario' => $id, 'correo' => $correo, 'nombre_empresa' => $nombreEmpresa,
                        'idempresa' => $idEmpresa, 'coordenadax' => $coordenadax, 'coordenaday' => $coordenaday, 'foto' => $fotoEmpresa
                    );
                    return response()->json($mensaje, 200);
                }
                if ($tipo_u == 'A') {
                    $mensaje = ['message' => 'Bienvenido:' . $nombreu, 'ID Usuario: ' . $id, 'Correo: ' . $correo,];
                    return response()->json($mensaje, 200);
                }
                if ($tipo_u == 'U') {
                    $mensaje[] = array('nombre' => $nombreu, 'idusuario' => $id, 'correo' => $correo, 'celular' => $celular);
                    return response()->json($mensaje, 200);
                }
            }
            $mensaje = ['message' => 'Bienvenido' . $nombre];
            return response()->json($mensaje, 200);
        } else {
            $mensaje = ['message' => 'El usuario o la contraseña son incorrectos'];
            return response()->json($mensaje, 400);
        }
    }
}
