<div class="row p-5 mt-5 mb-5" style="background-color: #f4474c75;">
     <div class="col-2 col pad-all  "></div>
 
     <div class="col-8 col pad-all ">
          <input class="searchProduct shadow-lg" 
          data-id="{{$Slug_->id_categorie}}" 
          data-slugmain="{{$Slug_->slug_main}}" 
          data-slug="@if(!empty($subslug)) {{ $subslug }} @endif " 
          type="text" id="searchProduct"
          name="searchProduct" value="" 
          placeholder="Ingresa nombre del Producto a buscar" 
          onkeyup="searchProduct()" />
     </div>

     <div class="col-2 col pad-all  "></div> 
     <!--
     <div class="col-5 pad-all">
          <div id="resultFindRow" class="store-search-result-totalProducts show_item" style="text-align:right"><span id="ResultFound_"> 
               {{count($Products)}} 
               <span class="c-muted-2">Productos encontrados</span></span></div>
     </div>
     -->
</div>