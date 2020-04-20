<style type="text/css">
     /*
    code by Iatek LLC 2018 - CC 2.0 License - Attribution required
    code customized by Azmind.com
*/
@media (min-width: 768px) and (max-width: 991px) {
    /* Show 4th slide on md if col-md-4*/
    .carousel-product-inner-product .active.col-md-4.carousel-product-item + .carousel-product-item + .carousel-product-item + .carousel-product-item {
        position: absolute;
        top: 0;
        right: -33.3333%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
}
@media (min-width: 576px) and (max-width: 768px) {
    /* Show 3rd slide on sm if col-sm-6*/
    .carousel-product-inner-product .active.col-sm-6.carousel-product-item + .carousel-product-item + .carousel-product-item {
        position: absolute;
        top: 0;
        right: -50%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
}
@media (min-width: 576px) {
    .carousel-product-item {
        margin-right: 0;
    }
    /* show 2 items */
    .carousel-product-inner-product .active + .carousel-product-item {
        display: block;
    }
    .carousel-product-inner-product .carousel-product-item.active:not(.carousel-product-item-right):not(.carousel-product-item-left),
    .carousel-product-inner-product .carousel-product-item.active:not(.carousel-product-item-right):not(.carousel-product-item-left) + .carousel-product-item {
        transition: none;
    }
    .carousel-product-inner-product .carousel-product-item-next {
        position: relative;
        transform: translate3d(0, 0, 0);
    }
    /* left or forward direction */
    .active.carousel-product-item-left + .carousel-product-item-next.carousel-product-item-left,
    .carousel-product-item-next.carousel-product-item-left + .carousel-product-item,
    .carousel-product-item-next.carousel-product-item-left + .carousel-product-item + .carousel-product-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    /* farthest right hidden item must be also positioned for animations */
    .carousel-product-inner-product .carousel-product-item-prev.carousel-product-item-right {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    /* right or prev direction */
    .active.carousel-product-item-right + .carousel-product-item-prev.carousel-product-item-right,
    .carousel-product-item-prev.carousel-product-item-right + .carousel-product-item,
    .carousel-product-item-prev.carousel-product-item-right + .carousel-product-item + .carousel-product-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}
/* MD */
@media (min-width: 768px) {
    /* show 3rd of 3 item slide */
    .carousel-product-inner-product .active + .carousel-product-item + .carousel-product-item {
        display: block;
    }
    .carousel-product-inner-product .carousel-product-item.active:not(.carousel-product-item-right):not(.carousel-product-item-left) + .carousel-product-item + .carousel-product-item {
        transition: none;
    }
    .carousel-product-inner-product .carousel-product-item-next {
        position: relative;
        transform: translate3d(0, 0, 0);
    }
    /* left or forward direction */
    .carousel-product-item-next.carousel-product-item-left + .carousel-product-item + .carousel-product-item + .carousel-product-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    /* right or prev direction */
    .carousel-product-item-prev.carousel-product-item-right + .carousel-product-item + .carousel-product-item + .carousel-product-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}
/* LG */
@media (min-width: 991px) {
    /* show 4th item */
    .carousel-product-inner-product .active + .carousel-product-item + .carousel-product-item + .carousel-product-item {
        display: block;
    }
    .carousel-product-inner-product .carousel-product-item.active:not(.carousel-product-item-right):not(.carousel-product-item-left) + .carousel-product-item + .carousel-product-item + .carousel-product-item {
        transition: none;
    }
    /* Show 5th slide on lg if col-lg-3 */
    .carousel-product-inner-product .active.col-lg-3.carousel-product-item + .carousel-product-item + .carousel-product-item + .carousel-product-item + .carousel-product-item {
        position: absolute;
        top: 0;
        right: -25%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
    /* left or forward direction */
    .carousel-product-item-next.carousel-product-item-left + .carousel-product-item + .carousel-product-item + .carousel-product-item + .carousel-product-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    /* right or prev direction //t - previous slide direction last item animation fix */
    .carousel-product-item-prev.carousel-product-item-right + .carousel-product-item + .carousel-product-item + .carousel-product-item + .carousel-product-item {
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



                       <div id="carousel-product-example" class="carousel-product slide" data-ride="carousel-product">
                           <div class="carousel-product-inner-product row w-100 mx-auto" role="listbox">
               @foreach( $Offers_ as $item)
               <div id="product-{{$item->id}}" 
                    class="col-6 col-md-2 col-sm-4 carousel-product-item col-12 col-sm-6 col-md-4 col-lg-3 active"  style="padding:5px 7px !important"
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
               @endforeach
               </div>
                           <a class="carousel-product-control-prev" href="#carousel-product-example" role="button" data-slide="prev">
                               <span class="carousel-product-control-prev-icon" aria-hidden="true"></span>
                               <span class="sr-only">Previous</span>
                           </a>
                           <a class="carousel-product-control-next" href="#carousel-product-example" role="button" data-slide="next">
                               <span class="carousel-product-control-next-icon" aria-hidden="true"></span>
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
     /*
    carousel-product
*/
$('#carousel-product-example').on('slide.bs.carousel-product', function (e) {
    /*
        CC 2.0 License Iatek LLC 2018 - Attribution required
    */
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 5;
    var totalItems = $('.carousel-product-item').length;
 
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-product-item').eq(i).appendTo('.carousel-product-inner-product');
            }
            else {
                $('.carousel-product-item').eq(0).appendTo('.carousel-product-inner-product');
            }
        }
    }
});
</script>















<!-- Top content -->
