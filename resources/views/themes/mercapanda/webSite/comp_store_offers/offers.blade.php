<div class="row pad-btm " style="border-bottom:1px dashed #9EB93480 !important ">
     <div class="col-lg-12 title-section text-center">OFERTAS DEL DIA</div>
     <div class="col-lg-12 info-section text-center">Las mejores precios para tu negocio</div>
</div>

<div class="products-thumbnail-grid">
    <div clas="sc-gisBJw1 eZmaBI">
 
          @if(sizeof($Offers_)>=1)
               @foreach( $Offers_ as $item)
               <div class="sc-item-store box-shadow">
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
                         <div class="name">{{$item->nameProduct}}</div>
                         <div class="item-price">$ {{ number_format($item->priceProduct, 2) }} x {{$item->nameValue}}</div>
                         <div class="previous-price">Antes $ {{ number_format($item->previous_price, 2)}} {{$item->nameValue}}</div>
                    </div>
               </div>

               @endforeach
          @else

          @endif  

    </div>
  </div>