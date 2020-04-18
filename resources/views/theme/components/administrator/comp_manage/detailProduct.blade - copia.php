<form id="updProductData" action="" method="post" enctype="multipart/form-data">
<div class="row">

	<div class="col-lg-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 tit_prodxinfo">Preview Producto</div>
			</div>
			<div class="row bgWhite  ">
				<div class="col-lg-12"> 
	                <!--- foto Producto ---> 
                    @if(!empty($product->imageProduct))
                        @if (file_exists( public_path().'/content/upload/store/'.$product->imageProduct ))
                        <div class="add-media-box-mini-container-img ">
                            <img id="previewAvatar" src="{{ asset('/content/upload/store/'.$product->imageProduct) }}" alt="Producto" style=" max-height:150px;  max-width:150px; text-align:center " />
                        </div>
                        @else
                        <div class="add-media-box-mini-container ">
                            <div class="add-media-button   ">
                                <img  id="previewAvatar" src="{{ asset('/content/upload/app/picture.svg') }}" style="vertical-align: middle;" viewBox="0 0 50 50"  data-toggle="modal" data-target="#modal-left" />
                            </div>
                        </div>
                        @endif
                    @else
                    <div class="add-media-box-mini-container ">
						<div class="add-media-button   ">
						   <img  id="previewAvatar"  src="{{ asset('/content/upload/app/picture.svg') }}" style="vertical-align: middle;" viewBox="0 0 50 50"  data-toggle="modal" data-target="#modal-left" />
						</div>
                    </div>
                    @endif
                   <!---------------------> 
		        </div> 
		    </div>

		    <div class="row pad-all">
	        	<div class="col-md-12 ">
	        		<div class="fileContainer ">
	        			<i class=" glyphicon glyphicon-camera "></i> Actualizar Imagen
	        			<input type='file' id="fileLoadImg" name="fileLoadImg" /> 
	        		</div>
	        	</div>
	        </div>
		</div>
	</div>

	<div class="col-lg-9 " style="margin-bottom: 3px !important"> 
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 tit_prodxinfo">Información del Producto</div>
			</div>

			<div class="row bgWhite">
				 <div class="col-lg-6">
		              <div class=" pad-all">
		                   <div class="lbl"> Nombre del Producto </div>
		                   <input id="nameProduct" type="text" name="nameProduct" value="{{$product->nameAttribute}}" class="fld" placeholder="nombre del producto" required >
		              </div>
		         </div>
		         <div class="col-lg-3">
		              <div class=" pad-all">
		                   <div class="lbl"> Categoria </div>
		                   <select id="nCategory" name="Category_Product" class="form-control j-select select2  " required>
		                        <option value=""> Categoria {{$product->idCategorie}}</option>
		                        @foreach($Category as $Category_) 
                                    <option 
                                    	value="{{$Category_->id}}" 
                                    	@if($Category_->id === $product->idCategorie) 
                                    	selected 
                                    	 @endif >
                                      	{{$Category_->nameCategorie}}
                                    </option> 
                                @endforeach 
		                   </select>
		              </div>
		         </div>
		         <div class="col-lg-3">
		              <div class=" pad-all">
		                   <div class="lbl"> Estado </div>
		                   <select name="stateProduct" class="form-control j-select select2 jj-item">
		                        <option value="1" @if($product->idState==1) selected @endif >
		                        	ACTIVO
		                    	</option>
		                        <option value="2" @if($product->idState==2) selected @endif  >
		                        	INACTIVO
		                        </option>
		                        <option value="3" @if($product->idState==3) selected @endif >
		                        	PAPELERA
		                        </option>
		                   </select>
		              </div>
		         </div>
			</div>

			<div class="row bgWhite">
				<div class="col-lg-12 " style="padding-bottom: 10px">
		              <div class=" pad-all">
		              	<div class="lbl">Titulo Alternativo del Producto (Recomendado si tiene variación) </div>
						<input id="titleVariation" type="text" name="titleVariation" 
							value="{{$product->titleVariation}}" class="fld" 
							placeholder="nombre/titulo para la variación" 
							required >
			            </div>
		         </div> 
			</div>

			<!--- ----> 
			<div class="row bgWhite" style="border-top:7px solid #E6E8EA">
				<div class="col-lg-12 tit_prodxinfo"  > 
					Caracteristicas Producto Principal 
		         </div> 
			</div>

			<div class="row bgWhite"  >
				<div class="col-lg-2">
					<div class=" pad-all">
					   <div class="lbl"> Vta Min </div>
						<input id="amount_per_sale" type="number" min="1" name="amount_per_sale" value="{{$product->amount_per_sale}}" 
						class="fld " placeholder="Precio" required >
					</div>
	        	</div>
	        	<div class="col-lg-3">
	              <div class=" pad-all">
	                	<div class="lbl"> Unidad Venta </div>
	                	<select name="idSales_unit" class="form-control j-select select2 jj-item">
	                   	@foreach($UndVenta as $UndVenta_)
                            <option value="{{$UndVenta_->id}}" 
                             @if($UndVenta_->id === $product->idSales_unit)
                             	selected 
                             @endif >
                            {{$UndVenta_->nameValue}}
                        	</option>
                        @endforeach
	                   </select>
	              </div>
		        </div>
		        <div class="col-lg-4">
		              <div class=" pad-all">
		                   <div class="lbl"> Cnt. Venta Producto </div>
		                    <input id="cntbyUnit" type="text" name="cntbyUnit" value="{{$product->cntbyUnit}}" class="fld" placeholder="Estimado Cantidad Producto" required >
		              </div>
		        </div>
		        <div class="col-lg-3">
		              <div class=" pad-all">
		                   <div class="lbl">Colocar en Oferta</div>
		                   <select name="isOffers" class="form-control j-select select2 jj-item">
		                        <option value="1" @if($product->isOffers==1) selected @endif  >
		                        	Solo Publico
		                    	</option>
		                        <option value="2" @if($product->isOffers==2) selected @endif   >
		                        	Solo Comercio
		                        </option>
		                        <option value="3" @if($product->isOffers==3) selected @endif  >
		                        	Todos
		                        </option>
		                        <option value="4" @if($product->isOffers==4) selected @endif  >
		                        	No Colocar
		                        </option>
		                   </select>
		              </div>
		        </div> 
			</div>

			<div class="row bgWhite" style="padding-bottom: 15px;">
				<div class="col-md-6">
					<div class=" pad-all">
		              	<div class="lbl" >
		              		Habilitar disponibilidad al Publico
							<label id="spublico_{{ $product->id_product }}" 
							data-show="{{$product->solo_publico}}" 
							class="switch " style="margin-bottom: -7px;  padding-left: 7px;">
							<input id="show_public" type="checkbox" 
							<?php if($product->solo_publico==1){ echo "checked"; }else{ echo " "; } ?> >
							<span  class="m-slider round mini "></span>
							</label>  
		              	</div>
		              	<div class="row">
		              		<div class="col-md-6">
		              			<div class="lbl">Precio Publico </div> 
								<input id="priceProduct" type="number" min="1" name="priceProduct" value="{{$product->priceProduct}}" 
								class="fld jj-number "  placeholder="Precio" >  
		              		</div>
		              		<div class="col-md-6">
		              			<div class="lbl">Precio Anterior </div> 
								<input id="previous_price" type="number" min="0" name="previous_price" value="{{$product->previous_price}}" 
								class="fld jj-number "  placeholder="Valor"  >  
		              		</div>
		              	</div> 
			        </div> 
				</div>

				<div class="col-md-6">
					<div class=" pad-all">
		              	<div class="lbl"  >
		              		Habilitar disponibilidad al Comercio
							<label id="scomercio_{{ $product->id_product }}" 
							data-show="{{$product->solo_comercio}}"  
							class="switch " style="margin-bottom: -7px; padding-left: 7px;">
							<input id="show_comerce" type="checkbox" 
							<?php if($product->solo_comercio==1){ echo "checked"; }else{ echo " "; } ?> >
							<span  class="m-slider round mini "></span>
							</label>  
		              	</div>
		              	<div class="row">
		              		<div class="col-md-6">
		              			<div class="lbl">Precio Comercio </div> 
								<input id="pricecomerceProduct" type="number" min="1" name="pricecomerceProduct" value="{{$product->pricecomerceProduct}}" 
								class="fld jj-number "  placeholder="Precio" >  
		              		</div>
		              		<div class="col-md-6">
		              			<div class="lbl">Precio Anterior </div> 
								<input id="previous_price_comerce" type="number" min="0" name="previous_price_comerce" value="{{$product->previous_price_comerce}}" 
								class="fld jj-number "  placeholder="Valor"  >  
		              		</div>
		              	</div> 
			        </div> 
				</div>
			</div> 
			<!--- ----> 

		</div>  

		<div class="container-fluid">
			<div class="row"  >
				<div class="col-md-9 pad-all"> </div>
				<div class="col-md-3 pad-all">
					<div id="saveProduct" data-id="{{$product->id_product}}" 
						data-action="update" 
						class="btn-sv-opt "> 
						Guardar 
					</div> 
				</div>
			</div> 
		</div> 

	</div>
</div>

<input type="submit" value="Actualizar Datos " class="submit" />
</form>
 

<!-- Process Update Save Information --->
<script type="text/javascript">
	$("#saveProduct").click(function(){ 

		$("#saveProduct").text("Guardando ...");
		$("#saveProduct").addClass("disabledObj");

		let action_ = $("#saveProduct").data('action');
		let nidProduct_ = $("#saveProduct").data('id');
		let cnameProduct_ = $("#nameProduct").val();
		let nCategorie_ = $('select[name=Category_Product]').val();
		let nState_ = $('select[name=stateProduct]').val();
		let ctitleVariation_ = $("#titleVariation").val();

		let namount_per_sale_ = $("#amount_per_sale").val();
		let nidSales_unit_ = $('select[name=idSales_unit]').val(); 
		let ncntbyUnit_ = $("#cntbyUnit").val();

		let cnameImg_ = $("#fileLoadImg")[0].files[0]['name'];
		var cpath_ = document.getElementById("fileLoadImg").files[0].name; 
		//alert(cpath_);

		 

		let nisOffers_ = $('select[name=isOffers]').val();
		// let nsolo_publico_ = $("#saveProduct").data('show'); 
		if($('#show_public').prop('checked')) { var nsolo_publico_ = 1; }else{  var nsolo_publico_ = 0; } 
		if($('#show_comerce').prop('checked')) { var nsolo_comercio_ = 1; }else{  var nsolo_comercio_ = 0; }

		let npriceProduct_ = parseFloat($("#priceProduct").val());
		if(isNaN(npriceProduct_)) { npriceProduct_ = 0; }

		if($('#show_public').prop('checked')) { 
			if(npriceProduct_=== 0){
				WjAlert("El precio del producto no puede estar vacio o en cero, si ha marcado que sea visible para el publico",'e');
				$("#saveProduct").text("Guardar");
				$("#saveProduct").removeClass("disabledObj");
				return false;
			}
		}
		let nprevious_price_ = parseFloat($("#previous_price").val());
		if(isNaN(nprevious_price_)) { nprevious_price_ = 0; }
		 
		let npricecomerceProduct_ = parseFloat($("#pricecomerceProduct").val());
		if(isNaN(npricecomerceProduct_)) { npricecomerceProduct_ = 0; }
		if($('#show_comerce').prop('checked')) { 
			if(npricecomerceProduct_=== 0){
				WjAlert("El precio del producto no puede estar vacio o en cero, si ha marcado que sea visible para el comercio",'e');
				$("#saveProduct").text("Guardar");
				$("#saveProduct").removeClass("disabledObj");
				return false;
			}
		}
		let nprevious_price_comerce_ = parseFloat($("#previous_price_comerce").val());
		if(isNaN(nprevious_price_comerce_)) { nprevious_price_comerce_ = 0; }

		$.ajax({

			type:'POST',
			url: UrlHost_+"/administrator/manage-products/updsave-product",
			data:{nidProduct : nidProduct_,cnameImg:cnameImg_, cpath:cpath_, action : action_, cnameProduct:cnameProduct_,nCategorie:nCategorie_, nState: nState_,ctitleVariation:ctitleVariation_,
				namount_per_sale : namount_per_sale_, nidSales_unit:nidSales_unit_, ncntbyUnit:ncntbyUnit_,
				nisOffers:nisOffers_, nsolo_publico:nsolo_publico_, nsolo_comercio:nsolo_comercio_,
				npriceProduct:npriceProduct_, npricecomerceProduct:npricecomerceProduct_,
				nprevious_price:nprevious_price_,nprevious_price_comerce:nprevious_price_comerce_  },
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			cache: false,
			processData:false,
			success: function(data){
			   if(data==="True"){ 
			        WjAlert("Datos del Producto se han actaulizado correctamente",'s');
			   }else{  WjAlert(data,'e'); } 
			   $("#saveProduct").text("Guardar");
			   $("#saveProduct").removeClass("disabledObj");
			},
			error: function(xhr, type, exception, thrownError){
			   alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
			}

     	}); 
	});


	
	$("#fileLoadImg").change(function() { readURL(this); })
  
</script>