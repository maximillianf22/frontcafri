
<?php
     $listCarProduc_ = array();
     $listCarProduc_=$ListProduct;
     $items_ =  count($listCarProduc_);
     if($items_>=  1){
          echo "<div class='panel-products-view'  id='pnl-products-car' data-base='".$min_compra_->extra."' data-vrenvio='".$envio_->extra."' data-cantidad='".$items_."'>";
         
          $acmSubtotal_ = 0; 
          $acmTotal_ = 0; 
          for ($i=0; $i < $items_; $i++) {
               $pathImg_ = '/content/upload/store/'.$listCarProduc_[$i]['imageProduct'];
               echo "<div class='container-fluid'>
               <div id='basket-products' class='row '>
                    <div class='col-3 col-md-3 col-xs-3 '>
                         <img src='".$pathImg_."' class='imgAttribute' width='100%' />
                    </div>

                    <div class='col-7 col-md-7 col-xs-7 items ' style='border-bottom:1px solid #F2F2F2; padding-bottom:5px;' >
                         <div class='nameAttribute'>".$listCarProduc_[$i]['nameAttribute']."</div>
                         <div class='unitAttribute'>".$listCarProduc_[$i]['nameCategory']."</div>
                         <div class='unitAttribute'>( ".$listCarProduc_[$i]['quantityOrder']." X ".number_format($listCarProduc_[$i]['priceOrder'])." ) / <span class='priceAttribute'> $ ".number_format($listCarProduc_[$i]['totalOrder'],0)."</span></div>
                    </div>

                    <div class='col-1 col-md-1 col-xs-1 items '  >

                         <div style='width:30px; padding:2px; height:30px; text-align:center; cursor:pointer'>
                              <div class='deleteItemCar' onclick='removeProduct(".$listCarProduc_[$i]['idProduct'].",".$listCarProduc_[$i]['idAttribute'].")'> ";  ?>
                                   <img src="{{ asset('/content/upload/app/remove.svg') }}" style="vertical-align: middle; width:15px; height:15px;" viewBox="0 0 30 30"/>
                              <?php echo "
                              </div>  
                         </div>
                         <div style=' width:30px; padding:2px; height:30px; text-align:center; cursor:pointer'>
                              <div class='editItemCar' onclick='openProduct(".$listCarProduc_[$i]['idProduct'].",".$listCarProduc_[$i]['idAttribute'].")'>
                                   "; ?>
                                  <img src="{{ asset('/content/upload/app/lapiz.svg') }}" style="vertical-align: middle; width:15px; height:15px;" viewBox="0 0 30 30"/>
                              <?php echo "
                              </div>   
                         </div>

                    </div>
               </div></div>
               ";
               $acmSubtotal_=($acmSubtotal_+$listCarProduc_[$i]['totalOrder']);
               $acmTotal_=($acmTotal_+$listCarProduc_[$i]['totalOrder']);
              // print($listCarProduc_[$i]['nameProduct']);
          }
          echo "</div>";
          
          echo "<div class='text-center pad-top pad-btm ' style='font-weight:bold; color:#212121; font-size:11px; border-top:1px dashed #CCC;'> 
               Información de la compra
          </div>";

          echo "<div class='clear-car pad-all' onclick='clearbasket()'>
               <b class='lni-eraser'></b> Limpiar Carrito 
          </div><br />"; 

          /*
          if($acmSubtotal_>=$min_compra_->extra){
               echo "<div id='free_shipping'>
                         <span class='info-box-text' style='color:#1FA02E'>Tu envio es gratis</span>
                         <div class='progress'>
                              <div class='progress-bar' style='width: 100%'></div>
                         </div>
                    </div>";
          }else{

               echo "<div id='free_shipping' class=''>
                         <span class='info-box-text' style='color:#212121; font-weight:bold'>Faltan <b style='font-size:14px;'>$ ".number_format(($min_compra_->extra-$acmSubtotal_),2)."</b> para envio gratis</span>
                         <div class='progress'>
                              <div class='progress-bar' style='width: ".(($acmSubtotal_/$min_compra_->extra)*100)."%'></div>
                         </div>
                    </div>";
          }
          */
          echo "<div id='cupon_descuento' class='pad-all' style=' margin-bottom:7px !important '>
               <div class='title_cupon'>Cupón de descuento :</div>
               <div class='content_'>
                    <div class='row'>
                    <div class='col-lg-6 pad-lft'>
                         <input id='cupon_store_x3' maxlength='50' class='txt-cupon' type='text' value='' />
                    </div>
                    <div class='col-lg-6'>
                         <div class='btn-cupon show_item' onclick='loadCupon()'> Agregar </div>
                         <div class='btn-cupon-del hide_item' onclick='delCupon()'> Omitir Cupon </div>
                    </div>
                    </div>
               </div>
          </div>";

          echo "<div class='container-fluid' style='margin-top:10px !important;'><div class='row '>
               <div class='col-lg-6 col-md-6 '><div class='subtotal'>Subtotal :</div></div>
               <div class='col-lg-6 col-md-6 '>
                    <div id='subtotal' data-subtotal='".$acmSubtotal_."' class='subtotal'>$ ".number_format($acmSubtotal_,2)."</div></div>
          </div></div>";

          echo "<div class='container-fluid'><div class='row '>
               <div class='col-lg-6 col-md-6 '><div class='subtotal'>Costo de Envio :</div></div>
               <div class='col-lg-6 col-md-6 '>";
                    echo " <div id='costo-envio' data-envio='' class='subtotal'></div>";
               echo "</div>
          </div></div>";
          
          echo "<div class='container-fluid'><div class='row '>
               <div class='col-lg-6 col-md-6 '><div class='descuento'>Descuento :</div></div>
               <div class='col-lg-6 col-md-6 '>
                    <div id='valor_descuento' data-cupon='' class='descuento'></div>
               </div>
          </div></div>";

          
          
               echo "<div class='container-fluid' style='margin-top:10px !important;'><div class='row '>
               <div class='col-lg-6 col-md-6 '><div class='total'>Total </div></div>
               <div class='col-lg-6 col-md-6 '>";
                    echo " <div id='total-compra' data-total='' class='total'></div>";
               echo "</div>
               </div></div>";

          if(Auth::check()){
               echo "
               <div class='content-finish-shoping pad-all'>
                    <div class='end-car pad-all box-shadow' onclick='finishbasket()'>
                         Finalizar Compra
                    </div>
               </div>";
          }else{
               
               echo "
               <a href='"?>{{route('login')}} <?php echo "'>
               <div class='content-finish-shoping pad-all'>
                    <div class='end-car pad-all box-shadow' >
                         Iniciar sesión y Finalizar Compra
                    </div>
               </div>
               </a>";
          }

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

