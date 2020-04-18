@extends('themes.'.$Config_->name_theme.'.templates.store.master')
@section('content-theme')
<br />
<div class="album pad-top bg-white ">
  <div class="container pad-top">
     <div class="row ">
          <div class="col-lg-6 text-center ">
          <section  >
          <!--<form id="FrmAccount" action="{{route('store.checkout.finish')}}" method="post"  name="formAccount" files="true" enctype="multipart/form-data">-->
          <div id="FrmOrder" name="formOrders">
               <div class="row  pad-all">
                    <!-- Informacion para recibir mi pedido -->
                    <div class="col-12 bd_ pad-all ">
                         <div class="row pad-btm">
                         <div class="col-lg-12 pad-btm">
                              <div class="row pad-btm " style="font-size:14px; font-weight:bolder ">
                                   <div class="col-lg-12 text-left">Información para entrega</div>
                              </div>
                         </div>
                         </div>
                         <!---->
                         <div class="row">
                              <div class="col-12">
                                   <div class="text-left" style="color:#444;font-size:12px" for="username">Dirección Entrega</div>
                                   <div class="form-group ">
                                        <input id="address_order" type="text" name="address_order" class="form-control " placeholder="Dirección de entrega pedido" required value="">
                                   </div>
                              </div>
                         </div>
                         <!---->
                         
                         <div class="row">
                              <div class="col-5">
                                   <div class="text-left" style="color:#444;font-size:12px" for="username">Fecha de Entrega</div>
                                   <div class="form-group ">
                                   <input class="form-control pull-right datepicker dev-calendar" type="text" id="date_order" name="date_order" value="" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>

                                   <span style="font-size:11px;color:#32536A; line-height:11px; padding:2px; text-align:left">Fecha para la cual desea se realice la entrega</span>
                                   </div>
                              </div>
                              <div class="col-5">
                                   <div class="text-left" style="color:#444;font-size:12px"  for="username">Horario disponible entrega</div>
                                   <div class="form-group ">
                                        <select class="form-control select-selection" id="time_order" name="time_order">
                                             <option value='08:00 AM'>08:00 AM</option>
                                             <option value='09:00 AM'>09:00 AM</option>
                                             <option value='10:00 AM'>10:00 AM</option>
                                             <option value='11:00 AM'>11:00 AM</option>
                                             <option value='01:00 PM'>01:00 PM</option>
                                             <option value='02:00 PM'>02:00 PM</option>
                                             <option value='03:00 PM'>03:00 PM</option>
                                             <option value='04:00 PM'>04:00 PM</option>
                                             <option value='05:00 PM'>05:00 PM</option>
                                        </select>
                                        <span style="font-size:11px;color:#32536A; line-height:11px; padding:2px; text-align:left">Hora desde la cual podrias recibir el pedido</span>
                                   </div>
                              </div>
                         </div>
                         <!---->
                         <div class="row">
                              <div class="col-12">
                                   <div class="text-left" style="color:#444;font-size:12px"  for="username">Observaciones, para facilitar tu entrega</div>
                                   <div class="form-group ">
                                        <textarea class="form-control" id="obs_order" name="obs_order" rows="2" placeholder="Agregar Comentarios ..." style="font-size:13px;color:#32536A;" ></textarea>
                                   </div>
                              </div>
                         </div>
                         <!---->
                         <div class="row">
                              <div class="col-12 text-center">
                                   <button id="updAccountUser" onclick="saveOrder()" type="btn" class="btn btn-success brd-radius ">Finalizar mi Pedido </button>
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
          <div class="col-lg-1 text-center "></div>
          
          <!-- detalle del pedido --->
          <div class="col-lg-5  ">
              <!--
               <div class="row">
                    <div class="col-lg-12 pad-btm">
                         <div class="row pad-btm " >
                              <div class="col-lg-12 text-left"><b>Detalle de mi Pedido</b></div>
                         </div>
                    </div>
               </div>
               -->
               
               <div class="row ">
                    
               </div>
               
          </div>
     
     </div>
     <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
  </div>
</div>

@endsection