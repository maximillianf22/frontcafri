<div class="row">
     <div class="col-2 col pad-all  "></div>

     <div class="col-8 col pad-all  ">
          <input class="searchProduct" data-id="{{$Slug_->idCategorie}}" 
          data-slug="{{$Slug_->slug_category}}" 
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