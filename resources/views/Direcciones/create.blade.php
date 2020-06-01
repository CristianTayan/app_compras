@extends('layout')
@section('contenido')

<section class="content-header">
 <form method="get" action="{{ route('Direcciones.registrar_direcciones')}}">
        {{ csrf_field() }}

    <div class="row"> 
        <div class="col-md-12"> 
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <b>Registrar direccion</b> </h3>
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
               <input type="hidden" id="latitud"  value="-78.1223297">
              <input type="hidden" id="longitud"  value="0.35171">
               <div class="row">
                   <div class="box-header with-border">
                       
                       
                    
                       
                        <div class="col-md-3">
                        
                            @foreach ($direccionesID as $id)
                          <input type="hidden" name="IDUSUARIO" value="{{$id->IDUSUARIO}}">
                          @php
                           $tipos=$id->TIPO_USUARIO;   
                          @endphp
                           @endforeach
                           <br>
                           <br>
                           <label>Coordenada en x</label>
                           <div class="input-group"> 
                             <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                             <input 
                             readonly
                             type="text" value="-78.1223297" id="lng" name="COORDENADAX"  class="form-control" placeholder="">
                           </div>
                           <br>
                           <label>Coordenada y</label>
                           <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                             <input 
                             value="0.35171"
                             id="lat"
                             type="text"
                             name="COORDENADAY"         
                             class="form-control"
                             readonly>
                           </div>

                           <br>
                           
                           <label>Calle principal</label>
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                               <input id="features" required type="text" name="CALLE_PRINCIPAL"  class="form-control">
                           </div>
                           <br>
                           <label>Calle secundaria</label>
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                               <input required type="text" name="CALLE_SECUNDARIA"  class="form-control">
                           </div>
                           <br>
                           <label>Nro de domicilio (Opcional)</label>
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-home"></i></span>
                               <input type="text" name="NRO_DOMICILIO"  class="form-control">
                           </div>
                           <br>
                           
                        
                         </div>
                   </div>

               </div>
               <br>
               
            <div class="box-footer">
                @if($tipos=='A')
                <button type ='button' class="btn btn-danger " 
                onclick="location.href = '{{ Route('Usuarios.indexA') }}'">
                <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                @endif
                @if($tipos=='P')
                <button type ='button' class="btn btn-danger " 
                onclick="location.href = '{{ Route('Usuarios.indexP') }}'">
                <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                @endif
                @if($tipos=='U')
                <button type ='button' class="btn btn-danger " 
                onclick="location.href = '{{ Route('Usuarios.index') }}'">
                <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                @endif
                
                <button type="submit" class="btn btn-primary btn-sm pull-right">
                    <span class="glyphicon glyphicon-floppy-saved"></span> Guardar dirección</button>
           </div>
         </div> <!-- Para que todo este dentro del mismo modelo -->      
       </div> <!-- Para el tamaño de todo -->  
    </div>    <!-- Para que no se salga del contenido -->  
 
</form>
<div class="geocoder">
    <div id="geocoder" ></div>
</div>

<div id="map"></div>

</section>     

@endsection
  