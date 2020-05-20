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
      Productos registrados
      <small>Lista de productos</small>
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
          @foreach ($productos as $producto)
          @php
             $id=$producto->IDEMPRESA  
          @endphp
         
          @endforeach
          <button class="btn btn-primary btn-sm pull-right" 
         value = 'Agregar categoría' onclick="location.href = '{{Route('productos.Crear',$id)}}'">
         <span class="glyphicon glyphicon-plus"></span>Agregar producto</button>
         
         
         
         
           
        </div>
       
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Categoria</th>
              <th>Nombre</th>
              <th>Decripcion</th>
              <th>Costo</th>
              <th>Foto</th>
              <th>Estado</th>
              <th>Acciones</th>
              
             
                            
            </tr>
            </thead>
           
            <tbody>
                @foreach ($productos as $producto)
              <tr>
                  @foreach($categorias as $categoria)
                  @if($categoria->IDCATEGORIA == $producto->IDCATEGORIA)
              <td>{{ $categoria->NOMBRE}}</td>
              @endif
              @endforeach
                  <td>{{$producto->NOMBRE}} </td>
                   <td>{{$producto->DESCRIPCION}}</td>
                   <td>{{$producto->COSTO}}</td>
                  <td><img src="{{asset($producto->FOTO)}}" style="width: 150px; height: 100px; object-fit: cover">
                @if($producto->VERIFICAR_IMG == 'S')
                    <a href="{{route('productos.imagen',$producto->IDPRODUCTO)}}"> 
                         <span title="Imagen verificada" class="fa fa-check fa-lg"></span></a>
                         @else
                         <a style="color:rgb(248, 151, 131 );" href="{{route('productos.imagen',$producto->IDPRODUCTO)}}"> 
                            <span title="Verificar imagen" class="fa fa-remove fa-lg"></span></a>
                            @endif

                </td>
            
                  <td>
                    @if($producto->ESTADO == "S")
                    <a  title="Cambiar estado a INACTIVO" href = "{{route('productos.estado',$producto->IDPRODUCTO)}}"> Estado activo
                      <span  title="Cambiar estado a INACTIVO"  class = "fa fa-check" 
                    ></span> </a>
                    
                    @else
                    <a style="color:rgb(248, 151, 131 );" title="Cambiar estado a ACTIVO" href = "{{route('productos.estado',$producto->IDPRODUCTO)}}">Estado inactivo
                    <span title="Cambiar estado a ACTIVO"  class = "fa fa-remove" 
                    ></span></a>
                   @endif 
                  </td>
                  <td>    
              
              <a href=""> 
                  @if($producto->ESTADO == 'S')
                  <a  href = "">
                  <span title="Actualizar producto" class="btn btn-primary btn-xs	glyphicon glyphicon-edit"></span></a>
                  <a  href = "{{Route('productos.Eliminar', $producto->IDPRODUCTO)}}"> 
                  <span  title="Eliminar producto" class = "btn btn-danger btn-xs glyphicon glyphicon-trash"></span> </a>  </td>
              @else
              <a  href = "{{Route('productos.Eliminar', $producto->IDPRODUCTO)}}">
              <span title="Eliminar producto"  class = "btn btn-danger btn-xs glyphicon glyphicon-trash"></span> </a>  </td>
                  @endif
                          
              </tr> 
              @endforeach       
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection