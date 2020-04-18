<div class="container-fluid">
	 
	<div class="row brd_"> 
		<div class="col-lg-6">
			<div class="form-group ">
		       <div class="label-input"> Nombre del Producto </div>
		       <input id="cProduct" type="text" name="nameProduct" value="{{$Products->nameProduct}}" class="input-text" placeholder="nombre del producto" required >
			</div>
		</div>

		<div class="col-lg-3">
			<div class="form-group ">
		       <div class="label-input"> Categoria </div>
		       <select id="nCategory" name="Category_Product" class="form-control select-text jj-select select2 jj-item" required>
		            <option value="">Tipo Categoria</option>
		            @foreach($Category as $Category_)
		                 @if($Category_->id === $Products->idCategorie)
		                      <option value="{{$Category_->id}}" selected > {{$Category_->nameCategorie}}</option>
		                 @else
		                      <option value="{{$Category_->id}}">{{$Category_->nameCategorie}}</option>
		                 @endif
		            @endforeach
		       </select>
			</div>
		</div>

		<div class="col-lg-3">
			<div class="form-group ">
		       <div class="label-input"> Estado  </div>
		       <select name="stateProduct" class="form-control jj-select select-text  select2 jj-item">
		            <option value="1" @if($Products->idState==1) selected @endif > Activo</option>
		            <option value="2" @if($Products->idState==2) selected @endif >Inactivo</option>
		            <option value="3" >Papelera</option>
		       </select>
			</div>
		</div> 
	</div> 

	<div class="row ">
		<div class="col-lg-12">
			<div class="form-group ">
				<div class="label-input"> Nombre de la Presentación (Recomendado si tiene variación) </div>
				<input id="titleVariation" type="text" name="titleVariation" 
				value="{{$Products->titleVariation}}" class="input-text" 
				placeholder="nombre/titulo para la variación" 
				required >
			</div>
		</div>
	</div>

	<div class="row ">
		<div class="col-lg-12">
			<div class="form-group ">
				<div class="label-input"> Descripción General </div>
				<textarea id="cDescription" class="form-control text-area textarea-text " name="decriptionProduct" rows="2" placeholder="Descripcion" >{{$Products->description}}</textarea>
			</div>
		</div>
	</div>

	<!-- -->
	<div class="row ">
		<div class="col-lg-12 pad-all">
			<div class="app-box-card-title">Perfil y Caracteristicas del Producto  </div>
		</div>
	</div>

	<div class="row ">
		<div class="col-lg-3">
			<div class="form-group ">
		       <div class="label-input"> Minimo X Venta</div>
				<div class="input-group input-prefix number">
				    <label>  </label>
				    <input id="nAmount_per_sale" type="number" min="1" name="Price" value="{{$Product_main->amount_per_sale}}" 
				    class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >
				</div>
			</div>
		</div> 
		<div class="col-lg-3">
			<div class="form-group ">
		        <div class="label-input"> Unidad Venta</div>
				<select name="Sales_unit" class="form-control jj-select select2 jj-item">
				    @foreach($UndVenta as $UndVenta_)
				         @if($UndVenta_->id === $Product_main->idSales_unit)
				              <option value="{{$UndVenta_->id}}" selected > {{$UndVenta_->nameValue}}</option>
				         @else
				              <option value="{{$UndVenta_->id}}">{{$UndVenta_->nameValue}}</option>
				         @endif
				    @endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group ">
		        <div class="label-input"> Cantidad x Producto </div>
				<input id="cCntbyunit" type="text" name="cCntbyunit" value="{{$Product_main->cntbyUnit}}" class="input-text" placeholder="nombre del producto" required >
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group ">
		        <div class="label-input"> Colocar en Oferta </div>
				<select name="inOffert" id="inOffert" class="form-control jj-select select2 jj-item">
				   <option value="0"  @if($Products->isOffers==0) selected @endif > NO </option>
				   <option value="1"  @if($Products->isOffers==1) selected @endif > SI </option>
				</select>
			</div>
		</div> 
	</div>

	<div class="row ">
		<div class="col-lg-3 pad-all">
			<div class="form-group ">
		        <div class="label-input" style="padding-left: 10px;">Producto Visible al Publico</div>  
			</div>
		</div>
		<div class="col-lg-3 pad-all">
			<div class="form-group ">
		        <button id="onlyPublic" type="button" class="btn btn-min btn-toggle btn-info @if($Product_main->solo_publico==1) active @endif" data-toggle="button" aria-pressed="true" autocomplete="off">
				     <div class="handle"></div>
				</button> 
			</div>
		</div>

		<div class="col-lg-3 pad-all">
			<div class="form-group ">
		        <div class="label-input"  style="padding-left: 10px;">Producto Visible al Comercio</div> 
				 
			</div>
		</div> 
		<div class="col-lg-3 pad-all">
			<div class="form-group ">
		         <button id="onlyComerce" type="button" class="btn btn-min btn-toggle btn-info @if($Product_main->solo_comercio==1) active @endif" data-toggle="button" aria-pressed="true" autocomplete="off">
				<div class="handle"></div> 
			</div>
		</div>  
	</div> 

	<div class="row">
		<div class="col-lg-12">  
        	<div class="row "> 
             	<div class="col-lg-6 col-md-12"> 
                  	<div class="row"> 
                        <div class="col-lg-6 col-md-12">
	                       <div class="form-group pad-all">
	                            <div class="label-input"> Precio Venta. </div>
	                            <div class="input-group input-prefix number">
	                                 <label> $ </label>
	                                 <input id="nPriceProduct" type="number" min="1" name="Price" value="{{$Product_main->priceProduct}}" 
	                                 class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
	                            </div>
	                       </div>
                       </div>
                       <div class="col-lg-6 col-md-12">
	                       <div class="form-group pad-all">
	                            <div class="label-input"> Precio Anterior </div>
	                            <div class="input-group input-prefix number">
	                                 <label> $ </label>
	                                 <input id="nPriceProductPrevious" type="number" min="1" name="Price" value="{{$Product_main->previous_price}}" 
	                                 class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
	                            </div>
	                       </div>
                       </div> 
                  	</div> 
             	</div> 
	            <div class="col-lg-6 col-md-12"> 
	                <div class="row">
	                    <div class="col-lg-6 col-md-12">
	                        <div class="form-group pad-all">
	                            <div class="label-input"> Precio Venta </div>
	                            <div class="input-group input-prefix number">
									<label> $ </label>
									<input id="nPriceComerce" type="number" min="1" name="Price" value="{{$Product_main->pricecomerceProduct}}" 
									class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
	                            </div>
	                       </div>
	                    </div> 
	                    <div class="col-lg-6 col-md-12">
	                        <div class="form-group pad-all">
	                            <div class="label-input"> Precio Anterior </div>
	                            <div class="input-group input-prefix number">
									<label> $ </label>
									<input id="nPriceComercePrevious" type="number" min="1" name="Price" value="{{$Product_main->previous_price_comerce}}" 
									class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required > 
	                            </div>
	                        </div>
	                	</div>
	                </div> 
	            </div> 
        	</div>
    	</div>
	</div> 

</div>