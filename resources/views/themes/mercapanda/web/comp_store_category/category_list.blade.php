@if(sizeof($Store_categorie_)>=1)
     
     <div class="content-fluid pad-top">
     <div class="row text-center pad-top pad-btm" >
          <div class="col-lg-12 text-center "><h3 style="margin:1px; ">CATEGORIAS</h3></div>
          <div class="col-lg-12 text-center" style="font-size:14px;">Explora nuestras gran variedad de productos por cada una de nuestras secciones</div>
     </div>
     </div>

     <div class="catalogue-categories-container pad-all" style="border-top:1px dashed #DDD">
     <div class="products-thumbnail-grid">
          <div class="container-fluid ">
          @foreach( $Store_categorie_ as $Categorie_)
          <a href="{{route('store.viewCategorie.product',$Categorie_->slug)}}">
          <div  class="sc-item-store box-shadow">
               <div class="imgCategoriaSlug">
                    <img id="imgCategoria-{{$Categorie_->id}}" src="{{ asset('/content/upload/store/'.$Categorie_->imageCategorie) }}" alt="imagen categoria" >
               </div>
               <div class="name-slug">
                    {{$Categorie_->nameCategorie}}
               </div>
          </div>
          </a>
          @endforeach
          </div>
     </div>
     </div>

     
@else
@endif