@if(sizeof($Store_categorie_)>=1)

<div class="catalogue-categories-container ">
<div class="row ">
     <div class="col-lg-12 title-section text-center">CATEGORIAS</div>
</div>
<h3>Explora nuestras gran variedad de productos</h3>
<div class="content-slider-category ">

     <div class="slider variable-width">
     @foreach( $Store_categorie_ as $Categorie_)
          @if(!empty($Categorie_->imageCategorie))
               @if (file_exists( public_path().'/content/upload/store/'.$Categorie_->imageCategorie ))
                    <a href="{{route('store.viewCategorie.product',$Categorie_->slug)}}">
                    <div class="" style="width: 100px;">
                         <div tabindex="-1" style="width:202px; display: inline-block;align:center" class="sc-ksYbfQ cat-item-product">
                              <img id="logoTheme" src="{{ asset('/content/upload/store/'.$Categorie_->imageCategorie) }}" alt="Logo" >
                              <div class="card-dimmer"><span>{{$Categorie_->nameCategorie}}</span></div>
                         </div>
                    </div>
                    </a>
               @else
                    <a href="{{route('store.viewCategorie.product',$Categorie_->slug)}}">
                    <div class="" style="width: 100px;">
                         <div tabindex="-1" style="width:202px; display: inline-block;align:center" class="sc-ksYbfQ cat-item-product">
                              <img id="logoTheme" src="{{ asset('/content/upload/store/'.$Categorie_->imageCategorie) }}" alt="Logo" >
                              <div class="card-dimmer"><span>{{$Categorie_->nameCategorie}}</span></div>
                         </div>
                    </div>
                    </a>
               @endif
          @else
              
          @endif
     @endforeach
     </div>

</div>  
</div>

@else
@endif 