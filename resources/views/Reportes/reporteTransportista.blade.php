<style>

    table th {background-color: rgb(238, 239, 247); }
    
    table tr:nth-child(odd) {background-color: #fff;}
    
    table tr:nth-child(even) {background-color: #fff}
    
    </style>
    @foreach ($transportistas as $transportista)
        @php
            $nombre= $transportista->NOMBRES;
            $cedula= $transportista->CEDULA;

        @endphp
    @endforeach
    <h1  style="text-align: center"><B>Reporte de pedidos </B></h1>

    <b>Cédula :</b> {{$cedula}}
    <br>
    <br>
    <b>Nombre :</b> {{$nombre}}
    
    <br>
    <br>    
    <b>Fecha de inicio: </b> {{$INICIO}}
    <br>
    <br>
    <b>Fecha fin: </b> {{$FIN}}
    <br>
    <br>
    
    <table  cellspacing=0 bordercolor='black' border="1">
        <thead>
        <tr>
          <th>Cliente</th>
          <th>Dirección</th>
          <th>Empresa</th>
             
          <th>Fecha entrega</th>
          <th>Subtotal</th>
          <th>Costo de envio</th>
          <th>Total</th>  
         
        </tr>
        </thead>
        @php
                      $subtotalE=0;
                      $costoE=0;
                      $totalE=0;
                    @endphp
        <tbody>
            
        @foreach ($pedidos as $pedido)         
          <tr>
       
            @foreach($usuarios as $usuario)
            @if($pedido->IDUSUARIO == $usuario->IDUSUARIO)
          <td>{{$usuario->NOMBRE}}</td>
          @endif
          @endforeach  
          @foreach ($direcciones as $direccion)
          @if($pedido->IDDIRECCION == $direccion->IDDIRECCION)
              <td>{{$direccion->DIRECCION}} </td>  
          @endif    
          @endforeach
          @foreach ($empresas as $empresa)
              @if ($empresa->IDEMPRESA == $pedido->IDEMPRESA)
          <TD>{{$empresa->NOMBRE}}</TD>
              @endif
          @endforeach
            
         
          
          <td> {{$pedido->FECHA_ENTREGA}}</td> 
       
              <td>{{$pedido->SUBTOTAL}}</td>
          <td>{{ $pedido->COSTO_ENVIO }}</td>
          
          <td >{{$pedido->TOTAL}}</td>
         
          
            </tr> 
            @php
            $subtotalE+=$pedido->SUBTOTAL;
            $costoE+=$pedido->COSTO_ENVIO;
            $totalE+=$pedido->TOTAL;
          @endphp
          @endforeach    
          </tbody>
          <tfoot >
            <tr>
            
                <td style="border:none"></td>
              <td style="border:none"></td>
              <td style="border:none"></td>
              <td style="border:none" ><b>Totales</b></td>
              <td>{{$subtotalE}}</td>
            <td>{{$costoE}}</td>
            <td>{{$totalE}}</td>
              </tr> 
          </tfoot>
      </table>
      <h6 style="position: absolute; bottom: -40px; right: -10px;">Delivery-Ibarra </h6>