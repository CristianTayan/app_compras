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
        Pedidos anulados
        </a>
      <small>Lista de Pedidos anulados</small>
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
              <th>USUARIO</th>
              <th>DIRECCION</th>
              <th>SUBTOTAL</th>
              <th>COSTO ENVIO</th>
              <th>TOTAL</th>
              <th>FECHA CREACION</th>

              
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
              </tr> 
              
              @endforeach    
            </tbody>            
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection