<footer id="footer" class="">
     

   <footer class="footer" style="border-top: 1px solid #afafaf; padding-top: 40px; margin-top:20px;">
        <div class="container">
          <div class="row">
            <div class="col-md-4" style="margin-bottom:20px;">
              <ul class="list-unstyled my-4">
                <li><h3 class="text-success">Nosotros</h3></li>
                <li style="line-height: 25px;"> <a href="#">Quienes Somos</a> </li>
                <li style="line-height: 25px;"> <a href="#">Promociones</a> </li>
                <li style="line-height: 25px;"> <a href="https://ventual.co/login">Iniciar Comercio</a> </li>
              </ul>
            </div>
            <div class="col-md-4" style="margin-bottom:20px;">
              <ul class="list-unstyled my-4">
                <li><h3 class="text-success">Ayuda</h3></li>
                <li style="line-height: 25px;"> <a href="#">Contacto</a> </li>
                <li style="line-height: 25px;"> <a href="#">Preguntas frecuntes</a> </li>
                <li style="line-height: 25px;"> <a href="#">Registrarme</a> </li>
              </ul>
            </div>
            <div class="col-md-4" style="margin-bottom:20px;">
              <div class="text-center">
                  @if(!empty($Config_->logo))
                       @if (file_exists( public_path().'/content/upload/theme/'.$Config_->logo ))
                            <a href="{{route('index')}}"><img id="logoTheme" src="{{ asset('/content/upload/theme/'.$Config_->logo) }}" alt="Logo" ></a>
                       @else
                            <a href="{{route('index')}}"><img id="logoTheme" src="{{ asset('/content/upload/theme/'.$Config_->icono) }}" alt="Logo" ></a>   
                       @endif
                  @else
                  @endif
              </div>
              <div class="row align-items-center" style="margin-top:20px;">
                <div class="col-4 text-center">
                  <a href="#"><img src="https://ventual.co/assets/home/images/facebook.png" style="width:40px;" alt=""></a>
                </div>
                <div class="col-4 text-center">
                  <a href="#"><img src="https://ventual.co/assets/home/images/twitter.png" style="width:40px;" alt=""></a>
                </div>
                <div class="col-4 text-center">
                  <a href="#"><img src="https://ventual.co/assets/home/images/youtube.png" style="width:40px;" alt=""></a>
                </div>
              </div>
              <div class="row align-items-center" style="margin-top:40px;">
                <div class="col-6 text-right">
                  <a href="#"><img src="https://ventual.co/assets/home/images/googlePlay.png" style="width:100%;" alt=""></a>
                </div>
                <div class="col-6">
                  <a href="#"><img src="https://ventual.co/assets/home/images/appStore.png" style="width:100%;" alt=""></a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="footer_nav_container">
                <div class="cr">©2018 Todos los derechos reservados. <a href="#">Cafri by Ventual</a></div>
              </div>
            </div>
          </div>
        </div>
      </footer>


<a href="https://api.whatsapp.com/send?phone=573044458195&amp;text=Hola,%20deseo%20realizar%20un%20nuevo%20pedido%20" class="btn_whatsapp" target="_blank">
  <i class="lni-whatsapp" aria-hidden="true"></i> Pedido rápido
</a>



<!-- Modal Optiones Menu  -->
<div class="modal modal-left fade" id="modal-left" tabindex="-1">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      
    <h5 class="modal-title">
      <div class="text-center">
          @if(!empty($Config_->logo))
               @if (file_exists( public_path().'/content/upload/theme/'.$Config_->logo ))
                    <a href="{{route('index')}}"><img id="logoTheme" src="{{ asset('/content/upload/theme/'.$Config_->logo) }}" alt="Logo" ></a>
               @else
                    <a href="{{route('index')}}"><img id="logoTheme" src="{{ asset('/content/upload/theme/'.$Config_->icono) }}" alt="Logo" ></a>   
               @endif
          @else
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
        <div class="col-lg-12 item-menu linkAction"><a href="{{route('store.viewOffers.product')}}">
             <i class="lni-offer"></i>
             <img src="{{ asset('/content/upload/app/offer.svg') }}" width="20" height="20" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30"  />
             &nbsp;&nbsp;Promociones</a></div>
          
          <div class="col-lg-12 item-menu linkAction"> 
            <div id="accordion" style="padding:none !important ">
              <div class="card-header" style="border:none !important ; padding:1px !important">
                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                  <i class="lni-list"></i>
                  
                  <img src="{{ asset('/content/upload/app/farm-products.svg') }}" width="20" height="20" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30"  />
                  &nbsp;&nbsp;Categorias &nbsp;&nbsp;&nbsp;&nbsp;<i class="lni-chevron-down" style="color:#9EB934; font-weight:bold"></i>
                </a>
              </div>
              <div id="collapseOne" class="collapse " data-parent="#accordion">
                <div class="card-body">
                  <div class="category-list item">
                    
                    <ul>
                      @if(sizeof($Store_categorie_menu)>=1)
                        @foreach($Store_categorie_menu as $Category)
                          <li style="padding:5px;"><a href="{{route('store.category.lisproduct',$Category->slug_main)}}"><i class="lni-minus"></i>&nbsp; &nbsp; {{$Category->categoria_main}}</a></li>
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
          <div class="col-lg-12 item-menu linkAction"><a href="{{route('account.index')}}">
               <i class="lni-user"></i>
               <img src="{{ asset('/content/upload/app/profile.svg') }}" width="20" height="20" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30"  />
               &nbsp;&nbsp;Mi Perfil</a></div>

               <div class="col-lg-12 item-menu linkAction"><a href="{{route('account.addresses')}}">
               <i class="lni-user"></i>
               <img src="{{ asset('/content/upload/app/profile.svg') }}" width="20" height="20" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30"  />
               &nbsp;&nbsp;Mi Direcciones</a></div>
               

          <div class="col-lg-12 item-menu linkAction"><a href="{{route('store.orders.product')}}">
               <i class="lni-cart-full"></i>
               
               <img src="{{ asset('/content/upload/app/delivery-truck.svg') }}" width="20" height="20" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30"  />
               &nbsp;&nbsp;Mis Pedidos</a></div>
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

    <div id="basket-empty" class="modal-body ">
      <div id="listcar-content-products">
          <div class="content-cart empty-cart">
               <br/><br /><br/><br />
               <br /><br />
               <img src="{{ asset('/content/upload/app/empty-shopping-basket.svg') }}" width="64" height="64" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30" />
               <br/><br />
               <b style="font-size:14px">Tu canasta está vacía</b><br />
               <b style="font-size:14px">Realiza tu primera compra</b>
               <br /><br /><br />
               <p style="font-size:12px"></p>
          </div>
      </div>
    </div>
    
  </div>
  </div>
</div>
<!-- /.modal -->


<div class="modal center-modal fade show " id="gid_Cliente" tabindex="-1">
<div class="modal-dialog " style="border-top:5px solid #afdbf6; border-bottom:5px solid #afdbf6" >
<div class="modal-content">
     <div class="modal-body" style="min-height:250px;">
          <div class="row">
               <div class="col-lg-12 text-center tit_method_access">Elige que tipo de perfil eres</div>
               <div class="col-lg-12 pad-all text-center subinfo_title_method_access">
                    Selecciona el perfil con el cual deseas consultar nuestros productos.
               </div>
          </div>
          <div class="row">
               <div class="col-6 col-md-6 pad-all">
                    <div class="pad-all option-shop" 
                         style="min-height:100px; padding-top:15px"
                         onclick='gidCliente("P")'>
                         <img src="{{ asset('/content/upload/app/user_options.png') }}" width="64" height="64" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30" />
                         <br />
                         <span class="gidCliente_">Persona Natural</span>
                    </div>
               </div>
               <div class="col-6 col-md-6 pad-all">
                    <div class="pad-all">
                         <div class="pad-all option-shop" 
                              style="min-height:100px; padding-top:15px"
                              onclick='gidCliente("C")'>
                              <img src="{{ asset('/content/upload/app/public.png') }}" width="64" height="64" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30" />
                              <br />
                              <span class="gidCliente_">Negocio</span>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
</div>
</div>


<div class="modal center-modal fade show " id="gid_Cupon"  style="max-width: 100%;" tabindex="-1">
<div class="modal-dialog " >
<div class="modal-content">
     <div class="modal-body" style="min-height:250px;">
          <div class="row">
               <div class="col-lg-12 text-center tit_method_access ">
                    <div id="CuponOffer"><div id="data-cupon" class="data-cupon" ></div></div>
               </div>
          </div>
          <div class="row">
               <div class="col-lg-12 pad-all text-center info-cupon">
                    Ok, Código Valido, Valor <span id="valor_cupon">$ 0</span>
               </div>
          </div>
          <div class="row">
               <div class="col-lg-12 pad-all text-center info-cupon">
                    Desea redimirlo sobre esta compra 
               </div>
          </div>
          <div class="row">
               <div class="col-lg-2 pad-all"></div>
               <div class="col-lg-4 pad-all">
                    <div class="cupon_si pad-all" onclick='applyCupon()'>Si, Redimir </div>
               </div>
               <div class="col-lg-4 pad-all">
                    <div class="cupon_no pad-all"  onclick='hideCupon()'> NO </div>
               </div>
               <div class="col-lg-2 pad-all"></div>
          </div>
          
     </div>
</div>
</div>
</div>





</footer>