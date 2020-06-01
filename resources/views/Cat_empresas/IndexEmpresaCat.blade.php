@extends('layout')
@section('contenido')

<section class="content-header">
      <a style="color:black ;" href="{{ URL::current() }}"> 
        @foreach($categorias as $categoria)
        <h3> Empresas registradas en la categoría :  {{$categoria->NOMBRE}} </h3>
        @endforeach
        </a>  
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
        <button class="btn btn-primary btn-sm pull-right" 
        onclick="location.href = '{{Route('Empresas.agregarEmpCat',$categoria->IDCATEGORIA)}}'">
       Agregar empresa
       <span  class="glyphicon glyphicon-plus"></span> 
      </button>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
                
            <thead>
            <tr>          
              <th>Nombre</th>
              <th>Dirección</th>
              <th>Horario</th>
            
              <th>Opciones</th>
 
            </tr>
            </thead>
            <tbody>
              
              <tr>
                @foreach ($empresas as $empresa)
                @php
                $cont=0;
                @endphp
                  <td>{{$empresa->NOMBRE}} </td>
                 
                  <td>{{ $empresa->DIRECCION }}</td>
                  @foreach($horarios as $horario)
                   
                  @if ($empresa->IDEMPRESA == $horario->IDEMPRESA)
                  <td>{{$horario->HORARIO_CONCAT}}
                    <a href="{{route('Horarios.vistaEditarHorario',$horario->IDHORARIO)}}"> 
                    <span title="Actualizar horario"><i class="fa fa-edit fa-lg"></i> </span>
                    </a> </td>
                  @php
                  $cont=1;
                  @endphp
                  @break
                   @endif
                 @endforeach

                 @if($cont==0)
                 <td><a href="{{route('Horarios.vistaCrearHorario',$empresa->IDEMPRESA)}}"> 
                  Agregar</a>
                 @endif
                
              <td>
              <a href="{{route('Empresas.vistaEditarCat',$empresa->IDEMPRESA)}}"> 
                  <span title="Actualizar registro" class="btn btn-primary btn-xs	glyphicon glyphicon-pencil"></span></a>
              <a onclick="return confirm('Desea eliminar')" href = "{{route('Empresas.eliminar',$empresa->IDEMPRESA)}}"> 
                  <span title="Eliminar registro"  class = "btn btn-danger btn-xs glyphicon glyphicon-trash" 
                  ></span> </a>  </td>
              
             
      
                </tr> 
              @endforeach       
            </tbody>
          </table>
          <button type ='button' class="btn btn-default " 
                onclick="location.href = '{{Route('categorias.index')}}'">
                <span class="glyphicon glyphicon-chevron-left"></span> Atrás </button>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection