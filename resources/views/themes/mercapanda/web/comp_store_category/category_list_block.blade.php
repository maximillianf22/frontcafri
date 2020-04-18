@if(sizeof($Store_categorie_)>=1)

<div class="catalogue-categories-container ">
     <div class="row ">
          <div class="col-lg-12 title-section text-center">CATEGORIAS</div>
     </div>
<h3>Explora nuestras gran variedad de productos</h3>
<div class="content-slider-category ">
     <div class="container-fluid">
     <div class="row ">
          @foreach( $Store_categorie_ as $Categorie_)
          
          @if(!empty($Categorie_->imageCategorie))
          @if (file_exists( public_path().'/content/upload/store/'.$Categorie_->imageCategorie ))
               <div class="col-md-3 col-sm-6 col-12 pad-all brd_">
                    <a href="{{route('store.viewCategorie.product',$Categorie_->slug)}}">
                    <div class="" >
                         <div tabindex="-1" style="width:202px; display: inline-block;align:center" class="sc-ksYbfQ cat-item-product">
                              <img id="logoTheme" src="{{ asset('/content/upload/store/'.$Categorie_->imageCategorie) }}" alt="Logo" >
                              <div class="card-dimmer"><span>{{$Categorie_->nameCategorie}}</span></div>
                         </div>
                    </div>
                    </a>
               </div>
          @else
               <div class="col-md-3 col-sm-6 col-6 brd_">
                    <a href="{{route('store.viewCategorie.product',$Categorie_->slug)}}">
                    <div class="" >
                         <div tabindex="-1" style="width:202px; display: inline-block;align:center" class="sc-ksYbfQ cat-item-product">
                              <img id="logoTheme" src="{{ asset('/content/upload/store/'.$Categorie_->imageCategorie) }}" alt="Logo" >
                              <div class="card-dimmer"><span>{{$Categorie_->nameCategorie}}</span></div>
                         </div>
                    </div>
                    </a>
               </div>
          @endif
          @endif
          @endforeach
     </div>
     </div>



</div>  
</div>

@else
@endif 