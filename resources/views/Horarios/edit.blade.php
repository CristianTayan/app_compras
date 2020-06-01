@extends('layout')
@section('contenido')
<section class="content-header">
    @foreach ($horarios as $horario)
 <form method="get" action="{{ route('Horarios.actualizar')}}">
        {{ csrf_field() }}
    <div class="row"> 
        <div class="col-md-12"> 
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <b>Actualizar horario</b> </h3>
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
                    
                          <h4 class="box-title">Información del horario </h4>
                   
                        </div>
                       
                        <div class="col-md-6">
                            
                            <input type="hidden" name="IDHORARIO" value="{{$horario->IDHORARIO}}">
                    
                       
                       <div class="row">
                        <h4 class="box-title">Día </h4> <br><br>
                         <div class="col-md-6">
                          <label >Inicio</label>
                     <select  name="DIA_INICIO" class="form-control select2" id="diaInicio">
                     <option value="{{$horario->DIA_INICIO}}" selected>{{$horario->DIA_INICIO}}</option>
                     <option value="Lunes">Lunes</option>
                     <option value="Martes">Martes</option>
                     <option value="Miércoles">Miércoles</option>
                     <option value="Jueves">Jueves</option>
                     <option value="Viernes">Viernes</option>
                     <option value="Sábado">Sábado</option>
                     <option value="Domingo" >Domingo</option>
                       </select>  
                         </div>
                         <div class="col-md-6">
                          <label >Fin</label>
                     <select  name="DIA_FIN" class="form-control select2" id="diaFin" >
                        <option value="{{$horario->DIA_FIN}}" selected>{{$horario->DIA_FIN}}</option>
                       </select>  
                         </div>
                        <br><br>
                        
                       </div>
                       <br><br>
                       <div class="row">
                        <h4 class="box-title">Hora</h4><br><br>
                         <div class="col-md-6">
                          
                          <label>Inicio</label>
                         <input type="time" name="HORA_INICIO" value="{{$horario->HORA_INICIO}}" class="form-control" id="horaInicio" >
                         </div>
                         <div class="col-md-6">
                          <label>Fin</label>
                          <input type="time" name="HORA_FIN" value="{{$horario->HORA_FIN}}" class="form-control" id="horaFin" >
                         </div>
                        
                        
                       </div>

                         </div>
                   </div>

               </div>
               
            <div class="box-footer">
                <button type ='button' class="btn btn-danger btn-sm" 
                onclick="location.href = '{{Route('Empresas.index')}}'">
                <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" class="btn btn-primary btn-sm pull-right">
                    <span class="glyphicon glyphicon-floppy-saved"></span>Guardar horario</button>
           </div>
         </div> <!-- Para que todo este dentro del mismo modelo -->      
       </div> <!-- Para el tamaño de todo -->  
    </div>    <!-- Para que no se salga del contenido -->  
 </form>
 @endforeach
</section>     

@endsection