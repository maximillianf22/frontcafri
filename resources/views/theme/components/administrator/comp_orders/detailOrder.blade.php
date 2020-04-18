
<?php
     $listCarProduc_ = array();
     $listCarProduc_=$ListProduct;
     $items_ =  count($listCarProduc_);


     if($items_>=  1){ 
          echo "<div class='panel-products-view'  id='pnl-products-car' data-cantidad='".$items_."'>";
          echo "
          <div class='row pad-all'>
               <div class='col-lg-12' style='font-weight:bold'>Productos Seleccionados</div>
               </div>
          ";
          $acmSubtotal_ = 0; 
          $acmTotal_ = 0; 
          $categorieMain_ ="none";

          for ($i=0; $i < $items_; $i++) {
               
               $pathImg_ = '/content/upload/store/'.$listCarProduc_[$i]['imageProduct'];
               if($categorieMain_ === $listCarProduc_[$i]['catergorie_main']){
                    echo "<div class='container-fluid  '> 
               <div id='basket-products' class='row '>
                    <div class='col-lg-4 col-md-4 col-xs-3 pad-all ' style='text-align:center;'><div style='width:70px; height:70px; text-align:center; margin:0 auto '><img src='".$pathImg_."' class='imgAttribute' width='90%' /></div></div>
                    <div class='col-lg-8 col-md-8 col-xs-8 items pad-top' style='border-bottom:1px solid #F2F2F2' >
                         <div class='nameAttribute pad-top'>".$listCarProduc_[$i]['nameProduct']."</div>
                         <div class='unitAttribute'>".$listCarProduc_[$i]['nameCategory']."</div>
                         <div class='unitAttribute'>( ".$listCarProduc_[$i]['quantityOrder']." ".$listCarProduc_[$i]['valor_unidad']." X ".number_format($listCarProduc_[$i]['priceOrder'])." ) / <span class='priceAttribute' style='color:#FF0000'> $ ".number_format($listCarProduc_[$i]['total_producto'],2)."</span></div>
                    </div>
               </div></div>";
                    
               }else{
                    $categorieMain_ = $listCarProduc_[$i]['catergorie_main']; 
                    echo "<div class='container-fluid  ' style='font-size:11px;padding:10px;'>".$categorieMain_."</div>";
                    echo "<div class='container-fluid  '> 
               <div id='basket-products' class='row '>
                    <div class='col-lg-4 col-md-4 col-xs-3 pad-all ' style='text-align:center;'><div style='width:70px; height:70px; text-align:center; margin:0 auto '><img src='".$pathImg_."' class='imgAttribute' width='90%' /></div></div>
                    <div class='col-lg-8 col-md-8 col-xs-8 items pad-top' style='border-bottom:1px solid #F2F2F2' >
                         <div class='nameAttribute pad-top'>".$listCarProduc_[$i]['nameProduct']."</div>
                         <div class='unitAttribute'>".$listCarProduc_[$i]['nameCategory']."</div>
                         <div class='unitAttribute'>( ".$listCarProduc_[$i]['quantityOrder']." ".$listCarProduc_[$i]['valor_unidad']." X ".number_format($listCarProduc_[$i]['priceOrder'])." ) / <span class='priceAttribute' style='color:#FF0000'> $ ".number_format($listCarProduc_[$i]['total_producto'],2)."</span></div>
                    </div>
               </div></div>";


               }
              
               /*
               
               */
               $acmSubtotal_=($acmSubtotal_+$listCarProduc_[$i]['total_producto']);
               $acmTotal_=($acmTotal_+$listCarProduc_[$i]['total_producto']);
               $code_cupon_ = $listCarProduc_[$i]['code_cupon'];
               $valor_cupon_ = $listCarProduc_[$i]['cupon_value'];
               
              // print($listCarProduc_[$i]['nameProduct']);
          }
          echo "</div>";
          
          echo "<br /><br />
          <div class='row pad-all'>
               <div class='col-lg-12' style='font-weight:bold'>Detalle de la Compra </div>
               </div>
          ";

          if(!empty($code_cupon_)){
               echo "<div class='container-fluid' style='margin-top:10px !important;'><div class='row '>
               <div class='col-lg-6 col-md-6 '><div class='subtotal'>CUPON REDIMIDO</div></div>
               <div class='col-lg-6 col-md-6 '><div class='subtotal'>".$code_cupon_."</div></div>
               </div></div>";
          }
         

          echo "<div class='container-fluid' style='margin-top:10px !important;'><div class='row '>
                    <div class='col-lg-6 col-md-6 '><div class='subtotal'>Subtotal :</div></div>
                    <div class='col-lg-6 col-md-6 '><div class='subtotal'>$ ".number_format($acmSubtotal_,2)."</div></div>
               </div></div>";
          
          echo "<div class='container-fluid'><div class='row '>
               <div class='col-lg-6 col-md-6 '><div class='descuento'>Descuento :</div></div>
               <div class='col-lg-6 col-md-6 '><div id='valor_descuento' data-cupon='' class='descuento'>- $ ".number_format($valor_cupon_,2)."</div></div>
          </div></div>";

          echo "<div class='container-fluid'><div class='row '>
               <div class='col-lg-6 col-md-6 '><div class='subtotal'>Costo de Envio :</div></div>
               <div class='col-lg-6 col-md-6 '>";

                    if($acmSubtotal_>=$OrderDetail->minimun_shop){
                         if( $OrderDetail->minimun_shop >0){
                              echo " <div class='subtotal'>$ ".number_format(0,2)."</div>";
                         }else{
                              echo " <div class='subtotal'>$ ".number_format($OrderDetail->send_value_cost,2)."</div>";
                         }
                    }else{
                         echo " <div class='subtotal'>$ ".number_format($OrderDetail->send_value_cost,2)."</div>";
                    }
               echo "</div>
               </div></div>";
          
               echo "<div class='container-fluid' style='margin-top:10px !important;'><div class='row '>
               <div class='col-lg-6 col-md-6 '><div class='total' style='font-weight:bold'>Total </div></div>
               <div class='col-lg-6 col-md-6 '>";
                    if($acmSubtotal_>=$OrderDetail->minimun_shop){
                         if( $OrderDetail->minimun_shop>0){
                              echo " <div class='total' style='font-weight:bold'>$ ".number_format((($acmTotal_+0)-$valor_cupon_),2)."</div>";
                         }else{
                              echo " <div class='total' style='font-weight:bold'>$ ".number_format((($acmTotal_+ $OrderDetail->send_value_cost)-$valor_cupon_),2)."</div>";
                         } 
                    }else{
                         echo " <div class='total.' style='font-weight:bold'>$ ".number_format((($acmTotal_+$OrderDetail->send_value_cost)-$valor_cupon_),2)."</div>";
                    }
               echo "</div>
               </div></div>";

          

     }else{
        echo '
          <div id="basket-empty" class="modal-body " >
               <div id="listcar-content-products">
                    <div class="content-cart empty-cart">
                         <br/><br /><br/><br />
                         <br /><br /> ';
                        ?>
                         <img src="{{ asset('/content/upload/app/empty-shopping-basket.svg') }}" width="64" height="64" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30" />
<?php
                    echo '<br/><br />
                         <b style="font-size:14px">Tu canasta está vacía</b><br />
                         <b style="font-size:14px">realiza tu primera compra</b>
                         </b><br /></b><br />
                         <p style="font-size:12px"></p>
                    </div>
               </div>
          </div> ';
     }
?>
