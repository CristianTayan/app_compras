<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class EmpresasController extends Controller {
    public function index() {
        $empresas = DB::table( 'empresa' )->get();
        $categorias = DB::table('cat_empresas')->get();
        $horarios = DB::table('horarios')->get();
        return view( 'Empresas.index', compact( 'empresas','categorias','horarios') );
    }
    public function cambiar_estado_Empresa($IDEMPRESA){
        $estado = DB::table( 'empresa' )->where( 'IDEMPRESA', $IDEMPRESA )->where( 'ESTADO', 's' )->get();
        if ( count( $estado ) != 0 ) {
            DB::table( 'empresa' )
            ->where( 'IDEMPRESA', $IDEMPRESA )
            ->update( [
                'ESTADO' => 'N'
            ] );
            return redirect( route( 'Empresas.index' ) );
        } else {
            DB::table( 'empresa' )
            ->where( 'IDEMPRESA', $IDEMPRESA )
            ->update( [
                'estado' => 'S'

            ] );
            return redirect( route( 'Empresas.index' ) );
        } 
    }
    public function vistaCrear() {
        $categorias = DB::table( 'cat_empresas' )->get();
        $proveedores = DB::table( 'usuarios' )
        ->where( 'TIPO_USUARIO', 'P' )
        ->get();
        return view( 'Empresas.create', compact( 'categorias', 'proveedores' ) );

    }
    public function registrar( Request $request ) {
        $IDCATEGORIA = $request->IDCATEGORIA;
        $IDUSUARIO = $request->IDUSUARIO;
        $NOMBRE = $request->NOMBRE;
        $COORDENADAX = $request->COORDENADAX;
        $COORDENADAY = $request->COORDENADAY;
        $CALLE_PRINCIPAL = $request->CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request->CALLE_SECUNDARIA;
        Session::put('EmpresaCategoria',$IDCATEGORIA);
        Session::put('EmpresaUsuario',$IDUSUARIO);
        Session::put('EmpresaNombre',$NOMBRE);
        Session::put('Empresax',$COORDENADAX);
        Session::put('Empresay',$COORDENADAY);
        Session::put('EmpresaPrincipal',$CALLE_PRINCIPAL);
        Session::put('EmpresaSecundaria',$CALLE_SECUNDARIA);

        $DIRECCION = $CALLE_PRINCIPAL .' y '. $CALLE_SECUNDARIA;
        if($request->hasFile('FOTO')){
            $archivo=$request->file('FOTO');
        $FOTO=$archivo->getClientOriginalName();
        $archivo->move(public_path().'/images/empresa/',$FOTO);
        $FOTO='images/empresa/'.$FOTO;}
        else{
            $FOTO = $request->FOTO;
        }

        $nombre_existe = DB::table( 'empresa' )->where( 'NOMBRE', $NOMBRE )->get();
        if ( count( $nombre_existe ) == 0 ) {

            DB::table( 'empresa' )->insert(
                [
                    'IDCATEGORIA' => $IDCATEGORIA,
                    'IDUSUARIO' => $IDUSUARIO,
                    'NOMBRE' => $NOMBRE,
                    'COORDENADAX' => $COORDENADAX,
                    'COORDENADAY' => $COORDENADAY,
                    'DIRECCION' => $DIRECCION,
                    'CALLE_PRINCIPAL' => $CALLE_PRINCIPAL,
                    'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                    'FOTO' => $FOTO

                ]
            );
            Session::forget('EmpresaCategoria');
        Session::forget('EmpresaUsuario');
        Session::forget('EmpresaNombre');
        Session::forget('Empresax');
        Session::forget('Empresay');
        Session::forget('EmpresaPrincipal');
        Session::forget('EmpresaSecundaria');
           
            return redirect( route( 'Empresas.index' ) ) ->with( 'succes', 'Empresa creada' );
        } else
       
        return redirect( route( 'Empresas.vistaCrear' ) ) ->with( 'informacion', 'Nombre de empresa registrado' );
    }

    public function eliminarEmpresas( $ID ) {

        DB::table( 'empresa' )->where( 'IDEMPRESA', $ID ) ->delete();
        $mensaje = ['message' => 'Se elimino correctamente'];
        return redirect( route( 'Empresas.index' ) ) ->with( 'eliminado', 'Eliminado' );

    }

    public function editarEmpresa( Request $request ) {

        $IDEMPRESA = $request ->IDEMPRESA;
        $IDUSUARIO = $request ->IDUSUARIO;
        $IDCATEGORIA = $request->IDCATEGORIA;
        $NOMBRE = $request->NOMBRE;
        $COORDENADAX = $request->COORDENADAX;
        $COORDENADAY = $request->COORDENADAY;
        $CALLE_PRINCIPAL = $request->CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request->CALLE_SECUNDARIA;
        $DIRECCION = $CALLE_PRINCIPAL .' y '. $CALLE_SECUNDARIA;
        if($request->hasFile('FOTO')){
            $archivo=$request->file('FOTO');
        $FOTO=$archivo->getClientOriginalName();
        $archivo->move(public_path().'/images/empresa/',$FOTO);
        $FOTO='images/empresa/'.$FOTO;}
        else{
            $FOTO = $request->FOTOE;
        }

        $existe = DB::table( 'empresa' )
        ->where( 'IDEMPRESA', $IDEMPRESA )->get();
        foreach($existe as $exist){
            $nombre=$exist->NOMBRE;
            if($nombre==$NOMBRE){
                DB::table( 'empresa' )
                ->where( 'IDEMPRESA', $IDEMPRESA )
                ->update(
                    ['IDCATEGORIA' => $IDCATEGORIA,
                    'IDUSUARIO' => $IDUSUARIO,
                    'NOMBRE' => $NOMBRE,
                    'COORDENADAX' => $COORDENADAX,
                    'COORDENADAY' => $COORDENADAY,
                    'DIRECCION' => $DIRECCION,
                    'CALLE_PRINCIPAL' => $CALLE_PRINCIPAL,
                    'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                    'FOTO' => $FOTO]
                ); 
                return redirect( route( 'Empresas.index' ) ) ->with( 'informacion', 'Actualizado' );
            }else{

                $nombreEmpresa=DB::table( 'empresa' )
                ->where( 'NOMBRE', $NOMBRE )->get();
                if(count($nombreEmpresa)!=0){
                    return redirect( route( 'Empresas.index' ) ) ->with( 'informacion', 'Empresa ya existe' );
                } else{
                    DB::table( 'empresa' )
                    ->where( 'IDEMPRESA', $IDEMPRESA )
                    ->update(
                        ['IDCATEGORIA' => $IDCATEGORIA,
                        'IDUSUARIO' => $IDUSUARIO,
                        'NOMBRE' => $NOMBRE,
                        'COORDENADAX' => $COORDENADAX,
                        'COORDENADAY' => $COORDENADAY,
                        'DIRECCION' => $DIRECCION,
                        'CALLE_PRINCIPAL' => $CALLE_PRINCIPAL,
                        'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                        'FOTO' => $FOTO]
                    ); 
                    return redirect( route( 'Empresas.index' ) ) ->with( 'informacion', 'Actualizado' );
                }
            }
        }
        
    }

    public function vistaEditar( $ID ) {
        $emp = DB::table( 'empresa' )->where( 'IDEMPRESA', $ID ) ->get();
        $categorias = DB::table( 'cat_empresas' )->get();
        $proveedores = DB::table( 'usuarios' )
        ->where( 'TIPO_USUARIO', 'P' )->get();

        return view( 'Empresas.edit', compact( 'emp', 'categorias', 'proveedores' ) );
    }
    

    public function vistaCrearEmpresaCat($ID)
     {
        $categorias = DB::table( 'cat_empresas' )->where('IDCATEGORIA',$ID)->get();
        $proveedores = DB::table( 'usuarios' )
        ->where( 'TIPO_USUARIO', 'P' )
        ->get();
        return view( 'Cat_empresas.createCat', compact( 'categorias', 'proveedores' ) );

    }

    public function registrarEmpresas( Request $request ) {
        $IDCATEGORIA = $request->IDCATEGORIA;
        $IDUSUARIO = $request->IDUSUARIO;
        $NOMBRE = $request->NOMBRE;
        $COORDENADAX = $request->COORDENADAX;
        $COORDENADAY = $request->COORDENADAY;
        $CALLE_PRINCIPAL = $request->CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request->CALLE_SECUNDARIA;
        $DIRECCION = $CALLE_PRINCIPAL .' y '. $CALLE_SECUNDARIA;
        if($request->hasFile('FOTO')){
            $archivo=$request->file('FOTO');
        $FOTO=$archivo->getClientOriginalName();
        $archivo->move(public_path().'/images/empresa/',$FOTO);
        $FOTO='images/empresa/'.$FOTO;}
        else{
            $FOTO = $request->FOTO;
        }
        $nombre_existe = DB::table( 'empresa' )->where( 'NOMBRE', $NOMBRE )->get();
        if ( count( $nombre_existe ) == 0 ) {

            DB::table( 'empresa' )->insert(
                [
                    'IDCATEGORIA' => $IDCATEGORIA,
                    'IDUSUARIO' => $IDUSUARIO,
                    'NOMBRE' => $NOMBRE,
                    'COORDENADAX' => $COORDENADAX,
                    'COORDENADAY' => $COORDENADAY,
                    'DIRECCION' => $DIRECCION,
                    'CALLE_PRINCIPAL' => $CALLE_PRINCIPAL,
                    'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                    'FOTO' => $FOTO

                ]
            );
            return redirect( route( 'Empresas.indexCat',$IDCATEGORIA ) )->with( 'succes', 'Empresa creada' );
        } else
      
        return redirect( route( 'Empresas.indexCat',$IDCATEGORIA ) ) ->with( 'eliminado', 'No exitoso' );
    }


    public function editarEmpresaCat( Request $request ) {

        $IDEMPRESA = $request ->IDEMPRESA;
        $IDUSUARIO = $request ->IDUSUARIO;
        $IDCATEGORIA = $request->IDCATEGORIA;
        $NOMBRE = $request->NOMBRE;
        $COORDENADAX = $request->COORDENADAX;
        $COORDENADAY = $request->COORDENADAY;
        $CALLE_PRINCIPAL = $request->CALLE_PRINCIPAL;
        $CALLE_SECUNDARIA = $request->CALLE_SECUNDARIA;
        $DIRECCION = $CALLE_PRINCIPAL .' y '. $CALLE_SECUNDARIA;
        if($request->hasFile('FOTO')){
            $archivo=$request->file('FOTO');
        $FOTO=$archivo->getClientOriginalName();
        $archivo->move(public_path().'/images/empresa/',$FOTO);
        $FOTO='images/empresa/'.$FOTO;}
        else{
            $FOTO = $request->FOTOE;
        }

        $existe = DB::table( 'empresa' )
        ->where( 'IDEMPRESA', $IDEMPRESA )->get();
        foreach($existe as $exist){
            $nombre=$exist->NOMBRE;
            if($nombre==$NOMBRE){
                DB::table( 'empresa' )
                ->where( 'IDEMPRESA', $IDEMPRESA )
                ->update(
                    ['IDCATEGORIA' => $IDCATEGORIA,
                    'IDUSUARIO' => $IDUSUARIO,
                    'NOMBRE' => $NOMBRE,
                    'COORDENADAX' => $COORDENADAX,
                    'COORDENADAY' => $COORDENADAY,
                    'DIRECCION' => $DIRECCION,
                    'CALLE_PRINCIPAL' => $CALLE_PRINCIPAL,
                    'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                    'FOTO' => $FOTO]
                ); 
                
                return redirect( Route('Empresas.indexCat',$IDCATEGORIA) ) ->with( 'informacion', 'Actualizado' );
            }else{

                $nombreEmpresa=DB::table( 'empresa' )
                ->where( 'NOMBRE', $NOMBRE )->get();
                if(count($nombreEmpresa)!=0){
                    return redirect( route( 'Empresas.index' ) ) ->with( 'informacion', 'Empresa ya existe' );
                } else{
                    DB::table( 'empresa' )
                    ->where( 'IDEMPRESA', $IDEMPRESA )
                    ->update(
                        ['IDCATEGORIA' => $IDCATEGORIA,
                        'IDUSUARIO' => $IDUSUARIO,
                        'NOMBRE' => $NOMBRE,
                        'COORDENADAX' => $COORDENADAX,
                        'COORDENADAY' => $COORDENADAY,
                        'DIRECCION' => $DIRECCION,
                        'CALLE_PRINCIPAL' => $CALLE_PRINCIPAL,
                        'CALLE_SECUNDARIA' => $CALLE_SECUNDARIA,
                        'FOTO' => $FOTO]
                    ); 
                    return redirect( Route('Empresas.indexCat',$IDCATEGORIA) ) ->with( 'informacion', 'Actualizado' );
                }
            }
        }
        
    }

    public function vistaEditarCatEmpresas( $ID ) {
        $emp = DB::table( 'empresa' )->where( 'IDEMPRESA', $ID ) ->get();
        $categorias = DB::table( 'cat_empresas' )->get();
        $proveedores = DB::table( 'usuarios' )
        ->where( 'TIPO_USUARIO', 'P' )->get();

        return view( 'Empresas.editEmpresaCat', compact( 'emp', 'categorias', 'proveedores' ) );
    }
}