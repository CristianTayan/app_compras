@extends('layout')
@section('contenido')


<section class="content-header">
    <h1>
      @foreach($productos as $producto)
      <a style="color:black;" href="{{ URL::current() }}"> 
        Detalles del producto : {{$producto->NOMBRE}}
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
         
          <form role="form" method="get" action=" {{Route('Detallesproductos.Registrar')}}">
            {{ csrf_field() }}
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
            <div class="row"> 
                <div class="col-md-12"> 
                    <div class="box box-primary">
                        <div class="box-header with-border">
                         
                       </div> 
                       <div class="row">
                           <div class="box-header with-border">
                               
                               
                              <div class="col-md-3">
                            
                                  <h4 class="box-title">Crear detalle</h4>
                           
                                </div>
                               
                                <div class="col-md-9">
                                  
                                <input type="hidden" value="{{$producto->IDPRODUCTO}}" name="IDPRODUCTO">
                                      
                                  
                      
                                   <label>Detalle</label>
                                                  <div class="input-group">
                                                   <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
                                                    <input 
                                                    type="text" 
                                                    name="DETALLE" 
                                                    class="form-control" 
                                                    placeholder="Detalle"
                                                    required>
                                                  </div>
                                                  <br>
                                  <label>Costo</label>
                                                  <div class="input-group">
                                                   <span class="input-group-addon"><i class="fa  fa-dollar"></i></span>
                                                    <input 
                                                    type="text" 
                                                    name="COSTO"
                                              
                                                    class="form-control" 
                                                    placeholder="Costo"
                                                    required>
                                                  </div>
                                                  <br>
                                                  
                                                  <button type="submit" class="btn btn-primary btn-sm pull-right">
                                                    <span class="glyphicon glyphicon-floppy-saved"></span>Guardar detalle</button>
                              </div>
                                
                                 </div>
                           </div>
                          
                       </div>
                       
                    
                 </div> <!-- Para que todo este dentro del mismo modelo -->      
               </div> <!-- Para el tamaño de todo -->  
            </div>    <!-- Para que no se salga del contenido -->  
           
        
              </form>
              <div class="col-md-12">
                <table id="example1" class="table table-bordered table-striped">
                  <h4 class="box-title">Lista de detalles guardados </h4>
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Costo</th>
                    <th>ACCIONES</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($detallesProductos as $detalle)         
                    <tr>            
                    <td>{{$detalle->NOMBRE}}</td>
                    <td>{{$detalle->COSTO}}</td>
                   
                    <td> <a data-toggle="modal" data-target="#modal-default" href = "³">  
                      <span class="btn btn-primary btn-xs	glyphicon glyphicon-edit"></span></a>
                      <a href = "{{Route('Detallesproductos.eliminar',$detalle->IDDETALLE)}}"> 
                        <span class = "btn btn-danger btn-xs glyphicon glyphicon-trash" ></span> </a> </td>
                      
                 <form id="FormularioActualizar" method="get" action="#">
                  {{ csrf_field() }}
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                              <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Actualizar detalle</h4>
                    </div>
                    <div class="modal-body">
                      
                    <input type="text"id="DETALLESID" name="IDDETALLE" value="{{$detalle->IDDETALLE}}" class="form-control">

                    <label>Detalle</label>
                    <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
                      <input 
                      type="text" 
                      name="DETALLE" 
                      id="NOMBREDETALLE"
                    value="{{$detalle->NOMBRE}}"
                      class="form-control" 
                      placeholder="Detalle"
                      required>
                    </div>
                    <br>
        <label>Costo</label>
                    <div class="input-group">
                     <span class="input-group-addon"><i class="fa  fa-dollar"></i></span>
                      <input 
                      type="text" 
                      name="COSTO"
                      id="COSTODETALLE"
                      value="{{$detalle->COSTO}}"
                      class="form-control" 
                      placeholder="Costo"
                      required>
                    </div>
                    <br>

                    </div>
                    <div class="modal-footer">
                      <button  type="button" class="btn btn-default pull-left" data-dismiss="modal" id="limpiar">Cerrar</button>
                      <button type="submit"  class="btn btn-primary">Actualizar</button>
                    </div>
                  </div>
                
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
             
            </form>
                      
                   
                      </tr> 
                      </tr> 
                    
                    @endforeach    
                    </tbody>
                </table>
              </div>
          
          @foreach($empresas as $empresa)
          <button type ='button' class="btn btn-default " 
                onclick="location.href = '{{route('productos.listar',$empresa->IDEMPRESA)}}'">
                <span class="glyphicon glyphicon-chevron-left"></span> Atrás </button>
          @endforeach
          
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection