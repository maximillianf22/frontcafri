<div class='text-center pad-all text-white' style="background:#9EB93480;color:#212121; font-weight:normal; margin:-2px -2px 0 -2px;"> *ENVÍOS GRATIS por compras superiores a $ 50.000</div>
<?php
     $listCarProduc_ = array();
     $listCarProduc_=$ListProduct;
    // dd($listCarProduc_);
     $items_ =  count($listCarProduc_);

     if($items_>=  1){
          echo "<div id='pnl-products-car' data-cantidad='".$items_."' class='panel-products-view' style='box-shadow: inset 0px -50px 50px -50px rgba(0,0,0,0.25);'>";
          $acmSubtotal_ = 0; 
          $acmTotal_ = 0; 
          for ($i=0; $i < $items_; $i++) {
               $pathImg_ = '/content/upload/store/'.$listCarProduc_[$i]['imageProduct'];
               echo "
               <div id='basket-products' class='row pad-lft ' >
                    <div class='col-lg-4 col-md-4 col-xs-4 pad-lft'><img src='".$pathImg_."' class='imgAttribute' /></div>
                    <div class='col-lg-8 col-md-8 col-xs-8 items' >
                         
                         <div class='options-item'>
                              <div class='editItemCar' onclick='openProduct(".$listCarProduc_[$i]['idProduct'].",".$listCarProduc_[$i]['idAttribute'].")'><i class='lni-pencil'></i></div>     
                              <div class='deleteItemCar' onclick='removeProduct(".$listCarProduc_[$i]['idProduct'].",".$listCarProduc_[$i]['idAttribute'].")'><i class='lni-cross-circle'></i></div>          
                         </div>
                         <div class='nameAttribute'>".$listCarProduc_[$i]['nameProduct']."</div>
                         <div class='unitAttribute'>( ".$listCarProduc_[$i]['quantityOrder']." * ".number_format($listCarProduc_[$i]['priceOrder'],2)." )</div>
                         <div class='priceAttribute'> $ ".number_format($listCarProduc_[$i]['totalOrder'],2)."</div>
                    </div>
               </div>
               ";
               $acmSubtotal_=($acmSubtotal_+$listCarProduc_[$i]['totalOrder']);
               $acmTotal_=($acmTotal_+$listCarProduc_[$i]['totalOrder']);
              // print($listCarProduc_[$i]['nameProduct']);
          }
          echo "</div>";
     
          echo "<div class='basket-clear' onclick='clearbasket()'><b class='lni-eraser'></b> Limpiar Carrito </div>";
          
     
          if($acmSubtotal_>=50000){
               echo "<div id='free_shipping'>
               <span class='info-box-text' style='color:#1FA02E'>Tu envio es gratis</span>
               <div class='progress'>
                    <div class='progress-bar' style='width: 100%'></div>
               </div>
               </div>";
          }else{
               echo "<div id='free_shipping'>
               <span class='info-box-text' style='color:#212121; font-weight:bold'>Faltan <b>$ ".number_format((50000-$acmSubtotal_),2)."</b> para envio gratis</span>
               <div class='progress'>
                    <div class='progress-bar' style='width: ".(($acmSubtotal_/50000)*100)."%'></div>
               </div>
               </div>";
          }

         
     
          echo "<div id='footer-total-car' class='pad-top'>";
               echo "<div style='border-bottom:1px dashed #DDD;padding:1px 2px 3px'>";
     
               echo "<div class='subtotal'><span class='lbl'>Subtotal :</span>$ ".number_format($acmSubtotal_,2)."</div>";
               echo "<div class='discount'><span class='lbl'>Descuento :</span>$ 0 </div>";
               echo "<div class='iva'><span class='lbl'>Iva :</span>$ 0 </div>";
               
               
               if($acmSubtotal_>=50000){
                    echo "<div class='Shipping'><span class='lbl'>Costo Envio :</span>$ 0.00 </div>";
                    echo "<div class='total'><span class='lbl'>Total :</span>$ ".number_format(($acmTotal_+0),2)."</div>";
               }else{
                    echo "<div class='Shipping'><span class='lbl'>Costo Envio :</span>$ 10,000.00 </div>";
                    echo "<div class='total'><span class='lbl'>Total :</span>$ ".number_format(($acmTotal_+10000),2)."</div>";
               }
               echo "</div>";
     
               if(Auth::check()){
                    echo "<div class='pad-all ' style='padding_2px 10px; text-align:center'> 
                              <a href='/store/mycart/checkout'><button type='button' style='border:1px solid #9EB934; background:none' class='btn ' >Pagar contra entrega</button></a>
                         </div
                    </div>";
               }else{
                    if(!empty(Auth::User()->id)){
                         echo "<div class='pad-all ' style='padding_2px 10px; text-align:center'> 
                                   <div id='checkouStoreCar' onclick='checkoutProducts()' data-json='.null.' style='background:#9EB934;color:#FFF; width:100%; height:40px;padding:8px; font-size:14px; font-weight:300' class='btn' >Continuar con la compra</div>
                              </div
                         </div>";
                    }else{
                         echo "<div class='pad-all ' style='padding_2px 10px; text-align:center'> "; ?>
                              <a href="{{route('login')}}"><div id='checkouStoreCar' data-json='.null.' style='background:#9EB934;color:#FFF; width:100%; height:40px;padding:8px; font-size:14px; font-weight:300' class='btn' >Continuar con la compra</div></a>
<?php                         echo "</div
                         </div>";
                    }
                   
               }
              
          echo "</div>";
     }else{
        
          echo '
          <div id="basket-empty" class="modal-body " >
               
               <div id="listcar-content-products">
               <div class="content-cart empty-cart">
               <i class="lni-cart" style="font-size:36px;font-weight:border"></i><br/><br />
               <b style="font-size:14px">Tu canasta está vacía</b><br /><br /><br />
               <p style="font-size:12px">Te invitamos a volver a nuestras tienda y agregues productos a tu canasta</p>
               </div>
               </div>

          </div> ';
          
     }

     
     // print_r($listCarProduc_);
     // var_dump($jSonAll_); 
?>

<script>
     
     var cant_products = <?php echo $items_ ?>;
     $("#item-car-account").html(cant_products);
     $("#dataStoreCar").data("json",<?php echo json_encode($ListProduct) ?>);
     $("#checkouStoreCar").data("json",<?php echo json_encode($ListProduct) ?>);
     //Cookies.set('store.catalogo',$ListProduct,{ expires: 7 });

</script>