@extends('layout')
@section('contenido')
@foreach ($emp as $e)
        <section class="content-header">
            <form method="post" action="{{ route('Empresas.editarEmpresaCategorias') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row"> 
                  <div class="col-md-12"> 
                      <div class="box box-primary">
                          <div class="box-header with-border">
                              <h3 class="box-title"> <b>Actualizar empresa</b> </h3>
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
                         </div> 
                         <div class="row">
                             <div class="box-header with-border">
                                <div class="col-md-3">
                              
                                  <h4 class="box-title">Información de la empresa </h4>
                             
                                  </div>
                               <div class="col-md-9">
                                <input type="hidden" name="IDEMPRESA" value="{{ $e->IDEMPRESA}}" class="form-control">
                                  <label for="exampleInputEmail1">Proveedor</label>
                                  <select  name="IDUSUARIO" class="form-control select2" required>
                                  
                                      @foreach($proveedores as $proveedor)
                                      <option value="{{$proveedor->IDUSUARIO}}" selected>{{$proveedor->NOMBRE}} - {{$proveedor->CORREO}}</option>
                                       @endforeach
                                   </select>
                                   <br>
                                  <label for="exampleInputEmail1">Categoria</label>
                                <select  name="IDCATEGORIA" class="form-control select2" required>
                               
                               @foreach($categorias as $cat)
                                    <option value="{{$cat->IDCATEGORIA}}" selected>{{$cat->NOMBRE}}</option>
                                @endforeach
                                 </select>  
                                 <br>
                                  <label>Nombre</label>
                                  <div class="input-group">
                                   <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <input 
                                    type="text" 
                                    name="NOMBRE"
                                    pattern= "^[a-zA-Z ]*$" 
                                    value="{{ $e->NOMBRE}}" 
                                    class="form-control" 
                                    placeholder="Nombre"
                                    title="El nombre no puede contener números">
                                  </div>
                                  <br>
                                  <label for="exampleInputFile"  >FOTO</label>
                             <br>
                                  <img src="{{asset($e->FOTO)}}" style="width: 120px; height: 100px; object-fit: cover">
                                  <br>
                                  <label> Imagen actualizada</label><br>
                                  <div id="preview">   
                                  </div>
                                   <input type="file"    name="FOTO" id="FOTO">
                                       <input type="hidden" value="{{ $e->FOTO }}" name="FOTOE">
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
                                <input readonly id="lng" type="text" value="{{ $e->COORDENADAX }}" name="COORDENADAX"  class="form-control" >
                              </div>
                              <br><br>
                              <label>Coordenada y</label>
                              <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                <input 
                                readonly
                                id="lat"
                                type="text"
                                value="{{ $e->COORDENADAY }}"
                                name="COORDENADAY"         
                                class="form-control">
                              </div>
                              <br><br>
                             
                              
                              <label>Calle principal</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                                  <input id="features" type="text" name="CALLE_PRINCIPAL" value="{{ $e->CALLE_PRINCIPAL}}" class="form-control">
                              </div>
                              <br><br>
                              <label>Calle secundaria</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                                  <input type="text" name="CALLE_SECUNDARIA" value="{{ $e->CALLE_SECUNDARIA}}" class="form-control">
                              </div>
                              <br><br><br>
                               </div>
                            <div >
                            <input type="hidden" id="latitud"  value="{{$e->COORDENADAX}}">
                             <input type="hidden" id="longitud"  value="{{$e->COORDENADAY}}">
                              
                             <div class="geocoder">
                                <div id="geocoder" ></div>
                            </div>
                            
                            <div id="map"></div>
                            </div>
                          </div>
          
                      </div>
                      
                      <div class="box-footer">
                        <button type ='button' class="btn btn-sm btn-danger " 
                          onclick="location.href = '{{Route('Empresas.index')}}'">
                          <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                          <button type="submit" class="btn btn-primary btn-sm pull-right"> 
                            <span class="glyphicon glyphicon-floppy-saved"></span>Guardar empresa</button>
                     </div>
                   </div> <!-- Para que todo este dentro del mismo modelo -->      
                 </div> <!-- Para el tamaño de todo -->  
              </div>    <!-- Para que no se salga del contenido -->  
            </form>
        </section>     
@endforeach
@endsection