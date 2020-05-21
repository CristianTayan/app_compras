@extends('layout')
@section('contenido')
    @if (session('Info'))
         <div class="alert alert-info" role="alert">
            {{session('Info')}}
        </div>
    @endif
@foreach ($Usuarios as $usuario)
        <section class="content-header">
            <form method="get" action="{{ route('Usuarios.actualizar') }}">
                {{ csrf_field() }}
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"> <b>Formulario de edición de usuarios</b> </h3>
                           </div> 
                                   <div class="row">
                                    <div class="box-header with-border">
                                     <div class="col-md-3">
                                
                                          <h4 class="box-title">Credenciales de usuarios </h4>
                                          <br>
                                          <h6><em>Información del usuario para acceso al sistema </em> </h6>
                                     </div>
                                   
                                       <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="hidden" name="IDUSUARIO" value="{{ $usuario->IDUSUARIO}}" class="form-control">
                                          </div>
                                          <br>
                                          <label>Nombre</label>
                                          <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                            <input 
                                            type="text" 
                                            name="NOMBRE" 
                                            value="{{ $usuario->NOMBRE}}" 
                                            pattern= "^[a-zA-Z ]*$" 
                                            class="form-control" 
                                            placeholder="Nombre"
                                            title="El nombre no puede contener números">
                                          </div>
                                          <br>
                                          <label>Correo</label>
                                          <div class="input-group"> 
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" name="CORREO" value="{{ $usuario->CORREO}}" class="form-control" placeholder="Correo">
                                          </div>
                                          <br>
                                          <label>Celular</label>
                                          @php
                                           $CELULAR = substr( $usuario->CELULAR, 4 );
                                            $CELULAR = '0'.$CELULAR;  
                                          @endphp
                                          <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input 
                                            type="text"
                                            name="CELULAR" 
                                            value="{{ $CELULAR}}" 
                                            pattern= "(09)[0-9]{8}"
                                            class="form-control" 
                                            placeholder="Celular"
                                            title="El numero celular debe iniciar con 09 y contener 10 números. Ejm:09xxxxxxxx">
                                          </div>
                                          <br>
                                          <label>Contraseña</label>
                                          <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input type="password" name="CONTRASENA" value="{{ $usuario->CONTRASENA}}" class="form-control" placeholder="Contraseña">
                                          </div>
                                          <br>
                                          
                                          
                                       </div>
                                 </div>
                                </div>
                                 <div class="row">
                                    <div class="box-header with-border">
                                   <div class="col-md-3">
                              
                                        <h4 class="box-title">Características de usuarios </h4>
                                        <br>
                                        <h6><em>Información de roles o permisos que poseen los usuarios dentro de la aplicación </em> </h6>
                                   </div>
                                 
                                     <div class="col-md-9">

                                        <label>Tipo de Usuario</label>
                                        <select class="form-control" name="TIPO_USUARIO" style="width: 100%;">
                                          <option  name="TIPO_USUARIO" value="U">Usuario aplicación</option>
                                          <option  name="TIPO_USUARIO" value="A">Administrador</option>
                                          <option name="TIPO_USUARIO" value="P">Proveedor</option>
                                        </select>
                                        
                                        <br>
                                        <label>Estado</label>
                                        <select class="form-control" name="ESTADO" style="width: 100%;">
                                          <option  name="ESTADO" value="U">Activo</option>
                                          <option  name="ESTADO" value="A">Inactivo</option>
                                          
                                        </select>
                                        
                                        <br>
                                        <label>Verificación</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" name="VERIFICACION" value="{{ $usuario->VERIFICACION}}" class="form-control" placeholder="Verificación" >
                                        </div>
                                        <label>Fecha de registro</label>
                                          <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar-minus-o"></i></span>
                                            <input type="text" name="CREATE_AT" value="{{ $usuario->CREATED_AT}}" class="form-control"  disabled>
                                          </div>
                                            <br>
                                           
                                     </div>
                                     </div>
                                 </div>
                                 <div class="box-footer">
                                  <button type ='button' class="btn btn-danger " 
                onclick="location.href = '{{Route('Usuarios.index')}}'">
                <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                            <button type="submit" class="btn btn-primary pull-right">
                                                <span class="glyphicon glyphicon-edit"></span>Actualizar usuario</button>
                               </div>
                                   
                        </div> <!-- Para que todo este dentro del mismo modelo -->      
                   </div> <!-- Para el tamaño de todo -->  
                </div>    <!-- Para que no se salga del contenido --> 
            </form>
        </section>     
@endforeach
@endsection