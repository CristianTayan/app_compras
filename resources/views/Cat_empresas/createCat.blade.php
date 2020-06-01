@extends('layout')
@section('contenido')

<section class="content-header">
 <form method="post" action="{{ route('Empresas.CrearCategorias')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="row"> 
        <div class="col-md-12"> 
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> 
                      @foreach($categorias as $cat)
                      <a style="color:black;" href="{{ URL::current() }}"> 
                        Registrando empresa en categoría : {{$cat->NOMBRE}}
                        </a>
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
                       @endforeach
                       </h3>
               </div> 
               <div class="row">
                   <div class="box-header with-border">
                      <div class="col-md-3">
                    
                        <h4 class="box-title">Información de la empresa </h4>
                   
                        </div>
                     <div class="col-md-9">
                        <label for="exampleInputEmail1">Proveedor</label>
                        <select  name="IDUSUARIO" class="form-control select2" required>
                          <option value="">Seleccione un proveedor</option>
                       @foreach($proveedores as $proveedor)
                            <option value="{{$proveedor->IDUSUARIO}}" >{{$proveedor->NOMBRE}} - {{$proveedor->CORREO}}</option>
                        @endforeach
                         </select>
                         <br>
                        
                     @foreach($categorias as $cat)
                     @php
                     $id = $cat->IDCATEGORIA;
                      @endphp
                         
                      @endforeach
                      <input type="hidden" value="{{$id}}" name="IDCATEGORIA">
                         
                       <br>
                        <label>Nombre</label>
                        <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-building"></i></span>
                          <input required
                          type="text" 
                          name="NOMBRE"
                          pattern= "^[a-zA-Z ]*$" 
                          class="form-control" 
                          placeholder="Nombre"
                          title="El nombre no puede contener números">
                        </div>
                        <br>
                        <label for="exampleInputFile"  >FOTO</label>
                        <div id="preview"></div>
                        <input accept="image/*" type="file" id="FOTO" name="FOTO"  required>
                        <br>
                         </div>
                       </div>
    
                   </div>
                   <div class="row">
                    <div class="box-header with-border">
                       <div class="col-md-3">
                     
                         <h4 class="box-title">Ubicación de la empresa </h4>
                         <br><br>
                         <label>Coordenada en x</label>
                         <div class="input-group"> 
                           <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                           <input readonly id="lng" type="text" name="COORDENADAX"  value="-78.1223297" class="form-control" required>
                         </div>
                         <br>
                         <label>Coordenada y</label>
                         <div class="input-group">
                          <span  class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                           <input
                           readonly
                           id="lat" 
                           type="text"
                           name="COORDENADAY"  
                           value="0.35171"       
                           class="form-control" required>
                         </div>
                         
                         <br>
                         <br><br>
                         <label>Calle principal</label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                             <input id="features" type="text" name="CALLE_PRINCIPAL"  class="form-control" placeholder="Calle principal" required>
                         </div>
                         <br><br><br>
                         <label>Calle secundaria</label>
                         <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                             <input type="text" name="CALLE_SECUNDARIA"  class="form-control" placeholder="Calle secundaria" required>
                         </div>
                         <br><br><br>
                         </div>
                      <div >
                        <input type="hidden" id="latitud"  value="-78.1223297">
                       <input type="hidden" id="longitud"  value="0.35171">
                        
                       <div class="geocoder">
                          <div id="geocoder" ></div>
                      </div>
                      
                      <div id="map"></div>
                      </div>
                      <br><br><br><br>
                    </div>
    
                </div>
    
            <div class="box-footer">
              
              <button type ='button' class="btn btn-danger btn-sm " 
              onclick="location.href = '{{Route('Empresas.indexCat',$id)}}'">
              <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" class="btn btn-primary btn-sm  pull-right">
                  <span class="glyphicon glyphicon-floppy-saved"></span>Guardar empresa</button>
           </div>
         </div> <!-- Para que todo este dentro del mismo modelo -->      
       </div> <!-- Para el tamaño de todo -->  
    </div>    <!-- Para que no se salga del contenido -->  
 </form>
</section>     

@endsection