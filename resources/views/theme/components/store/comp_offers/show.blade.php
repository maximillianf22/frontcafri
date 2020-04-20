

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



                       <div id="carousel-producto" class="carousel slide" data-ride="carousel">
                           <div class="carousel-inner row w-100 mx-auto" role="listbox">
               @foreach( $Offers_ as $index => $item)
               @if($index == 0)
               <div id="product-{{$item->id}}" 
                    class="col-6 col-md-2 col-sm-4 carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active"  style="padding:5px 7px !important"
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
                    class="col-6 col-md-2 col-sm-4 carousel-item col-12 col-sm-6 col-md-4 col-lg-3"  style="padding:5px 7px !important"
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
                           <a class="carousel-control-prev" href="#carousel-producto" role="button" data-slide="prev">
                               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                               <span class="sr-only">Previous</span>
                           </a>
                           <a class="carousel-control-next" href="#carousel-producto" role="button" data-slide="next">
                               <span class="carousel-control-next-icon" aria-hidden="true"></span>
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
    Carousel
*/
$('#carousel-producto').on('slide.bs.carousel', function (e) {
    /*
        CC 2.0 License Iatek LLC 2018 - Attribution required
    */
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 5;
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















<!-- Top content -->
