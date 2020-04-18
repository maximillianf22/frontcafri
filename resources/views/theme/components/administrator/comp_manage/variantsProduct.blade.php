 
<div class="pad-all   titVpro">PRESENTACIÓN DEL PRODUCTO</div>
@foreach($Variants as $variant)
<div class="row pad-all ">
	<div class="col-md-1 txtc_ pad-all"><i class="glyphicon glyphicon-minus  c-middle "></i></div>
	
	<div id="updP_{{ $variant->id_product }}"
		  onclick="updP({{  $variant->id_product  }});" 
		  class="col-md-3 cursor " >
		<span class="name-p"> {{ $variant->nameAttribute }} </span><br />
	</div>
	
	<div class="col-md-1 center-middle pad-all"> {{ $variant->tipo_unidad }}  </div>
	<div class="col-md-2 center-middle pad-all"> {{ $variant->nameCategorie }}  </div>

	<div 
		id="iprice_{{$variant->id_product}}" 
		data-producto="{{$variant->id_product}}"
		data-origen="P"
		ondblclick="editprice({{ $variant->id_product }},'P')" 
		onkeypress="saveprice({{ $variant->id_product }},'P')"
		data-price="{{$variant->priceProduct}}" 
		class="col-md-1 center-middle txtr_ cedit_">
		<span id="sprice_{{$variant->id_product}}" class="price-row " >
		  $ <?php echo number_format($variant->priceProduct); ?>
		</span>
		<input id="nprice_{{ $variant->id_product }}" class="hidden_" type="text" value="{{ $variant->priceProduct }}" />
	</div>

	<div 
		id="ipricec_{{$variant->id_product}}" 
		data-producto="{{$variant->id_product}}"
		data-origen="C"
		ondblclick="editprice({{ $variant->id_product }},'C')" 
		onkeypress="saveprice({{ $variant->id_product }},'C')"
		data-price="{{$variant->pricecomerceProduct}}" 
		class="col-md-1 center-middle txtr_ cedit_"  >
		<span id="spricec_{{$variant->id_product}}" class="price-row ">$ <?php echo number_format($variant->pricecomerceProduct); ?> </span>
		<input id="npricec_{{ $variant->id_product }}" class="hidden_" type="text" value="{{ $variant->pricecomerceProduct }}" />
	</div>


	<div class="col-md-1 center-middle "> 
	    <label id="state_{{ $variant->id_product }}" data-state="{{$variant->idState}}" class="switch "><input type="checkbox" 
	      <?php if($variant->idState==1){ echo "checked"; }else{ echo " "; } ?> > 
	      <span onclick="actProduct_({{ $variant->id_product }})" class="m-slider round mini "></span>
	    </label> 
	  </div>
</div> 
@endforeach