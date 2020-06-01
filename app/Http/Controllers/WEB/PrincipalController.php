<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PrincipalController extends Controller
{
    public function totalUsuario(){
        $usuarios=DB::table('usuarios')->get();
        $total=count($usuarios);
        return view( 'index', compact( 'total' ) );
    }
}
