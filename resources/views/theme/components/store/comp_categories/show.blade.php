@if(sizeof($Store_categorie_)>=1)
     <div class="mercado__title wrapper center txt-center" >
          <h1>Categorias</h1>
          <div class="slogan-category">Explora nuestras variedad de productos en nuestras secciones</div>
     </div>
     <div class="grid-category center-grid-category">
     <div class="container-fluid pad-lft pad-rgt pad-btm ">
          <div class="pad-all"><div class="row pad-all">

               @foreach( $Store_categorie_ as $Categorie_) 
              
               <div 
                    id="category-{{$Categorie_->id_categorie }}" 
                    class="col-12 col-md-3  pad-all "  > 
                    <a href="{{route('store.category.lisproduct',$Categorie_->slug_main)}}" id="id-category-{{$Categorie_->id_categorie}}" class="store-home-components-0-x-bannerItem "  >
                          
                         <img style="height:100%;width:100%" 
                              src="{{ asset('/content/upload/store/'.$Categorie_->imagen_main) }}" 
                              alt="{{$Categorie_->categoria_main}}" 
                              title="{{$Categorie_->nameCategorie}} " 
                              class="exito-home-components-0-x-bannerItemImage exito-home-components-0-x-bannerImageShadow mb2" 
                              crossorigin="anonymous">
                         <div class="store-components-bannerInformation">
                              {{$Categorie_->categoria_main}}  
                         </div>
                    </a> 
               </div>
                
               @endforeach
          </div></div>
     </div>
     </div>

@else
@endif 