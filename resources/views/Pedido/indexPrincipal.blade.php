@extends('layout')
@section('contenido')

  
<section class="content-header">
    <h1>
      
      <a style="color:black;" href="{{ URL::current() }}"> 
        Pedidos 
        </a>
     

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
       
        <div class="row">
          <div class="col-md-4">
            <h4>Lista de pedidos en general</h4>
          </div>
         
      <div class="col-md-4">
        <a style="color:rgb(0, 186, 233); font-size:18px; " 
        title="Lista de pedidos enviados" href="{{Route('pedidosE')}}">
        Enviados &nbsp; &nbsp;<span class = "fa fa-paper-plane-o"></span> </a><br><br>

        <a style="color:rgb(79, 76, 138); font-size:18px; " 
        title="Lista de pedidos en proceso" href="{{Route('pedidosP')}}">
        En proceso &nbsp;&nbsp;<span class = "fa fa-hourglass-2"></span> </a><br><br>

        <a style="color:rgb(224, 142, 11); font-size:18px; " 
        title="Lista de pedidos en camino" href="{{Route('pedidosC')}}">
        En camino &nbsp; &nbsp;<span class = "fa fa-automobile"></span> </a><br>

        
       </div>
           <div class="col-md-4">
            <a style="color:rgb(87, 241, 115); font-size:18px; " 
            title="Lista de pedidos finalizados" href="{{Route('pedidosF')}}">
            Finalizados &nbsp; &nbsp;<span class = "fa fa-check"></span> </a><br><br>
    
            <a style="color:rgb(230, 92, 92); font-size:18px; " 
            title="Lista de pedidos anulados" href="{{Route('pedidosA')}}"> 
            Anulados &nbsp; &nbsp; <span class = "fa fa-ban"></span> </a><br>
           </div>
         
          <br>
          <br>
        </div>
        <br>
    
       <h4>Lista de pedidos por empresa</h4>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Empresa</th>
              <th>Pedidos enviados</th>
              <th>Pedidos en proceso</th>
              <th>Pedidos en camino</th>
              <th>Pedidos finalizados</th>
              <th>Pedidos anulados</th>
                
            </tr>
            </thead>
           
            <tbody>        
                @foreach ($empresas as $empresa)
              <tr>
                <td>
                    {{$empresa->NOMBRE}}
                  </td>
              <td style="text-align: center">
              <a href="{{Route('enviadosEmpresa',$empresa->IDEMPRESA)}}"> 
                  <span title="ver pedidos enviados" class="btn btn-primary btn-sm">Listar</span></a>
              </td>
              <td style="text-align: center">
                <a href="{{Route('enProcesoEmpresa',$empresa->IDEMPRESA)}}"> 
                  <span title="Ver pedidos en proceso" class="btn bg-purple btn-sm">Listar</span></a>
              </td style="text-align: center">
              <td style="text-align: center">
                <a href="{{Route('enCaminoEmpresa',$empresa->IDEMPRESA)}}"> 
                  <span title="Ver pedidos en camino" class="btn btn-warning btn-sm">Listar</span></a>
              </td>
              <td style="text-align: center">
                <a href="{{Route('finalizadosEmpresa',$empresa->IDEMPRESA)}}"> 
                  <span title="Ver pedidos finalizados" class="btn btn-success btn-sm">Listar</span></a>
              </td>
              <td style="text-align: center">
                <a href="{{Route('anuladosEmpresa',$empresa->IDEMPRESA)}}"> 
                  <span title="Ver pedidos anulados" class="btn btn-danger btn-sm">Listar</span></a>
              </td>
                </tr> 
              
              @endforeach    
              </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection