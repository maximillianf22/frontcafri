<?php $i_ = 1; $f_ = 1; ?> 
@foreach($ProductsFilter as $list)
  <?php if($f_ ==1 ){ ?>
        <div class="row  <?php if($i_ == 1){ echo 'bgWhite'; }else{echo ' '; } ?> " > 
           <div class="col-md-1 tit_row "> </div> 
          <div class="col-md-3 tit_row ">Nombre del Producto</div>
          <div class="col-md-1 tit_row ">Unidad</div>
          <div class="col-md-2 tit_row ">Categoria</div>
          <div class="col-md-1 tit_row ">Publico</div>
          <div class="col-md-1 tit_row ">Comercio</div>
          <div class="col-md-1 tit_row ">Estado</div>
        </div>
        <?php } $f_=0; ?>

        @if($list->parent==1) 
        <div  id="iPducto_{{$list->id_product}}" 
              class="row pad-all hrow <?php if($i_ == 1){ echo 'bgrow'; }else{echo ' '; } ?> ">
          
          <div class="col-md-1 center-middle ">
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
                <div  class="with-variation"><i id="variations_{{ $list->id_product }}" onclick="showVariations({{ $list->id_product }});" class="glyphicon glyphicon-indent-left"></i></div>
              @endif 
            </div>  
          </div> 

          <div id="updP_{{ $list->id_product }}"
              onclick="updP({{  $list->id_product  }});" 
              class="col-md-3 cursor " >
            <span class="name-p"> {{ $list->nameProduct }} </span><br />
            <span class=desc-row> @if(empty( $list->titleVariation)) < Sin Descripción > @else {{ $list->titleVariation }} @endif</span><br />
          </div>

          <div class="col-md-1 center-middle ">
            <span class="ctg-row ">{{ $list->tipo_unidad }}</span>
          </div>

          <div class="col-md-2 center-middle  ">
            <span class="ctg-row ">{{ $list->nameCategorie }}</span>
          </div>

          <div 
            id="iprice_{{$list->id_product}}" 
            data-producto="{{$list->id_product}}"
            data-origen="P"
            ondblclick="editprice({{ $list->id_product }},'P')" 
            onkeypress="saveprice({{ $list->id_product }},'P')"
            data-price="{{$list->priceProduct}}" 
            class="col-md-1 center-middle txtr_"  >
            <span id="sprice_{{$list->id_product}}" class="price-row " >
              $ <?php echo number_format($list->priceProduct); ?>
            </span>
            <input id="nprice_{{ $list->id_product }}" class="hidden_" type="text" value="{{ $list->priceProduct }}" />
          </div>

          <div 
            id="ipricec_{{$list->id_product}}" 
            data-producto="{{$list->id_product}}"
            data-origen="C"
            ondblclick="editprice({{ $list->id_product }},'C')" 
            onkeypress="saveprice({{ $list->id_product }},'C')"
            data-price="{{$list->pricecomerceProduct}}" 
            class="col-md-1 center-middle txtr_"  >
            <span id="spricec_{{$list->id_product}}" class="price-row ">$ <?php echo number_format($list->pricecomerceProduct); ?> </span>
            <input id="npricec_{{ $list->id_product }}" class="hidden_" type="text" value="{{ $list->pricecomerceProduct }}" />
          </div>

          <div class="col-md-1 center-middle ">
            <label id="state_{{ $list->id_product }}" data-state="{{$list->idState}}" class="switch "><input type="checkbox" 
              <?php if($list->idState==1){ echo "checked"; }else{ echo " "; } ?> >
              <span onclick="actProduct_({{ $list->id_product }})" class="m-slider round mini "></span>
            </label> 
          </div>

          

        </div>
        @endif

        <!---Para aquiellos casos que puedan tener variaciones --->
        <div id="listVariations_{{ $list->id_product }}" class="variations_product  "> 

        </div>
        <!--- End --->


      <?php if($i_ == 1){ $i_ = 0;  }else{ $i_ = 1; } ?>
@endforeach