@extends('layout')
@section('contenido')
<section class="content-header">
  @foreach ($transportistas as $transportista)
        <form role="form" method="post" action="{{Route('Transportistas.actualizar')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          @error('CEDULA')
<div class="eliminado" id="midiv">
  Cedula no valida

</div>
@enderror
          <div class="row"> 
              <div class="col-md-12"> 
                  <div class="box box-primary">
                      <div class="box-header with-border">
                          <h3 class="box-title"> <b>Formulario de actualización de transportistas</b> </h3>
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
                          
                                <h4 class="box-title">Información del transportista </h4>
                         
                              </div>
                             
                              <div class="col-md-9">
                                <input type="hidden" name="IDTRANSPORTISTA" value="{{$transportista->IDTRANSPORTISTA}}">
                                <label>Cédula</label>
                                <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
                                  <input 
                                  type="text" 
                                  name="CEDULA"
                                  value="{{$transportista->CEDULA}}"
                                  class="form-control" 
                                  placeholder="1001111111"
                                  maxlength="10"
                                  title="El nombre no puede contener números">
                                </div>
                                <br>
                    
                                 <label>Nombres completos</label>
                                                <div class="input-group">
                                                 <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                  <input 
                                                  type="text" 
                                                  name="NOMBRE"
                                                  pattern= "^[a-zA-Z ]*$" 
                                                  class="form-control" 
                                                  value="{{$transportista->NOMBRES}}"
                                                  placeholder="Nombre"
                                                  title="El nombre no puede contener números">
                                                </div>
                                                <br>
                                <label>Placa</label>
                                                <div class="input-group">
                                                 <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                                  <input 
                                                  type="text" 
                                                  name="PLACA"
                                                  value="{{$transportista->PLACA}}"
                                                  class="form-control" 
                                                  placeholder="PLACA"
                                                  title="El nombre no puede contener números">
                                                </div>
                                                <br>
                                                
                                <label for="exampleInputFile">FOTO</label>
                               
                                <img src="{{asset($transportista->FOTO)}}" style="width: 120px; height: 100px; object-fit: cover">
                                <br>
                                <label> Imagen actualizada</label><br>
                                <div id="preview">   
                                </div>
                                 <input type="file" name="FOTO" id="FOTO">
                                     <input type="hidden" value="{{ $transportista->FOTO }}" name="FOTOE">
                                     <br>
                            </div>
                              
                               </div>
                         </div>
                         <div class="box-footer">
                          <button type ='button' class="btn btn-danger " 
                          onclick="location.href = '{{ URL::previous() }}'">
                          <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                          <button type="submit" class="btn btn-primary pull-right">
                            <span class="glyphicon glyphicon-floppy-saved"></span>Actualizar transportista</button>
                     </div>
                     </div>
                     
                  
               </div> <!-- Para que todo este dentro del mismo modelo -->      
             </div> <!-- Para el tamaño de todo -->  
          </div>    <!-- Para que no se salga del contenido -->  
         




        </form>
 @endforeach 
</section>
@endsection