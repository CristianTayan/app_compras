@extends('layout')
@section('contenido')

<section class="content-header">
  @if(count($empresas)>=0 && count($empresas)!=1) 
  <h1><a style="color:black;" href="{{ URL::current() }}"> 
    Pedidos en proceso</a></h1>
    <h1>
  @endif
  
      @if(count($empresas)==1)        
      @foreach ($empresas as $empresa)
      <h1><a style="color:black;" href="{{ URL::current() }}"> 
        Pedidos en proceso : {{$empresa->NOMBRE}} </a>
            </h1>      
       @endforeach 
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
            @php
            $subtotalE=0;
            $costoE=0;
            $totalE=0;
          @endphp
            <thead>
            <tr>
              <th>Usuario</th>
              <th>Dirección</th>
              <th>Subtotal</th>
              <th>Costo envio</th>
              <th>Total</th>
              <th>Fecha creación</th>
              <th>Fecha recepción</th>
              
            </tr>
            </thead>
            <tbody>
            @foreach ($pedidos as $pedido)         
              <tr>
                @foreach ($usuarios as $usuario)
                @if($pedido->IDUSUARIO == $usuario->IDUSUARIO)
              <td>{{ $usuario->NOMBRE}}</td>
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
              <td>
                <a href="{{Route('detalleP',$pedido->IDPEDIDO)}}"> 
                  <span title="Ver detalles" class="btn btn-primary btn-xs">Detalles</span></a>
              
              </td>
                </tr> 
                @php
                $subtotalE+=$pedido->SUBTOTAL;
                $costoE+=$pedido->COSTO_ENVIO;
                $totalE+=$pedido->TOTAL;
              @endphp
            @endforeach  
          </tbody>  
          <tfoot>
            <tr>
            <td></td>
              
              <td><b>Totales</b></td>
              <td>{{$subtotalE}}</td>
            <td>{{$costoE}}</td>
            <td>{{$totalE}}</td>
              </tr> 
          </tfoot>
          </table>
          <button type ='button' class="btn btn-default " 
                onclick="location.href = '{{Route('indexPrincipal')}}'">
                <span class="glyphicon glyphicon-chevron-left"></span> Atrás </button>
        </div>
        
      </div>
</section>
@endsection