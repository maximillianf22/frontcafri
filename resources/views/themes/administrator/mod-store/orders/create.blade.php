@extends('themes.administrator.template.index')
@section('title', 'Nuevo Producto')
@section('content-theme')
<section class="content-wrapper">
     <section class="content-header">
          <h1>Nuevo Producto</h1>
          <ol class="breadcrumb">
          <li class="breadcrumb-item active"></li>
          </ol>
     </section>
     <section class="content-body" style="padding:10px;" >
     <div class="row"><div class="col">

          <form id="FrmEditProduct" action="{{route('admin.product.store')}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
          <div class="box">
               <div class="box-body"> <div class="row">
                    <div class="col-lg-2">
                         
                         <div class="form-group" id="idImageLinkVideo">
                         <label for="imagenProduct" class="control-label">Imagen del Producto</label>
                              <div class="imgEditProduct pad-all " style="margin: 5px 0 5px;">
                                   @if(!empty($Products->imageProduct))
                                        @if (file_exists( public_path().'/content/upload/store/'.$Products->imageProduct ))
                                        @else
                                        <img src="{{ asset('/content/upload/store/no-image-product.png') }}" alt="Imagen Producto" />
                                        @endif
                                   @else
                                   <img src="{{ asset('/content/upload/store/no-image-product.png') }}" alt="Imagen Producto" />
                                   @endif
                              </div>
                              
                              <input type="file" id="imagenProduct" name="imagenProduct" class="form-control">
                         </div>
                    
                         
                         
                    </div>
                    
                    <div class="col-lg-10 ">
                        @csrf
                         <div class="row">
                              
                              <div class="col-lg-6 ">
                              <div class="form-group">
                                   <label>Nombre del Producto</label>
                                   <input type="text" name="nameProduct" value="" class="form-control" placeholder="Nombre del Producto">
                              </div>
                              </div>
                              <div class="col-lg-6 ">
                                   <div class="form-group">
                                   <label>Categoria</label>
                                   <select name="Category_Product" class="form-control">
                                        @foreach($Category as $Category_)
                                             <option value="{{$Category_->id}}">{{$Category_->nameCategorie}}</option>
                                        @endforeach
                                   </select>
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                         <div class="col-lg-12 ">
                              <div class="form-group">
                                   <textarea class="form-control" name="decriptionProduct" rows="3" placeholder="Descripcion" ></textarea>
                              </div>
                         </div>     
                         </div>

                         <div class="row pad-lft"><div class="col-lg-12 pad-all">
                              <b>LISTA DE PRECIOS</b>
                         </div></div>
                         <div class="row ">
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label style="font-weight:normal">Precio Venta Público</label>
                                        <input type="number" name="Price" value="0" class="form-control" placeholder="Precio Público" require>
                                   </div>
                              </div>
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label style="font-weight:normal">Precio Anterior</label>
                                        <input type="number" name="previous" value="0" class="form-control" placeholder="Precio Anterior">
                                   </div>
                              </div> 
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label style="font-weight:normal">Precio Venta Comercio</label>
                                        <input type="number" name="Price_commerce" value="0" class="form-control" placeholder="Precio Comercio">
                                        <span style="font-size:11px;color:#32536A; line-height:11px; padding:2px; text-align:left">En caso de no agregar se tomara el precio de lista al publico</span>
                                   </div>
                              </div>
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label style="font-weight:normal">Precio Anterior</label>
                                        <input type="number" name="previous_commerce" value="0" class="form-control" placeholder="Precio Anterior">
                                   </div>
                              </div> 
                         </div>
                         <hr style="margin:5px 1px 15px" />
                         <div class="row ">
                              
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label>Unidades / Venta</label>
                                        <select name="UnidadVenta" class="form-control">
                                             @foreach($UndVenta as $UndVenta_)
                                                  <option value="{{$UndVenta_->id}}">{{$UndVenta_->nameValue}}</option>
                                             @endforeach
                                        </select>
                                   </div>
                              </div>  
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label>Cantidad x Producto</label>
                                        <input type="text" name="cntbyUnit" value="" class="form-control" placeholder="Unidad X Venta">
                                        <span style="font-size:11px;color:#32536A; line-height:11px; padding:2px; text-align:left">Unidades Aproximadas que puede tener por unidad de venta</span>
                                   </div>
                              </div> 
                                
                         </div>

                         <div class="row ">
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label>Inventario</label>
                                        <input type="number" name="Inventary" value="0" class="form-control" placeholder="Cantidad Inventario">
                                        <span style="font-size:11px;color:#32536A; line-height:11px; padding:2px; text-align:left">Unidades existente del producto en el inventario</span>
                                   </div>
                              </div>
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label>Stock Inventario</label>
                                        <input type="number" name="Stock" value="0" class="form-control" placeholder="Stock">
                                        <span style="font-size:11px;color:#32536A; line-height:11px; padding:2px; text-align:left">Unidades de referencia para cuando se este acabando el inventario</span>
                                   </div>
                              </div> 
                              <div class="col-lg-3  ">
                                   <div class="form-group">
                                        <label>Venta Minima del Producto</label>
                                        <input type="number" name="AmmountSale" value="0" class="form-control" placeholder="Minimo Venta">
                                        <span style="font-size:11px;color:#32536A; line-height:11px; padding:2px; text-align:left">Valor minimo para que el usuario pueda comprar el producto</span>
                                   </div>
                              </div>  
                              <div class="col-lg-3  ">
                                   <label>Colocar en Oferta</label>
                                   <select name="offers" class="form-control">
                                        <option value="0">No</option>
                                       <option value="1">En Oferta</option>
                                   </select>
                              </div> 
                                
                         </div>


                         <div class="row ">
                         <div class="col-lg-12 text-right">
                              <button id="updEditProduct" type="submit" class="btn btn-info ">+ Guardar Nuevo Producto</button>
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