@extends('layout')
@section('contenido')
@if (session('succes'))
            <div class="alert alert-success">
              {{session('succes')}}
            </div>
            @endif
<section class="content-header">
    <h1>
      Empresas
      <small>Lista de logos de empresas</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="">Tabla</a></li>
      <li class="active">Datos</li>
    </ol>
</section>
<section class="content">
    <div class="box">
          
  
        <div class="box-header">
          <h3 class="box-title">Datos</h3>
          
        </div>
      
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Empresa</th>
              <th>Producto</th>
              
              <th>Imagen</th>
              <th>Verificar</th>

              
            </tr>
            </thead>
            <tbody>
            @foreach ($productos  as $producto)
            <tr>
              @foreach($empresas as $empresa)
              @if($producto->IDEMPRESA == $empresa->IDEMPRESA)
              <td>{{$empresa->NOMBRE}}</td>
              @endif
              @endforeach
              <td>{{ $producto->NOMBRE}}</td>

            

            <td><img src="{{asset($producto->FOTO)}}" style="width: 120px; height: 100px; object-fit: cover"></td>
            
            <td><a href="{{route('Imagenes.verificarProducto', $producto->IDPRODUCTO)}}">
              <span class="btn btn-primary btn-xs	glyphicon glyphicon-ok"></span></a>
            </td>
              </tr> 
            @endforeach           
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection
