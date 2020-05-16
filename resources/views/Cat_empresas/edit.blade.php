@extends('layout')
@section('contenido')
@foreach ($categorias as $cat)
<section class="content-header">
    <div class="row">
        <div class="form-group col-xs-6">
        <form role="form" method="get" action="{{ route ('Cat_Empresas.registrar') }}">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Actualizando datos de {{ $cat->NOMBRE}} 
                Id de usuario {{ $cat->IDCATEGORIA}}</h3>
            </div>
         <div class="box-body">
            <div class="input-group">
                <input type="hidden" name="IDCATEGORIA" value="{{ $cat->IDCATEGORIA}}" class="form-control">
              </div>
              <br>
             <label>Nombre categoria</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa  fa-list"></i></span>
                              <input 
                              type="text" 
                              name="NOMBRE"
                              value="{{ $cat->NOMBRE}}"
                              pattern= "^[a-zA-Z ]*$" 
                              class="form-control" 
                              placeholder="Nombre"
                              title="El nombre no puede contener números">
                            </div>
                            <br>
            <label>Detalle</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa  fa-commenting"></i></span>
                              <input 
                              type="text" 
                              name="DETALLE"
                              value="{{ $cat->DETALLE}}"
                              pattern= "^[a-zA-Z ]*$" 
                              class="form-control" 
                              placeholder="Detalle"
                              title="El nombre no puede contener números">
                            </div>
                            <br>
                            
            <label for="exampleInputFile">FOTO</label>
            <input type="file" value="{{ $cat->FOTO}}" name="FOTO">
        </div>
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
