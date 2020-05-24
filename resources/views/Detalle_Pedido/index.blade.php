@extends('layout')
@section('contenido')

<section class="content-header">
    <h1>
      Pedidos Regitras
      <small>Lista de Detalles pedidos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="">Tabla</a></li>
      <li class="active">Datos</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        

        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
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
              
              @endforeach    
                      
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection