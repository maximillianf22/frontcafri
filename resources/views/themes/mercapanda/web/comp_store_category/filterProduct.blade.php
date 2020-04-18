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
          <br /><br /><br /><br />
          </div>