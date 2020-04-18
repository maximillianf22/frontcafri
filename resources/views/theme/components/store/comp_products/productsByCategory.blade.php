 
<div class="row pad-all">
     @foreach( $Products as $item)
     <div id="product-{{$item->id}}" 
          class="col-6 col-md-2 col-sm-4 "  style="padding:5px 7px !important;  "
          onclick="viewProduct({{$item->id}})" >
          <div class="sc-item-store ">
               <div class="categorie"> 
                   <!-- <b>
                    {{$item->nameCategorie}}
                    </b> -->
                    <!-- <div class="sticky "></div> -->
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
                              <div class="previous-price txt-center">Antes $ {{ number_format($item->previous_price, 0)}} {{$item->nameValue}}</div>
                         @endif
                         <div class="item-price">$ {{ number_format($item->price, 0) }} {{$item->nameValue}} x {{$item->unidad_venta}}</div>


                          
                    </div>
               </div>
          </div>
     </div>
     @endforeach
</div>
 