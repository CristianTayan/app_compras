<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PhpParser\Node\Expr\FuncCall;

class ProductosController extends Controller {
    public function registrar_productos( Request $request ) {
        $IDCATEGORIA = $request->IDCATEGORIA;
        $NOMBRE = $request->NOMBRE;
        $DESCRIPCION = $request->DESCRIPCION;
        $COSTO = $request->COSTO;
        $FOTO = $request->FOTO;
        $SESION = $request->SESION;
        $ESTADO = $request->ESTADO;
        $DETALLE = 'N';
        $CREATED_AT = Carbon::now();

        DB::table( 'productos' )->insert(
            [
                'IDCATEGORIA' => $IDCATEGORIA,
                'NOMBRE' => $NOMBRE,
                'DESCRIPCION' => $DESCRIPCION,
                'COSTO' => $COSTO,
                'FOTO' => $FOTO,
                'SESION' => $SESION,
                'ESTADO' => $ESTADO,
                'DETALLE' => $DETALLE,
                'CREATED_AT' => $CREATED_AT
            ]
        );
        $mensaje = ['message' => 'Producto ingresado '];
        return response()->json( $mensaje, 200 );
    }

    public Function actualizar_productos( Request $request ) {
        $IDPRODUCTO = $request->IDPRODUCTO;
        $IDCATEGORIA = $request->IDCATEGORIA;
        $NOMBRE = $request->NOMBRE;
        $DESCRIPCION = $request->DESCRIPCION;
        $COSTO = $request->COSTO;
        $FOTO = $request->FOTO;
        $SESION = $request->SESION;
        $ESTADO = $request->ESTADO;
        $CREATED_AT = Carbon::now();
        DB::table( 'productos' )
        ->where( 'IDPRODUCTO', $IDPRODUCTO )
        ->update(
            [
                'IDCATEGORIA' => $IDCATEGORIA,
                'NOMBRE' => $NOMBRE,
                'DESCRIPCION' => $DESCRIPCION,
                'COSTO' => $COSTO,
                'FOTO' => $FOTO,
                'SESION' => $SESION,
                'ESTADO' => $ESTADO,
                'CREATED_AT' => $CREATED_AT ]
            );
            $mensaje = ['message' => 'Producto actualizado'];
            return response()->json( $mensaje, 200 );
        }

        public function get_productos() {
            $producto = DB::table( 'productos' )->orderBy( 'NOMBRE' )->where( 'ESTADO', 'S' )->get();
            if ( count( $producto ) != 0 ) {
                return response()->json( $producto, 200 );
            } else {
                $error = ['message' => 'No se ha encontrado productos'];
                return response()->json( $error, 400 );
            }
        }

        public function productos_clasificacion( $clasificacion ) {
            $productos = DB::table( 'productos' )->where( 'IDCATEGORIA', $clasificacion )->get();
            if ( count( $productos ) != 0 ) {
                return response()->json( $productos, 200 );
            } else {
                $error = ['message' => 'No se ha encontrado productos con ese nombre'];
                return response()->json( $error, 404 );
            }
        }

        public function cambiar_estado_producto( $idProd ) {
            $estado = DB::table( 'productos' )->where( 'IDPRODUCTO', $idProd )->where( 'ESTADO', 's' )->get();
            if ( count( $estado ) != 0 ) {
                DB::table( 'productos' )
                ->where( 'IDPRODUCTO', $idProd )
                ->update( [
                    'ESTADO' => 'N'
                ] );
                $mensaje = ['message' => 'Producto en estado INACTIVO'];
                return response()->json( $mensaje, 200 );
            } else {
                DB::table( 'productos' )
                ->where( 'IDPRODUCTO', $idProd )
                ->update( [
                    'ESTADO' => 'S'

                ] );
                $mensaje = ['message' => 'Producto en estado a ACTIVO'];
                return response()->json( $mensaje, 200 );
            }
        }

        public function cambiar_estado_detalle( $idProd ) {
            $estado = DB::table( 'productos' )->where( 'IDPRODUCTO', $idProd )->where( 'DETALLE', 'N' )->get();
            if ( count( $estado ) != 0 ) {
                DB::table( 'productos' )
                ->where( 'IDPRODUCTO', $idProd )
                ->update( [
                    'DETALLE' => 'S'
                ] );
                $mensaje = ['message' => 'Producto con detalles'];
                return response()->json( $mensaje, 200 );
            } else {
                DB::table( 'productos' )
                ->where( 'IDPRODUCTO', $idProd )
                ->update( [
                    'DETALLE' => 'N'

                ] );
                $mensaje = ['message' => 'Producto sin detalles'];
                return response()->json( $mensaje, 200 );
            }
        }

    }
