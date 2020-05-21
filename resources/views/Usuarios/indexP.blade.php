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
          <button class="btn btn-primary btn-sm pull-right" 
          onclick="location.href = '{{ route('Usuarios.vista') }}'">Agregar Usuario
         <span class="glyphicon glyphicon-plus"></span></button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Celular</th>
              <th>Dirección</th>
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
            @foreach($direcciones as $direccion)
            @php
             $cont=0;
             @endphp
             @if ($usuario->IDUSUARIO == $direccion->IDUSUARIO)
             <td>{{$direccion->DIRECCION}} &nbsp; &nbsp;
              <a href="#"> 
                <span title="Actualizar dirección"><i class="fa fa-edit fa-lg"></i> </span>
                </a>
            </td>
             @php
             $cont=1;
             @endphp
             @break
              @endif
            @endforeach

            @if( $cont==0)
            <td><a title="Agregar una dirección al usuario" href="{{route('Direcciones.vistaCrearDireccion',$usuario->IDUSUARIO)}}"> 
             Agregar</a>
            @endif
            <td>{{ $usuario->ESTADO }}</td>
            <td>{{ $usuario->VERIFICACION }}</td>
            <td><a  href="{{route('Usuarios.buscar', $usuario->IDUSUARIO)}}"> 
                <span title="Actualizar registro" class="btn btn-primary btn-xs	glyphicon glyphicon-edit" title="Actualizar registro"></span></a>
                <a  href = "{{route('Usuarios.eliminar', $usuario->IDUSUARIO)}}"> 
                    <span title="Eliminar registro" class = "btn btn-danger btn-xs glyphicon glyphicon-trash" title="Eliminar registro"></span> </a></td>
              </tr> 
            @endforeach           
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection