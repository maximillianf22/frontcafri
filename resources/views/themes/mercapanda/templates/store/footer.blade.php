<footer class="text-muted  bg-theme-footer">
     <div class="container ">
          <div class="row pad-all">
               <div class="col pad-all text-center">
                    @if (file_exists( public_path().'/content/upload/logofooter.png' ))
                         <img id="logoTheme" src="{{ asset('/content/upload/logofooter.png') }}" alt="Logo footer " >
                    @else
                         Logo footer
                    @endif
               </div>
               <div class="col pad-all ">
                    <div style=" font-weight:bold; font-size:14px; color:#17100D;text-align:center">PRODUCTOS</div>
                    <p class="text-center">
                    
                    </p>
               </div>
               <div class="col pad-all ">
                   <div style=" font-weight:bold; font-size:14px; color:#17100D;text-align:center">ATENCIÓN AL CLIENTE</div>
                   <p class="text-center">
                   soporte@mercapanda.co <br />300 000 0000
                   </p>
               </div>
               <div class="col pad-all ">
                    <div style=" font-weight:bold; font-size:14px; color:#17100D;text-align:center">SIGUENOS</div>
                    <div class="pad-all text-center " style="display:inline-block; text-align:center !important; width:100%">
                         <img id="icn-facebook" src="{{ asset('/content/upload/theme/facebook.png') }}" alt="facebook" >&nbsp;&nbsp;
                         <img id="icn-facebook" src="{{ asset('/content/upload/theme/instagram.png') }}" alt="instagram" >&nbsp;&nbsp;
                         <img id="icn-facebook" src="{{ asset('/content/upload/theme/twitter.png') }}" alt="twitter" >&nbsp;&nbsp;
                    </div>
                    <div class="pad-all text-center " style="display:inline-block; text-align:center !important; width:100%">
                         <img id="icn-facebook" src="{{ asset('/content/upload/theme/googleplay.png') }}" alt="googleplay" >&nbsp;&nbsp;
                         <img id="icn-facebook" src="{{ asset('/content/upload/theme/appstore.png') }}" alt="appstore" >&nbsp;&nbsp;
                         
                    </div>
                    <div style=" font-weight:bold; font-size:12px; color:#17100D;text-align:center">Disponible para tu iPhone, iPad o Android.</div>
                    
               </div>
          
          </div>
         
     </div>

    
</footer>
<div class="col-lg-12 pad-all bg-white text-center">© 2019 MercaPanda, Inc. All rights reserved - Developed By developapp.co</div>