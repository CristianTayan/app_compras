<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatProductosController extends Controller
{
    public function index(){
        $empresas = DB::table('empresa')->get();
        return view('CatProductos.index', compact('empresas'));
    }
    public function productos($ID){
        $productos = DB::table('productos')->where('IDEMPRESA',$ID)->get();
        return view ('CatProductos.index', compact('productos'));

    }
}
