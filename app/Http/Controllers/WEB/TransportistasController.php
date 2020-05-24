<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransportistasController extends Controller {
  
    public function index() {
        $transportistas = DB::table( 'transportistas' )->get();
        return view( 'transportistas.index', compact( 'transportistas' ) );
    }
    
    public function vistaCrear(){
        return view('transportistas.create');
    }
    
    public function registrarTransportista( Request $request ) {
        
       
        $CEDULA = $request->CEDULA;
        $NOMBRE = $request->NOMBRE;
        $PLACA = $request->PLACA;
        if($request->hasFile('FOTO')){
            $archivo=$request->file('FOTO');
        $FOTO=$archivo->getClientOriginalName();
        $archivo->move(public_path().'/images/transportistas/',$FOTO);
        $FOTO='images/transportistas/'.$FOTO;}

        DB::table( 'transportistas' )->insert(
            [
                'CEDULA' => $CEDULA,
                'NOMBRES' => $NOMBRE,
                'FOTO' => $FOTO,
                'PLACA' => $PLACA
            ]
        );
        $mensaje = ['message' => 'Se registro exitosamente'];
        return redirect( route( 'Transportistas.listar' ) ) ->with( 'succes', 'Transportista creado' );
    }
    public function eliminarTransportista( $ID ) {

        DB::table( 'transportistas' )->where( 'IDTRANSPORTISTA', $ID ) ->delete();
        $mensaje = ['message' => 'Se elimino correctamente'];
        return redirect( route( 'Transportistas.listar' ) ) ->with( 'eliminado', 'Eliminado' );

    }
    public function vistaEditar($id){
        $transportistas = DB::table('transportistas')->where('IDTRANSPORTISTA',$id)->get();
        return view( 'transportistas.edit', compact( 'transportistas' ) );
    }
    
    public function actualizarTransportista( Request $request ) {
        
        $IDTRANSPORTISTA = $request->IDTRANSPORTISTA;
        $CEDULA = $request->CEDULA;
        $NOMBRE = $request->NOMBRE;
        $PLACA = $request->PLACA;
        if($request->hasFile('FOTO')){
            $archivo=$request->file('FOTO');
        $FOTO=$archivo->getClientOriginalName();
        $archivo->move(public_path().'/images/transportistas/',$FOTO);
        $FOTO='images/transportistas/'.$FOTO;} else{
            $FOTO = $request->FOTOE;
        }
        

        DB::table( 'transportistas' )->where( 'IDTRANSPORTISTA', $IDTRANSPORTISTA )
            ->update(
            [
                'CEDULA' => $CEDULA,
                'NOMBRES' => $NOMBRE,
                'FOTO' => $FOTO,
                'PLACA' => $PLACA
            ]
        );
        $mensaje = ['message' => 'Se registro exitosamente'];
        return redirect( route( 'Transportistas.listar' ) ) ->with( 'informacion', 'Actualizado' );
    }
}