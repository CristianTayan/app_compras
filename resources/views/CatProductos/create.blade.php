
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
          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Ingrese los datos</h3>
              </div>
           <div class="box-body">
            
            
            
           <input value="{{$idempresa}}" 
                   type="hidden" 
                   name="IDEMPRESA">
                  
                          
              <label>NOMBRE</label>
                              <div class="input-group">
                               <span class="input-group-addon"><i class="fa  fa-commenting"></i></span>
                                <input 
                                type="text" 
                                name="NOMBRE"
                          
                                class="form-control" 
                                placeholder="Nombre Categoria"
                              >
                              </div>
                              <br>
          
              <label>DETALLE</label>
                              <div class="input-group">
                               <span class="input-group-addon"><i class="fa  fa-commenting"></i></span>
                                <input 
                                type="text" 
                                name="DETALLE"
                          
                                class="form-control" 
                                placeholder="Detalle">
                              </div>
                              <br>
          </div>
              <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
          
  
</div>
</div>
</div>

<!-- /.box-body -->
</div>
</section>
@endsection