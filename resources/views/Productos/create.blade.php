@extends('layout')
@section('contenido')
<section class="content-header">
  @foreach($categorias as $cat)
  @php
  $idempresa = $cat->IDEMPRESA;
   @endphp   
    @endforeach
          
 
<form method="post" action="{{Route('productos.Registrar')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="row"> 
        <div class="col-md-12"> 
            <div class="box box-primary">
                <div class="box-header with-border">
                  @foreach($empresas as $empresa)
                <h3 class="box-title"> <b>Registrar producto en la empresa : {{$empresa->NOMBRE}}</b> </h3>
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
                   
               </div> 
               <div class="row">
                   <div class="box-header with-border">
                      <div class="col-md-3">
                       <h4 class="box-title">Información del Producto </h4>
                   
                    
                        </div>
                     <div class="col-md-9"> 
                      <div class="row">
                        <div class="col-md-9">
                          <label for="exampleInputEmail1">Categorias dentro de la empresa</label>
                          <select  name="IDCATEGORIA" class="form-control select2" required>
                         <option value="">Seleccione una categoria</option>
                         @foreach($categorias as $categoria)
                         @php
                         $idempresa = $categoria->IDEMPRESA;
                          @endphp   
                      
                         <option value="{{$categoria->IDCATEGORIA}}" >{{$categoria->NOMBRE}} </option>
                           @endforeach
                           </select>
                     
                           <br>
                     
                          </div> 
                          @foreach($empresas as $emp)
                          @php
                          $idempresa = $emp->IDEMPRESA;
                           @endphp   
                      @endforeach
                          <div class="col-md-3" >
                            <br>
                            <input type ='button' class="btn btn-default btn-sm " 
                            value = 'Administrar categorías' onclick="location.href = '{{ route('Catproductos.listar', $idempresa) }}'"/>
                          </div>
                      </div>
                      
                      

                        <input type="hidden" name="IDEMPRESA" value="{{$idempresa}}">
                       <label>Nombre</label>
                        <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
                          <input type="text" name="NOMBRE" 
                        value="{{Session::get('nombreProductos')}}"
                          class="form-control" placeholder="Nombre">
                        </div>
                        <br>
                            <label>Descripción</label>
                            <div class="input-group"> 
                              <span class="input-group-addon"><i class="fa  fa-list"></i></span>
                              <input type="text" name="DESCRIPCION" 
                            value="{{Session::get('descripcionProductos')}}"
                              class="form-control" placeholder="Descripción">
                            </div>
                            <br>
                            <label>COSTO</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                              <input type="number" min="0.01" step="0.01" max="2500" 
                            value="{{Session::get('costoProducto')}}"
                            name="COSTO" placeholder="Costo" class="form-control">
        
                            </div>
                        <br>
                     </div>
                </div>

               </div>
               
                <div class="box-header with-border">
            
                 
                    <br>
            <div class="row">
                <div class="box-header with-border">
                   <div class="col-md-3">
                 
                     <h4 class="box-title">Imagen del producto </h4>
                
                     </div>
                  <div class="col-md-9">
                    <label for="exampleInputFile"  >FOTO</label>
                    <div id="preview"></div>
                    <input accept="image/*" type="file" id="FOTO" name="FOTO">
                    <br>
                  </div>
                </div>
                 
            </div>
            <div class="box-footer">
              <button type ='button' class="btn btn-danger btn-sm " 
                    onclick="location.href = '{{Route('Empresas.indexE')}}'">
                    <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-floppy-saved"></span>
                  Guardar producto</button>
           </div>
         </div> <!-- Para que todo este dentro del mismo modelo -->      
       </div> <!-- Para el tamaño de todo -->  
    </div>    <!-- Para que no se salga del contenido -->  
 </form>
</section>     

@endsection