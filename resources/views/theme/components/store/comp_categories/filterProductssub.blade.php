@if(sizeof($Store_categorie_)>=1)

<div class="grid-category center-grid-category">
     <div class="container-fluid ">
          <div class="container-fluid">
               @include('theme.components.store.comp_categories.searcProduct')
          </div>
          <div class="row wrapper  " style="border:none !important; font-size:14px ">
               <b style="border:none !important"> <a href="{{route('index')}}" style="color: inherit;">inicio</a>&nbsp;&nbsp; / &nbsp;&nbsp; <a href="{{ route('store.category.lisproduct',$slug) }}" target="_self">{{$slug}}</a> &nbsp;&nbsp; / &nbsp;&nbsp; {{$subslug}}
               </b>
          </div>
     </div>
</div>
@else
@endif

@if(sizeof($Products)>=1)
<div class="grid-products center-grid-products">
     <div id="filterProducts" class="container-fluid pad-lft pad-all " style="border-top:0px solid #F1F3F4">
          <div class="row pad-all">
               @foreach( $Products as $item)
               <div id="product-{{$item->id}}" class="col-6 col-md-2 col-sm-4  " style="padding:5px 7px !important" onclick="viewProduct( {{ $item->id }} )">
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
                              <img id="logoTheme" src="{{ asset('/content/upload/store/'.$item->imageProduct) }}" alt="Producto">
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
                              <div class="info-price ">
                                   <div class="item-price">$ {{ number_format($item->price, 0) }} {{$item->nameValue}} x {{$item->unidad_venta}}</div>
                                   @if($item->previous_price>=1)
                                   <div class="previous-price txt-center">Antes $ {{ number_format($item->previous_price, 0)}} {{$item->nameValue}}</div>
                                   @endif
                              </div>
                         </div>
                    </div>
               </div>
               @endforeach
          </div>
     </div>
</div>
<script>
     window.scrollTo(0, 420);
</script>

@else
@endif

<div class="modal center-modal fade show " style="overflow-y: scroll !important;" id="viewProduct" tabindex="-1">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-body">
                    <div id="info-modal-product">

                    </div>
               </div>
          </div>
     </div>
</div>