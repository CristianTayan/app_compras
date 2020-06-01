@extends('layout')
@section('contenido')


<section class="content-header">
    <h1>
      @foreach($productos as $producto)
      <a style="color:black;" href="{{ URL::current() }}"> 
        Actualizando detalles del producto : {{$producto->NOMBRE}}
        </a>
      @endforeach 
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="">Tabla</a></li>
      <li class="active">Datos</li>
    </ol>
    
</section>
<section class="content">
 
    <div class="box">        
   
        <div class="box-body">
         
          <form role="form" method="get" action=" {{Route('Detallesproductos.ActualizarInfo')}}" >
            {{ csrf_field() }}

            <div class="row"> 
                <div class="col-md-12"> 
                    <div class="box box-primary">
                        <div class="box-header with-border">
                         
                       </div> 
                       <div class="row">
                           <div class="box-header with-border">
                       <div class="col-md-3">
                            
                                  <h4 class="box-title">Actualizar detalle</h4>
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
                               
                                <div class="col-md-9">
                                    @foreach ($datos as $dato)
                                        
                                    
                                  
                                <input type="hidden" value="{{$dato->IDDETALLE}}" name="IDDETALLE">

                                <input type="hidden" value="{{$dato->IDPRODUCTO}}" name="IDPRODUCTO">

                                   <label>Detalle</label>
                                                  <div class="input-group">
                                                   <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
                                                    <input 
                                                    type="text" 
                                                    name="DETALLE" 
                                                    class="form-control" 
                                                    placeholder="Detalle"
                                                    value="{{$dato->NOMBRE}}"
                                                    required>
                                                  </div>
                                                  <br>
                                  <label>Costo</label>
                                                  <div class="input-group">
                                                   <span class="input-group-addon"><i class="fa  fa-dollar"></i></span>
                                                    <input 
                                                    type="text" 
                                                    name="COSTO"
                                                    value="{{$dato->COSTO}}"
                                                    class="form-control" 
                                                    placeholder="Costo"
                                                    required>
                                                  </div>
                                                  <br>  
                                                 
                                                  <button type ='button' class="btn btn-danger " 
                                                  onclick="location.href = '{{Route('Detallesproductos.listar', $dato->IDPRODUCTO)}}'">
                                                  <span class="glyphicon glyphicon-remove"></span> Cancelar </button>
        
                                                  <button type="submit" class="btn btn-primary btn-sm pull-right">
                                                    <span class="glyphicon glyphicon-floppy-saved"></span>Actualizar detalle</button>
                              </div>
                              
                                 </div>
                           </div>
                          
                       </div>
                       @endforeach
                    
                 </div> <!-- Para que todo este dentro del mismo modelo -->      
               </div> <!-- Para el tamaño de todo -->  
            </div>    <!-- Para que no se salga del contenido -->  
              </form>
             
          
         
          
        </div>
        <!-- /.box-body -->
      </div>
</section>

@endsection