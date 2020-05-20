@extends('layout')
@section('contenido')
@if(session('succes'))
<div class="alert alert-success" >
{{session('succes')}}
</div>
@endif
<section class="content-header">
  <h1>
    Categorías registradas
    <small>Lista de categorías</small>
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
        <button class="btn btn-primary btn-sm pull-right" 
         value = 'Agregar categoría' onclick="location.href = '{{ route ('Cat_Empresas.vistaCrear') }}'">
         Agregar categoría
         <span class="glyphicon glyphicon-plus"></span></button>
      </div>
        <div class="box-body">
         

          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Detalle</th>
              <th>Foto</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categorias as $categoria)
            <tr>
            <td>{{ $categoria->IDCATEGORIA}}</td>
                <td>{{$categoria->NOMBRE}}
                </td>
            <td>{{$categoria->DETALLE}}</td>
            <td><img src="{{asset($categoria->FOTO)}}" style="width: 150px; height: 100px; object-fit: cover">
                        </td>
            <td><a href=" {{route('editarCat',$categoria->IDCATEGORIA)}}"> 
            <span title="Actualizar registro" class="btn btn-primary btn-xs	glyphicon glyphicon-edit"></span></a>
            <a  href = " {{route('eliminarCat',$categoria->IDCATEGORIA)}}"> 
            <span title="Eliminar registro"  class = "btn btn-danger btn-xs glyphicon glyphicon-trash"></span> </a>
                       </td>    
          </tr> 


            @endforeach         
            </tbody>  
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection