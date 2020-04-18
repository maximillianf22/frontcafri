<div class='panel-products-view'>

<?php 
 $acmSubtotal_ = 0; 
 $acmTotal_ = 0; 
?>
@foreach($ListProduct as $ListProduct_)
     
     <div id='basket-products' class='row pad-lft ' >
          <div class='col-lg-4 col-md-4 col-xs-4 pad-lft'><img src='' class='imgAttribute' /></div>
          <div class='col-lg-8 col-md-8 col-xs-8 items pad-all' style="border-bottom:1px dashed #CCC"><br />
               <div class='nameAttribute'>{{ $ListProduct_->nameProduct }}</div>
               <div class='unitAttribute'> Cantidad : {{ $ListProduct_->quantityOrder}} </div>
               <div class='priceAttribute'> Total : $  {{  number_format($ListProduct_->quantityOrder*$ListProduct_->priceOrder,2) }}</div>
               <br />
               
          </div>
     </div>
     <?php $acmSubtotal_=($ListProduct_->quantityOrder*$ListProduct_->priceOrder); ?>
     <?php $acmTotal_=($acmTotal_+$ListProduct_->quantityOrder*$ListProduct_->priceOrder); ?>
@endforeach
              
</div>

<div id='footer-total-car'>
<div style='border-bottom:1px dashed #DDD;padding:1px 2px 3px'>
<div class='subtotal'><span class='lbl'>Subtotal :</span>$  <?php echo number_format(13040,2); ?></div>
<div class='discount'><span class='lbl'>Descuento :</span>$ 0 </div>
<div class='iva'><span class='lbl'>Iva :</span>$ 0 </div>
<div class='Shipping'><span class='lbl'>Costo Envio :</span>$ 10,000.00 </div>
<div class='total'><span class='lbl'>Total :</span>$ 24.040</div>
</div>        
        
</div>
