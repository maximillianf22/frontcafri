
@if(sizeof($Offers_)>=1)
     <div class="content-fluid">
     <div class="row text-center pad-btm" >
          <div class="col-lg-12 text-center "><h3 style="margin:1px; ">OFERTAS DEL DIA</h3></div>
          <div class="col-lg-12 text-center" style="font-size:14px;">Los mejores precios para ti y tu negocio</div>
     </div>
     </div>

     <div class="catalogue-categories-container pad-all" style="border-top:1px dashed #DDD">
     <div class="products-thumbnail-grid">

          @foreach( $Offers_ as $item)
          <div id="product-{{$item->id}}" class="sc-item-store box-shadow" onclick="openProduct({{$item->idProduct}},{{$item->idAttribute}})">
               <div class="categorie"> 
                    <b style="border-bottom:1px dashed #DDD;color:#000; padding:5px;">
                    {{$item->nameCategorie}}
                    </b>
               </div>
               <div class="sticky "></div>
               
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
                    
                    @if(Auth::check())
                         @if(!empty(Auth::User()->nameBusiness))
                              <?php $priceProducto_= $item->pricecomerceProduct ?>
                         @else
                              <?php $priceProducto_= $item->priceProduct ?>
                         @endif
                    @else
                         <?php $priceProducto_= $item->priceProduct ?>
                    @endif


                    <div class="name">{{$item->nameProduct}}</div>
                    <div class="info-prices">
                         @if(($item->cnt_attributes)>=2)
                              <div class="item-price">Desde $ {{ number_format($priceProducto_, 0) }} {{$item->nameValue}}</div>
                              <div class="previous-price" style="color:#FFF !important">.</div>
                         @else
                              <div class="item-price">$ {{ number_format($priceProducto_, 0) }} {{$item->nameValue}}</div>
                              @if($item->previous_price>=1)
                                   <div class="previous-price">Antes $ {{ number_format($item->previous_price, 0)}} {{$item->nameValue}}</div>
                              @else
                                   <div class="previous-price" style="color:#FFF !important">.</div>
                              @endif
                         @endif
                    </div>
                                          
               </div>
          </div>
          @endforeach

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

@else
@endif 