@extends('theme.templates.'.$Config_->nameDirectory.'.'.$Config_->themeTemplate)
@section('content-store-theme')
@include('theme.includes.defines')
<br /><br /><br /><br /><br />
<div class="album pad-top bg-white ">
  <div class="container-fluid ">
     <div class="row pad-all">
          <div class="col-lg-1 pad-all "></div>
          <div class="col-lg-5 pad-all ">
          <section class="pad-all"  >
               <div id="FrmOrder" class="pad-all" name="formOrders" style="border:1px solid #DDD;">
               <div class="row pad-all">
                    <!-- Informacion para recibir mi pedido -->
                    <div class="col-12  pad-all ">

                         <div class="row pad-all ">
                              <div class="col-lg-12 text-left inf-user-shoping">Información para entrega</div>
                         </div>
                         
                         <div class="row pad-all">
                              <div class="col-12">
                                   <div class="text-left tit-info-finish-car" for="username">Dirección Entrega </div>
                                   <div class="form-group ">
                                        <!--<input id="address_order" type="text" name="address_order" class="form-control " placeholder="Dirección de entrega pedido" required value=""> -->

                                        <select id="address_order" name="address_order" class="form-control">
                                             @foreach($addresses_ as $dir)
                                                  <option value="{{$dir->addrees}}" >{{$dir->addrees}}</option>
                                             @endforeach
                                        </select>
                                   </div>
                                   <div style="margin-top:-12px">( <a href="{{ route('account.addresses') }}" style="color:blue">agregar nueva direccion de entrega</a> )</div>
                              </div>
                         </div>
                         <!---->
                        
                         <div class="row pad-all">
                              <div class="col-6">
                                  
                                   <div class="text-left tit-info-finish-car"  for="username">Fecha de Entrega</div>
                                   <div class="form-group ">
                                        <input class="form-control pull-right datepicker dev-calendar" type="text" id="datepicker" name="date_order" value="" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                                        <span class="sub-info-finish">Fecha para la cual desea se realice la entrega</span>
                                   </div>
                              </div>
                              <div class="col-6">
                                   <div class="text-left tit-info-finish-car" for="username">Horario disponible entrega</div>
                                   <div class="form-group ">
                                        <select class="form-control select-selection" id="time_order" name="time_order">
                                             @foreach($HourRanges_ as $Ranges_)
                                                  <option value='{{$Ranges_->range_initial}} : {{$Ranges_->range_final}}'>{{$Ranges_->range_initial}} : {{$Ranges_->range_final}}</option>
                                             @endforeach
                                        </select>
                                        <span class="sub-info-finish">Hora desde la cual podrias recibir el pedido</span>
                                   </div>
                              </div>
                         </div>
                         <!---->
                         <div class="row pad-all">
                              <div class="col-12">
                                   <div class="text-left tit-info-finish-car" for="username">Observaciones, para facilitar tu entrega</div>
                                   <div class="form-group ">
                                        <textarea class="form-control" id="obs_order" name="obs_order" rows="2" placeholder="Edificio, Casa, Apartamento, Oficina etc..." style="font-size:13px;color:#32536A;" ></textarea>
                                   </div>
                              </div>
                         </div>
                         <!---->
                         <div class="row pad-all">
                              <div class="col-12 text-right">
                                   <button id="updAccountUser" onclick="saveOrder()" class="btn-finish-car">Finalizar Pedido </button>
                              </div>
                         </div>
                         <!---->
                    </div>
                    <!-- detalle de la compra/carrito -->
                    <div class="col-6  pad-all ">
                         <div class="row pad-btm">
                         <div class="col-lg-12 pad-btm">
                              <div class="row pad-btm " style="font-size:14px; font-weight:bolder ">
                                   <div class="col-lg-12 text-center"></div>
                              </div>
                         </div>
                         </div>
                    </div>
                    <!-- detalle de la compra/carrito -->
               </div>

          </div>
          </section>

          </div>
          
          <!-- detalle del pedido --->
          <div class="col-lg-5 pad-all ">
          <section class="pad-all"  >
               <div id="FrmOrder" class="pad-all" name="formOrders" style="border:1px solid #DDD;">
                    <div class="row pad-all ">
                         <div class="col-lg-12 text-left inf-user-shoping">Detalle de la Compra.</div>
                         <!---->
                         <?php
                         $listCarProduc_ = array();
                         $listCarProduc_=$DataBasketResult_; 
                         $items_ =  count($listCarProduc_);

                         if($items_>=  1){
                              echo "<div class='panel-products-view ' style='height:63vh'  id='pnl-products-car' data-cantidad='".$items_."'>";
                              $acmSubtotal_ = 0; 
                              $acmTotal_ = 0; 
                              for ($i=0; $i < $items_; $i++) {
                                   $pathImg_ = '/content/upload/store/'.$listCarProduc_[$i]['imageProduct'];
                                   echo "<div class='container-fluid'>
                                   <div id='basket-products' class='row '>
                                        <div class='col-lg-4 col-md-4 col-xs-4 '><img src='".$pathImg_."' class='imgAttribute' width='90%' /></div>
                                        <div class='col-lg-8 col-md-8 col-xs-8 items' style='border-bottom:1px solid #F2F2F2' >
                                             
                                             <div class='options-item'>
                                                  <div class='editItemCar' onclick='openProduct(".$listCarProduc_[$i]['idProduct'].",".$listCarProduc_[$i]['idAttribute'].")'><i class='lni-pencil'></i></div>     
                                                  <div class='deleteItemCar' onclick='removeProduct(".$listCarProduc_[$i]['idProduct'].",".$listCarProduc_[$i]['idAttribute'].")'><i class='lni-cross-circle'></i></div>          
                                             </div>
                                             <div class='nameAttribute'>".$listCarProduc_[$i]['nameAttribute']."</div>
                                             <div class='unitAttribute'>".$listCarProduc_[$i]['nameCategory']."</div>
                                             <div class='unitAttribute'>( ".$listCarProduc_[$i]['quantityOrder']." X ".number_format($listCarProduc_[$i]['priceOrder'])." ) / <span class='priceAttribute'> $ ".number_format($listCarProduc_[$i]['totalOrder'],2)."</span></div>
                                             
                                        </div>
                                   </div></div>
                                   ";
                                   $acmSubtotal_=($acmSubtotal_+$listCarProduc_[$i]['totalOrder']);
                                   $acmTotal_=($acmTotal_+$listCarProduc_[$i]['totalOrder']);
                              // print($listCarProduc_[$i]['nameProduct']);
                              }
                              echo "</div>";
                         }
                         ?>
                         <!----->
                    </div>
               </div>
          </section >
          </div>
          
     
     </div>
     
  </div>


     <script>
        

     </script>


</div>
@endsection