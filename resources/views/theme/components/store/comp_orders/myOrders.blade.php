@extends('theme.templates.'.$Config_->nameDirectory.'.'.$Config_->themeTemplate)
@section('content-store-theme')
@include('theme.includes.defines')
<br /><br /><br /><br /><br />
<div class="album pad-top bg-white ">
  <div class="container pad-top">
     <div class="row pad-all">

          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 col-sm-12 col pad-all "><h4 class="box-title">Mis Pedidos Realizados </h4></div> 
            </div>
            <?php $Meses_ = Array("Enero", "Febrero", "Marzo", "Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); ?>

<!--
            @if(sizeof($Orders_)>=1)
            @foreach($Orders_  as $Order)
            <div class="items_ row  myOrders">
              <div class="col-lg-4 pad-all">
                <span class="order" onclick='openDetailOrder({{$Order->id}});'># {{$Order->id}}</span>
                  @if($Order->idState==1)
                      @if ($Order->idStateOrder==1)
                      <span class="badge badge-solicitado-orden">Solicitado</span>
                      @endif
                      @if ($Order->idStateOrder==2)
                           <span class="badge badge-seleccion">En Seleccción</span>
                      @endif
                      @if ($Order->idStateOrder==3)
                           <span class="badge badge-rute">En ruta</span>
                      @endif
                      @if ($Order->idStateOrder==4)
                           <span class="badge badge-entregado">Entregado</span>
                      @endif
                 @endif
                 @if ($Order->idStateOrder==1)
                    @if($Order->idState==2)
                         <span class="badge badge-cancel-orden">Cancelado</span>
                    @endif
                @endif
              <br />
                <span class="address">Dirección Entrega : {{$Order->address}} <span class="comments">({{$Order->comments}})</span></span> 
              </div>

              <div class="col-lg-3 col pad-all">
                <span class="date-time">Fecha {{$Order->date_order}} <br />Hora Entrega {{$Order->time_order}}</span> 
              </div>
              <div class="col-lg-2 col pad-all text-center">
                <span class="title_orden">Total Orden</span><br />
                <span class="value_order">$ {{number_format((($Order->totOrder+$Order->send_value_cost)-$Order->cupon_value),2)}}
                </span>
              </div>

              <div class="col-lg-2 pad-all">
                  <i class="fas fa-eye viewDetail" onclick='openDetailOrder({{$Order->id}});'></i>
              </div>

              

                    
            </div>
            @endforeach
            @else
            @endif
          -->
                
          </div>
          
          <div class="col-lg-11 ">
               
               <div class="row">
                    <div class="box-body">
                    <table class="table table-responsive orders-details">
                         <tr class="header-table-orders">
                              <th ># </th>
                              <th>Direccion para entrega</th>
                              <th>Fecha entrega</th>
                              <th>Hora </th>
                              <th>Comentarios</th>
                              <th>Total Orden</th>
                              <th style="width: 40px">Estado</th>
                              <th></th>
                              <th></th>
                              <th></th>
                         </tr>
                        
                         @if(sizeof($Orders_)>=1)
                         @foreach($Orders_  as $Order)
                              <tr>
                                   <td><div onclick='openDetailOrder({{$Order->id}});'>#{{$Order->id}}</div></td>
                                   <td>{{$Order->address}}</td>
                                   <td>{{$Order->date_order}}</td>
                                   <td>{{$Order->time_order}}</td>
                                   <td>{{$Order->comments}}</td>
                                   <td>$ {{number_format((($Order->totOrder+$Order->send_value_cost)-$Order->cupon_value),2)}}</td>
                                   
                                   <td>
                                   
                                   @if($Order->idState==1)
                                        @if ($Order->idStateOrder==1)
                                        <span class="badge badge-solicitado">Solicitado</span>
                                        @endif
                                        @if ($Order->idStateOrder==2)
                                             <span class="badge badge-seleccion">En Seleccción</span>
                                        @endif
                                        @if ($Order->idStateOrder==3)
                                             <span class="badge badge-rute">En ruta</span>
                                        @endif
                                        @if ($Order->idStateOrder==4)
                                             <span class="badge badge-entregado">Entregado</span>
                                        @endif
                                   @endif
                                   
                              </td>
                                   <td>
                                        
                                   @if ($Order->idStateOrder==1)
                                        @if($Order->idState==2)
                                             <span class="badge badge-cancel">Cancelado</span>
                                        @else
                                             <div class="lni-cross-circle" onclick="orderCancel({{$Order->id}})" style="font-size:12px; font-weight:300;cursor:pointer"> Cancelar </div> 
                                        @endif
                                        
                                   @else
                                        <i>.</i>
                                   @endif
                                   </td>
                                   <td>
                                        <div class="showDetailCar" onclick='openDetailOrderCopy({{$Order->id}});'> 
                                             Repetir
                                        </div>
                                   </td>
                                   <td><div class="showDetailCar" onclick='openDetailOrder({{$Order->id}});'> 
                                        <img src="{{ asset('/content/upload/app/view_detail.svg') }}" style="vertical-align: middle; width:40px; height:40px;" viewBox="0 0 60 60"  />
                                   </div></td>
                              </tr>
                         @endforeach
                         @else
                              <tr >
                                   <td colspan="8" class="text-center footer-table-orders">Aun no ha realizado pedidos en nuestra tienda</td>
                                   
                              </tr>
                         @endif
                    
                    </table>

                    </div>
               </div>
          </div>


     </div>
     <br /><br /><br /><br /><br /><br />
  </div>
</div>


<!-- Modal -->
<div class="modal modal-right fade" id="modal-detail-product" tabindex="-1">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title text-center" style="font-size:13px;"><i class="lni-cart"></i> Detalle de la Compra {{$Config_->name_theme}}</h5>
     <button type="button" class="close" data-dismiss="modal">
          <i class="lni-close" style="cursor:pointer"></i>
     </button>
    </div>

    <div id="basket-empty" class="modal-body ">
      <div id="listcar-detail-products">
         
      </div>
    </div>
    
  </div>
  </div>
</div>
<!-- /.modal -->


@endsection