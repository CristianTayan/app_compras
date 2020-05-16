@extends('layout')
@section('contenido')
@foreach ($emp as $e)
        <section class="content-header">
            <form method="get" action="{{ route('Empresas.editarEmpresa') }}">
                {{ csrf_field() }}
             <div class="row">
                <div class="form-group col-xs-6"> 
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Actualizando datos de {{ $e->NOMBRE}} 
                            Id de usuario {{ $e->IDEMPRESA}}</h3>
                        </div>
                        <div class="box-body">
                            
                            <div class="input-group">
                            
                              <input type="hidden" name="IDEMPRESA" value="{{ $e->IDEMPRESA}}" class="form-control">
                            </div>
                            <br>
                            <label for="exampleInputEmail1">Categoria</label>
                          <select  name="IDCATEGORIA" class="form-control">
                         <option value="{{$e->IDCATEGORIA}}">Seleccione una Categoria</option>
                         @foreach($categorias as $cat)
                              <option value="{{$cat->IDCATEGORIA}}">{{$cat->NOMBRE}}</option>
                          @endforeach
                           </select>  
                          <br>

                          <label for="exampleInputEmail1">Proveedor</label>
                          <select  name="IDUSUARIO" class="form-control">
                         <option  value="{{$e->IDUSUARIO}}">Seleccione un proveedor</option>
                         @foreach($proveedores as $proveedor)
                              <option value="{{$proveedor->IDUSUARIO}}" >{{$proveedor->NOMBRE}} - {{$proveedor->CORREO}}</option>
                          @endforeach
                           </select>
                            <label>Nombre</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-building"></i></span>
                              <input 
                              type="text" 
                              name="NOMBRE" 
                              value="{{ $e->NOMBRE}}" 
                              pattern= "^[a-zA-Z ]*$" 
                              class="form-control" 
                              placeholder="Nombre"
                              title="El nombre no puede contener números">
                            </div>
                            <br>
                            <label>Coordenada en x</label>
                            <div class="input-group"> 
                              <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                              <input type="text" name="COORDENADAX" value="{{ $e->COORDENADAX }}" class="form-control" >
                            </div>
                            <br>
                            <label>Coordenada y</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                              <input 
                              type="text"
                              name="COORDENADAY" 
                              
                              value="{{ $e->COORDENADAY }}" 
                              class="form-control" 
                            >
                            </div>
                            <br>
                            <label>Dirección</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                              <input type="TEXT" name="DIRECCION" value="{{ $e->DIRECCION}}" class="form-control" >
                            </div>
                            <br>
                            
                            <label>Calle principal</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                                <input type="text" name="CALLE_PRINCIPAL" value="{{ $e->CALLE_PRINCIPAL}}" class="form-control">
                            </div>
                            <br>
                            <label>Calle secundaria</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                                <input type="text" name="CALLE_SECUNDARIA" value="{{ $e->CALLE_SECUNDARIA}}" class="form-control">
                            </div>
                            <br>
                            <label for="exampleInputFile"  >FOTO</label>
                           <input type="file" name="FOTO">
                            

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                           </div>  

                        </div>

                    </div>
                    
                </div>
              </div>
            </form>
        </section>     
@endforeach
@endsection
  