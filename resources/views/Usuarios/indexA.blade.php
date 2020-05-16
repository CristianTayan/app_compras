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
      Usuarios
      <small>Lista usuarios</small>
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
           value = 'Agregar Usuario' onclick="location.href = '{{ route('Usuarios.vista') }}'"/>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Celular</th>
              <th>Tipo_Usuario</th>
              <th>Estado</th>
              <th>Verificación</th>
              <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($usuarios  as $usuario)
            <tr>
            <td>{{ $usuario->NOMBRE}}</td>
            <td>{{$usuario->CORREO}}</td>
            <td>{{$usuario->CELULAR}}</td>
            <td>{{ $usuario->TIPO_USUARIO }}</td>
            <td>{{ $usuario->ESTADO }}</td>
            <td>{{ $usuario->VERIFICACION }}</td>
            <td><a href=""> 
              <span class="btn btn-primary btn-xs	glyphicon glyphicon-edit"></span></a>
              <a href = "{{route('Usuarios.eliminar', $usuario->IDUSUARIO)}}"> 
                <span class = "btn btn-danger btn-xs glyphicon glyphicon-trash" ></span> </a></td>
              </tr> 
            @endforeach           
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection