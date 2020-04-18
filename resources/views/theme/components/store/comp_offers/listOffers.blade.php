@extends('theme.templates.'.$Config_->nameDirectory.'.'.$Config_->themeTemplate)
@section('content-store-theme')
@include('theme.includes.defines')
<br /><br /><br /><br /><br />
<div class="container-fluid">
     <div class="row ">
         
     @if(sizeof($Offers_)>=1)
     <div class="mercado__title wrapper center txt-center"> <h1>Ofertas del Día</h1> </div>
     <div class="grid-products center-grid-products">

     <!--
          <div class="store-search-result-totalProducts " style="text-align:right"><span> {{count($Offers_)}} <span class="c-muted-2">Productos encontrados</span></span></div>
     -->

     <div class="container-fluid pad-lft pad-rgt pad-btm " >
          <div class="row pad-all">
               @foreach( $Offers_ as $item)
               <div id="product-{{$item->id}}" 
                    class="col-6 col-md-2 col-sm-4"  style="padding:5px 7px !important"
                    onclick="viewProduct({{$item->id}})" >
                    <div class="sc-item-store ">
                         <div class="categorie"> 
                              <!--<b>
                              {{$item->nameCategorie}}
                              </b>-->
                              <div class="sticky "></div>
                         </div>
                         <div class="img-card-product-ql">
                              @if(!empty($item->imageProduct))
                                   @if (file_exists( public_path().'/content/upload/store/'.$item->imageProduct ))
                                        <img id="logoTheme" src="{{ asset('/content/upload/store/'.$item->imageProduct) }}" alt="Producto" >
                                   @else
                                        $item->imageProduct
                                   @endif
                              @else
                                   $item->imageProduct
                              @endif
                         </div>
                         <div class="info-article ">
                              <div class="name">{{$item->nameProduct}}</div>
                              <div class="info-price ">
                                   @if($item->previous_price>=1)
                                   <div class="previous-price">Antes $ {{ number_format($item->previous_price, 0)}} {{$item->nameValue}}</div>
                                   @endif
                                   <div class="item-price text-center ">$ {{ number_format($item->price, 0) }} {{$item->nameValue}}</div>
                              </div>
                         </div>
                    </div>
               </div>
               @endforeach
          </div>
     </div>
     </div>

     
     <div class="modal center-modal fade show " id="viewProduct" tabindex="-1">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-body">
                         <div id="info-modal-product">
                            
                         </div>
                    </div>
               </div>
          </div>
     </div>

@else
@endif 
         
     </div>
</div>
@endsection