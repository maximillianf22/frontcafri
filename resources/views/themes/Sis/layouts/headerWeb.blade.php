<header>
  <div class="fixed-top bg-white ">
    <div class=" bg-theme bar-top-head"> <i class="lni-delivery"></i> <strong>*ENVÍOS GRATIS</strong> por compras superiores a <strong>$ 50.000</strong></div>
    <div class="row head-app-mercapanda ">
    <div class="col col-lg-8 col-md-8 col-sm-8 pad-all menu-left ">
      <div class="item menu " style="cursor:pointer">
        <i class="lni-menu " data-toggle="modal" data-target="#modal-left"></i>
      </div>
      <div class="item">
        <div class="logo">
        @if(!empty($ConfigTheme_->logo_theme))
              @if (file_exists( public_path().'/content/upload/theme/'.$ConfigTheme_->logo_theme ))
                  <img id="logoTheme" src="{{ asset('/content/upload/theme/'.$ConfigTheme_->logo_theme) }}" alt="Logo" >
              @else
                 Logo
              @endif
        @else
            Logo
        @endif
        </div>
        <div class="logo-mobil">
        @if(!empty($ConfigTheme_->logo_theme))
              @if (file_exists( public_path().'/content/upload/theme/'.$ConfigTheme_->icono_theme ))
                  <img id="iconoTheme" src="{{ asset('/content/upload/theme/'.$ConfigTheme_->icono_theme) }}" alt="icono" >
              @else
                 Logo
              @endif
        @else
            Logo
        @endif
      </div>
      </div>
      
    </div>
    <div class="col col-lg-4 col-md-4 col-sm-4 pad-all menu-right ">
        <div class="item users"><a href="{{route('login')}}"><i class="lni-user"></i></a></div>
        <div class="item cart"><i class="lni-cart" data-toggle="modal" data-target="#modal-right"></i></div>
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
      @if(!empty($ConfigTheme_->logo_theme))
            @if (file_exists( public_path().'/content/upload/theme/'.$ConfigTheme_->logo_theme ))
                <img id="logoTheme" src="{{ asset('/content/upload/theme/'.$ConfigTheme_->logo_theme) }}" alt="Logo" >
            @else
              $ConfigTheme_->name_theme
            @endif
      @else
        $ConfigTheme_->name_theme
      @endif
      </div>
    </h5>
    <button type="button" class="close" data-dismiss="modal">
      <i class="lni-close"></i>
    </button>
    </div>
    <div class="modal-body ">
      <div class="row menu-left-options">
        <div class="col-lg-12 item-menu"><strong><i class="lni-home"></i>&nbsp;&nbsp;Inicio</strong></div>
        <div class="col-lg-12 item-menu"><strong><i class="lni-offer"></i>&nbsp;&nbsp;Promociones</strong></div>
        <div class="col-lg-12 item-menu"><strong><i class="lni-list"></i>&nbsp;&nbsp;Categorias</strong></div>
          <div class="col-lg-12 item-menu ">
            <div class="category-list">
              <ul>
                <li>Frutas</li>
                <li>Verduras</li>
                <li>Vegetales</li>
                <li>Tuberculos</li>
              </ul>
            </div>
          </div>
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
						<h5 class="modal-title" style="font-size:13px;"><i class="lni-cart"></i> Mi Carrito de Compras {{$ConfigTheme_->name_theme}}</h5>
						<button type="button" class="close" data-dismiss="modal">
              <i class="lni-close" style="cursor:pointer"></i>
						</button>
					  </div>
            <div class="modal-body " style="background:#FFFFFF30 !important;border-top:1px solid #E5EDEF  ">
              <div class="content-cart empty-cart">
                <i class="lni-cart" style="font-size:36px;font-weight:border"></i><br/><br />
                <b style="font-size:14px">Tu canasta está vacía</b><br /><br /><br />
                <p style="font-size:12px">Te invitamos a volver a nuestras tienda y agregues productos a tu canasta</p>
              </div>
					  </div>
					  <div class="modal-footer modal-footer-uniform">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
					  </div>
					</div>
				  </div>
				</div>
			  <!-- /.modal -->
