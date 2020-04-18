@extends('theme.templates.'.$Config_->nameDirectory.'.'.$Config_->themeTemplate)
@section('content-store-theme')
@include('theme.includes.defines')
@include(JPATH_COMPONENTS . 'core.comp_slider.index')
<div class="container-fluid">
     <div class="row ">
         @include(JPATH_COMPONENTS . 'store.comp_offers.show')
         @include(JPATH_COMPONENTS . 'store.comp_categories.show')
     </div>
</div>
@endsection