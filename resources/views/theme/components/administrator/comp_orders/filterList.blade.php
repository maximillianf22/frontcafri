<table id="result" class="table table-responsive table-app-content">
     <thead>
     <tr>
          <th class="text-center">#</th>
          <th class="text-center">Usuario</th>
          <th class="text-center">Negocio</th>
          <th class="text-center">Fecha<br />Pedido</th>
          <th class="text-center">Sugerida<br />entrega</th>
          <th class="text-center">Hora<br/>entrega</th>
          <th class="text-center">Total<br/>Pedido</th>
          <th class="text-center">Estado</th>
          <th class="text-center"></th>
     </tr>
     </thead>
     <tbody class="store-b-manager" >
     @if (count($dataOrders)>0)
          @foreach ($dataOrders as $orders)
          <tr class="" style="padding:1px; color:#000 !important " >
          <td class="" style="padding:10px !important; text-align:left;color:#000 !important">
               Ref-{{$orders->id}}
          </td>
          <td class="" style="padding:10px !important; text-align:left;color:#000 !important">
               {{$orders->nameUser}}
          </td>
          <td class="" style="padding:10px !important; text-align:left; color:#000 !important">
               {{$orders->nameBusiness}}
          </td>
          <td class="" style="padding:10px !important; text-align:left; color:#000 !important">
               {{substr($orders->created_at,0,10)}}
          </td>
          <td class="" style="padding:10px !important; text-align:left; color:#000 !important">
               {{substr($orders->date_order,6,4)}}-{{substr($orders->date_order,0,2)}}-{{substr($orders->date_order,3,2)}}
          </td>
          <td class="" style="padding:10px !important; text-align:left; color:#000 !important">
               {{$orders->time_order}}
          </td>
          <td class="" style="padding:10px !important; text-align:left;color:#000 !important">
               $ {{ number_format( (( $orders->totOrder+$orders->send_value_cost)-$orders->cupon_value), 2)}}
          </td>
          <td class="" style="padding:10px !important; text-align:left; color:#000 !important">
               @if ($orders->idStateOrder==1)
               <span class="badge badge-info">Solicitado</span>
               @endif
               @if ($orders->idStateOrder==2)
               <span class="badge badge-yellow">Proceso Seleccción</span>
               @endif
               @if ($orders->idStateOrder==3)
               <span class="badge badge-purple">En ruta</span>
               @endif
               @if ($orders->idStateOrder==4)
               <span class="badge badge-success" style='background:green'>Entregado</span>
               @endif
          </td>

          <td class="" style="padding:10px !important; text-align:center; font-weight:200; font-size:11px">
               <div class="jj-button-mini"><a href="{{route('admin.detail.order',[$orders->id])}}"> Detalle </a> </div>
          </td>
          </tr>
          @endforeach
     @else
          <tr>
          <td colspan="4" class="pad-all text-center">No se encontraron Ordenes creadas</td>
          </tr>
     @endif
     </tbody>
</table>
