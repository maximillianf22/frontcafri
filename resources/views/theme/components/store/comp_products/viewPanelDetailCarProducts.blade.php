
<?php
     $listCarProduc_ = array();
     $listCarProduc_=$ListProduct;

     // $listCarProduc_->send_value_cost;
     if(!empty($order_)){
          $costo_envio = $order_->send_value_cost;
          $minimun_shop_ = $order_->minimun_shop;
     }else{
          $costo_envio = 0;
          $minimun_shop_ = 0;
     }

     $items_ =  count($listCarProduc_);
     if($items_>=  1){
          echo "<div class='panel-products-view' style='height:53vh' data-base='".$min_compra_->extra."' data-vrenvio='".$envio_->extra."' id='pnl-products-car' data-cantidad='".$items_."'>";
          $acmSubtotal_ = 0; 
          $acmTotal_ = 0; 
          $vrCupon_=0;
          for ($i=0; $i < $items_; $i++) {
               $pathImg_ = '/content/upload/store/'.$listCarProduc_[$i]['imageProduct'];
               echo "<div class='container-fluid'>
               <div id='basket-products' class='row '>
                    <div class='col-lg-4 col-md-4 col-xs-4 '><img src='".$pathImg_."' class='imgAttribute' width='90%' style='width='200px; height:200px' /></div>
                    <div class='col-lg-8 col-md-8 col-xs-8 items' style='border-bottom:1px solid #F2F2F2' >
                         <div class='nameAttribute'>".$listCarProduc_[$i]['nameProduct']."</div>
                         <div class='unitAttribute'>".$listCarProduc_[$i]['nameCategory']."</div>
                         <div class='unitAttribute'>( ".$listCarProduc_[$i]['quantityOrder']." X ".number_format($listCarProduc_[$i]['priceOrder'])." ) / <span class='priceAttribute'> $ ".number_format($listCarProduc_[$i]['total_producto'],2)."</span></div>
                         
                    </div>
               </div></div>
               ";
               $acmSubtotal_=($acmSubtotal_+$listCarProduc_[$i]['total_producto']);
               $acmTotal_=($acmTotal_+$listCarProduc_[$i]['total_producto']);
               $vrCupon_ =$listCarProduc_[$i]['cupon_value'];
               $codeCupon_ =$listCarProduc_[$i]['code_cupon'];
              // print($listCarProduc_[$i]['nameProduct']);
          }
          echo "</div>";
          
          echo "<div class='text-center pad-top pad-btm ' style='font-weight:bold; color:#212121; font-size:11px; border-top:1px dashed #CCC;'> 
               Información de la compra
          </div>";

         
          if(!empty($codeCupon_)){
               echo "<div class='container-fluid' style='margin-top:10px !important; background:#F2F2F2; padding:10px;'><div class='row '>
               <div class='col-lg-6 col-md-6 '><div class='subtotal'>CUPON </div></div>
               <div class='col-lg-6 col-md-6 '><div class='subtotal'>".$codeCupon_."</div></div>
               </div></div>";
          }

          echo "<div class='container-fluid' style='margin-top:10px !important;'><div class='row '>
                    <div class='col-lg-6 col-md-6 '><div class='subtotal'>Subtotal :</div></div>
                    <div class='col-lg-6 col-md-6 '><div class='subtotal'>$ ".number_format($acmSubtotal_,2)."</div></div>
               </div></div>";
          
          echo "<div class='container-fluid'><div class='row '>
               <div class='col-lg-6 col-md-6 '><div class='descuento'>Descuento :</div></div>
               <div class='col-lg-6 col-md-6 '><div id='valor_descuento' data-cupon='' class='descuento'>$ ".number_format($vrCupon_,2)."</div></div>
          </div></div>";

          echo "<div class='container-fluid'><div class='row '>
               <div class='col-lg-6 col-md-6 '><div class='subtotal'>Costo de Envio :</div></div>
               <div class='col-lg-6 col-md-6 '>";
               
                     if($acmSubtotal_ >= $minimun_shop_){
                         if($minimun_shop_>0){
                              echo " <div class='subtotal'>$ ".number_format(0,2)."</div>";
                         }else{
                              echo " <div class='subtotal'>$ ".number_format($costo_envio,2)."</div>";
                         } 
                    }else{
                         echo " <div class='subtotal'>$ ".number_format($envio_->extra,2)."</div>";
                    }
               echo "</div>
               </div></div>";
          
               echo "<div class='container-fluid' style='margin-top:10px !important;'><div class='row '>
               <div class='col-lg-6 col-md-6 '><div class='total'>Total </div></div>
               <div class='col-lg-6 col-md-6 '>";
               //echo $costo_envio;
                    if($acmSubtotal_>=$min_compra_->extra){
                         if($min_compra_->extra>0){
                              echo " <div class='total'>$ ".number_format((($acmTotal_+0)-$vrCupon_),2)."</div>";
                         }else{
                              echo " <div class='total'>$ ".number_format((($acmTotal_+$costo_envio)-$vrCupon_),2)."</div>";     
                         }
                    }else{
                         echo " <div class='total'>$ ".number_format((($acmTotal_+$envio_->extra)-$vrCupon_),2)."</div>";
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

<script>
     
     var cant_products = <?php echo $items_ ?>;
     $("#item-car-account").html(cant_products);
     $("#dataStoreCar").data("json",<?php echo json_encode($ListProduct) ?>);
     $("#checkouStoreCar").data("json",<?php echo json_encode($ListProduct) ?>);
     //Cookies.set('store.catalogo',$ListProduct,{ expires: 7 });

</script>

