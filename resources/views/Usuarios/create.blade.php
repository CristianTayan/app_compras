@extends('layout')
@section('contenido')
@if (session('Info'))
  <div class="alert alert-info" role="alert">
  {{session('Info')}}
    </div>
  @endif
<section class="content-header">
    <form method="get" action="{{ route('Usuarios.registrar') }}">
        {{ csrf_field() }}
    <div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Ingrese los datos</h3>
        </div>

        <div class="box-body">

            <label>Nombre</label>
              <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-users"></i></span>
            <input 
            type="text" 
            name="NOMBRE" 
            pattern= "^[a-zA-Z ]*$" 
            class="form-control" 
            placeholder="Nombre"
            title="El nombre no puede contener números">
            </div>
           <br>

           <label>Correo</label>
           <div class="input-group"> 
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" name="CORREO" class="form-control" placeholder="Correo">
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
              title="El numero celular debe iniciar con 09 y contener 10 números. Ejm:09xxxxxxxx" >
            </div>
            <br>

            <label>Contraseña</label>
           <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-key"></i>
            </div>
            <input type="password" name="CONTRASENA" class="form-control" >
           </div>
           <br>

          
          
            <label>Tipo de Usuario</label>
            <select class="form-control" name="TIPO_USUARIO" style="width: 100%;">
              <option  name="TIPO_USUARIO" value="A">Administrador</option>
              <option selected="selected" name="TIPO_USUARIO" value="P">Proveedor</option>
            </select>
          
           <br>
           <div class="box-footer">
            <button type="submit" class="btn btn-primary">Crear</button>
           </div>   
           </div>
           </form>
  </section>    
@endsection