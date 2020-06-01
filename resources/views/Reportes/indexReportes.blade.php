@extends('layout')
@section('contenido')
<section class="content-header">
<div class="row"> 
  <div class="col-md-6"> 
      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title"> <b>Reportes</b> </h3>
  
    
              <div class="row">
                 <div class="box-header with-border">
                   <div class="col-md-9">
                    <h4 class="box-title">Reportes por empresas </h4>
  
                      <form target="_blank" action="{{Route('reporte1')}}">
                            <br>
                      <div class="col-md-3"></div>
                        <div class="col-md-9">
      
                         <select name="IDEMPRESA" class="form-control select2">
                      <option value="">Seleccione una empresa</option>
                      @foreach($empresas as $empresa)
                      
                      
                        <option value="{{$empresa->IDEMPRESA}}" >{{$empresa->NOMBRE}} </option>
                        @endforeach
                        </select> 
        
        
                          <label>Fecha inicio: </label>
                          <input name="INICIO" type="date" class="form-control" value="">
     
                           <label >Fecha fin:  </label>
                          <input name="FIN" type="date" class="form-control">
      
                          <div class="col-md-3"></div>
                            <div class="col-md-4">
                              <br>

                              <button  type="submit" class="btn btn-primary btn-lm"> 
                             <span class="glyphicon glyphicon-search"></span> Generar</button>
                            </div>                         
                   

                  </div>
                </form>
                </div>
              </div>

          
      



 
      <div class="box box-primary" >
          <div class="box-header with-border">
          
     <div class="col-md-9">
     
<br>
      <h4 class="box-title"> Reportes por transportista </h4>


  <form target="_blank" action="{{Route('reporte2')}}">
    <br>
    <div class="col-md-3"></div>
    <div class="col-md-9">
      <select name="IDTRANSPORTISTA" class="form-control select2">
        <option value="">Seleccione un transportista</option>
         @foreach($transportistas as $transportista)
                      
                      
         <option value="{{$transportista->IDTRANSPORTISTA}}" >{{$transportista->CEDULA}} </option>
                           @endforeach
                     
                           </select> 
        
      
        <label>Fecha inicio: </label>
      <input name="INICIO" type="date" class="form-control" value="">
                           
          
        
        <label >Fecha fin:  </label>
        <input name="FIN" type="date" class="form-control">
      </div>  


      <div class="col-md-3"></div>
<div class="col-md-6">
  <br>
<button  type="submit" class="btn btn-primary btn-lm"> 
  <span class="glyphicon glyphicon-search"></span> Generar</button>
  <br>
  <br>
    </div>
  </div>
</form>
</div>
</div> 


</section>

@endsection