<div class="pad-all">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
</div>
<div class="view-product-modal">
     <div class="img-Product">
          @if(!empty($Product->imageProduct))
               @if (file_exists( public_path().'/content/upload/store/'.$Product->imageProduct ))
                    <img src="{{ asset('/content/upload/store/'.$Product->imageProduct) }}" alt="Producto" style="max-height:170px !important; " >
               @else
                    
               @endif
          @else
               
          @endif
     </div>
    <br />
     <div class="modal-content-product">

          <div class="nameProduct">{{$Product->nameProduct}}</div>
          <div class="unitProduct">Unidad de venta {{$Product->unidad_venta}}</div>
          @if(!empty($Product->description_product))
               <div class="descriptionProduct"><b style="color:#212121">Desc. </b>{{$Product->description_product}}</div>
          @else
          @endif
          
     
          <div class="text-left pad-all inf-subtitle">
               @if(($Product->typeofProduct)==1) <span class=""><i class="lni-check-mark-circle " style="color:#9EB934;"></i> Producto Unico </span> 
               @else  <span class=""><i class="lni-list " style="color:#9EB934;"></i> Producto Con variación.</span> 
               @endif
               @if(!empty($Product->cntbyUnit)) <span class="float-right">{{$Product->cntbyUnit}} </span> @endif
          </div>
          <?php $priceProducto_=0; ?>
          
          <div id="productLis-{{$Product->idProduct}}" class="product-list" data-total="0" >
               @foreach($ProductList as $List)
                    @if(Auth::check())
                         @if(!empty(Auth::User()->nameBusiness))
                              <?php $priceProducto_= $List->pricecomerceProduct ?>
                         @else
                              <?php $priceProducto_= $List->priceProduct ?>
                         @endif
                    @else
                        <?php $priceProducto_= $List->priceProduct ?>
                    @endif

                  
               <div id="product-item-{{$List->idAttribute}}" class="item" data-idProduct="{{$List->idProduct}}" data-stock="{{$List->inventory}}" data-name="{{$List->nameAttribute}}" data-typeunit="{{$List->unidad_venta}}" data-img="{{$List->imageProduct}}" >
                    
                    <div class="">
                         <div id="idProductSelect-{{$List->idAttribute}}"  
                              data-vrpublico="{{$List->priceProduct}}" 
                              data-vrcomercio="{{$List->previous_price}}" 
                              data-vrpublico="{{$List->pricecomerceProduct}}" 
                              data-vrcomercio="{{$List->previous_price_comerce}}" >
                         </div>
                    </div>

                    <div id="opt-add-car-{{$List->idAttribute}}" data-price="{{$priceProducto_}}" data-priceaddcar="0" data-cntventa="{{$List->amount_per_sale}}"  class="add-cnt-car hide ">
                         <div id="value-{{$List->idAttribute}}" data-price="{{$priceProducto_}}" class="value"><input id="productValue_{{$Product->idProduct}}_{{$List->idAttribute}}" type="text" value="{{number_format($List->amount_per_sale,2)}}" class="number" style="border:none !important; width:50px; height:28px; color:#212121" onchange="editCntProduct({{$Product->idProduct}},{{$List->idAttribute}},0,this.value)" disabled  /></div>     
                         <div id="add-{{$List->idAttribute}}" onclick="addCntCar({{$Product->idProduct}},{{$List->idAttribute}},{{$List->stockAttribute}},0)" class="add-min"> <i class="lni-plus"></i> </div>
                         <div id="rest-{{$List->idAttribute}}" onclick="restCntCar({{$Product->idProduct}},{{$List->idAttribute}},{{$List->inventory}})" class="rest-min"> <i class="lni-minus"></i> </div>
                    </div>
                    <div class="checkbox" >
                         <input  onclick="addProductCar({{$Product->idProduct}},{{$List->idAttribute}})" type="checkbox" id="itemProduct_{{$List->idAttribute}}">
                         <label for="itemProduct_{{$List->idAttribute}}" style="font-size:12px; line-height:16px; width:70%">{{$List->nameAttribute}} <br /> $ {{ number_format($priceProducto_,2) }} / {{$List->unidad_venta}}</label>
                    </div>
               </div>
               @endforeach
          </div>

          <div class="footer text-center">
               <div id="addNewProductCar" onclick="addCarnewProduct()" class="btn btn-outline-modal-theme" > <i class="lni-cart"></i> Agregar a la cesta </div> 
          </div>
     </div>
</div>
<script>
     var idAttrtemp_ =0;
     if (arrayProductsCar.length === 0) {
     }else{
          // alert(JSON.stringify(arrayProductsCar));
          for(var i=0;i<arrayProductsCar.length;i++){
               var $dataProduct ="";
               idAttrtemp_ =arrayProductsCar[i]["idAttribute"];
               // if(idAttrtemp_==={{$idAttributeEdit}}){
                    $dataProduct = arrayProductsCar[i]["idproduct"]+"-"+idAttrtemp_+"-"+arrayProductsCar[i]["stock"]+"-"+arrayProductsCar[i]["inventory"];
                    $("#itemProduct_"+idAttrtemp_).attr('checked', true);
                    addProductCar(arrayProductsCar[i]["idProduct"],idAttrtemp_,$dataProduct);
               // }
          }
     }
</script>