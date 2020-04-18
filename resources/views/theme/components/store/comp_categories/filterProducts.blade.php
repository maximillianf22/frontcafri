<style type="text/css">

.card-background.card-blog {
    height: 200px;
}

.card-background .card-body {
   
    min-height: 200px;
}

</style>


@if(sizeof($Store_categorie_)>=1)
<div class="grid-products center-grid-products "> 
     <div class="container-fluid">
          @include('theme.components.store.comp_categories.searcProduct')
     </div>

     <div class="container-fluid ">
          <div class="row  pad-all" style="border:none !important; font-size:14px ">
          <b style="border:none !important"> <a href="{{route('index')}}" style="color: inherit;">inicio</a>&nbsp;&nbsp; / &nbsp;&nbsp;
          @if($Slug_->slug_base===$Slug_->slug_main)
          {{ $Slug_->nameCategorie }}
          @else
          <a href="{{route('store.category.lisproduct',[$Slug_->slug_main])}}" style="color: inherit;"> {{ $Slug_->categoria_base }} </a>
          &nbsp;&nbsp; / &nbsp;&nbsp;
          {{ $Slug_->nameCategorie }}
          @endif 

          </b> 
          </div>
     </div>

     <div class="container-fluid">
     <section class="blogs-1">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-8"><br>
               @if(sizeof($subcategoriasslug_))
              <h3 class="display-3">Categorias Disponibles</h3>
              <p class="lead mt-1">¡Explora nuestras variedad de productos en nuestras secciones!</p>
               @endif
            </div>
          </div>
            <div class="row align-items-center p-3">
          @foreach( $Store_categorie_ as $subcategorias)
          @if($subcategorias->nameCategorie == 'Bebidas')
            <div class="col-lg-6">
              <div class="card card-blog card-background" data-animation="zooming">
                <div class="full-background" style="background-image: url('{{ asset('/content/upload/store/'.$subcategorias->imageCategorie) }}')"></div>
                <a href="{{route('store.subcategory.lisproduct',[$subcategorias->slug_main,$subcategorias->slug_subcategoria])}}" 
                    id="id-category-{{$subcategorias->idCategorie}}"
                    alt="{{$subcategorias->nameCategorie}}" 
                    title="{{$subcategorias->nameCategorie}} " 
                    crossorigin="anonymous">
                  <div class="card-body">
                    <div class="content-bottom">
                      <h5 class="card-title text-center">{{$subcategorias->nameCategorie}}</h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            @else
            <div class="col-lg-3">
              <div class="card card-blog card-background" data-animation="zooming">
                <div class="full-background" style="background-image: url('{{ asset('/content/upload/store/'.$subcategorias->imageCategorie) }}')"></div>
                <a href="{{route('store.subcategory.lisproduct',[$subcategorias->slug_main,$subcategorias->slug_subcategoria])}}" 
                    id="id-category-{{$subcategorias->idCategorie}}"
                    alt="{{$subcategorias->nameCategorie}}" 
                    title="{{$subcategorias->nameCategorie}} " 
                    crossorigin="anonymous">
                  <div class="card-body">
                    <div class="content-bottom">
                      <h5 class="card-title text-center">{{$subcategorias->nameCategorie}}</h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          @endif
          @endforeach 
          </div>
        </div>
      </section>
     </div>
     
          <div class="row ">
               <div id="filterProducts" class="container-fluid pad-lft pad-all " style="border-top:0px solid #F1F3F4">
               </div>
          </div>




          </div>
     </div>
 
</div> 
@else
@endif
 
 <!--
<div class="grid-products center-grid-products brd_"> 

</div>
-->

@if(sizeof($Products)>=1) 
<div class="grid-products center-grid-products"> 
     <div id="filterProducts" class="container-fluid pad-lft pad-all " style="border-top:0px solid #F1F3F4">
          <div class="row pad-all">
               @foreach( $Products as $item )
               <div id="product-{{$item->id}}" 
                    class="col-6 col-md-2 col-sm-4"  style="padding:5px 7px !important"
                    onclick="viewProduct({{$item->id}})" >
                    <div class="sc-item-store ">
                         <div class="categorie"> 
                             <!-- <b>
                              {{$item->nameCategorie}}
                              </b> -->
                              <!-- <div class="sticky "></div> -->
                         </div>
                         <div class="img-card-product-ql">
                              @if(!empty($item->imageProduct))
                                   @if (file_exists( public_path().'/content/upload/store/'.$item->imageProduct ))
                                        <img id="logoTheme" src="{{ asset('/content/upload/store/'.$item->imageProduct) }}" alt="Producto" >
                                   @else
                                        $item->imageProduct
                                   @endif
                              @else
                                   $item->imageProduct
                              @endif
                         </div>
                         <div class="info-article ">
                              <div class="name">{{$item->nameProduct}}</div>
                              <!-- <div class="">{{$item->cntbyUnit}}</div> -->
                              <div class="info-price ">
                                   <div class="item-price">$ {{ number_format($item->price, 0) }} {{$item->nameValue}} x {{$item->unidad_venta}}</div>
                                    @if($item->previous_price>=1)
                                   <div class="previous-price txt-center">Antes $ {{ number_format($item->previous_price, 0)}} {{$item->nameValue}}</div>
                                   @endif
                              </div>
                         </div> 
                    </div>
               </div>
               @endforeach
          </div>
     </div>
</div>
<script>
     window.scrollTo(0,420);
</script>

@else
@endif 

<div class="modal center-modal fade show " id="viewProduct" tabindex="-1">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-body">
                    <div id="info-modal-product">
                         
                    </div>
               </div>
          </div>
     </div>
</div>

