<header>
  <div class="fixed-top bg-white box-shadow">
    <div class=" bg-theme bar-top-head"> <i class="lni-delivery"></i> <strong>* ENVÍOS GRATIS</strong> por compras superiores a <strong>$ 50.000</strong></div>
    <div class="row head-app-mercapanda ">
    
      <div class="col col-lg-8 col-md-8 col-sm-8 pad-all menu-left ">
        
        <div class="item menu " style="cursor:pointer">
          <i class="lni-menu " data-toggle="modal" data-target="#modal-left"></i>
        </div>
        
        <div class="item">
            <div class="logo">
              @if(!empty($Config_->logo_theme))
                    @if (file_exists( public_path().'/content/upload/theme/'.$Config_->logo_theme ))
                      <a href="{{route('index')}}"><img id="logoTheme" src="{{ asset('/content/upload/theme/'.$Config_->logo_theme) }}" alt="Logo" ></a>
                    @else
                      <a href="{{route('index')}}"><img id="logoTheme" src="{{ asset('/content/upload/theme/'.$Config_->icono_theme) }}" alt="Logo" ></a>   
                    @endif
              @else
              @endif
            </div>

            <div class="logo-mobil">
              @if(!empty($Config_->icono_theme))
                    @if (file_exists( public_path().'/content/upload/theme/'.$Config_->icono_theme ))
                        <img id="iconoTheme" src="{{ asset('/content/upload/theme/'.$Config_->icono_theme) }}" alt="icono" >
                    @else
                      <img id="iconoTheme" src="{{ asset('/content/upload/theme/'.$Config_->icono_theme) }}" alt="icono" >
                    @endif
              @else
                
              @endif
            </div>
        </div>
        
      </div>
      <div class="col col-lg-4 col-md-4 col-sm-4 pad-all menu-right ">
         <a href="{{route('account.index')}}">
          @if(Auth::check())
            @if(Auth::user()->isCommerce==1)
             <span class="userauth">Hola, {{Auth::user()->nameBusiness}} </span>
            @else
             <span class="userauth">Hola, {{Auth::user()->nameUser}} {{Auth::user()->lastnameUser}}</span>
            @endif
          @else
            <div class="item users"><a href="{{route('login')}}"><i class="lni-user"></i></a></div>
          @endif
          </a>

          <div class="item cart">
            <i class="lni-cart" data-toggle="modal" data-target="#modal-right"></i>
              <sup data-show="true" class="ant-scroll-number ant-badge-count " style="display:none" title="">
                <span id="item-car-account" class="ant-scroll-number-only">0</span>
              </sup>
          </div>

      </div>  
    </div>
    
  </div>
</header>
<br/>
<div style="height:15px; width:100%"></div>

<!-- Modal Optiones Menu  -->
<div class="modal modal-left fade" id="modal-left" tabindex="-1">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      
    <h5 class="modal-title">
      <div class="text-center">
      @if(!empty($Config_->logo_theme))
            @if (file_exists( public_path().'/content/upload/theme/'.$Config_->logo_theme ))
                <img id="logoTheme" src="{{ asset('/content/upload/theme/'.$Config_->logo_theme) }}" alt="Logo" >
            @else
              $Config_->name_theme
            @endif
      @else
        $Config_->name_theme
      @endif
      </div>
    </h5>
    <button type="button" class="close" data-dismiss="modal">
      <i class="lni-close"></i>
    </button>
    </div>
    <div class="modal-body " >
      <div class="row menu-left-options">
        <div class="col-lg-12 item-menu linkAction"><a href="{{route('index')}}"><i class="lni-home"></i>&nbsp;&nbsp;Inicio</a></div>
        <div class="col-lg-12 item-menu linkAction"><a href="{{route('store.viewOffers.product')}}"><i class="lni-offer"></i>&nbsp;&nbsp;Promociones</a></div>
          
          <div class="col-lg-12 item-menu linkAction"> 
            <div id="accordion" style="padding:none !important ">
              <div class="card-header" style="border:none !important ; padding:1px !important">
                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                  <i class="lni-list"></i>&nbsp;&nbsp;Categorias &nbsp;&nbsp;&nbsp;&nbsp;<i class="lni-chevron-down" style="color:#9EB934; font-weight:bold"></i>
                </a>
              </div>
              <div id="collapseOne" class="collapse " data-parent="#accordion">
                <div class="card-body">
                  <div class="category-list item">
                    <ul>
                      @if(sizeof($Store_categorie_)>=1)
                        @foreach($Store_categorie_ as $Category)
                          <li style="padding:5px;"><a href="{{route('store.viewCategorie.product',$Category->slug)}}"><i class="lni-minus"></i>&nbsp; &nbsp; {{$Category->nameCategorie}}</a></li>
                        @endforeach
                      @else
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div> 
          </div>

      
          @if(Auth::check())
          <div class="col-lg-12 item-menu linkAction"><a href="{{route('account.index')}}"><i class="lni-user"></i>&nbsp;&nbsp;Mi Perfil</a></div>
          <div class="col-lg-12 item-menu linkAction"><a href="{{route('store.orders.product')}}"><i class="lni-cart-full"></i>&nbsp;&nbsp;Mis Pedidos</a></div>
          <div class="col-lg-12 item-menu linkAction"><a href="{{route('getLogout')}}"><i class="lni-close"></i>&nbsp;&nbsp;Cerrar Sesión</a></div>
          @endif
          
      </div>
    </div>
    <div class="modal-footer modal-footer-uniform">
    
    </div>
  </div>
  </div>
</div>
<!-- /.modal -->

<!-- Modal -->
<div class="modal modal-right fade" id="modal-right" tabindex="-1">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" style="font-size:13px;"><i class="lni-cart"></i> Mi Carrito de Compras {{$Config_->name_theme}}</h5>
    <button type="button" class="close" data-dismiss="modal">
      <i class="lni-close" style="cursor:pointer"></i>
    </button>
    </div>
    

    <div id="basket-empty" class="modal-body " >
      
      <div id="listcar-content-products">
        <div class="content-cart empty-cart">
          <i class="lni-cart" style="font-size:36px;font-weight:border"></i><br/><br />
          <b style="font-size:14px">Tu canasta está vacía</b><br /><br /><br />
          <p style="font-size:12px">Te invitamos a volver a nuestras tienda y agregues productos a tu canasta</p>
        </div>
      </div>

    </div>
    
  </div>
  </div>
</div>
<!-- /.modal -->
