@extends('themes.administrator.template.index')
@section('title', 'Inicio')
@section('content-theme')
<section class="content-wrapper">
     <section class="content-header">
          <h1>{{$Products->nameProduct}}</h1>
          <ol class="breadcrumb">
          <li class="breadcrumb-item active"></li>
          </ol>
     </section>
     <section class="content-body" style="padding:10px;" >
     <div class="row"><div class="col">
          
          <div class="box">
          <form id="FrmEditProduct" action="{{route('admin.update.products',$Products->idProduct)}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
               <div class="box-body"> <div class="row">
                    
                    <div class="col-lg-3">
                    <div class="form-group" id="idImageLinkVideo">
                              <div class="text-center"><label for="imagenProduct" class="control-label">Imagen del Producto</label></div>
                              <div class="imgEditProduct pad-all " style="min-height:150px; max-height:150px; min-width:150px; max-width:150px; text-align:center;  border:1px dashed #CCC; margin: 5px 0 5px; margin:0 auto ">
                                   @if(!empty($Products->imageProduct))
                                        @if (file_exists( public_path().'/content/upload/store/'.$Products->imageProduct ))
                                             <img src="{{ asset('/content/upload/store/'.$Products->imageProduct) }}" alt="Producto" style=" max-height:150px;  max-width:150px; text-align:center " />
                                        @else
                                             $Products->imageProduct
                                        @endif
                                   @else
                                        $Products->imageProduct
                                   @endif
                              </div>
                              <input type="file" id="imagenProduct" name="imagenProduct" class="form-control" style="border:none !important; font-size:11px;">
                         </div>

                         <div class="imgEditProduct">
                             
                         </div>
                    </div>
                    
                    <div class="col-lg-9 ">
                         @csrf
                         <div class="row">
                              <div class="col-lg-6 ">
                                   <div class="form-group">
                                        <label><span class="text-danger">*</span> Nombre del Producto</label>
                                        <input type="text" name="nameProduct" value="{{$Products->nameProduct}}" class="form-control" placeholder="ingrese nombre" required >
                                   </div>
                              </div>

                              <div class="col-lg-4 ">
                                   <div class="form-group">
                                        <label>Categoria</label>
                                        <select name="Category_Product" class="form-control">
                                             <option value="-">Tipo Categoria</option>
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
                              <div class="col-lg-2 ">
                                   <div class="form-group">
                                        <label>Estado</label>
                                        <select name="stateProduct" class="form-control">
                                             <option value="1" @if($Products->idState==1) selected @endif >Activo</option>
                                             <option value="2" @if($Products->idState==2) selected @endif >Inactivo</option>
                                             <option value="3" >Enviar a Papelera</option>
                                        </select>
                                   </div>
                              </div>

                         </div>
                         <div class="row">
                              <div class="col-lg-12 ">
                                   <div class="form-group">
                                        <textarea class="form-control" name="decriptionProduct" rows="3" placeholder="Descripcion" >{{$Products->description_product}}</textarea>
                                   </div>
                              </div>
                         </div>
                         <div class="row pad-all" ><div class="col-lg-12 pad-all" >
                              <b>Mostrar Producto para los siguientes usuarios</b>
                         </div></div>
                         <div class="row">
                              <div class="col-lg-3 ">
                                   <div class="form-group">
                                        <input type="checkbox" name="only_publico" id="basic_checkbox_1" @if($Products->solo_publico==1) checked @endif />
                                        <label style="font-weight:normal" for="basic_checkbox_1">Solo al Público </label> &nbsp;
                                   </div>
                              </div>
                              <div class="col-lg-4 ">
                                   <div class="form-group">
                                        <input type="checkbox"  name="only_comercio"  id="basic_checkbox_2" @if($Products->solo_comercio==1) checked @endif />
                                        <label  style="font-weight:normal"for="basic_checkbox_2">Solo Comercio </label> &nbsp;
                                   </div>
                              </div>
                         </div>

                         <div class="row pad-lft"><div class="col-lg-12 pad-all">
                              <b>LISTA DE PRECIOS</b>
                         </div></div>
                         <div class="row ">
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label style="font-weight:normal"><span class="text-danger">*</span> Precio Venta Público</label>
                                        <input type="number" min="1" name="Price" value="{{$Products->priceProduct}}" class="form-control" placeholder="Precio" required >
                                   </div>
                              </div>
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label style="font-weight:normal">Precio Anterior</label>
                                        <input type="number" min="0" name="previous" value="{{$Products->previous_price}}" class="form-control" placeholder="precio Anterior">
                                   </div>
                              </div> 
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label style="font-weight:normal">Precio Venta Comercio</label>
                                        <input type="number" min="0" name="Price_commerce" value="{{$Products->pricecomerceProduct}}" class="form-control" placeholder="Precio Comercio" >
                                        <span style="font-size:11px;color:#32536A; line-height:11px; padding:2px; text-align:left">En caso de no agregar se tomara el precio de lista al publico</span>
                                   </div>
                              </div>
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label style="font-weight:normal">Precio Anterior</label>
                                        <input type="number" min="0" name="previous_commerce" value="{{$Products->previous_price_comerce}}" class="form-control" placeholder="Precio Anterior">
                                   </div>
                              </div> 
                         </div>
                         <hr style="margin:5px 1px 15px" />

                         <div class="row ">
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label>Unidades / Venta</label>
                                        <select name="UnidadVenta" class="form-control">
                                        <option value="-">Tipo</option>
                                        @foreach($UndVenta as $UndVenta_)
                                             @if($UndVenta_->id === $Products->idSales_unit)
                                                  <option value="{{$UndVenta_->id}}" selected > {{$UndVenta_->nameValue}}</option>
                                             @else
                                                  <option value="{{$UndVenta_->id}}">{{$UndVenta_->nameValue}}</option>
                                             @endif
                                        @endforeach
                                        </select>
                                   </div>
                              </div>  
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label>Cantidad x Producto</label>
                                        <input type="text" name="cntbyUnit" value="{{$Products->cntbyUnit}}" class="form-control" placeholder="Unidad X Venta">
                                        <span style="font-size:11px;color:#32536A; line-height:11px; padding:2px; text-align:left">Unidades Aproximadas que puede tener por unidad de venta</span>
                                   </div>
                              </div> 
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label><span class="text-danger">*</span> Venta Minima</label>
                                        <input type="number" min="1" name="AmmountSale" value="{{$Products->amount_per_sale}}" class="form-control" placeholder="Minimo Venta" required >
                                        <span style="font-size:11px;color:#32536A; line-height:11px; padding:2px; text-align:left">Valor minimo para que el usuario pueda comprar el producto</span>
                                   </div>
                              </div>  
                              <div class="col-lg-3  ">
                                   <label>Colocar en Oferta</label>

                                   <select name="offers" class="form-control">
                                        <option value="0" >No</option>
                                       <option value="1" <?php if($Products->isOffers===1){ echo "selected"; } ?> >En Oferta</option>
                                   </select>
                              </div> 
                         </div>
                         <hr style="margin:5px 1px 15px" />
                         <div class="row ">
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label>Inventario</label>
                                        <input type="number" min="1" name="Inventary" value="{{$Products->inventory}}" class="form-control" placeholder="Inventario">
                                        <span style="font-size:11px;color:#32536A; line-height:11px; padding:2px; text-align:left">Unidades existente del producto en el inventario</span>
                                   </div>
                              </div>
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label>Stock Inventario</label>
                                        <input type="number" min="1" name="Stock" value="{{$Products->stockAttribute}}" class="form-control" placeholder="Stock">
                                        <span style="font-size:11px;color:#32536A; line-height:11px; padding:2px; text-align:left">Unidades de referencia para cuando se este acabando el inventario, Colocar minimo 1</span>
                                   </div>
                              </div> 
                              
                         </div>

                         <div class="row ">
                              <div class="col-lg-12 text-right">
                                   <button id="addNewProduct" type="submit" class="btn btn-info ">Actualizar Producto</button>
                              </div>
                         </div>
                              
                    
                    </div>

               </div></div>
          </div>
          </form>

     </div></div>
     </section>
</section>
@endsection