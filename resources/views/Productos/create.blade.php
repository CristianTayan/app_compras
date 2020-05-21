@extends('layout')
@section('contenido')
<section class="content-header">
<form method="get" action="{{Route('productos.Registrar')}}">
        {{ csrf_field() }}
    <div class="row"> 
        <div class="col-md-12"> 
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <b>Registrar producto</b> </h3>
               </div> 
               <div class="row">
                   <div class="box-header with-border">
                      <div class="col-md-3">
                       <h4 class="box-title">Información del Producto </h4>
                   
                    
                        </div>
                     <div class="col-md-9">
                        <label for="exampleInputEmail1">Categoria</label>
                        <select  name="IDCATEGORIA" class="form-control">
                       <option >Seleccione una categoria</option>
                       @foreach($categorias as $categoria)
                       @php
                       $idempresa = $categoria->IDEMPRESA;
                        @endphp   
                       @endphp
                       <option value="{{$categoria->IDCATEGORIA}}" >{{$categoria->NOMBRE}} </option>
                         @endforeach
                    
                         </select>
                         <br>
                        <input type="hidden" name="IDEMPRESA" value="{{$idempresa}}">
                       <label>Nombre</label>
                        <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
                          <input type="text" name="NOMBRE" class="form-control" placeholder="Nombre">
                        </div>
                        
                            <label>Descripción</label>
                            <div class="input-group"> 
                              <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                              <input type="text" name="DESCRIPCION"  class="form-control" placeholder="Descripcion">
                            </div>
                            <br>
                            <label>COSTO</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                              <input type="number" min="0.01" step="0.01" max="2500" name="COSTO" class="form-control">
        
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
                    <input type="file" name="FOTO">
                    <br>
                  </div>
                </div>
                 
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar producto</button>
           </div>
         </div> <!-- Para que todo este dentro del mismo modelo -->      
       </div> <!-- Para el tamaño de todo -->  
    </div>    <!-- Para que no se salga del contenido -->  
 </form>
</section>     

@endsection
  