@extends('theme.templates.'.$Config_->nameDirectory.'.'.$Config_->themeTemplate)
@section('content-store-theme')
@include('theme.includes.defines')
<div class="header-filter contactus-3 bg-primary" style="background-image: url('{{asset('front/images/header.jpg')}}'); background-attachment: fixed background-repeat:   no-repeat;  background-position: top; height: 35vh;">
  <div class="page-header-image"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">

      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row pad-all">
    @include(JPATH_COMPONENTS . 'store.comp_offers.show')
  </div>
  <div class="row pad-all">
    @include(JPATH_COMPONENTS . 'store.comp_categories.filterProducts')
  </div>
</div>
@endsection