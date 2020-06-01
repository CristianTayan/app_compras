@extends('layout')
@section('contenido')

<section class="content-header">
    
      
        <form  role="form" method="POST" action="{{ route ('Cat_Empresas.registrar') }}" enctype="multipart/form-data">
        
      {{ csrf_field() }}
      <div class="row"> 
          <div class="col-md-12"> 
               <div class="box box-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title"> <b>Registrar categoría</b> </h3>
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
                      
                            <h5>Categorías para la clasificación de empresas</h5>
                             
                        </div>
                        <div class="col-md-9">
                          <label>Nombre categoria</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
                              <input required
                              type="text" 
                              name="NOMBRE"
                              pattern= "^[a-zA-Z ]*$" 
                              class="form-control" 
                              placeholder="Nombre"
                              value="{{Session::get('nombreCategoria')}}"
                              title="El nombre no puede contener números">
                            </div>
                            <br>
                                  <label>Detalle</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-list"></i></span>
                              <input required
                              type="text" 
                              name="DETALLE"
                             
                              class="form-control" 
                              placeholder="Detalle"
                            value="{{Session::get('descripcionCategoria')}}"
                              title="El nombre no puede contener números">
                            </div>
                            <br>
                            <label for="exampleInputFile">Imagen o logo de la empresa</label>
                            <div id="preview"></div>
                            <input accept="image/*" type="file" id="FOTO" name="FOTO"  >

                        </div>
                               

                       </div>
                     </div>
  
                   
                 <div class="box-footer">
                       <button type ='button' class="btn btn-danger btn-sm " 
                        onclick="location.href = '{{Route('categorias.index')}}'">
                          <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-sm pull-right">
                          <span class="glyphicon glyphicon-floppy-saved"></span>Guardar categoría</button>
                </div>
             </div>
           </div> <!-- Para que todo este dentro del mismo modelo -->      
         </div> <!-- Para el tamaño de todo -->  
      </div>    <!-- Para que no se salga del contenido -->
      </form>

</section>
@endsection
  