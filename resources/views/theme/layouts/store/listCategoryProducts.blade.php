@extends('theme.templates.'.$Config_->nameDirectory.'.'.$Config_->themeTemplate)
@section('content-store-theme')
@include('theme.includes.defines')
<div style="height:80px;"></div>
<div class="container-fluid">
     <div class="row pad-all" >
          @include(JPATH_COMPONENTS . 'store.comp_offers.show')
          @include(JPATH_COMPONENTS . 'store.comp_categories.filterProducts') 
     </div>
</div>
@endsection