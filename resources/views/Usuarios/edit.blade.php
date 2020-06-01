
@extends('layout')
@section('contenido')
@foreach ($Usuarios as $usuario)
        <section class="content-header">
            <form method="get" action="{{ route('Usuarios.actualizar') }}">
                {{ csrf_field() }}
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"> <b>Formulario de edición de usuarios</b> </h3>
                                @if (session('informacion'))
                      <div id="midiv" class="informacion" role="alert">
                        {{session('informacion')}}
                      </div>
                      @endif
                           </div> 
                                   <div class="row">
                                    <div class="box-header with-border">
                                     <div class="col-md-3">
                                
                                          <h4 class="box-title">Credenciales de usuarios </h4>
                                          <br>
                                          <h6>Información del usuario para acceso al sistema </h6>
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
                                        <h6>Información de roles o permisos que poseen los usuarios dentro de la aplicación  </h6>
                                   </div>
                                 
                                     <div class="col-md-9">

                                        <label>Tipo de Usuario</label>
                                        
                                        @if ($usuario->TIPO_USUARIO=='A')
                                        <select  class="form-control select2" name="TIPO_USUARIO" style="width: 100%;">
                                          <option  name="TIPO_USUARIO" value="U" >Usuario aplicación</option>
                                          <option  name="TIPO_USUARIO" value="A" selected>Administrador</option>
                                          <option name="TIPO_USUARIO" value="P">Proveedor</option>
                                        </select>  
                                        @endif
                                        @if ($usuario->TIPO_USUARIO=='P')
                                        <select class="form-control select2" name="TIPO_USUARIO" style="width: 100%;">
                                          <option  name="TIPO_USUARIO" value="U">Usuario aplicación</option>
                                          <option  name="TIPO_USUARIO" value="A" >Administrador</option>
                                          <option name="TIPO_USUARIO" value="P" selected>Proveedor</option>
                                        </select>  
                                        @endif
                                        @if ($usuario->TIPO_USUARIO=='U')
                                        <select class="form-control select2" name="TIPO_USUARIO" style="width: 100%;">
                                          <option  name="TIPO_USUARIO" value="U" selected>Usuario aplicación</option>
                                          <option  name="TIPO_USUARIO" value="A" >Administrador</option>
                                          <option name="TIPO_USUARIO" value="P" >Proveedor</option>
                                        </select>  
                                        @endif

                                        <br>
                                        <label>Estado</label>
                                        @if($usuario->ESTADO=='S')
                                        <select class="form-control select2" name="ESTADO" style="width: 100%;">
                                          <option  name="ESTADO" value="S" selected>Activo</option>
                                          <option  name="ESTADO" value="N">Inactivo</option>
                                          
                                        </select>
                                        @endif
                                        @if($usuario->ESTADO=='N')
                                        <select class="form-control select2" name="ESTADO" style="width: 100%;">
                                          <option  name="ESTADO" value="S">Activo</option>
                                          <option  name="ESTADO" value="N" selected>Inactivo</option>
                                          
                                        </select>
                                        @endif
                                       
                                        
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
                                   @if($usuario->TIPO_USUARIO=='A')
                                   <button type ='button' class="btn btn-danger " 
                                   onclick="location.href = '{{ Route('Usuarios.indexA') }}'">
                                   <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                   @endif
                                   @if($usuario->TIPO_USUARIO=='P')
                                   <button type ='button' class="btn btn-danger " 
                                   onclick="location.href = '{{ Route('Usuarios.indexP') }}'">
                                   <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                   @endif
                                   @if($usuario->TIPO_USUARIO=='U')
                                   <button type ='button' class="btn btn-danger " 
                                   onclick="location.href = '{{ Route('Usuarios.index') }}'">
                                   <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                   @endif
                                  
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