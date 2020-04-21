<nav class="navbar navbar-expand-lg p-0 m-0 navbar-dark bg-gradient-danger">
    <div class="container p-1 m-0 ">
            <ul class="navbar-nav ml-5 ml-lg-auto p-0 m-0">
                <li class="nav-item ml-5 ">
                    <a class=" p-1 m-0 nav-link nav-link-icon btn-lg btn-danger text-center mx-auto align-items-center" href="#">
                        <i><img class="emoji" alt="🇨🇴" src="https://s.w.org/images/core/emoji/11.2.0/svg/1f1e8-1f1f4.svg" width="10%"></i>
                        <span class="nav-link-inner--text "><strong>Colombia</strong></span>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-none d-md-none d-lg-block">
                    <a class=" p-1 m-0 nav-link nav-link-icon" href="#">
                        <strong><i class="fab fa-whatsapp"></i>
                        <span class="nav-link-inner--text">+57 (381) 818-8181</span></strong>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
<div class="container_fluid menu-top-page">
 <div class="row ">
     
     <div class="col col-lg-6 col-md-6 col-sm-6 ">
          <div class="store-header-2-x-search">
               <div class="store-header-2-x-alingSearchContent">

                    <div class="store-header-2-x-menuContent">
                         <div style="width:20px;"> <img src="{{ asset('/content/upload/app/menu.svg') }}" style="vertical-align: middle;" viewBox="0 0 30 30"  data-toggle="modal" data-target="#modal-left" /> </div>
                    </div>
               
                    <div class="store-header-2-x-logoContent">
                         <div ><a href="/"><img src="{{ asset('/content/upload/theme/logo_slogan.png') }}"  alt="Inicio" crossorigin="anonymous"></a></div>
                    </div>
                    
               </div>
          </div>
     </div>

     <div class="col col-lg-6 col-md-6 col-sm-6 pad-all">
          <div class="header-options-user pad-rgt">
               <div class="header-links-content pad-all">
                    <!---
                    @if(Auth::check())

                    <div class="minicart-content item-header-link flex justify-center">
                         <div class="minicart-content minicart-content-mobile">
                              <aside class="store-minicart-3-x-container relative fr flex items-center">
                                   <div class="flex flex-column txt-center ">
                                        <div class="store-header-2-x-minicartButtonMobile store-header-2-x-minicartButton">
                                             <div class="store-header-2-x-minicartInner txt-center">
                                                  <a href="{{route('store.orders.product')}}"><img src="{{ asset('/content/upload/app/repeat-orders.svg') }}" width="30" height="30" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30"  /></a>
                                             </div>
                                             <span class="store-header-2-x-minicartSpan" style="padding-top:3px;"><span class="custom-icon-label">
                                                  Repetir Pedido
                                             </span></span>
                                        </div>
                                   </div>
                              </aside>
                         </div>
                    </div>

                    @else
                    <div class="minicart-content item-header-link flex justify-center">
                         <div class="minicart-content minicart-content-mobile">
                              <aside class="store-minicart-3-x-container relative fr flex items-center">
                                   <div class="flex flex-column txt-center ">
                                        <div class="store-header-2-x-minicartButtonMobile store-header-2-x-minicartButton">
                                             <div class="store-header-2-x-minicartInner txt-center">
                                                  <img onclick="showgidCliente()" src="{{ asset('/content/upload/app/change_options.png') }}" width="30" height="30" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30"  />
                                             </div>
                                             <span class="store-header-2-x-minicartSpan"  style="padding-top:3px;"><span class="custom-icon-label">
                                             <?php
                                             if(!empty($_COOKIE['_gid'])){
                                                  if($_COOKIE['_gid']=='P'){
                                                       echo "Natural";
                                                  }else{
                                                       echo "Comercio";
                                                  }
                                             } ?>
                                             </span></span>
                                        </div>
                                   </div>
                              </aside>
                         </div>
                    </div>
                    @endif
                    --->
                    <div class="minicart-content item-header-link flex justify-center">
                         <div class="minicart-content minicart-content-mobile">
                              <aside class="store-minicart-3-x-container relative fr flex items-center">
                                   <div class="flex flex-column txt-center ">
                                        <div class="store-header-2-x-minicartButtonMobile store-header-2-x-minicartButton">
                                             <div class="store-header-2-x-minicartInner txt-center">
                                                  @if(Auth::check())
                                                       <a href="{{route('account.index')}}"><img src="{{ asset('/content/upload/app/user_options.png') }}" width="20" height="20" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30"  /></a>
                                                  @else
                                                       <a href="{{route('login')}}"><img src="{{ asset('/content/upload/app/user_options.png') }}" width="20" height="20" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30"  /></a>
                                                  @endif
                                             </div>
                                             @if(Auth::check())
                                                  @if(Auth::user()->isCommerce==1)
                                                       <a href="{{route('account.index')}}"><span class="store-header-2-x-minicartSpan" style="padding-top:3px;"><span class="custom-icon-label">{{Auth::user()->nameBusiness}}</span></span></a>
                                                  @else
                                                       <a href="{{route('account.index')}}"><span class="store-header-2-x-minicartSpan" style="padding-top:3px;"><span class="custom-icon-label">{{Auth::user()->nameUser}}</span></span></a>
                                                  @endif
                                             @else
                                                  <span class="store-header-2-x-minicartSpan" style="padding-top:3px;"><span class="custom-icon-label">Mi Cuenta</span></span>
                                             @endif
                                        </div>
                                   </div>
                              </aside>
                         </div>
                    </div>

                    <div class="minicart-content item-header-link flex justify-center">
                         <div class="minicart-content minicart-content-mobile">
                              <aside class="store-minicart-3-x-container relative fr flex items-center">
                                   <div class="flex flex-column txt-center ">
                                        <div class="store-header-2-x-minicartButtonMobile store-header-2-x-minicartButton">
                                             <div class="store-header-2-x-minicartInner txt-center">
                                                  <span id="show_cnt_products" class="store-item-car-products hide_item" ><span id="cnt-add-products" class="store-header-2-x-minicartBadge store-header-2-x-pulsate">0</span></span>
                                                  <img src="{{ asset('/content/upload/app/cart.png') }}" width="22" height="22" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30" data-toggle="modal" data-target="#modal-right" />
                                             </div>
                                             <span class="store-header-2-x-minicartSpan"  style="padding-top:3px;"><span class="custom-icon-label">Mi Carrito</span></span>
                                        </div>
                                   </div>
                              </aside>
                         </div>
                    </div>

               </div>
          </div>
     </div> 
 </div>
</div>