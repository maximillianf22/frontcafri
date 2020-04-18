<div class="pad-all">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span></button>
</div>
<div class="view-product-modal">

     <div class="imgProduct--x3">
          @if(!empty($Product_->imageProduct))
               @if (file_exists( public_path().'/content/upload/store/'.$Product_->imageProduct ))
                    <img src="{{ asset('/content/upload/store/'.$Product_->imageProduct) }}" alt="Producto" style="max-height:170px !important; " >
               @else
                    
               @endif
          @else
               
          @endif
     </div>

     <div class="modal-content-product">

          <div class="nameProduct">
               @if(!empty($Product_->titleVariation))
                    {{$Product_->titleVariation}}
               @else
                    {{$Product_->nameProduct}}
               @endif</div>
          <div class="unitProduct">Unidad de venta {{$Product_->unidad_venta}}</div>
          @if(!empty($Product_->description_product))
               <div class="descriptionProduct"><b style="color:#212121">Desc. </b>{{$Product_->description_product}}</div>
          @else
          @endif

          <div id="pnl-variations-products-{{$Product_->id}}" 
               data-totcompra="0"  
               class="variationsProducts " 
               style=" border-top:1px solid #F5F5F5; ">
               <?php $itemEditQuantity_ = 0; ?>
          @foreach($Variations_ as $List)

               <?php $itemEditQuantity_ = 0; ?>
               @foreach($ProductsEdit_ as $itemEdit_)
                    @if($itemEdit_->idAttribute == $List->id_attribute)
                        <?php  $itemEditQuantity_ = $itemEdit_->quantityOrder; ?>
                    @else
                       <?php $itemEditQuantity_ = 0; ?>
                    @endif
               @endforeach
               
               <div id="itemProductVariation-{{$List->id_attribute}}" class="item pad-all" data-idProduct="{{$List->id_attribute}}"  >
                    <div id="opt-add-car-{{$List->id_attribute}}" 
                         data-price="{{$List->price}}" 
                         data-totalproducto="0" 
                         data-cantproducto="0" 
                         data-cantedit ="{{$itemEditQuantity_}}"
                         data-priceaddcar="0" 
                         data-cntventa="{{$List->amount_per_sale}}"  
                         class="opt-action-values-car hide_item" 
                         style="float:right">
                         <div id="add-{{$List->id_attribute}}" onclick="addCntCar({{$Product_->id}},{{$List->id_attribute}})" class="rest-min-value-product"> + </div>
                         <div id="id-product-{{$List->id_attribute}}" class="value">
                              <input id="input-product-{{$List->id_attribute}}" 
                              type="text" value="0" 
                              class="number cnt-value-product"  
                              onchange="editCntProduct(this.value)" 
                              disabled  />
                         </div>     
                         <div id="add-{{$List->id_attribute}}" onclick="restCntCar({{$Product_->id}},{{$List->id_attribute}})" class="add-min-value-product"> - </div>
                    </div>

                    <div id="item-checked-{{$List->id_attribute}}" class="checkbox" >
                         <input onclick="selectProductCheck({{$Product_->id}},{{$List->id_attribute}})"
                              data-nameproduct="{{$List->nombre_variacion}}" data-idattribute="{{$List->id_attribute}}" data-price="{{$List->price}}" data-minvalue="{{$List->amount_per_sale}}"
                              type="checkbox" id="listProduct_{{$List->id_attribute}}">
                         <label for="listProduct_{{$List->id_attribute}}" style="font-size:12px; line-height:16px; width:70%"><b style="font-weight: bold">{{$List->nombre_variacion}} </b>
                              @if(!empty($List->cntbyUnit))
                                   ( {{$List->cntbyUnit }} )  
                              @endif
                              @if( $List->previous_price>=1 ) 
                               <br />
                                   Antes  <span class="text-previous-value">$ {{      number_format($List->previous_price,0) }} </span>
                              @endif
                              <br /> @if($List->isOffers==1 || $List->previous_price>=1) <span class="text-offers">Oferta</span> @endif $ {{ number_format($List->price,0) }} / {{$List->unidad_venta}}</label>
                    </div>

               </div>

               <?php if($itemEditQuantity_>0){  ?>
                    <script type="text/javascript">
                       document.getElementById("listProduct_{{$List->id_attribute}}").click();
                    </script>
               <?php } ?>

          @endforeach
          </div>
          <div class="footer text-center pad-all">
               <div id="addNew_ProductCar" onclick="addCarShoping()" class="btn--modal-theme disabled"> <i class="lni-cart"></i> Agregar a la cesta </div> 
          </div> 
          
     </div>
    
</div>