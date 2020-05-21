@extends('layout')
@section('contenido')
@foreach ($categorias as $cat)
<section class="content-header">
    
        <form role="form" method="get" action="{{ route ('editarCategoria') }}">
                  
      {{ csrf_field() }}
      <div class="row"> 
          <div class="col-md-12"> 
               <div class="box box-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title"> <b>Formulario de edición de categorías de empresas</b> </h3>
                     
                 </div> 
                    <div class="row">
                      <div class="box-header with-border">
                         
                         
                        <div class="col-md-3">
                      
                            <h4 class="box-title">Información de categorías de empresas</h4>
                            <h6><em>Se actualiza la información de  categorías para la clasificación de las empresas  </em> </h6>
                        </div>
                        <div class="col-md-9">
                            <input type="hidden" name="IDCATEGORIA" value="{{ $cat->IDCATEGORIA}}" class="form-control">
                            <label>Nombre categoria</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa  fa-list"></i></span>
                              <input 
                              type="text" 
                              name="NOMBRE"
                              value="{{ $cat->NOMBRE}}"
                              pattern= "^[a-zA-Z ]*$" 
                              class="form-control" 
                              placeholder="Nombre"
                              title="El nombre no puede contener números">
                            </div>
                            <br>
            <label>Detalle</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa  fa-commenting"></i></span>
                              <input 
                              type="text" 
                              name="DETALLE"
                              value="{{ $cat->DETALLE}}"
                              pattern= "^[a-zA-Z ]*$" 
                              class="form-control" 
                              placeholder="Detalle"
                              title="El nombre no puede contener números">
                            </div>
                            <br>
                            
            <label for="exampleInputFile">FOTO</label>
            <input type="file" value="{{ $cat->FOTO}}" name="FOTO">
                        </div>
                               

                       </div>
                     </div>
  
                   
                 <div class="box-footer">
                       <button type ='button' class="btn btn-danger " 
                        onclick="location.href = '{{Route('categorias.index')}}'">
                          <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                        <button type="submit" class="btn btn-primary pull-right">
                          <span class="glyphicon glyphicon-floppy-saved"></span>Guardar categoría</button>
                </div>
             </div>
           </div> <!-- Para que todo este dentro del mismo modelo -->      
         </div> <!-- Para el tamaño de todo -->  
      </div>    <!-- Para que no se salga del contenido -->
      </form>

   

</section>
@endforeach
@endsection
