@extends('layout')
@section('contenido')

<section class="content-header">
    <h1>
      <a style="color:black;" href="{{ URL::current() }}"> 
        Empresas registradas
        </a>
     
      <small>Lista de empresas</small>
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
          @php
          $cont=0;
          @endphp
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
          onclick="location.href = '{{ route('Empresas.vistaCrear') }}'">
         Agregar empresa
         <span  class="glyphicon glyphicon-plus"></span> 
        </button>

        </div>
       
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
           
            <thead>
            <tr>          
              <th>Nombre</th>
              <th>Dirección</th>
              <th>Horario</th>
              <th>Estado</th>
              <th>Imagen/Logo</th>

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
                    @if($empresa->ESTADO == "S")
                    <a  onclick="return confirm('Cambiar estado a INACTIVO a :{{$empresa->NOMBRE}}');"  href = "{{route('Empresas.cambiarEstadoEmpresa',$empresa->IDEMPRESA)}}"> 
                      Activo
                      <span  title="Cambiar estado a INACTIVO"  class = "fa fa-check" 
                      ></span> </a>
                    
                    @else
                    <a   onclick="return confirm('Cambiar estado a ACTIVO a :  {{$empresa->NOMBRE}}');" style="color:rgb(248, 151, 131 );" title="Cambiar estado a ACTIVO" href = "{{route('Empresas.cambiarEstadoEmpresa',$empresa->IDEMPRESA)}}">
                     Inactivo
                      <span title="Cambiar estado a ACTIVO"  class = "fa fa-remove" 
                      ></span> </a>
                   @endif  
                    </td>
                 
                    <td><img src="{{asset($empresa->FOTO)}}" style="width: 150px; height: 100px; object-fit: cover">

              <td>

              <a href="{{route('Empresas.vistaEditar',$empresa->IDEMPRESA)}}"> 
                  <span title="Actualizar registro" class="btn btn-primary btn-xs	glyphicon glyphicon-edit"></span></a>
              <a onclick="return confirm('Desea eliminar')" href = "{{route('Empresas.eliminar',$empresa->IDEMPRESA)}}"> 
                  <span title="Eliminar registro"  class = "btn btn-danger btn-xs glyphicon glyphicon-trash" 
                 ></span> </a>   </td>
                </tr> 
              @endforeach       
            </tbody>
          </table>
          
        </div>
      </div>
</section>
@endsection