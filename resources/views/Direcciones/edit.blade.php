@extends('layout')
@section('contenido')
<section class="content-header">
 <form method="get" action="{{ route('Direcciones.actualizar') }}">
        {{ csrf_field() }}
    <div class="row"> 
        <div class="col-md-12"> 
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <b>Formulario de edición de direcciones</b> </h3>
               </div> 
               <div class="row">
                   <div class="box-header with-border">
                       
                       
                      <div class="col-md-3">
                    
                          <h4 class="box-title">Información de la dirección </h4>
                   
                        </div>
                       
                        <div class="col-md-9">
                            @foreach ($DireccionEditar as $direccion)
                        <input type="hidden" value="{{$direccion->IDDIRECCION}}" name="IDDIRECCION" >
                        <input type="hidden" value="{{$direccion->IDUSUARIO}}" name="IDUSUARIO" > 
                    
                           <label>Coordenada en x</label>
                           <div class="input-group"> 
                             <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                             <input type="text" value="{{$direccion->COORDENADAX}}" name="COORDENADAX"  class="form-control" placeholder="">
                           </div>
                           <br>
                           <label>Coordenada y</label>
                           <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                             <input 
                             type="text"
                             name="COORDENADAY"  
                             value="{{$direccion->COORDENADAY}}"       
                             class="form-control">
                           </div>
                           <br>
                          
                           
                           <label>Calle principal</label>
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                               <input type="text" value="{{$direccion->CALLE_PRINCIPAL}}" name="CALLE_PRINCIPAL"  class="form-control">
                           </div>
                           <br>
                           <label>Calle secundaria</label>
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                               <input type="text" value="{{$direccion->CALLE_SECUNDARIA}}" name="CALLE_SECUNDARIA"  class="form-control">
                           </div>
                           <br>
                           <label>Nro de domicilio (Opcional)</label>
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-home"></i></span>
                               <input type="text" value="{{$direccion->NRO_DOMICILIO}}" name="NRO_DOMICILIO"  class="form-control">
                           </div>
                           <br>
                           
                        
                         </div>
                   </div>

               </div>
               
            <div class="box-footer">
                <button type ='button' class="btn btn-danger " 
                onclick="location.href = '{{Route('Usuarios.index')}}'">
                <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                
                <button type="submit" class="btn btn-primary pull-right">
                    <span class="glyphicon glyphicon-floppy-saved"></span> Actualizar dirección</button>
           </div>
           @endforeach
         </div> <!-- Para que todo este dentro del mismo modelo -->      
       </div> <!-- Para el tamaño de todo -->  
    </div>    <!-- Para que no se salga del contenido -->  
 </form>
</section>     

@endsection
  