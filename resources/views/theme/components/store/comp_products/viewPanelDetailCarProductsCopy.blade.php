
<?php
     $listCarProduc_ = array();
     $listCarProduc_=$ListProduct; 
     
     $CestaAnt_ = $listCarProduc_[0]->id;

     $items_ =  count($listCarProduc_);
     if($items_>=  1){
          echo "<div class='panel-products-view' style='height:60vh'  id='pnl-products-car' data-cantidad='".$items_."'>";
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
               <div style='border:1px solid #FF0000; text-align:left; padding:7px; color:#FF0000; font-weight:normal'>
                    * Al REPETIR ESTE PEDIDO SE LE BORRARA CUALQUIER PRODUCTO QUE TENGA AGREGADO EN SU CARRITO DE COMPRA
               </div>
          </div>";

          echo "<div class='text-center pad-top pad-btm ' style='font-weight:bold; color:#212121; font-size:11px; '> 
               <div class='row'>
               <div class='col-lg-6'>
                    <div class='btn-cancel pad-all ' style='border:2px solid #17100D;border-radius:2px; margin:3px;cursor:pointer' onclick='cancelRepeat();'>Cancelar</div>
               </div>
               <div class='col-lg-6'>
                    <div class='btn-accept-order pad-all' style='border:2px solid #9EB934;background:#9EB934;color:#FFF;border-radius:2px; margin:3px;cursor:pointer' onclick='aceptOrderRepeat(".$CestaAnt_.");'>Si Repetir Pedido</div>
               </div>
          </div>";

         
          
          

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

