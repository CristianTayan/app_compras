
@extends('layout')
@section('contenido')


<section class="content-header">
    <h1>
    
      <a style="color:black;" href="{{ URL::current() }}"> 
        Administradores
        </a>
      <small>Lista de administradores</small>
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
        @php
             $cont=0;
             @endphp
          @php
        $tipo='A';
        @endphp
          <button class="btn btn-primary btn-sm pull-right" 
            onclick="location.href = '{{ route('Usuarios.vista', $tipo) }}'">Agregar Administrador
           <span class="glyphicon glyphicon-plus"></span></button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th style="text-align: center;">Nombre</th>
              <th style="text-align: center;">Correo</th>
              <th style="text-align: center;">Celular</th>
              <th style="text-align: center;">Dirección</th>
              <th style="text-align: center;">Estado</th>
              <th style="text-align: center;">Opciones</th>
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
              <a href="{{route('Direcciones.vistaActualizarDireccion',$direccion->IDDIRECCION)}}"> 
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
            <td><a href="{{route('Direcciones.vistaCrearDireccion',$usuario->IDUSUARIO)}}"> 
             Agregar</a> </td>
            @endif
            <td style="text-align: center;">
              @if($usuario->ESTADO == "S")
              <a onclick="return confirm('Cambiar estado a INACTIVO a : {{$usuario->NOMBRE}}');"
                 href = "{{route('Usuario.cambiarEstadoUusuario',$usuario->IDUSUARIO)}}"> 
                Activo
                <span  title="Cambiar estado a INACTIVO"  class = "fa fa-check" 
              ></span> </a>
              
              @else
              <a  onclick="return confirm('Cambiar estado  ACTIVO a : {{$usuario->NOMBRE}}');" style="color:rgb(248, 151, 131 );" title="Cambiar estado a ACTIVO" href = "{{route('Usuario.cambiarEstadoUusuario',$usuario->IDUSUARIO)}}">
               Inactivo
                <span title="Cambiar estado a ACTIVO"  class = "fa fa-remove" 
                ></span> </a>
             @endif 
            
            </td>
            
            <td style="width:70px; text-align: center;"><a href="{{route('Usuarios.buscar', $usuario->IDUSUARIO)}}"> 
              <span title="Actualizar registro" class="btn btn-primary btn-xs	glyphicon glyphicon-edit"></span></a>
              <a onclick="return confirm('Desea eliminar')"  href = "{{route('Usuarios.eliminar', $usuario->IDUSUARIO)}}"> 
                <span title="Eliminar registro" class = "btn btn-danger btn-xs glyphicon glyphicon-trash" ></span> </a></td>
              </tr> 
            @endforeach           
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection