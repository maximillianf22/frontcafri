@extends('themes.'.$Config_->name_theme.'.templates.'.$Config_->templateDefault.'.master')
@section('content-theme')
<div class="album pad-top bg-white ">
  <div class="container pad-top">
     
     <div class="row pad-btm " style="border-bottom:1px dashed #9EB93480 !important ">
          <div class="col-lg-12 title-section text-center">OFERTAS DEL DIA</div>
          <div class="col-lg-12 info-section text-center">Las mejores precios para tu negocio</div>
     </div>

     <div class="products-thumbnail-grid">
     <div clas="sc-gisBJw1 eZmaBI">

               @if(sizeof($Offers_)>=1)
                    @foreach($Offers_ as $item)
                    <div id="product-{{$item->id}}" class="sc-item-store box-shadow" onclick="openProduct({{$item->idProduct}},{{$item->idAttribute}})">
                         <div class="sticky shadow"></div>
                         <div class="item-categorie pad-top">{{$item->nameCategorie}}</div>
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
                         <div class="info-article">
                              
                              {{$item->cnt_atttributes}}
                              @if(($item->cnt_attributes)>=2)
                                   <div class="item-price">Desde $ {{ number_format($item->priceProduct, 2) }} x {{$item->nameValue}}</div>
                                   <div class="previous-price" style="color:#FFF !important">.</div>
                              @else
                                   <div class="item-price">$ {{ number_format($item->priceProduct, 2) }} x {{$item->nameValue}}</div>
                                   <div class="previous-price" style="color:#FE5153 !important">Antes $ {{ number_format($item->previous_price, 2)}} {{$item->nameValue}}</div>
                              @endif                         
                         </div>
                    </div>

                    @endforeach
               @else

               @endif  
               <br /><br /><br /><br />
     </div>
     </div>

<div class="modal center-modal fade" id="view-product" tabindex="-1">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-body">
                    <div id="info-modal-product">
                         
                    </div>
               </div>
          </div>
     </div>
</div>





  </div>
</div>
@endsection