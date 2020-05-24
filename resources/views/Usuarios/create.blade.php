@extends('layout')
@section('contenido')
<section class="content-header">
    <form method="get" action="{{ route('Usuarios.registrar') }}">
     
      {{ csrf_field() }}
      <div class="row"> 
          <div class="col-md-12"> 
              <div class="box box-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title"> <b>Registrar usuario</b> </h3>
                     
                 </div> 
                 <div class="row">
                     <div class="box-header with-border">
                         
                         
                        <div class="col-md-3">
                      
                            <h4 class="box-title">Información del usuario </h4>
                            <h6>Los datos de usuario que servirán para el acceso al sistema  </h6>
                          </div>
                         
                          <div class="col-md-9">
                            <label>Nombre</label>
                            <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-users"></i></span>
                          <input 
                          type="text" 
                          name="NOMBRE" 
                          pattern= "^[a-zA-Z ]*$" 
                          class="form-control" 
                          placeholder="Nombre"
                          title="El nombre no puede contener números" required>
                          </div>
                         <br>
              
                         <label>Correo</label>
                         <div class="input-group"> 
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="CORREO" class="form-control" placeholder="Correo" required>
                         </div>
                         <br>
              
                        
                          <label>Celular</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            <input 
                            type="text" 
                            pattern= "(09)[0-9]{8}" 
                            name="CELULAR" 
                            class="form-control"
                            title="El numero celular debe iniciar con 09 y contener 10 números. Ejm:09xxxxxxxx" required>
                          </div>
                          <br>
              
                          <label>Contraseña</label>
                         <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-key"></i>
                          </div>
                          <input type="password" name="CONTRASENA" class="form-control" required>
                         </div>
                         <br>
                       </div>
                     </div>
  
                 </div>
                 <div class="row">
                  <div class="box-header with-border">   
                     <div class="col-md-3">
                      <h4 class="box-title">Asignación de rol </h4>
                      <h6>Se asigna un rol para las diferentes acciones que puede realizar en la aplicación  </h6>
                       </div>
                       <div class="col-md-9">

                        <label>Tipo de Usuario</label>
                        
                        @if ($tipos=='A')
                        <select  class="form-control" name="TIPO_USUARIO" style="width: 100%;">
                          <option  name="TIPO_USUARIO" value="U" >Usuario aplicación</option>
                          <option  name="TIPO_USUARIO" value="A" selected>Administrador</option>
                          <option name="TIPO_USUARIO" value="P">Proveedor</option>
                        </select>  
                        @endif
                        @if ($tipos=='P')
                        <select class="form-control" name="TIPO_USUARIO" style="width: 100%;">
                          <option  name="TIPO_USUARIO" value="U">Usuario aplicación</option>
                          <option  name="TIPO_USUARIO" value="A" >Administrador</option>
                          <option name="TIPO_USUARIO" value="P" selected>Proveedor</option>
                        </select>  
                        @endif
                        @if ($tipos=='U')
                        <select class="form-control" name="TIPO_USUARIO" style="width: 100%;">
                          <option  name="TIPO_USUARIO" value="U" selected>Usuario aplicación</option>
                          <option  name="TIPO_USUARIO" value="A" >Administrador</option>
                          <option name="TIPO_USUARIO" value="P" >Proveedor</option>
                        </select>  
                        @endif

                       
                        
                      
                       <br>

                       </div>
                       </div>
                       </div>
              <div class="box-footer">
                <button type ='button' class="btn btn-danger " 
                onclick="location.href = '{{ URL::previous() }}'">
                <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                  <button type="submit" class="btn btn-primary pull-right">
                    <span class="glyphicon glyphicon-floppy-saved"></span>Guardar Usuario</button>
             </div>
           </div> <!-- Para que todo este dentro del mismo modelo -->      
         </div> <!-- Para el tamaño de todo -->  
      </div>    <!-- Para que no se salga del contenido --> 
           </form>
  </section>    
@endsection