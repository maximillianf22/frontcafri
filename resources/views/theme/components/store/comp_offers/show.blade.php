<style type="text/css">
     @media (min-width: 768px) {

    /* show 3 items */
    .carousel-inner .active,
    .carousel-inner .active + .carousel-item,
    .carousel-inner .active + .carousel-item + .carousel-item,
    .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item  {
        display: block;
    }
    
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item,
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
        transition: none;
    }
    
    .carousel-inner .carousel-item-next,
    .carousel-inner .carousel-item-prev {
      position: relative;
      transform: translate3d(0, 0, 0);
    }
    
    .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -25%;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    
    /* left or forward direction */
    .active.carousel-item-left + .carousel-item-next.carousel-item-left,
    .carousel-item-next.carousel-item-left + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    
    /* farthest right hidden item must be abso position for animations */
    .carousel-inner .carousel-item-prev.carousel-item-right {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    
    /* right or prev direction */
    .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
    .carousel-item-prev.carousel-item-right + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }

}
</style>

@if(sizeof($Offers_)>=1)
     <div class="mercado__title wrapper center txt-center">
          <h1>Ofertas del Día</h1>
     </div>
     <div class="grid-products center-grid-products">
          <!--
     <div class="store-search-result-totalProducts " style="text-align:right"><span> {{count($Offers_)}} <span class="c-muted-2">Productos encontrados</span></span></div>
-->

     <div class="container-fluid pad-lft pad-rgt pad-btm "  >
          <div class="row pad-all">


    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
               @foreach( $Offers_ as $index => $item)
               @if($index == 0)
               <div id="product-{{$item->id}}" 
                    class="carousel-item col-md-3 active"  style="padding:5px 7px !important"
                    onclick="viewProduct({{$item->id}})" >
                    <div class="sc-item-store ">
                         <div class="categorie"> 
                              <!-- <b >
                              {{$item->nameCategorie}}
                              </b> -->
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
                             <!-- <div class="">{{$item->cntbyUnit}}</div> -->
                              <div class="info-price " >
                                   <div class="item-price" style="text-align:center !important">
                                        $ {{ number_format($item->price, 0) }} {{$item->nameValue}} x {{$item->unidad_venta}}
                                   </div>
                                   @if($item->previous_price>=1)
                                        <div class="previous-price txt-center">Antes $ {{ number_format($item->previous_price, 0)}} {{$item->nameValue}}</div>
                                   @endif
                              </div>
                         </div>
                    </div>
               </div>
                @else
                <div id="product-{{$item->id}}" 
                    class="carousel-item col-md-3"  style="padding:5px 7px !important"
                    onclick="viewProduct({{$item->id}})" >
                    <div class="sc-item-store ">
                         <div class="categorie"> 
                              <!-- <b >
                              {{$item->nameCategorie}}
                              </b> -->
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
                             <!-- <div class="">{{$item->cntbyUnit}}</div> -->
                              <div class="info-price " >
                                   <div class="item-price" style="text-align:center !important">
                                        $ {{ number_format($item->price, 0) }} {{$item->nameValue}} x {{$item->unidad_venta}}
                                   </div>
                                   @if($item->previous_price>=1)
                                        <div class="previous-price txt-center">Antes $ {{ number_format($item->previous_price, 0)}} {{$item->nameValue}}</div>
                                   @endif
                              </div>
                         </div>
                    </div>
               </div>
               @endif
               @endforeach
               </div>
                 <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                      <i class="fa fa-chevron-left fa-lg text-muted"></i>
                      <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                      <i class="fa fa-chevron-right fa-lg text-muted"></i>
                      <span class="sr-only">Next</span>
                  </a>
               </div>
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

<script>
$('#carouselExample').on('slide.bs.carousel', function (e) {

    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 7;
    var totalItems = $('.carousel-item').length;
    
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});
</script>
