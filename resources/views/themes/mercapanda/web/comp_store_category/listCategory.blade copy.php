@extends('themes.'.$Config_->name_theme.'.templates.'.$Config_->templateDefault.'.master')
@section('content-theme')
<br />
<div class="album pad-top bg-white ">
  <div class="container pad-top">
     @include('themes.'.$Config_->name_theme.'.web.comp_store_category.category_list')
     <div class="catalogue-categories-container ">
     <div class="row ">
          <div class="col-lg-12 title-section text-center pad-top"><h3>{{$slug}}</h3></div>
          <div class="col-lg-12 text-center ">{{$dataCategorie->description}}</div>
     </div>
     </div>

     <div class="catalogue-categories-container pad-lft pad-rgt">
          <div class="row pad-lft">
               <div class="col-lg-6 pad-all text-right" >
                   <h4 class="pad-top">Buscar Producto </h4>
               </div>
               <div class="col-lg-6 pad-all" >
                    <input class="searchProduct" data-id="{{$dataCategorie->id}}" data-slug="{{$slug}}" style="height:40px; margin:0 auto !important; width:90% !important; padding:7px 20px !important; border:1px solid #D9D9D9 !important; border-radius:20px;" type="text" id="searchProduct" name="searchProduct" value="" placeholder="Ingresa nombre del Producto a buscar" onkeyup="searchProduct()" />
               </div>
          </div>

          <div id="filterProducts" class="products-thumbnail-grid " style="min-height:200px;">
          <div clas="sc-gisBJw1 eZmaBI">

          @if(sizeof($Products)>=1)
               @foreach($Products as $item)
               <div id="product-{{$item->id}}" class="sc-item-store box-shadow" onclick="openProduct({{$item->idProduct}})">

                    @if($item->isOffers==1)
                         <div class="sticky shadow"></div>
                    @endif
                    
                    <div class="img-card-product-ql">
                         @if(!empty($item->imageProduct))
                              @if (file_exists( public_path().'/content/upload/store/'.$item->imageProduct ))
                                   <img id="logoTheme" src="{{ asset('/content/upload/store/'.$item->imageProduct) }}" alt="Producto" >
                              @else
                                   
                              @endif
                         @else
                              
                         @endif
                    </div>
                    <div class="info-article">
                         <div class="name">{{$item->nameProduct}}</div>
                         {{$item->cnt_atttributes}}
                         @if(($item->cnt_attributes)>=2)
                              <div class="item-price">Desde $ {{ number_format($item->priceProduct, 0) }} x {{$item->unidad_venta}}</div>
                              <div class="previous-price" style="color:#FFF !important">.</div>
                         @else
                         @if(Auth::user())
                                   @if(Auth::User()->isCommerce==1)
                                        <div class="item-price">$ {{ number_format($item->pricecomerceProduct, 0) }} x {{$item->unidad_venta}}</div>
                                        @if($item->previous_price_comerce>0)
                                             <div class="previous-price">Antes $ {{ number_format($item->previous_price_comerce, 0)}} {{$item->unidad_venta}}</div>
                                        @else
                                             <div class="previous-price" style="color:#FFF !important ">.</div>
                                        @endif
                                   @else
                                        <div class="item-price">$ {{ number_format($item->priceProduct, 0) }} x {{$item->unidad_venta}}</div>
                                        @if($item->previous_price>0)
                                             <div class="previous-price">Antes $ {{ number_format($item->previous_price, 0)}} {{$item->unidad_venta}}</div>
                                        @else
                                             <div class="previous-price" style="color:#FFF !important ">.</div>
                                        @endif
                                   @endif
                              @else
                                   <div class="item-price">$ {{ number_format($item->priceProduct, 0) }} x {{$item->unidad_venta}}</div>
                                   @if($item->previous_price>0)
                                        <div class="previous-price">Antes $ {{ number_format($item->previous_price, 0)}} {{$item->unidad_venta}}</div>
                                   @else
                                        <div class="previous-price" style="color:#FFF !important ">.</div>
                                   @endif
                              @endif
          
                         @endif                         
                    </div>
               </div>

               @endforeach
          @else

          @endif  
          <br /><br />
          <div class="row">
          <div class="col-lg-12 text-center">
         
          </div></div>
          <br /><br /><br />
          </div>
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