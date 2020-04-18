@extends('themes.'.$Config_->name_theme.'.templates.'.$Config_->templateDefault.'.master')
@section('content-theme')
<br />
@include('themes.'.$Config_->name_theme.'.web.comp_slider.slider')
<div class="album bg-white " style="margin-top:-60px">
  <div class="container ">
    <div id='dataStoreCar' class="pad-all" data-json="empty" ></div>

    <!-- Section Promociones -->
    @include('themes.'.$Config_->name_theme.'.web.comp_store_offers.offers')
    <!-- End Section Promociones -->
    <!-- Section Categories -->
    @include('themes.'.$Config_->name_theme.'.web.comp_store_category.category_list')
    
    <!-- Section List Products  -->
    {{-- @include('themes.'.$Config_->name_theme.'.web.comp_store_products.all') --}}
    <br /><br />
    <!--  footer -->
    <!------------>
  </div>
</div>

<style>
.btn_whatsapp, btn_whatsapp:active {
  position: fixed;
  z-index: 999;
  bottom: 10px;
  right: 10px;
  background-color: #25d366;
  color: #fff;
  padding: 10px 25px;
  font-size: 13px;
  border-radius: 50px;
  font-weight: bold;
}
.btn_whatsapp a:hover, btn_whatsapp:active {
  color:#FFF !important
}
</style>
<a href="https://api.whatsapp.com/send?phone=573225688683&amp;text=Hola,%20deseo%20realizar%20un%20nuevo%20pedido%20" class="btn_whatsapp" target="_blank">
  <i class="lni-whatsapp" aria-hidden="true"></i> Pedido rápido
</a>

@endsection