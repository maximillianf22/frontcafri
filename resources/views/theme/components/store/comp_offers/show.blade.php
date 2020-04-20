<style type="text/css">
.col-centered {
    float: none;
    margin: 0 auto;
}

.carousel-control { 
    width: 8%;
    width: 0px;
}
.carousel-control.left,
.carousel-control.right { 
    margin-right: 40px;
    margin-left: 32px; 
    background-image: none;
    opacity: 1;
}
.carousel-control > a > span {
    color: white;
       font-size: 29px !important;
}

.carousel-col { 
    position: relative; 
    min-height: 1px; 
    padding: 5px; 
    float: left;
 }

 .active > div { display:none; }
 .active > div:first-child { display:block; }

/*xs*/
@media (max-width: 767px) {
  .carousel-inner .active.left { left: -50%; }
  .carousel-inner .active.right { left: 50%; }
     .carousel-inner .next        { left:  50%; }
     .carousel-inner .prev              { left: -50%; }
  .carousel-col                { width: 50%; }
     .active > div:first-child + div { display:block; }
}

/*sm*/
@media (min-width: 768px) and (max-width: 991px) {
  .carousel-inner .active.left { left: -50%; }
  .carousel-inner .active.right { left: 50%; }
     .carousel-inner .next        { left:  50%; }
     .carousel-inner .prev              { left: -50%; }
  .carousel-col                { width: 50%; }
     .active > div:first-child + div { display:block; }
}

/*md*/
@media (min-width: 992px) and (max-width: 1199px) {
  .carousel-inner .active.left { left: -33%; }
  .carousel-inner .active.right { left: 33%; }
     .carousel-inner .next        { left:  33%; }
     .carousel-inner .prev              { left: -33%; }
  .carousel-col                { width: 33%; }
     .active > div:first-child + div { display:block; }
  .active > div:first-child + div + div { display:block; }
}

/*lg*/
@media (min-width: 1200px) {
  .carousel-inner .active.left { left: -25%; }
  .carousel-inner .active.right{ left:  25%; }
     .carousel-inner .next        { left:  25%; }
     .carousel-inner .prev              { left: -25%; }
  .carousel-col                { width: 25%; }
     .active > div:first-child + div { display:block; }
  .active > div:first-child + div + div { display:block; }
     .active > div:first-child + div + div + div { display:block; }
}

.block {
     width: 306px;
     height: 230px;
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


<div class="item active">
                              <div class="carousel-col">
                       
               <div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="2500">
               <div class="carousel-inner">
               @foreach( $Offers_ as $index => $item)
               @if($index == 0)
               <div class="item active">
               <div id="product-{{$item->id}}" 
                    class="carousel-col"  style="padding:5px 7px !important"
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
               </div>
                @else
               <div class="item">
                <div id="product-{{$item->id}}" 
                    class="carousel-col"  style="padding:5px 7px !important"
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
                     <div class="left carousel-control">
                         <a href="#carousel" role="button" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                         </a>
                    </div>
                    <div class="right carousel-control">
                         <a href="#carousel" role="button" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                         </a>
                    </div>
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
$('.carousel[data-type="multi"] .item').each(function() {
     var next = $(this).next();
     if (!next.length) {
          next = $(this).siblings(':first');
     }
     next.children(':first-child').clone().appendTo($(this));

     for (var i = 0; i < 2; i++) {
          next = next.next();
          if (!next.length) {
               next = $(this).siblings(':first');
          }

          next.children(':first-child').clone().appendTo($(this));
     }
});
</script>


















<!-- Top content -->
