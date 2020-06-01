@extends('layout')
@section('contenido')
<section class="content-header">
   <div class="col-lg-3 col-xs-6">
     
      <div style="background-color: rgb(0, 186, 233);" class="small-box">
        <div class="inner">
         
        <h3>{{$total}}</h3>

          <p>Usuarios registrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{Route('Usuarios.index')}}" class="small-box-footer">
          Más información <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- numero de empresas -->
      <div style="background-color: rgb(162, 126, 212);" class="small-box box-red ">
        <div class="inner">
        <h3>{{$totalEmpresa}}</h3>
          <p>Empresas registradas</p>
        </div>
        <div class="icon">
          <i class="ion ion-briefcase"></i>
        </div>
        <a href="{{Route('Empresas.index')}}" class="small-box-footer">
          Más información <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    @php
     $productos=count($empresastop);   
    @endphp
    @if ($productos==8)
    <div class="col-md-6">
      <div class="box box-purple">
        <div class="box-header with-border">
          <h3 class="box-title">Top Productos</h3>

          <div class="box-tools pull-right">
            <span class="label label-danger">Top 10 productos</span>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
           
          </div>
        </div>
        <div class="box-body no-padding">
          <ul style="display: inline;" class="users-list ">
            <li>
              <img src="{{asset($empresastop[0]->FOTO)}}" style="width: 80px; height: 60px; object-fit: cover">
              <a class="users-list-name" href="#">{{$empresastop[0]->NOMBRE}}</a>
              <span class="users-list-date">1</span>
            </li>
            <li>
              <img src="{{asset($empresastop[0]->FOTO)}}" style="width: 80px; height: 60px; object-fit: cover">
              <a class="users-list-name" href="#">{{$empresastop[0]->NOMBRE}}</a>
              <span class="users-list-date">2</span>
            </li>
            <li>
              <img src="{{asset($empresastop[0]->FOTO)}}" style="width: 80px; height: 60px; object-fit: cover">
              <a class="users-list-name" href="#">{{$empresastop[0]->NOMBRE}}</a>
              <span class="users-list-date">3</span>
            </li>
            <li>
              <img src="{{asset($empresastop[0]->FOTO)}}" style="width: 80px; height: 60px; object-fit: cover">
              <a class="users-list-name" href="#">{{$empresastop[0]->NOMBRE}}</a>
              <span class="users-list-date">4</span>
            </li>
            <li>
              <img src="{{asset($empresastop[0]->FOTO)}}" style="width: 80px; height: 60px; object-fit: cover">
              <a class="users-list-name" href="#">{{$empresastop[0]->NOMBRE}}</a>
              <span class="users-list-date">5</span>
            </li>
            <li>
              <img src="{{asset($empresastop[0]->FOTO)}}" style="width: 80px; height: 60px; object-fit: cover">
              <a class="users-list-name" href="#">{{$empresastop[0]->NOMBRE}}</a>
              <span class="users-list-date">6</span>
            </li>
            <li>
              <img src="{{asset($empresastop[0]->FOTO)}}" style="width: 80px; height: 60px; object-fit: cover">
              <a class="users-list-name" href="#">{{$empresastop[0]->NOMBRE}}</a>
              <span class="users-list-date">7</span>
            </li>
            <li>
              <img src="{{asset($empresastop[0]->FOTO)}}" style="width: 80px; height: 60px; object-fit: cover">
              <a class="users-list-name" href="#">{{$empresastop[0]->NOMBRE}}</a>
              <span class="users-list-date">8</span>
            </li>
           
          </ul>
        </div>
        <div class="box-footer text-center">
          <a href="javascript:void(0)" class="uppercase">Todos los productos</a>
        </div>
      </div>
    </div>
    
        
    @else
    <div class="col-md-6">
      <div class="box box-purple">
        <div class="box-header with-border">
          <h3 class="box-title">Top Productos</h3>

          <div class="box-tools pull-right">
            <span class="label label-danger">Top 10 productos</span>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
           
          </div>
        </div>
        <div class="box-body no-padding">
          <div style="text-align: center;" >
            <img  src="{{asset($empresastop[0]->FOTO)}}" style="width: 80px; height: 60px; object-fit: cover">
            <a style="text-align: center;" class="users-list-name" href="#">No existe un top</a>
          </div>
            
              
             
          
           
          
        </div>
        <div class="box-footer text-center">
          <a href="javascript:void(0)" class="uppercase">Todos los productos</a>
        </div>
      </div>
    </div>
   
    @endif
    
 

</section>
@endsection