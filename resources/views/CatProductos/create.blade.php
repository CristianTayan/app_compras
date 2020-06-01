
@extends('layout')
@section('contenido')
   
  
<section class="content-header">
  <h1>
    Registro  de Categoria de productos
    @foreach($empresas as $empresa)
            @php
              $idempresa=$empresa->IDEMPRESA;
              $nombreEmpresa = $empresa->NOMBRE;  
            @endphp
            @endforeach
  de empresa : {{$nombreEmpresa}}
  </h1>
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
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="">Tabla</a></li>
    <li class="active">Datos</li>
  </ol>
</section>
<section class="content">
  <div class="box">
      <div class="box-header">
        
        
      </div>
      <!-- /.box-header -->
  <form role="form" method="get" action="{{Route('Catproductos.registrar',$idempresa)}}">
    {{ csrf_field() }}
    <div class="row"> 
        <div class="col-md-12"> 
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <b>Registrar categoria</b> </h3>
               </div> 
               <div class="row">
                   <div class="box-header with-border">
                       
                       
                      <div class="col-md-3">
                    
                          <h4 class="box-title">Información de la categoría </h4>
                   
                        </div>
                       
                        <div class="col-md-9">
                          <input value="{{$idempresa}}" 
                          type="hidden" 
                          name="IDEMPRESA">
                         
                                 
                     <label>NOMBRE</label>
                                     <div class="input-group">
                                      <span class="input-group-addon"><i class="fa  fa-keyboard-o"></i></span>
                                       <input 
                                       type="text" 
                                       name="NOMBRE"
                                     value="{{ Session::get('CatProdNombre')}}"
                                       class="form-control" 
                                       placeholder="Nombre Categoria"
                                     >
                                     </div>
                                     <br>
                 
                     <label>DETALLE</label>
                                     <div class="input-group">
                                      <span class="input-group-addon"><i class="fa  fa-list"></i></span>
                                       <input 
                                       type="text" 
                                       name="DETALLE"
                                       value="{{ Session::get('CatProdDetalle')}}"
                                       class="form-control" 
                                       placeholder="Detalle">
                                     </div>
                                     <br>
                 </div>
                 </div>
                </div>
                     <div class="box-footer">
                      <button type ='button' class="btn btn-danger btn-sm " 
                      onclick="location.href = '{{Route('Empresas.indexE')}}'">
                        <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                      <button type="submit" class="btn btn-primary btn-sm pull-right">
                        <span class="glyphicon glyphicon-floppy-saved"></span>Guardar categoría</button>
                       </div>
   
         </div> <!-- Para que todo este dentro del mismo modelo -->      
       </div> <!-- Para el tamaño de todo -->  
    </div>    <!-- Para que no se salga del contenido -->  
  </form>

</section>
@endsection