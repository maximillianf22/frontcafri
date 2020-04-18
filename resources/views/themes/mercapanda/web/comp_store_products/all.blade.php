<div class="catalogue-categories-container ">
<div class="container-fluid">
<div class="row">
     <div class="col-lg-6 pad-left" >
          <div class="row pad-left">
               <div class="col-lg-12 pad-left" style="font-size:18px; font-weight:bold">Productos Disponibles</div>
               <div class="col-lg-12"></div>
          </div>
     </div>
     <div class="col-lg-6 pad-left" >
          <input class="searchProductAll" data-id="" data-slug="" style="height:40px; margin:0 auto !important; width:99% !important; padding:7px 20px !important; border:1px solid #D9D9D9 !important; border-radius:20px;" type="text" id="searchProductAll" name="searchProductAll" value="" placeholder="Buscar por nombre del producto" onkeyup="searchProductAll()" />
     </div>
</div>
</div>
<div class="container-fluid">
<div id="filterProducts" class="products-thumbnail-grid " style="min-height:200px;">
     @if(sizeof($Products)>=1)
          @foreach($Products as $item)
          <div id="product-{{$item->id}}" class="sc-item-store box-shadow" onclick="openProduct({{$item->idProduct}})">

               @if($item->isOffers==1)
                    <div class="sticky shadow"></div>
               @endif
               
               <div class="img-card-product-ql">
                    @if(!empty($item->imageProduct))
                         @if (file_exists( public_path().'/content/upload/store/'.$item->imageProduct ))
                              <img id="logoTheme" src="{{ asset('/content/upload/store/'.$item->imageProduct) }}" alt="Producto"  style="min-height:150px;max-height:150px;">
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
                         <div class="item-price">$ {{ number_format($item->priceProduct, 0) }} x {{$item->unidad_venta}}</div>
                         @if($item->previous_price>0)
                              <div class="previous-price">Antes $ {{ number_format($item->previous_price, 0)}} {{$item->unidad_venta}}</div>
                         @else
                              <div class="previous-price" style="color:#FFF !important ">.</div>
                         @endif
                    @endif                         
               </div>
          </div>
          @endforeach
     @else

     @endif  
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
