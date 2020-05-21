@extends('layout')
@section('contenido')
<section class="content-header">
    
      
        <form role="form" method="get" action="{{ route ('Cat_Empresas.registrar') }}">
        
      {{ csrf_field() }}
      <div class="row"> 
          <div class="col-md-12"> 
               <div class="box box-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title"> <b>Registrar categoría</b> </h3>
                     
                 </div> 
                    <div class="row">
                      <div class="box-header with-border">
                         
                         
                        <div class="col-md-3">
                      
                            <h4 class="box-title">Información de la categoría</h4>
                            <h6><em>Se agrega información de los diferentes categorías para la clasificación de las empresas  </em> </h6>
                        </div>
                        <div class="col-md-9">
                          <label>Nombre categoria</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa  fa-list"></i></span>
                              <input 
                              type="text" 
                              name="NOMBRE"
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
                              pattern= "^[a-zA-Z ]*$" 
                              class="form-control" 
                              placeholder="Detalle"
                              title="El nombre no puede contener números">
                            </div>
                            <br>
                            <label for="exampleInputFile">Imagen o logo de la empresa</label>
                            <input type="file" name="FOTO">
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
@endsection
  