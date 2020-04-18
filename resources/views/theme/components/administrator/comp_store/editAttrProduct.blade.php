<div class="row"><div class="col-lg-12">
     <div class="box-content-section " style="margin-top:1px">
           <div class="row pad-all">
               <div class="col-lg-9">
                    <div class="form-group pad-all">
                         <div class="label-input"> Nombre Variación </div>
                         <input id="cProductVar" type="text" name="nameProduct" value="{{$Products_attr->nameAttribute}}" class="input-text" placeholder="nombre del producto" required >
                    </div>
               </div>
               <div class="col-lg-3">
                    <div class="form-group pad-all">
                         <div class="label-input"> Estado @if($Products_attr->idState==1) <span class="badge badge-xl badge-dot badge-success"></span> @else <span class="badge badge-xl badge-dot badge-danger"></span> @endif </div>
                         <select name="stateProductVar" class="form-control jj-select select2 jj-item">
                              <option value="1" @if($Products_attr->idState==1) selected @endif > Activo</option>
                              <option value="2" @if($Products_attr->idState==2) selected @endif >Inactivo</option>
                              <option value="3" >Papelera</option>
                         </select>
                    </div>
               </div>
          </div>

          <div class="row pad-all " >
               <div class="col-lg-3" style="border-bottom:1px solid #DFE5EB">
                    <div class="form-group pad-all">
                         <div class="label-input"> Minimo X Venta</div>
                         <div class="input-group input-prefix number">
                              <label>  </label>
                              <input id="nAmount_per_sale_var" type="number" min="1" name="Price" value="{{$Products_attr->amount_per_sale}}" 
                              class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >
                         </div>
                    </div>
               </div>
               <div class="col-lg-3" style="border-bottom:1px solid #DFE5EB">
                    <div class="form-group pad-all">
                         <div class="label-input"> Unidad Venta</div>
                         <select name="Sales_unit_var" class="form-control jj-select select2 jj-item">
                              @foreach($UndVenta as $UndVenta_)
                                   @if($UndVenta_->id === $Products_attr->idSales_unit)
                                        <option value="{{$UndVenta_->id}}" selected > {{$UndVenta_->nameValue}}</option>
                                   @else
                                        <option value="{{$UndVenta_->id}}">{{$UndVenta_->nameValue}}</option>
                                   @endif
                              @endforeach
                         </select>
                    </div>
               </div>
               <div class="col-lg-6" style="border-bottom:1px solid #DFE5EB">
                    <div class="form-group pad-all">
                         <div class="label-input"> Cantidad x Producto </div>
                         <input id="cCntbyunitVar" type="text" name="cCntbyunit" value="{{$Products_attr->cntbyUnit}}" class="input-text" placeholder="nombre del producto" required >
                    </div>
               </div>
          </div>

          <div class="row ">

               <div class="col-lg-6 col-md-12">
                    <div class="row">
                         <!---
                         <div class="col-lg-6">
                              <div class="app-box-card-title" style="font-size: 12px !important">Visible Público</div>
                         </div>
                         <div class="col-lg-6 pad-top">
                              <button id="onlyPublicVar" type="button" class="btn btn-min btn-toggle btn-info @if($Products_attr->solo_publico==1) active @endif" data-toggle="button" aria-pressed="true" autocomplete="off">
                                   <div class="handle"></div>
                              </button>
                         </div>
                         --->
                    </div>
                    <div class="row">
                         
                         <div class="col-lg-6 col-md-12">
                         <div class="form-group pad-all">
                             <div class="label-input"> Precio Lista 1 </div>
                              <div class="input-group input-prefix number">
                                   <label> $ </label>
                                   <input id="nPriceProductVar" type="number" min="1" name="Price" value="{{$Products_attr->priceProduct}}" 
                                   class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                              </div>
                         </div>
                         </div>
                         <div class="col-lg-6 col-md-12">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Precio Lista 2 </div>
                                   <div class="input-group input-prefix number">
                                        <label> $ </label>
                                        <input id="nPriceComerceVar" type="number" min="1" name="Price" value="{{$Products_attr->pricecomerceProduct}}" 
                                        class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                   </div>
                              </div>
                              <!---
                              <div class="form-group pad-all">
                                   <div class="label-input"> Precio Anterior </div>
                                   <div class="input-group input-prefix number">
                                        <label> $ </label>
                                        <input id="nPriceProductPreviousVar" type="number" min="0" name="Price" value="{{$Products_attr->previous_price}}" 
                                        class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                   </div>
                              </div>
                              --->
                         </div>
                    </div>
               </div>

               <div class="col-lg-6 col-md-12">
                    <div class="row">
                         <!---
                         <div class="col-lg-6">
                              <div class="app-box-card-title " style="font-size: 12px !important">Visible Comercio</div>
                         </div>
                         <div class="col-lg-6 pad-top">
                              <button id="onlyComerceVar" type="button" class="btn btn-min btn-toggle btn-info @if($Products_attr->solo_comercio==1) active @endif" data-toggle="button" aria-pressed="true" autocomplete="off">
                                   <div class="handle"></div>
                              </button>
                         </div>
                         --->
                    </div>
                    
                    <div class="row">
                         <div class="col-lg-6 col-md-12">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Precio Lista 3 </div>
                                   <div class="input-group input-prefix number">
                                        <label> $ </label>
                                        <input id="nPricelistVar3" type="number" min="1" name="nPricelistVar3" value="{{$Products_attr->price_list_3}}" 
                                        class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                   </div>
                              </div>
                         
                         </div>
                         <div class="col-lg-6 col-md-12">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Precio Lista 4 </div>
                                   <div class="input-group input-prefix number">
                                        <label> $ </label>
                                        <input id="nPricelistVar4" type="number" min="1" name="nPricelistVar4" value="{{$Products_attr->price_list_4}}" 
                                        class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                   </div>
                              </div>
                              <!---
                              <div class="form-group pad-all">
                                   <div class="label-input"> Precio Anterior </div>
                                   <div class="input-group input-prefix number">
                                        <label> $ </label>
                                        <input id="nPriceComercePreviousVar" type="number" min="1" name="Price" value="{{$Products_attr->previous_price_comerce}}" 
                                        class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                   </div>
                              </div>
                              --->
                         </div>
                    </div>
               </div>
          </div>


          <div class="row pad-all" style="border-bottom:1px solid #DFE5EB">
               <div class="col-lg-6 col-md-12"> 
                    <div class="row">
                         <div class="col-lg-6 col-md-12">
                               <div class="form-group pad-all">
                                   <div class="label-input"> Precio Lista 5 </div>
                                   <div class="input-group input-prefix number">
                                        <label> $ </label>
                                        <input id="nPricelistVar5" type="number" min="1" name="nPricelistVar5" value="{{$Products_attr->price_list_5}}" 
                                        class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio"  > 
                                   </div>
                              </div> 
                         </div> 
                         <div class="col-lg-6 col-md-12"> 
                         </div> 
                    </div> 
               </div>

               <div class="col-lg-6 col-md-12">
               </div>
          </div>

     </div>
</div></div>

<div class="row pad-all">
     <div class="col-lg-12" style="text-align:right">
          <span class=" pad-all" style="padding:5px 15px; margin:10px; border:1px solid #2B81CB;cursor:pointer" onclick="closeModalAttribute();"> Cancelar </span>
          <span class="jj-button-new pad-all" style="padding:5px 15px; margin:10px;" onclick="updAttrModal({{$Products_attr->id}});"> Actualizar Variación</span>
     </div>
</div>