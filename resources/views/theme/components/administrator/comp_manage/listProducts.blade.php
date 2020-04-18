@extends('theme.templates.core.admin.admin_master')
@section('title', 'Administrar Productos')
@section('content-theme')
<section class="content-wrapper "><div class="mTopmobil"></div>

  <div class="container-fluid bgWhite ">
    <div class="row pad-all brdbtm">
      <div class="col-md-12 pad-all xPad10-20 ">
        <div class="ititP_13 iBfto_">Administrar Productos de la tienda</div>
      </div>
    </div> 
  </div>

  <div class="container-fluid block-filter-search ">
    <div class="row ">
      <div class="col-md-3 xPad10-10 " style="padding-left: 20px;">
        
        <input type="text" id="searchData" 
          class="input-search-page" 
          placeholder="Buscar Producto" 
          onkeyup="filterProduct()" />

      </div>
      <div class="col-md-2 xPad10-10 ">
        <!--
          <div class="btnTheme_"><i class="glyphicon glyphicon-tasks"></i> Filtros</div>
        -->
        <div class="btntheme-dropdown">
          <div class="dropdown">
            <button class="btnTheme_  dropdown-toggle" type="button" data-toggle="dropdown">
              <i class="glyphicon glyphicon-tasks"></i> Filtro de Busqueda
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <!-- listado de Categorias Disponibles -->
                <li class="dropdown-header iBfto_">Categorias Disponibles</li>
                 
                @foreach($litarCategorias_ as $Category_)
                @if($Category_->type=='categoria')
                  <li id="categorie_{{ $Category_->id_categorie }}" data-name="{{ $Category_->nameCategorie }}" onclick="filterCategorie({{ $Category_->id_categorie }} );" class="item_ "><b> {{ $Category_->nameCategorie }} </b></li> 
                @else
                  <li id="categorie_{{ $Category_->id_categorie }}" data-name="{{ $Category_->nameCategorie }}" onclick="filterCategorie({{ $Category_->id_categorie }} );" class="item_ " style="font-style: italic;"> - {{ $Category_->nameCategorie }}  </li> 
                @endif 
                @endforeach
 
              </ul>
          </div>
        </div> 
      </div>
      
      <div class="col-md-7 pad-all xPad10-10 " > 
        <div id="itemFilter_" class="item_filter hidden_ "> 
          <span class="title"><i class="glyphicon glyphicon-tag"></i> Categorias : </span> 
          <span id="categorie_name" data-name="" data-id=""> </span> 
          <span id="close_" onclick="closefilter()" class="close" > x </span> 
        </div> 
      </div>

    </div> 
  </div>
  <div class="container-fluid bgWhite ">
    <div class="row  " style="padding-left:15px">
      <div class="col-md-12 pad-all ">
        <!--- <div class="ftb_ btnTheme_" onclick="updP(0);"  >+ Crear Producto </div> --->
      </div>
    </div> 
  </div>

  <div class="xPad10-20 bgWhite mhMIn">
    <div id="manageProducts_" class="container-fluid brdtbl ftb_ ">
      <?php $i_ = 1; $f_ = 1; ?> 
      @foreach($ProductsList_ as $list)
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
    </div>
  </div>
 
</section>

<div id="wProducts" >
  <div onclick="closeWProduct();" class="pnlClose"><i class="glyphicon glyphicon-menu-right"></i></div>
  <div class=" tit "><i class=" glyphicon glyphicon-credit-card "></i> Editar Producto : <span class="pro-tit"> ... </span> </div>
  <div id="wInfoProduct" class=""></div>
</div>

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