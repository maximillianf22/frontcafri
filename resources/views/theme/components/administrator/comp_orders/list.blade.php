@extends('theme.templates.core.admin.admin_master')
@section('title', 'Ordenes generadas')
@section('content-theme')
<section class="content-wrapper">
     
     <div class="content-body pad-all " style="padding:10px 10px 1px; margin:10px 20px 2px;" >
     <div class="container-fluid pad-all">

          <div class="row box-content-section "><div class="col-12">
               
                    <div class="row">
                         <div class="col-lg-5 col-md-12 pad-all ">
                              <div class="lbl-filter" >Buscar Pedido </div>
                              <input class=" jj-search " data-id="" data-slug=""  type="text" id="filterPedidoAll" name="filterPedidoAll" value="" placeholder="Ingresar Dato del Pedido" onkeyup="filterPedidoAll()" />
                         </div>
                         <div class="col-lg-4 col-md-12 pad-all ">
                             
                         </div>
                         <div class="col-lg-2 col-md-12 pad-all ">
                              <label>Ordernar Listado</label>
                              <select id="changedOrder" name="orderState" class="form-control" onchange="oStateOrder(this);">
                                   <option value="id"  ># Orden</option>
                                   <option value="nameUser"  >Usuario</option>
                                   <option value="nameBusiness"  >Nombre Negocio</option>
                                   <option value="created_at"  >Fecha Pedido</option>
                                   <option value="date_order"  >Fecha Sugerida</option>
                                   <option value="time_order"  >Hora Entrega</option>
                                   <option value="totOrder"  >Total Pedido</option>
                                   <option value="idStateOrder"  >Estado</option>
                              </select>
                         </div>
                         <div class="col-lg-1 col-md-1 pad-all ">
                              <label>.</label>
                              <select id="tOrder" name="tOrder" class="form-control" onchange="oStateOrder(this);">
                                   <option value="Asc">Asc</option>
                                   <option value="Desc">Desc</option>
                              </select>
                         </div>
                    </div>
              
          </div></div>
          <div class="row box-content-section "><div class="col-12"><div id="filterListOrders" class="">
          
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
                    <td class="" style="padding:10px !important; text-align:left; color:#000 !important">
                         Ref-{{$orders->id}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:left;color:#000 !important">
                         {{$orders->nameUser}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:left; color:#000 !important">
                         {{$orders->nameBusiness}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:left;color:#000 !important">
                         {{substr($orders->created_at,0,10)}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:left;color:#000 !important">
                         {{substr($orders->date_order,6,4)}}-{{substr($orders->date_order,0,2)}}-{{substr($orders->date_order,3,2)}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:left; color:#000 !important">
                         {{$orders->time_order}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:left; color:#000 !important">
                        @if($orders->totOrder>=$orders->monto_minimo)
                          @if( $orders->monto_minimo > 0)
                            ${{ number_format((( $orders->totOrder )-$orders->cupon_value), 0)}}
                          @else 
                            ${{ number_format((( $orders->totOrder + $orders->send_value_cost )-$orders->cupon_value), 0)}}
                          @endif 
                        @else
                          ${{ number_format( (( $orders->totOrder+$orders->send_value_cost)-$orders->cupon_value), 0)}}
                        @endif 
                    </td>
                    <td class="" style="padding:10px !important; text-align:left; color:#000 !important">
                         
                         @if ($orders->idStateOrder==1)
                        
                              @if($orders->idState==2)
                                   <span class="badge badge-cancel" style="border:1px solid #FF0000;color:#FF0000">Cancelado</span>
                              @else
                                   <span class="badge badge-info">Solicitado</span>
                              @endif

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

                         @if ($orders->idStateOrder==1)
                         
                             
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


          </div></div></div>

     </div>
     </div>
     <br />  <br />
     
</section>
@endsection
