@extends('themes.administrator.template.index')
@section('title', 'Gestionar Pedido')

@section('content-theme')
  <section class="content-wrapper">
    <section class="content-header">
      <h4>Detalle Pedido # {{$Order->id}} / {{  $UserOrder_->nameUser}} {{$UserOrder_->lastnameUser}} ( {{$UserOrder_->nameBusiness}}) / {{ $UserOrder_->celularUser}}</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="breadcrumb-item active"></li>
      </ol>
    </section>

      <section class="content">
      <div class="box">
        
        <div class="box-header with-border">
          <div class="row align-items-center">
            <div class="col-6">
              <h4 class="box-title"></h4>
            </div>
            <div class="col-6">
              <div class="box-controls pull-right">
                <div class="box-header-actions"></div>
              </div>
            </div>
          </div>
        </div>
       
        <div class="box-body">
          <div class="row  pad-all">
            <div class="col-lg-7  pad-all">
             <div class="pad-all">
               Cliente / Negocio : {{  $UserOrder_->nameUser}} ( {{  $UserOrder_->nameBusiness}} )<br />
               Celular : {{  $UserOrder_->celularUser}}<br />
               Direccion : {{  $Order->address}}<br />

             </div>
              @include('themes.administrator.mod-store.orders.detailOrder')
            </div>
            <div class="col-lg-4  pad-all">
              <form id="FrmEditProduct" action="{{route('admin.update.pedido',[$Order->id])}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
               @csrf
                <label>Cambiar Estado</label>
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
                  </form>
            </div>
          </div>


        </div>
    </div>
    </section>
  </section>
@endsection
