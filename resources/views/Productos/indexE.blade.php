@extends('layout')
@section('contenido')

<section class="content-header">
    <h1>
      <a style="color:black;" href="{{ URL::current() }}"> 
        Administración de productos por empresa
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
        <div class="box-header">
          <h3 class="box-title">Datos</h3>
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
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              
                
                <th style="text-align: center;">Empresa</th>
                <th style="text-align: center;">Clasificación Productos</th>
              <th style="text-align: center;">Productos</th>         
 
            </tr>
            </thead>
           
            <tbody>
              
              <tr>
                @foreach ($empresas as $empresa)
              
                  <td >{{$empresa->NOMBRE}} </td>
                      <td style="text-align: center;">
                        <a href="{{route('CategoriaP.listar',$empresa->IDEMPRESA)}}">
                          <span name="ID" title="Ver las categorias de la empresa" class = "btn.bg-purple.btn-flat btn-xs " style="margin-right: 15px"> Listar </span></a>
  
                        <a href="{{route('CategoriaP.vistaCrear',$empresa->IDEMPRESA)}}"> 
                        <span name="ID" title="Crear categoria" class = "btn btn-success btn-xs glyphicon glyphicon-plus"> </span></a>
   
                    </td>
                  <td style="text-align: center;"> 
                    <a href="{{route('productos.listar',$empresa->IDEMPRESA)}}"> 
                      <span name="ID" title="Ver la lista de productos de la empresa" class = "btn btn-primary btn-xs glyphicon glyphicon-folder-open"> </span></a>

                      <a href="{{route('productos.Crear',$empresa->IDEMPRESA)}}"> 
                        <span name="ID" title="Agregar Producto" class = "btn btn-success btn-xs glyphicon glyphicon-plus"> </span></a>
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