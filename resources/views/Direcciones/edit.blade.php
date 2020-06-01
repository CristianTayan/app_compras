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
                            @foreach ($DireccionEditar as $direccion)
                        <input type="hidden" value="{{$direccion->IDDIRECCION}}" name="IDDIRECCION" >
                        <input type="hidden" value="{{$direccion->IDUSUARIO}}" name="IDUSUARIO" > 
                    
                           <label>Coordenada en x</label>
                           <div class="input-group"> 
                             <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                             <input id="lng" type="text" value="{{$direccion->COORDENADAX}}" name="COORDENADAX"  class="form-control" placeholder="">
                           </div>
                           <br>
                           <input type="hidden" id="latitud"  value="{{$direccion->COORDENADAX}}">

       
                           <input type="hidden" id="longitud"  value="{{$direccion->COORDENADAY}}">
                           <label>Coordenada y</label>
                           <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                             <input 
                             id="lat"
                             type="text"
                             name="COORDENADAY"  
                             value="{{$direccion->COORDENADAY}}"       
                             class="form-control">
                           </div>
                           <br>
                          
                           
                           <label>Calle principal</label>
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                               <input id="features" required type="text" value="{{$direccion->CALLE_PRINCIPAL}}" name="CALLE_PRINCIPAL"  class="form-control">
                           </div>
                           <br>
                           <label>Calle secundaria</label>
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                               <input required type="text" value="{{$direccion->CALLE_SECUNDARIA}}" name="CALLE_SECUNDARIA"  class="form-control">
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
               
               @endforeach
            <div class="box-footer">
                <br>
                @foreach($DatosUsuario as $dato)
                @if($dato->TIPO_USUARIO=='A')
                <button type ='button' class="btn btn-danger " 
                onclick="location.href = '{{ Route('Usuarios.indexA') }}'">
                <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                @endif
                @if($dato->TIPO_USUARIO=='P')
                <button type ='button' class="btn btn-danger " 
                onclick="location.href = '{{ Route('Usuarios.indexP') }}'">
                <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                @endif
                @if($dato->TIPO_USUARIO=='U')
                <button type ='button' class="btn btn-danger " 
                onclick="location.href = '{{ Route('Usuarios.index') }}'">
                <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                @endif
                @endforeach
                <button type="submit" class="btn btn-primary btn-sm pull-right">
                    <span class="glyphicon glyphicon-floppy-saved"></span> Actualizar dirección</button>
           </div>
           
           <div class="geocoder">
    <div id="geocoder" ></div>
</div>

<div id="map"></div>
         </div> <!-- Para que todo este dentro del mismo modelo -->      
       </div> <!-- Para el tamaño de todo -->  
       
    </div>    <!-- Para que no se salga del contenido -->  
 </form>
</section>     

@endsection