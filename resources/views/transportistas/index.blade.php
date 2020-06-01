@extends('layout')
@section('contenido')
<section class="content-header">
    <h1>
      <a style="color:black;" href="{{ URL::current() }}"> 
        Transportistas
        </a>
      
      <small>Lista de transportistas</small>
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
        <button class="btn btn-primary btn-sm pull-right" 
      onclick="location.href = '{{Route('Transportistas.crear')}}'">
      Agregar transportista
      <span  class="glyphicon glyphicon-plus"></span></button>
        </div>
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
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>CEDULA</th>
              <th>NOMBRES</th>
              <th>PLACA</th>
              <th>FOTO</th>
              <th>ACCIONES</th>
              
            </tr>
            </thead>
            <tbody>
            @foreach ($transportistas as $transportista)         
              <tr>            
              <td>{{$transportista->CEDULA}}</td>
              <td>{{$transportista->NOMBRES}}</td>
              <td>{{$transportista->PLACA}}</td>
              <td>
                <img src="{{asset($transportista->FOTO)}}" style="width: 150px; height: 100px; object-fit: cover"></td>
              <td> <a href = "{{Route('Transportistas.editar',$transportista->IDTRANSPORTISTA)}}">  
                <span class="btn btn-primary btn-xs	glyphicon glyphicon-edit"></span></a>
              <a onclick="return confirm('Desea eliminar')" href = "{{Route('Transportistas.eliminar',$transportista->IDTRANSPORTISTA)}}"> 
                  <span class = "btn btn-danger btn-xs glyphicon glyphicon-trash" ></span> </a></td>
                </tr> 
                </tr> 
              
              @endforeach    
              </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection