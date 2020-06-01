@extends('layout')
@section('contenido')

<section class="content-header">
    <h1>
      @foreach ($det_pedido as $pedido) 
      Detalles de pedidos finalizados Nro. {{$pedido->NROPEDIDO}} 
      @endforeach
      
      <small>Lista de Detalles pedidos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="">Tabla</a></li>
      <li class="active">Datos</li>
      @if (session('succes'))
  <div id="midiv" class="creado" role="alert">
      {{session('succes')}}
  </div>
@endif
@if (session('informacion'))
<div id="midiv" class="informacion" role="alert">
  {{session('informacion')}}
</div>
@endif
@if (session('eliminar'))
  <div id="midiv" class="eliminado" role="alert">
     {{session('eliminar')}}
  </div>
@endif
    </ol>
</section>
<section class="content">
    <div class="box">
        

        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            @php
                $totalE=0;
            @endphp
            <thead>
            <tr>
              <th>EMPRESA</th>
              <th>PRODUCTO</th>
              <th>CANTIDAD</th>
              <th>COSTO UNITARIO</th>
              <th>TOTAL</th>
                  
            </tr>
            </thead>
            <tbody>
            @foreach ($det_pedido as $pedido)         
              <tr>
                <td>{{$pedido->EMPRESA}}</td>
                <td>{{ $pedido->NOMBRE_PRODUCTO}}</td> 
                <td>{{ $pedido->CANTIDAD}}</td>
                <td>{{ $pedido->COSTO_UNITARIO}}</td>
                <td>{{ $pedido->TOTAL}}</td>  
                </tr> 
              @php
                 $totalE+=$pedido->TOTAL; 
              @endphp
                @endforeach  
                <tfoot>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><b>Total</b></td>
                <td>{{$totalE}}</td>
                </tfoot>

                      
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection