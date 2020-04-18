@extends('themes.'.$Config_->name_theme.'.templates.store.master')
@section('content-theme')
<br />
@include('themes.'.$Config_->name_theme.'.web.comp_slider.slider')
<div class="album pad-top bg-white ">
  <div class="container pad-top">
    <div id="dataProducts_" data-basket="{{$StoreCookie_}}" data-section="1"></div>
   
    <!-- Section Promociones -->
    @include('themes.'.$Config_->name_theme.'.web.comp_store_offers.offers')
    <!-- End Section Promociones -->
    <br /><br />
    <!-- Section Categories -->
    @include('themes.'.$Config_->name_theme.'.web.comp_store_category.category_list')
    <br /><br /><br /><br />
    <!--  footer -->
    <!------------>
  </div>
  <script>
    var data_ = $("#dataProducts_").data("section");
    alert("json : "+data_);
    // showCarProduct();
  </script>
</div>
@endsection