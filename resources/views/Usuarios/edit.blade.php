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
                <div class="form-group col-xs-6"> 
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Actualizando datos de {{ $usuario->NOMBRE}} 
                            Id de usuario {{ $usuario->IDUSUARIO}}</h3>
                        </div>
                        <div class="box-body">
                            
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
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                              <input 
                              type="text"
                              name="CELULAR" 
                              pattern= "(09)[0-9]{8}" 
                              value="{{ $usuario->CELULAR}}" 
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
                            <label>Tipo de Usuario</label>
                            <div class="input-group">
                                <select class="form-control select2" name="TIPO_USUARIO" style="width: 100%;">
                                    <option name="TIPO_USUARIO" value="A">Administrador</option>
                                    <option selected="selected" name="TIPO_USUARIO" value="P">Proveedor</option>
                                </select>
                            </div>
                            <br>
                            <label>Estado</label>
                            <div class="input-group">
                                <select class="form-control select2" name="ESTADO" style="width: 100%;">
                                    <option selected="selected" name="ESTADO" value="S">Activo</option>
                                    <option name="ESTADO" value="N">Inactivo</option>  
                                    </select>
                            </div>
                            <br>
                            <label>Verificación</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <input type="text" name="VERIFICACION" value="{{ $usuario->VERIFICACION}}" class="form-control" placeholder="Verificación">
                            </div>
                            <label>Fecha de registro</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar-minus-o"></i></span>
                                <input type="text" name="CREATE_AT" value="{{ $usuario->CREATED_AT}}" class="form-control"  disabled>
                            </div>
                            <br>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                           </div>  

                        </div>

                    </div>
                    
                </div>
              </div>
            </form>
        </section>     
@endforeach
@endsection