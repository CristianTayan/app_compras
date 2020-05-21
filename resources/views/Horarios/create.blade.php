@extends('layout')
@section('contenido')
<section class="content-header">
 <form method="get" action="{{ route('Horarios.registrar')}}">
        {{ csrf_field() }}
    <div class="row"> 
        <div class="col-md-12"> 
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <b>Registrar horario</b> </h3>
               </div> 
               <div class="row">
                   <div class="box-header with-border">
                       
                       
                      <div class="col-md-3">
                    
                          <h4 class="box-title">Información del horario </h4>
                   
                        </div>
                       
                        <div class="col-md-9">
                            @foreach ($horariosID as $id)
                   <input type="hidden" name="IDEMPRESA" value="{{$id->IDEMPRESA}}">
                       @endforeach
                    <label for="exampleInputEmail1">Dia inicio</label>
                     <select  name="DIA_INICIO" class="form-control">
                     <option >Lunes</option>
                     <option >Martes</option>
                     <option >Miércoles</option>
                     <option >Jueves</option>
                     <option >Viernes</option>
                     <option >Sábado</option>
                     <option >Domingo</option>
                       </select>  
                       <br>
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
                       <br>
                       <label>Hora inicio</label>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-clock"></i></span>
                         <input type="time" name="HORA_INICIO">
                       </div>
                       <br>
                       <label>Hora inicio</label>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-clock"></i></span>
                         <input type="time" name="HORA_FIN">
                       </div>
                       <br>
                        
                         </div>
                   </div>

               </div>
               
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar horario</button>
           </div>
         </div> <!-- Para que todo este dentro del mismo modelo -->      
       </div> <!-- Para el tamaño de todo -->  
    </div>    <!-- Para que no se salga del contenido -->  
 </form>
</section>     

@endsection
  