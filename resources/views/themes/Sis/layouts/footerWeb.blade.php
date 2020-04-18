<footer class="text-muted  bg-theme-footer">
     <div class="container ">
          <div class="row">
               <div class="col pad-all text-center">
                    @if (file_exists( public_path().'/content/upload/logofooter.png' ))
                         <img id="logoTheme" src="{{ asset('/content/upload/logofooter.png') }}" alt="Logo footer " >
                    @else
                         Logo footer
                    @endif
               </div>
               <div class="col pad-all ">
                    2
               </div>
               <div class="col pad-all ">
                   <div style=" font-weight:bold; font-size:14px; color:#17100D;text-align:center">ATENCIÓN AL CLIENTE</div>
                   <p class="text-center">
                   soporte@mercapanda.co <br />300 000 0000
                   </p>
               </div>
               <div class="col pad-all ">
                    4
               </div>
          
          </div>
         
     </div>

    
</footer>
<div class="col-lg-12 pad-all bg-white text-center">© 2019 MercaPanda, Inc. All rights reserved - Developed By developapp.co</div>