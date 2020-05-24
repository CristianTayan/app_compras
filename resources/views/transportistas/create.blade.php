@extends('layout')
@section('contenido')
<section class="content-header">
  <form role="form" method="post" action=" {{Route('Transportistas.registrar')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row"> 
        <div class="col-md-12"> 
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <b>Registrar transportistas</b> </h3>
               </div> 
               <div class="row">
                   <div class="box-header with-border">
                       
                       
                      <div class="col-md-3">
                    
                          <h4 class="box-title">Información del transportista </h4>
                   
                        </div>
                       
                        <div class="col-md-9">
                          <label>Cédula</label>
                          <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
                            <input 
                            type="text" 
                            name="CEDULA"
                            
                            class="form-control" 
                            placeholder="1001111111"
                            title="El nombre no puede contener números">
                          </div>
                          <br>
              
                           <label>Nombres completos</label>
                                          <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input 
                                            type="text" 
                                            name="NOMBRE"
                                            pattern= "^[a-zA-Z ]*$" 
                                            class="form-control" 
                                            placeholder="Nombre"
                                            title="El nombre no puede contener números">
                                          </div>
                                          <br>
                          <label>Placa</label>
                                          <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                            <input 
                                            type="text" 
                                            name="PLACA"
                                      
                                            class="form-control" 
                                            placeholder="PLACA"
                                            title="El nombre no puede contener números">
                                          </div>
                                          <br>
                                          
                          <label for="exampleInputFile">FOTO</label>
                          <div id="preview"></div>
                            <input accept="image/*" type="file" id="FOTO" name="FOTO"  >
                      </div>
                        
                         </div>
                   </div>
                   <div class="box-footer">
                    <button type ='button' class="btn btn-danger " 
                    onclick="location.href = '{{ URL::previous() }}'">
                    <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                    <button type="submit" class="btn btn-primary pull-right">
                      <span class="glyphicon glyphicon-floppy-saved"></span>Guardar transportista</button>
               </div>
               </div>
               
            
         </div> <!-- Para que todo este dentro del mismo modelo -->      
       </div> <!-- Para el tamaño de todo -->  
    </div>    <!-- Para que no se salga del contenido -->  
   

      </form>
</section>
@endsection