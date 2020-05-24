@extends('layout')
@section('contenido')
@foreach ($emp as $e)
        <section class="content-header">
            <form method="post" action="{{ route('Empresas.editarEmpresa') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row"> 
                  <div class="col-md-12"> 
                      <div class="box box-primary">
                          <div class="box-header with-border">
                              <h3 class="box-title"> <b>Registrar empresa</b> </h3>
                         </div> 
                         <div class="row">
                             <div class="box-header with-border">
                                <div class="col-md-3">
                              
                                  <h4 class="box-title">Información de la empresa </h4>
                             
                                  </div>
                               <div class="col-md-9">
                                <input type="hidden" name="IDEMPRESA" value="{{ $e->IDEMPRESA}}" class="form-control">
                                  <label for="exampleInputEmail1">Proveedor</label>
                                  <select  name="IDUSUARIO" class="form-control">
                                 <option value="{{$e->IDUSUARIO}} " >Seleccione un proveedor</option>
                                 @foreach($proveedores as $proveedor)
                                      <option value="{{$proveedor->IDUSUARIO}}" >{{$proveedor->NOMBRE}} - {{$proveedor->CORREO}}</option>
                                  @endforeach
                                   </select>
                                   <br>
                                  <label for="exampleInputEmail1">Categoria</label>
                                <select  name="IDCATEGORIA" class="form-control">
                               <option value="{{$e->IDCATEGORIA}}">Seleccione una Categoria</option>
                               @foreach($categorias as $cat)
                                    <option value="{{$cat->IDCATEGORIA}}">{{$cat->NOMBRE}}</option>
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
                               </div>
                             </div>
          
                         </div>
                         <div class="row">
                          <div class="box-header with-border">
                             <div class="col-md-3">
                           
                               <h4 class="box-title">Ubicación de la empresa </h4>
                          
                               </div>
                            <div class="col-md-9">
                              <label>Coordenada en x</label>
                              <div class="input-group"> 
                                <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                <input type="text" value="{{ $e->COORDENADAX }}" name="COORDENADAX"  class="form-control" >
                              </div>
                              <br>
                              <label>Coordenada y</label>
                              <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                <input 
                                type="text"
                                value="{{ $e->COORDENADAY }}"
                                name="COORDENADAY"         
                                class="form-control">
                              </div>
                              <br>
                             
                              
                              <label>Calle principal</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                                  <input type="text" name="CALLE_PRINCIPAL" value="{{ $e->CALLE_PRINCIPAL}}" class="form-control">
                              </div>
                              <br>
                              <label>Calle secundaria</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                                  <input type="text" name="CALLE_SECUNDARIA" value="{{ $e->CALLE_SECUNDARIA}}" class="form-control">
                              </div>
                              <br>
                            </div>
                          </div>
          
                      </div>
                      <div class="row">
                          <div class="box-header with-border">
                             <div class="col-md-3">
                           
                               <h4 class="box-title">Imagen o logo de la empresa </h4>
                          
                               </div>
                            <div class="col-md-9">
                              <label for="exampleInputFile"  >FOTO</label>
                             
                         <img src="{{asset($cat->FOTO)}}" style="width: 120px; height: 100px; object-fit: cover">
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
                      <div class="box-footer">
                        <button type ='button' class="btn btn-danger " 
                          onclick="location.href = '{{ URL::previous() }}'">
                          <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                          <button type="submit" class="btn btn-primary pull-right"> 
                            <span class="glyphicon glyphicon-floppy-saved"></span>Guardar empresa</button>
                     </div>
                   </div> <!-- Para que todo este dentro del mismo modelo -->      
                 </div> <!-- Para el tamaño de todo -->  
              </div>    <!-- Para que no se salga del contenido -->  
            </form>
        </section>     
@endforeach
@endsection
  