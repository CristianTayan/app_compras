@extends('layout')
@section('contenido')
@if (session('succes'))
            <div class="alert alert-success">
              {{session('succes')}}
            </div>
            @endif
  @if (session('eliminar'))
  <div class="alert alert-danger" role="alert">
  {{session('eliminar')}}
    </div>
  @endif
  

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
              <th>NUMERO DE PEDIDO</th>
              <th>PRODUCTO</th>
              <th>CANTIDAD</th>
                           
            </tr>
            </thead>
            <tbody>
            @foreach ($det_pedido as $pedido)         
              <tr>
                @foreach ($productos as $producto)
                @if($pedido->ID_PRODUCTO == $producto->IDPRODUCTO)
              <td>{{ $producto->NOMBRE}}</td>
              <td>{{$pedido->CANTIDAD}}</td>
            
              @endif
              @endforeach
              <td>{{$pedido->CANTIDAD}}</td>
            
                </tr> 
              
              @endforeach    
                      
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection