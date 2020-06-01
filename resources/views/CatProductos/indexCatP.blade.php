@extends('layout')
@section('contenido')
   
  
<section class="content-header">
  <h1>
    Categoria de productos
    @foreach($empresas as $empresa)
            @php
              $idempresa=$empresa->IDEMPRESA;
              $nombreEmpresa = $empresa->NOMBRE;  
            @endphp
            @endforeach
  de empresa : {{$nombreEmpresa}}
  </h1>
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
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="">Tabla</a></li>
    <li class="active">Datos</li>
  </ol>
</section>
<section class="content">
  <div class="box">
      <div class="box-header">
        <h3 class="box-title">Lista Categorias por empresa</h3>
       
        <button class="btn btn-primary btn-sm pull-right" 
        value = 'Agregar categoría' onclick="location.href = '{{Route('CategoriaP.vistaCrear',$idempresa)}}'">
        Agregar categoria
        <span class="glyphicon glyphicon-plus"></span></button>
      </div>
        
     
    <!-- /.box-header -->

      
 
    <div class="box-body">
     

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          
        <tr>
          
          
          <th>Nombre categoría</th>
          <th>Detalle</th>
          <th>Opciones</th> 
        </tr>
        </thead>
        
        
        <tbody>
            @foreach($categorias as $categoria)
           
          <tr>
 <td>{{ $categoria->NOMBRE }}</td>
              <td>{{ $categoria->DETALLE }}</td>
              
          <td>
            <a href="{{ Route( 'CategoriaProduto.VistaEmpresaProd',$categoria->IDCATEGORIA)}}"> 
              <span name="ID" class="btn btn-primary btn-xs	glyphicon glyphicon-edit"></span></a>
          <a onclick="return confirm('Desea eliminar')" href = "{{Route('CategoriaProducto.eliminarIndex',$categoria->IDCATEGORIA)}}"> 
              <span   class = "btn btn-danger btn-xs glyphicon glyphicon-trash" 
              ></span> </a>  </td>
           
  @endforeach   
            </tr> 
             
        </tbody>
      </table>
      <button type ='button' class="btn btn-default " 
                onclick="location.href = '{{Route('Empresas.indexE')}}'">
                <span class="glyphicon glyphicon-chevron-left"></span> Atrás </button>
    </div>
</div>
</div>
    <!-- /.box-body -->
  </div>
</section>
@endsection