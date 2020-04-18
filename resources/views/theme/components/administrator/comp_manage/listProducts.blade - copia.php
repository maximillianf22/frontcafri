@extends('theme.templates.core.admin.admin_master')
@section('title', 'Administrar Productos')
@section('content-theme')
<section class="content-wrapper"  >
  <div class="mTopmobil"></div>

  <div class="container-fluid bgWhite ">
    <div class="row pad-all "><div class="col-md-12 pad-all xPad10-20 brdbtm ">
      <div class="ititP_13 iBfto_">Administrar Productos de la tienda</div>
    </div></div> 
  </div>

  <div class="container-fluid bgWhite ">
    <div class="row pad-all "><div class="col-md-12 pad-all xPad10-20 ">
      
    </div></div> 
  </div>

  <div class="container-fluid block-filter-search ">
    <div class="row "><div class="col-md-12  xPad10-20 ">
      <input type="text" id="searchData" class="input-search-page" value="" placeholder="Buscar Producto" onkeyup="filterProduct()" />
    </div></div> 
  </div>

  
  <!--Content Info Products  V2 #F5F7F9 -->
  <div class="container-fluid "> 
    <div id="manageProducts_" class="pad-all">
      <?php $i_ = 1; $f_ = 1; ?>
      @foreach($ProductsList_ as $list)

        <!---titles --->
        <?php if($f_ ==1 ){ ?>
        <div class="row itemProduct_ <?php if($i_ == 1){ echo 'bgWhite'; }else{echo ' '; } ?> " > 
          <div class="col-md-1 htbl30_ bcktittbl text-center center-middle  ">Activo</div> 
          <div class="col-md-6 htbl30_ bcktittbl center-middle ">Nombre del Producto</div>
        </div>
        <?php } $f_=0; ?>

        @if($list->parent==1) 
        <!--Status--> 
        <div class="row itemProduct_ pad-all <?php if($i_ == 1){ echo 'bgWhite'; }else{echo ' '; } ?> " > 
          <div class="col-md-1 pad-all text-center  "> 
            <label class="switch"><input type="checkbox" 
              <?php if($list->idState==1){ echo "checked"; }else{ echo " "; } ?> >
              <span class="m-slider round mini "></span>
            </label> 
          </div>

          <div class="col-md-6 ">
            <span class=name_Product> {{ $list->nameProduct }} </span><br />
            <span class=descProduct> @if(empty( $list->description)) < Sin Descripción > @else {{ $list->description }} @endif</span><br />
          </div>


        </div>
        @endif
        <?php if($i_ == 1){ $i_ = 0;  }else{ $i_ = 1; } ?>
      @endforeach
    </div>
  </div>
  <!--End Content Info Products  -->

  <!---
  <div class="container-fluid ">  
      <div class="container-fluid">
        <div id="manageProducts_" class="pad-all">

          @foreach($ProductsList_ as $list)
          @if($list->parent==1)
            <div id="Producto_{{$list->id_product}}" class="row items_">
              <div class="col-md-1 col-sm-2 col-3 col  pad-all text-center" 
              <?php if($list->idState==1){ echo "style='border-left:3px solid #28a74570'"; }else{ echo "style='border-left:3px solid #F76363'"; } ?> > 
                  <div class="manage-box-image text-center pad-all">
                    @if(!empty($list->imageProduct))
                         @if (file_exists( public_path().'/content/upload/store/'.$list->imageProduct ))
                              <img id="logoTheme" src="{{ asset('/content/upload/store/'.$list->imageProduct) }}" alt="Producto" width="100" >
                         @else
                            N/D
                         @endif
                    @else
                      N/D
                    @endif 
                    @if($list->with_variation==="Y")
                      <div class="with-variation"><i class="glyphicon glyphicon-list"></i></div>
                    @endif 
                  </div>  
              </div>

              <div class="col-md-4 col-9 col pad-all ">
                  <span class=nameProduct> {{ $list->nameProduct }} </span><br />
                  <span class=descProduct> @if(empty( $list->description)) < Sin Descripción > @else {{ $list->description }} @endif</span><br />

                  <div class="opt-categories">
                    <span class="categorie">{{ $list->nameCategorie }}</span>
                  </div> 
               </div>

              <div class="col-md-2 col-3 pad-all text-center">
                <div class="edit_flash_public">
                  <div class="data_now">
                    <div id="editP_readonly_{{ $list->id_product }}">
                    @if($list->solo_publico===1)
                      <span class="tit_">Publico</span><br />
                      <span id="priceP_actual_{{ $list->id_product }}" class="price_">$ <?php echo number_format($list->priceProduct,0) ?></span><br /> 
                      <span class="price_before">$ <?php echo number_format($list->previous_price,0) ?></span> 
                    @else
                      <span class="tit_">Publico</span><br />
                      <span class="price_"><li class="glyphicon glyphicon-eye-close"></li></span><br /> 
                      <span class="tit_">NO DISPONIBLE</span> 
                    @endif
                    </div>
                    <div id="editP_enabled_{{ $list->id_product }}" class="showEdit_ pad-all" style="display:none">
                        <span class="tit_">Publico</span><br /> 
                        <div class="row ">
                         <div class="col-lg-8 ">
                            <input id="updP_price_{{ $list->id_product }}" type="text" value="{{$list->priceProduct}}" placeholder="" style="width: 100%">
                         </div>
                         <div class="col-lg-2 text-center line-block">
                            <span onclick="updProductSelect({{ $list->id_product }},'P')"  class=" glyphicon glyphicon-ok  cursor" style=" color:#3B5998"></span> 
                            <span onclick="closeProductPage({{ $list->id_product }},'P')" class=" glyphicon glyphicon-remove cursor" style=" color:#CC0000"></span>
                         </div> 
                        </div> 
                    </div>

                  </div>
                   
                  <div id="dataPModify_{{ $list->id_product }}" class="data_modify center-middle">
                    <div class="row">
                      
                      <div class="col-lg-6  opt_ "  onclick="editProductPage({{ $list->id_product }},'P')" >
                        <i class="glyphicon glyphicon-pencil"></i><br/>
                        <span > Editar. </span>
                      </div>

                      <div class="col-lg-6  opt_"  >
                         @if($list->solo_publico===1)
                          <i id="onlypublico_{{ $list->id_product }}" class="glyphicon glyphicon-eye-close" onclick="showProductPage({{ $list->id_product }},'P',0);"></i><br/>
                          <span> Ocultar </span>
                         @else
                          <i id="onlypublico_{{ $list->id_product }}" class="glyphicon glyphicon-eye-open" onclick="showProductPage({{ $list->id_product }},'P',1);"></i><br/>
                          <span> Mostrar </span>
                         @endif 
                      </div>

                    </div>
                  </div>
                   
                </div>  
              </div>
              <div class="col-md-2 col-3 pad-all text-center ">
                <div class="edit_flash_comercio">
                  <div class="data_now">
                    <div id="editC_readonly_{{ $list->id_product }}">
                      @if($list->solo_comercio===1)
                        <span class="tit_">Comercio</span><br />
                        <span id="priceC_actual_{{ $list->id_product }}" class="price_">
                          $ <?php echo number_format($list->pricecomerceProduct,0) ?>
                        </span><br />
                        <span class="price_before">
                          $ <?php echo number_format($list->previous_price_comerce,0) ?>
                        </span> 
                      @else
                        <span class="tit_">Comercio</span><br />
                        <span class="price_"><li class="glyphicon glyphicon-eye-close"></li></span><br /> 
                        <span class="tit_">NO DISPONIBLE</span><br /> 
                      @endif
                      </div>
                      <div id="editC_enabled_{{ $list->id_product }}" class="showEdit_ pad-all" style="display:none">
                        <span class="tit_">Comercio</span><br /> 
                        <div class="row ">
                         <div class="col-lg-8 ">
                            <input id="updC_price_{{ $list->id_product }}" type="text" value="{{$list->pricecomerceProduct}}" placeholder="" style="width: 100%">
                         </div>
                         <div class="col-lg-2 text-center line-block">
                            <span onclick="updProductSelect({{ $list->id_product }},'C')"  class=" glyphicon glyphicon-ok  cursor" style=" color:#3B5998"></span> 
                            <span onclick="closeProductPage({{ $list->id_product }},'C')" class=" glyphicon glyphicon-remove cursor" style=" color:#CC0000"></span>
                         </div> 
                        </div> 
                    </div>

                  </div>
                  
                  <div id="dataCModify_{{ $list->id_product }}" class="data_modify center-middle">
                    <div class="row">
                      
                      <div class="col-lg-6  opt_ "  onclick="editProductPage({{ $list->id_product }},'C')" >
                        <i class="glyphicon glyphicon-pencil"></i><br/>
                        <span > Editar </span>
                      </div>

                      <div class="col-lg-6  opt_"  >
                         @if($list->solo_comercio===1)
                          <i id="onlycomercio_{{ $list->id_product }}" class="glyphicon glyphicon-eye-close" onclick="showProductPage({{ $list->id_product }},'C',0);"></i><br/>
                          <span> Ocultar </span>
                         @else
                          <i id="onlycomercio_{{ $list->id_product }}" class="glyphicon glyphicon-eye-open" onclick="showProductPage({{ $list->id_product }},'C',1);"></i><br/>
                          <span> Mostrar </span>
                         @endif 
                      </div> 
                    </div>
                  </div>
                   
              </div>
              </div>

              <div class="col-md-2 col-3 isOffers center-middle pad-all text-center ">
                @if($list->isOffers==0)
                  <span id="addFavorite" onclick='addFavorite({{ $list->id_product }},1);' class="glyphicon glyphicon-star-empty cursor" title="Mostrar Producto en Ofertas"></span>
                @else
                  <span id="addFavorite"  onclick='addFavorite({{ $list->id_product }},0);' class="glyphicon glyphicon-star cursor" title="Quitar Producto de las ofertas"></span>
                @endif 
              </div>
              <div class="col-md-1 col-3 isOptions center-middle pad-all text-center ">
                <span class="glyphicon glyphicon-option-vertical cursor " onclick='viewProductEdit({{$list->id_product }});' ></span> 
              </div>
 
            </div>
          @endif
          @endforeach 
        </div>
      </div> 
</div>
  </div>
    -->


  
</section>

<div class="modal bs-example-modal-lg fade show " id="view_Product_manage" tabindex="-1">
  <div class="modal-dialog modal-lg " >
    <div class="modal-content">
         <div class="modal-body" style="min-height:250px;">
              <div id="attrProduct_"> </div>
         </div>
    </div>
  </div>
</div> 

@endsection
@section('js')
   
@endsection