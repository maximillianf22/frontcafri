<div class="row pad-btm " style="border-bottom:1px dashed #9EB93480 !important ">
     <div class="col-lg-12 title-section text-center">CATEGORIAS</div>
     <div class="col-lg-12 info-section text-center">Explora nuestras gran variedad de productos</div>
</div>



<div class="products-thumbnail-grid">
<div clas="sc-gisBJw1 eZmaBI">
      
     @if(sizeof($Store_categorie_)>=1)
          @foreach( $Store_categorie_ as $Categorie_)
          <div class="sc-item-store box-shadow">
               <div class="item-categorie pad-top" style="font-size:18px"><strong>{{$Categorie_->nameCategorie}}</strong></div>
               <div class="img-card-product-ql">
                    @if(!empty($Categorie_->imageCategorie))
                         @if (file_exists( public_path().'/content/upload/store/'.$Categorie_->imageCategorie ))
                              <img id="logoTheme" src="{{ asset('/content/upload/store/'.$Categorie_->imageCategorie) }}" alt="Logo" >
                         @else
                         $Categorie_->imageCategorie
                         @endif
                    @else
                         $Categorie_->imageCategorie
                    @endif
               </div>
          </div>
          @endforeach
     @else

     @endif   

</div>
</div>