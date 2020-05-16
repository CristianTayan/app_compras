@extends('layout')
@section('contenido')
@if (session('succes'))
            <div class="alert alert-success">
              {{session('succes')}}
            </div>
            @endif
  

<section class="content-header">
  <div class="box">
          
  
    <div class="box-header">
      <h3 class="box-title">Datos</h3>
      
    </div>
  
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Empresa</th>
          <th>Logo</th>
          <th>Verificar</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($empresas  as $empresa)
        <tr>
        <td>{{ $empresa->NOMBRE}}</td>
        
        <td><img src="{{asset($empresa->FOTO)}}"></td>
        
        <td><a href="{{route('Imagenes.verificar', $empresa->IDEMPRESA)}}">
          <span class="btn btn-primary btn-xs	glyphicon glyphicon-ok"></span></a>
        
          </tr> 
        @endforeach           
      </table>
    </div>
    <!-- /.box-body -->
  </div>

</section>
@endsection