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
		    
		    @if($product->parent===1)
		    <div class="row pad-all">
	        	<div class="col-md-12 ">
	        		<div class="fileContainer ">
	        			<i class=" glyphicon glyphicon-camera "></i> Actualizar Imagen
	        			<input type='file' id="fileLoadImg" name="fileLoadImg" /> 
	        		</div>
	        	</div>
	        </div>
	        @endif
	        
		</div>
	</div>

	<div class="col-lg-9 " style="margin-bottom: 3px !important"> 
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 tit_prodxinfo">
					Información del Producto 
					@if($product->parent===1) 
						<span class="stprlbl titFplbl">Es Principal</span>
					@else
						<span class="stprlbl titFplbl">Es una Variante</span>
					@endif
				</div>
			</div>
			<input id="idProduct" type="hidden" name="idProduct" value="{{$product->id_product}}"  >
			<input id="caction" type="hidden" name="caction" value="update"  />

			<div class="row bgWhite">
				 <div class="col-lg-6">
		              <div class=" pad-all">
		                   <div class="lbl"> Nombre del Producto </div>
		                   <input id="cnameProduct" type="text" name="cnameProduct" value="{{$product->nameAttribute}}" class="fld" placeholder="nombre del producto" required >
		              </div>
		         </div>
		         <div class="col-lg-3">
		              <div class=" pad-all">

		                   <div class="lbl"> Categoria  </div>
		                   <select id="nCategory" name="cCategory_Product" class="form-control j-select select2 "  > 
		                    @if($product->parent===2)
			                    <option value="{{$product->idCategorie}}" >
							      	{{$product->nameCategorie}}
							    </option>
		                    @else
		                    <!--
								@foreach($Category as $Category_) 
								    <option 
								    	value="{{$Category_->id}}" 
								    	@if($Category_->id === $product->idCategorie) 
								    	selected 
								    	@endif  
								    	>
								      	{{$Category_->nameCategorie}}
								    </option> 
								@endforeach
							-->
								@foreach($litarCategorias_ as $Category_)
	                            @if($Category_->type=='categoria')
	                                 <option value="{{$Category_->id_categorie}} " style="font-weight: bold; font-size: 9pt"
	                                 	@if($Category_->id_categorie==$product->idCategorie) selected @endif >
	                                      {{$Category_->nameCategorie}}
	                                 </option>
	                            @else
	                                 <option value="{{$Category_->id_categorie}} " style="font-style: italic;"
	                                 	@if($Category_->id_categorie==$product->idCategorie) selected @endif >
	                                      - {{$Category_->nameCategorie}}
	                                 </option>
	                            @endif 
	                            @endforeach 
		                    @endif 
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


			<div class="row bgWhite"  >
				<div class="col-lg-12 " style="padding-bottom: 10px">
		            <div class=" pad-all">
		              	<div class="lbl">Titulo Alternativo del Producto (Recomendado si tiene variación) </div>
		              	<input id="ctitleVariation" type="text" name="ctitleVariation" 
							value="{{$product->titleVariation}}" class="fld" 
							placeholder="nombre/titulo para la variación" 
							@if($product->parent===2) readonly @endif 
						>
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
						<input id="namount_per_sale" type="number" min="1" name="namount_per_sale" value="{{$product->amount_per_sale}}" 
						class="fld " placeholder="Precio" required >
					</div>
	        	</div>
	        	<div class="col-lg-3">
	              <div class=" pad-all">
	                	<div class="lbl"> Unidad Venta </div>
	                	<select name="nidSales_unit" class="form-control j-select select2 jj-item">
	                	@if($product->parent===2)
							<option value="{{ $product->idSales_unit }}" >
							{{ $product->tipo_unidad }}
							</option>
	                	@else
		                   	@foreach($UndVenta as $UndVenta_)
	                            <option value="{{$UndVenta_->id}}" 
	                             @if($UndVenta_->id === $product->idSales_unit)
	                             	selected 
	                             @endif >
	                            {{$UndVenta_->nameValue}}
	                        	</option>
	                        @endforeach
	                    @endif
	                   </select>
	              </div>
		        </div>
		        <div class="col-lg-4">
		              <div class=" pad-all">
		                   <div class="lbl"> Cnt. Venta Producto </div>
		                    <input id="ncntbyUnit" type="text" name="ncntbyUnit" value="{{$product->cntbyUnit}}" class="fld" placeholder="Estimado Cantidad Producto" >
		              </div>
		        </div>
		        <div class="col-lg-3">
		              <div class=" pad-all">
		                   <div class="lbl">Colocar en Oferta</div>
		                   <select name="nisOffers" class="form-control j-select select2 jj-item">
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
							<input id="show_public" name="show_public" type="checkbox" 
							<?php if($product->solo_publico==1){ echo "checked"; }else{ echo " "; } ?> >
							<span  class="m-slider round mini "></span>
							</label>  
		              	</div>
		              	<div class="row">
		              		<div class="col-md-6">
		              			<div class="lbl">Precio Publico </div> 
								<input id="npriceProduct" type="number" min="1" name="npriceProduct" value="{{$product->priceProduct}}" 
								class="fld jj-number "  placeholder="Precio" >  
		              		</div>
		              		<div class="col-md-6">
		              			<div class="lbl">Precio Anterior </div> 
								<input id="nprevious_price" type="number" min="0" name="nprevious_price" value="{{$product->previous_price}}" 
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
							<input id="show_comerce" name="show_comerce" type="checkbox" 
							<?php if($product->solo_comercio==1){ echo "checked"; }else{ echo " "; } ?> />
							<span  class="m-slider round mini "></span>
							</label>  
		              	</div>
		              	<div class="row">
		              		<div class="col-md-6">
		              			<div class="lbl">Precio Comercio </div> 
								<input id="npricecomerceProduct" type="number" min="0" name="npricecomerceProduct" value="{{$product->pricecomerceProduct}}" 
								class="fld jj-number "  placeholder="Precio" >  
		              		</div>
		              		<div class="col-md-6">
		              			<div class="lbl">Precio Anterior </div> 
								<input id="nprevious_price_comerce" type="number" min="0" name="nprevious_price_comerce" value="{{$product->previous_price_comerce}}" 
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
					<!--
					<div id="saveProduct" data-id="{{$product->id_product}}" 
						data-action="update" 
						class="btn-sv-opt "> 
						Guardar 
					</div>
				-->
					<input type="submit" id="saveProduct"  value=" Guardar " class="btn-sv-opt " />
				</div>
			</div> 
		</div> 

	</div>
</div>


</form>
 

	<!-- Process Update Save Information --->
	<script type="text/javascript">

	$("#updProductData").on('submit',(function(e) {
		e.preventDefault();

		$("#saveProduct").val("Guardando ..."); 
		$("#saveProduct").addClass("disabledObj");
		let action_ = $("#saveProduct").data('action');
		// let nidProduct_ = $("#saveProduct").data('id'); 
		let nidProduct_ = $("#idProduct").val();  
		let dataFrm_ = new FormData(this);
		 
		//alert(dataFrm_.get('idProduct'));

		//var file =  document.getElementById("fileLoadImg").files[0].type; 
		//document.getElementById('fileLoadImg').files['name'];
 

		// alert(dataFrm_.get("fileLoadImg"[0]));

		/*
		let cnameProduct_ = $("#nameProduct").val();
		let nCategorie_ = $('select[name=Category_Product]').val();
		let nState_ = $('select[name=stateProduct]').val();
		let ctitleVariation_ = $("#titleVariation").val();

		let namount_per_sale_ = $("#amount_per_sale").val();
		let nidSales_unit_ = $('select[name=idSales_unit]').val(); 
		let ncntbyUnit_ = $("#cntbyUnit").val();
		*/

		let nisOffers_ = $('select[name=isOffers]').val();
		// let nsolo_publico_ = $("#saveProduct").data('show'); 
		if($('#show_public').prop('checked')) { var nsolo_publico_ = 1; }else{  var nsolo_publico_ = 0; } 
		if($('#show_comerce').prop('checked')) { var nsolo_comercio_ = 1; }else{  var nsolo_comercio_ = 0; }

		let npriceProduct_ = parseFloat($("#npriceProduct").val());
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
		 
		let npricecomerceProduct_ = parseFloat($("#npricecomerceProduct").val());
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
			data:  new FormData(this),
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){
			   if(data==="True"){ 
			        WjAlert("Datos del Producto se han actaulizado correctamente",'s');

			   }else{  WjAlert(data,'e'); } 
			   $("#saveProduct").val("Guardar");
			   $("#saveProduct").removeClass("disabledObj");
			},
			error: function(xhr, type, exception, thrownError){
			   alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
			}

     	}); 

		/*
		$("#message").empty(); 
		$('#loading').show();
		*/
		 
	})); 
	
	$("#fileLoadImg").change(function() { readURL(this); })
  
</script>