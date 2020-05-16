@extends('layout')
@section('contenido')
<section class="content-header">
    <div class="row">
        <div class="form-group col-xs-6">
        <form role="form" method="get" action="{{ route ('Cat_Empresas.registrar') }}">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ingrese los datos</h3>
            </div>
         <div class="box-body">
             <label>Nombre categoria</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa  fa-list"></i></span>
                              <input 
                              type="text" 
                              name="NOMBRE"
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
                              pattern= "^[a-zA-Z ]*$" 
                              class="form-control" 
                              placeholder="Detalle"
                              title="El nombre no puede contener números">
                            </div>
                            <br>
                            
            <label for="exampleInputFile">FOTO</label>
            <input type="file" name="FOTO">
        </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Agregar</button>
              </div>
        </div>
        </div>
                  
        </div>
        <!-- /.box-body -->
        
 </div>
   
      </form>

   

</section>
@endsection
  