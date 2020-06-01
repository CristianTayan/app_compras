@extends('layout')
@section('contenido')

<section class="content-header">
  <h1>
    <a style="color:black;" href="{{ URL::current() }}"> 
      Categorías de empresa
      </a>
    
    <small>Lista de categorías de empresas registradas  </small>
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
        <button class="btn btn-primary btn-sm pull-right" 
          onclick="location.href = '{{ route ('Cat_Empresas.vistaCrear') }}'">
         Agregar categoría
         <span  class="glyphicon glyphicon-plus"></span> 
        </button>
      </div>
        <div class="box-body">
         

          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              
              <th>Nombre</th>
              <th>Detalle</th>
              <th>Foto</th>
              
              <th>Acciones</th>
              <th>ACCIONES EMPRESA</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categorias as $categoria)
            <tr>
           
                <td>{{$categoria->NOMBRE}}
                </td>
            <td>{{$categoria->DETALLE}}</td>
            <td><img src="{{asset($categoria->FOTO)}}" style="width: 120px; height: 100px; object-fit: cover"></td>
            <td><a href=" {{route('editarCat',$categoria->IDCATEGORIA)}}"> 
            <span name="ID" title="Actualizar información " class="btn btn-primary btn-xs	glyphicon glyphicon-pencil"></span></a>
            <a onclick="return confirm('Desea eliminar')" href = " {{route('eliminarCat',$categoria->IDCATEGORIA)}}"> 
            <span title="Eliminar el registro "  class = "btn btn-danger btn-xs glyphicon glyphicon-trash"></span> </a>
                       </td>
            <td>
              <a href=" {{Route('Empresas.indexCat',$categoria->IDCATEGORIA)}}"> 
                <span title="Lista de empresas en la categoría" class="btn btn-primary btn-xs	glyphicon glyphicon-th-list"></span></a>
              <a  href = "{{Route('Empresas.agregarEmpCat',$categoria->IDCATEGORIA)}}"> 
                <span title="Agregar una empresa en la categoría" class = "btn btn-success btn-xs glyphicon glyphicon-plus"></span> </a>
                
                    </td>
                           
          </tr> 

            @endforeach           
          </table>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection