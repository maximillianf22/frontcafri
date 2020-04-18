@extends('theme.templates.core.admin.admin_master')
@section('title', 'Ordenes Generadas')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="row"><div class="col-lg-12">
               <div class="title-section pad-all" style="font-size: 14px; font-weight: bold; padding: 15px 10px 2px 20px">Detalle Pedido # {{$Order->id}} / {{  $UserOrder_->nameUser}} {{$UserOrder_->lastnameUser}} ( {{$UserOrder_->nameBusiness}}) / {{ $UserOrder_->celularUser}} </div>
          </div></div>
     </div>
     <div class="content-body pad-all " style="padding:10px 10px 1px; margin:10px 20px 2px;" >
     <div class="container-fluid pad-all">

          <div class="row  "><div class="col-lg-12 ">
               <div class="head-section-component">
                    <div class="row ">
                         
                    </div>
               </div>
          </div></div>
          <div class="row ">
               <div class="col-lg-4 col-md-12 box-content-section " style="border-right:4px solid #F4F6F9" >
                    <div style="border:1px dashed #CCC; padding:10px">
                    <div class="row">
                         <div class="col-lg-12">
                         <h1 style="font-size:22px; font-weight:bold">ORDEN # {{$Order->id}} </h1>
                         </div>
                         <div class="col-lg-12">
                         <b style="font-size:10px;color:#999">CLIENTE  </b><br /><span style="font-size:14px">{{$Order->nameUser}} / {{$Order->nameBusiness}}</span>
                         </div>
                         <div class="col-lg-12">
                         <b style="font-size:10px;color:#999">DIRECCION </b><br /><span style="font-size:14px">{{$Order->address}}</span>
                         </div>
                         <div class="col-lg-12">
                         <b style="font-size:10px;color:#999">FECHA ENTREGA</b><br /><span style="font-size:14px">{{$Order->date_order}}</span>
                         </div>
                         <div class="col-lg-12">
                         <b style="font-size:10px;color:#999">HORA ENTREGA </b><br /><span style="font-size:14px">{{$Order->time_order}}</span>
                         </div>
                         <div class="col-lg-12"><br />
                         <b style="font-size:10px;color:#999">COMENTARIOS  </b><br /><span style="font-size:14px">{{$Order->comments}}</span>
                         </div>
                         <hr />
                         
                         <div class="col-lg-12"><br />
                         <b style="font-size:10px;color:#999">TELEFONO / CELULAR </b><br /><span style="font-size:14px">{{$UserOrder_->celularUser}}</span>
                         </div>
                         <div class="col-lg-12">
                         <b style="font-size:10px;color:#999">EMAIL </b><br /><span style="font-size:14px">{{$UserOrder_->email}}</span>
                         </div>
                    </div>
                    </div>
               </div>
               <div class="col-lg-5 col-md-12 box-content-section "  style="border-right:4px solid #F4F6F9" >
                    <div style="border:1px dashed #CCC; padding:10px">
                           
                    @include('theme.components.administrator.comp_orders.detailOrder');
                    </div>
               </div>
               <div class="col-lg-3 col-md-12 box-content-section pad-all" >
                    <div style="padding:10px">
                    <form id="FrmEditProduct" action="{{route('admin.update.pedido',[$Order->id])}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
                    @csrf
                    <label>Cambiar Estado</label>
                    @if($Order->idState==2)
                         <div class="col-lg-12 text-left" style="border:1px solid #FF0000">
                              Cancelado por el usuario
                         </div>
                    @else
                         <select name="EstadoPedido" class="form-control">
                              <option value="1">Recibido</option>
                              <option value="2">Proceso de Selección</option>
                              <option value="3">Pedido en ruta</option>
                              <option value="4">Entregado</option>
                         </select>
                         <br/>
                         <div class="col-lg-12 text-right">
                              <button id="addNewProduct" type="submit" class="btn btn-info ">Cambiar Estado</button>
                         </div>
                    @endif

                    
                    
                   
                    </form>
                    </div>
               </div>

          </div>

     </div>
     </div>
     <br />  <br />
     
</section>
@endsection
