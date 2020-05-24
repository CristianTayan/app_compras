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
             Agregar</a>
            @endif
            <td>
              @if($usuario->ESTADO == "S")
              <a  href = "{{route('Usuario.cambiarEstadoUusuario',$usuario->IDUSUARIO)}}"> 
                Activo
                <span  title="Cambiar estado a INACTIVO"  class = "fa fa-check" 
              ></span> </a>
              
              @else
              <a   style="color:rgb(248, 151, 131 );" title="Cambiar estado a ACTIVO" href = "{{route('Usuario.cambiarEstadoUusuario',$usuario->IDUSUARIO)}}">
               Inactivo
                <span title="Cambiar estado a ACTIVO"  class = "fa fa-remove" 
                ></span> </a>
             @endif 
            
            </td>
            <td style="text-align: center;">
              @if($usuario->VERIFICACION == "S")
             
                
                <span style="color: green" title="Usuario verificado"  class = "fa fa-check-circle fa-lg fa-align-center" 
              ></span> 
              
              @else
              <a data-toggle="modal" data-target="#modal-default" href = "#"   title="Enviar mensaje de verificación" 
               > <!-- / {{route('Usuarios.enviarCodigo', $usuario->IDUSUARIO)}} --> 
                Verificar
                 <span title="Enviar mensaje de verificación"  class = "fa  fa-envelope-o" 
                 ></span> </a>
                 
                 <form method="get" action="{{route('Usuarios.verificar_usuario')}}">
                  {{ csrf_field() }}
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Ingrese el código de verificacíon</h4>
                    </div>
                    <div class="modal-body">
                      
                        <input type="text" name="IDUSUARIO" value="{{ $usuario->IDUSUARIO}}" class="form-control">

                          <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input 
                        type="text" 
                        name="CODIGO" 
                        pattern= "[0-9]*" 
                        maxlength="6"
                        class="form-control" 
                        placeholder="Código"
                        title="Puede ingresar sólo números" required>
                        </div>
                       <br>
                       
                      
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Verificar</button>
                    </div>
                  </div>
                
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            </form>
             @endif 
              
            </td>
            <td><a href="{{route('Usuarios.buscar', $usuario->IDUSUARIO)}}"> 
              <span title="Actualizar registro" class="btn btn-primary btn-xs	glyphicon glyphicon-edit"></span></a>
              <a href = "{{route('Usuarios.eliminar', $usuario->IDUSUARIO)}}"> 
                <span title="Eliminar registro" class = "btn btn-danger btn-xs glyphicon glyphicon-trash" ></span> </a></td>
              </tr> 
            @endforeach           
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection