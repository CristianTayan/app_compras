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
      
      <a style="color:black;" href="{{ URL::current() }}"> 
        Pedidos finalizados
        </a>
      <small>Lista de Pedidos finalizados</small>
    </h1>
    
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="">Tabla</a></li>
      <li class="active">Datos</li>
    </ol>
</section>
<section class="content">
  
    <div class="box">
      <form action="{{ Route( 'RangoPedidosFin' )}}">
        inicio
        <input name="INICIO" type="date">
        fin
        <input name="FIN" type="date">
        <input type="submit">
        
      </form>
      
        

        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Usuario</th>
              <th>Dirección</th>
              <th>SUBTOTAL</th>
              <th>COSTO ENVIO</th>
              <th>TOTAL</th>
              <th>FECHA CREACION</th>
              <th>FECHA RECEPCION</th>
              <th>FECHA ENTREGA</th>
              <th>FECHA ENTREGA</th>

              
            </tr>
            </thead>
            <tbody>
            @foreach ($pedidos as $pedido)         
              <tr>
           
                @foreach($usuarios as $usuario)
                @if($pedido->IDUSUARIO == $usuario->IDUSUARIO)
              <td>{{$usuario->NOMBRE}}</td>
              @endif
              @endforeach  
              @foreach ($direcciones as $direccion)
              @if($pedido->IDDIRECCION == $direccion->IDDIRECCION)
                  <td>{{$direccion->DIRECCION}} </td>  
              @endif    
              @endforeach
           
                  <td>{{$pedido->SUBTOTAL}}</td>
              <td>{{ $pedido->COSTO_ENVIO }}</td>
              
              <td>{{$pedido->TOTAL}}</td>
              <td> {{$pedido->FECHA_CREACION}}</td>   
              <td> {{$pedido->FECHA_RECEPCION}}</td>
              <td> {{$pedido->FECHA_ENTREGA}}</td>
              <td>
                <a href="{{Route('detalleP',$pedido->IDPEDIDO)}}"> 
                  <span title="Ver detalles" class="btn btn-primary btn-xs">Detalles</span></a>
              
              </td>
                </tr> 
              
              @endforeach    
              </tbody>
          </table>
          <button type ='button' class="btn btn-default " 
                onclick="location.href = '{{Route('indexPrincipal')}}'">
                <span class="glyphicon glyphicon-chevron-left"></span> Atrás </button>
        </div>
      </div>
</section>
@endsection