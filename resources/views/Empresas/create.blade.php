@extends('layout')
@section('contenido')
<section class="content-header">
{{-- <<<<<<< HEAD
    <div class="row">
            <form method="get" action="{{ route('Empresas.crear')}}">
                {{ csrf_field() }}

                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ingrese los datos</h3>
                        </div>
                        <div class="box-body">

                            <div class="input-group">
                            </div>
                            <br>
                            <label for="exampleInputEmail1">Proveedor</label>
                            <select  name="IDUSUARIO" class="form-control">
                           <option >Seleccione un proveedor</option>
                           @foreach($proveedores as $proveedor)
                                <option value="{{$proveedor->IDUSUARIO}}" >{{$proveedor->NOMBRE}} - {{$proveedor->CORREO}}</option>
                            @endforeach
                             </select>
                             <br>
                            <label for="exampleInputEmail1">Categoria</label>
                          <select  name="IDCATEGORIA" class="form-control">
                         <option >Seleccione una Categoria</option>
                         @foreach($categorias as $cat)
                              <option value="{{$cat->IDCATEGORIA}}">{{$cat->NOMBRE}}</option>
                          @endforeach
                           </select>
                            <label>Nombre</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-building"></i></span>
                              <input
                              type="text"
                              name="NOMBRE"
                              pattern= "^[a-zA-Z ]*$"
                              class="form-control"
                              placeholder="Nombre"
                              title="El nombre no puede contener números">
                            </div>
                            <br>
                            <label>Coordenada en x</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                              <input type="text" name="COORDENADAX"  class="form-control" placeholder="Correo">
                            </div>
                            <br>
                            <label>Coordenada y</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                              <input
                              type="text"
                              name="COORDENADAY"

                              class="form-control"
                            >
                            </div>
                            <br>
                            <label>Dirección</label>
                            <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                              <input type="TEXT" name="DIRECCION"  class="form-control" >
                            </div>
                            <br>

                            <label>Calle principal</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                                <input type="text" name="CALLE_PRINCIPAL"  class="form-control">
                            </div>
                            <br>
                            <label>Calle secundaria</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                                <input type="text" name="CALLE_SECUNDARIA"  class="form-control">
                            </div>
                            <br>
                            <label for="exampleInputFile">FOTO</label>
                           <input type="file" name="FOTO">


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Agregar</button>
                           </div>

======= --}}
 <form method="get" action="{{ route('Empresas.crear')}}">
        {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <b>Registrar empresa</b> </h3>
               </div>
               <div class="row">
                   <div class="box-header with-border">
                      <div class="col-md-3">

                        <h4 class="box-title">Información de la empresa </h4>

                        </div>
                     <div class="col-md-9">
                        <label for="exampleInputEmail1">Proveedor</label>
                        <select  name="IDUSUARIO" class="form-control">
                       <option >Seleccione un proveedor</option>
                       @foreach($proveedores as $proveedor)
                            <option value="{{$proveedor->IDUSUARIO}}" >{{$proveedor->NOMBRE}} - {{$proveedor->CORREO}}</option>
                        @endforeach
                         </select>
                         <br>
                        <label for="exampleInputEmail1">Categoria</label>
                      <select  name="IDCATEGORIA" class="form-control">
                     <option >Seleccione una Categoria</option>
                     @foreach($categorias as $cat)
                          <option value="{{$cat->IDCATEGORIA}}">{{$cat->NOMBRE}}</option>
                      @endforeach
                       </select>
                       <br>
                        <label>Nombre</label>
                        <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-building"></i></span>
                          <input
                          type="text"
                          name="NOMBRE"
                          pattern= "^[a-zA-Z ]*$"
                          class="form-control"
                          placeholder="Nombre"
                          title="El nombre no puede contener números">
{{-- >>>>>>> master --}}
                        </div>
                        <br>
                     </div>
                   </div>

               </div>
               <div class="row">
                <div class="box-header with-border">
                   <div class="col-md-3">

                     <h4 class="box-title">Ubicación de la empresa </h4>

                     </div>
                  <div class="col-md-9">
                    <label>Coordenada en x</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                      <input type="text" name="COORDENADAX"  class="form-control" placeholder="Correo">
                    </div>
                    <br>
                    <label>Coordenada y</label>
                    <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                      <input
                      type="text"
                      name="COORDENADAY"
                      class="form-control">
                    </div>
{{-- <<<<<<< HEAD

                </div>

            </form>

            <div class="col-md-6">
               <form method="get" action="{{ route('Empresas.crear')}}">
                {{ csrf_field() }}
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Registre el horario</h3>
                        </div>
                        <div class="box-body">

                            <div class="input-group">
                            cargo el id de la empresa ingresada escondido jeje
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-3">
                                    <label for="exampleInputEmail1">Dia de Inicio</label>
                                    <select  name="DIA_INICIO" class="form-control">
                                   <option >Lunes</option>
                                   <option >Martes</option>
                                   <option >Miércoles</option>
                                   <option >Jueves</option>
                                   <option >Viernes</option>
                                   <option >Sábado</option>
                                   <option >Domingo</option>
                                     </select>
                                </div>

                                 <div class="col-xs-3">
                                    <label for="exampleInputEmail1">Dia fin</label>
                                    <select  name="DIA_FIN" class="form-control">
                                   <option >Lunes</option>
                                   <option >Martes</option>
                                   <option >Miércoles</option>
                                   <option >Jueves</option>
                                   <option >Viernes</option>
                                   <option >Sábado</option>
                                   <option >Domingo</option>
                                     </select>
                                 </div>
                                 <div class="col-xs-3">
                                    <label for="exampleInputEmail1">Hora Inicio</label>
                                    <select  name="HORA_INICIO" class="form-control">
                                   <option >Lunes</option>
                                   <option >Martes</option>
                                   <option >Miércoles</option>
                                   <option >Jueves</option>
                                   <option >Viernes</option>
                                   <option >Sábado</option>
                                   <option >Domingo</option>
                                     </select>
                                </div>

                                 <div class="col-xs-3">
                                    <label for="exampleInputEmail1">Hora fin</label>
                                    <select  name="HORA_FIN" class="form-control">
                                   <option >Lunes</option>
                                   <option >Martes</option>
                                   <option >Miércoles</option>
                                   <option >Jueves</option>
                                   <option >Viernes</option>
                                   <option >Sábado</option>
                                   <option >Domingo</option>
                                     </select>
                                 </div>
                            </div>





                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Agregar</button>
                           </div>

                        </div>

                    </div>



            </form>
            </div>
        </div>

        </section>
======= --}}
                    <br>
                    <label>Dirección</label>
                    <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                      <input type="TEXT" name="DIRECCION"  class="form-control" >
                    </div>
                    <br>

                    <label>Calle principal</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                        <input type="text" name="CALLE_PRINCIPAL"  class="form-control">
                    </div>
                    <br>
                    <label>Calle secundaria</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                        <input type="text" name="CALLE_SECUNDARIA"  class="form-control">
                    </div>
                    <br>
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="box-header with-border">
                   <div class="col-md-3">

                     <h4 class="box-title">Imagen o logo de la empresa </h4>

                     </div>
                  <div class="col-md-9">
                    <label for="exampleInputFile"  >FOTO</label>
                    <input type="file" name="FOTO">
                    <br>
                  </div>
                </div>

            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar empresa</button>
           </div>
         </div> <!-- Para que todo este dentro del mismo modelo -->
       </div> <!-- Para el tamaño de todo -->
    </div>    <!-- Para que no se salga del contenido -->
 </form>
</section>
>>>>>>> master

@endsection
