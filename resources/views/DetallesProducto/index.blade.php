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
                            
                                  <h4 class="box-title">Crear o actualizar detalle</h4>
                           
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
                                                   value="{{Session::get('DetalleProdDetalle')}}" 
                                                    required>
                                                  </div>
                                                  <br>
                                            <label>Costo</label>
                                                  <div class="input-group">
                                                   <span class="input-group-addon"><i class="fa  fa-dollar"></i></span>
                                                    <input 
                                                    type="text" 
                                                    name="COSTO"
                                                  value="{{ Session::get('DetalleProdCosto')}}"        
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
                     
                      <td> <a href = "{{Route('Detallesproductos.actualizar',$detalle->IDDETALLE)}}" >  
                        <span class="btn btn-primary btn-xs	glyphicon glyphicon-edit"></span></a>
                        <a onclick="return confirm('Desea eliminar')" href = "{{Route('Detallesproductos.eliminar',$detalle->IDDETALLE)}}"> 
                          <span class = "btn btn-danger btn-xs glyphicon glyphicon-trash" ></span> </a> </td> 
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