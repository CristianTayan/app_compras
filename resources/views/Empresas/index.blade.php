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
      Empresas registradas
      <small>Lista de empresas</small>
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
          <input type ='button' class="btn btn-primary btn-sm pull-right" 
           value = 'Agregar empresa' onclick="location.href = '{{ route('Empresas.vistaCrear') }}'"/>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Categoría</th>
              <th>Dirección</th>
              <th>Opciones</th>

              
            </tr>
            </thead>
            <tbody>
              @foreach ($empresas as $empresa)
              <tr>
              <td>{{ $empresa->IDEMPRESA}}</td>
                  <td>{{$empresa->NOMBRE}} </td>  
                  <td>{{$empresa->CATEGORIA}}</td>
              <td>{{ $empresa->DIRECCION }}</td>
              
              <td>
              <a href="{{route('Empresas.vistaEditar',$empresa->IDEMPRESA)}}"> 
                  <span name="ID" class="btn btn-primary btn-xs	glyphicon glyphicon-edit"></span></a>
                  <a  href = "{{route('Empresas.eliminar',$empresa->IDEMPRESA)}}"> 
                  <span   class = "btn btn-danger btn-xs glyphicon glyphicon-trash" 
                  onclick="return confirm('Borrar.{{$empresa->NOMBRE}}');"></span> </a>
                             
                </td>
      
                </tr> 
              @endforeach       
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection