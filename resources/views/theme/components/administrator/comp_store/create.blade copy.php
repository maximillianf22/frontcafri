@extends('theme.templates.core.admin.admin_master')
@section('title', 'Crear Nuevo Producto')
@section('content-theme')
<section class="content-wrapper" style="padding:20px;">
     <div class="content-body pad-all " >
     <div class="container-fluid pad-all">
     <div class="row pad-all">
          <div class="col-lg-12" style="text-align:right">
          <span class="jj-button-new pad-all" style="padding:5px 15px; margin:10px;" onclick="newProduct();"> + Guardar Nuevo Producto</span>
          </div>
     </div>

     <div class="row">

          <div class="col-lg-4 col-md-4 col-sm-12 pad-all ">
               <div class="box-content-section">
               <div class="app-box-card-title">Imagen del Producto</div>
               <div class="pad-all">
                    <div class="add-media-box-mini-container pad-all">
                         <div class="add-media-button pad-all ">
                              <img src="{{ asset('/content/upload/app/picture.svg') }}" style="vertical-align: middle;" viewBox="0 0 50 50"  data-toggle="modal" data-target="#modal-left" />
                         </div>
                    </div>
               </div>
               <form id="FrmEditProduct" action="{{route('admin.product.store')}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
               @csrf
                    <div class="row">
                         <div class="col-lg-12">
                              <input type="file" id="imagenProduct" name="imagenProduct" class="form-control" style="border:none !important; font-size:12px;">
                         </div>
                         <div class="col-lg-12 text-center">
                              <button id="addNewProduct" type="submit" class="jj-button-new" style="font-size:11px; height:25px !important; padding:2px 10px !important;">Cambiar Imagen</button>
                         </div>
                    </div>
               </form>
               </div>
          </div>

          <div class="col-lg-8 col-md-8 col-sm-12 pad-all ">
               <div class="row"><div class="col-lg-12">
               <div class="box-content-section">
                    <div class="app-box-card-title">Información del Producto</div>
                    <div class="row ">
                         <div class="col-lg-6">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Nombre del Producto </div>
                                   <input id="cProduct" type="text" name="nameProduct" value="" class="input-text" placeholder="nombre del producto" required >
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Categoria </div>
                                   <select id="nCategory" name="Category_Product" class="form-control jj-select select2 jj-item">
                                        <option value="-">Tipo Categoria</option>
                                        @foreach($Category as $Category_)
                                            <option value="{{$Category_->id}}">{{$Category_->nameCategorie}}</option>
                                        @endforeach
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Estado  </div>
                                   <select name="stateProduct" class="form-control jj-select select2 jj-item">
                                        <option value="1" > Activo</option>
                                        <option value="2" >Inactivo</option>
                                   </select>
                              </div>
                         </div>
                    </div>

                    <div class="row ">
                         <div class="col-lg-12">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Descripción General </div>
                                   <textarea id="cDescription" class="form-control text-area" name="decriptionProduct" rows="3" placeholder="Descripcion" ></textarea>
                              </div>
                         </div>
                    </div>

               </div>
               </div></div>


               <div class="row"><div class="col-lg-12">
               <div class="box-content-section" style="margin-top:15px">
                    <div class="app-box-card-title">Perfil y Caracteristicas Producto Principal</div>
                    
                    <div class="row pad-all " >
                         <div class="col-lg-3" style="border-bottom:1px solid #DFE5EB">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Minimo X Venta</div>
                                   <div class="input-group input-prefix number">
                                        <label>  </label>
                                        <input id="nAmount_per_sale" type="number" min="1" name="Price" value="" 
                                        class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >
                                   </div>
                              </div>
                         </div>
                         <div class="col-lg-3" style="border-bottom:1px solid #DFE5EB">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Unidad Venta</div>
                                   <select name="Sales_unit" class="form-control jj-select select2 jj-item">
                                        @foreach($UndVenta as $UndVenta_)
                                             <option value="{{$UndVenta_->id}}">{{$UndVenta_->nameValue}}</option>
                                        @endforeach
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-6" style="border-bottom:1px solid #DFE5EB">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Cantidad x Producto </div>
                                   <input id="cCntbyunit" type="text" name="cCntbyunit" value="" class="input-text" placeholder="nombre del producto" required >
                              </div>
                         </div>
                    </div>

                    <div class="row ">

                         <div class="col-lg-6 col-md-12">
                              <div class="row">
                                   <div class="col-lg-6">
                                        <div class="app-box-card-title" style="font-size: 12px !important">Visible Público</div>
                                   </div>
                                   <div class="col-lg-6 pad-top">
                                        <button id="onlyPublic" type="button" class="btn btn-min btn-toggle btn-info " data-toggle="button" aria-pressed="true" autocomplete="off">
                                             <div class="handle"></div>
                                        </button>
                                   </div>
                              </div>
                              <div class="row">
                                   
                                   <div class="col-lg-6 col-md-12">
                                   <div class="form-group pad-all">
                                        <div class="label-input"> Precio Venta </div>
                                        <div class="input-group input-prefix number">
                                             <label> $ </label>
                                             <input id="nPriceProduct" type="number" min="1" name="Price" value="" 
                                             class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                        </div>
                                   </div>
                                   </div>
                                   <div class="col-lg-6 col-md-12">
                                   <div class="form-group pad-all">
                                        <div class="label-input"> Precio Anterior </div>
                                        <div class="input-group input-prefix number">
                                             <label> $ </label>
                                             <input id="nPriceProductPrevious" type="number" min="1" name="Price" value="" 
                                             class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                        </div>
                                   </div>
                                   </div>
                                  
                              </div>

                         </div>

                         <div class="col-lg-6 col-md-12">
                              <div class="row">
                                   <div class="col-lg-6">
                                        <div class="app-box-card-title " style="font-size: 12px !important">Visible Comercio</div>
                                   </div>
                                   <div class="col-lg-6 pad-top">
                                        <button id="onlyComerce" type="button" class="btn btn-min btn-toggle btn-info " data-toggle="button" aria-pressed="true" autocomplete="off">
                                             <div class="handle"></div>
                                        </button>
                                   </div>
                              </div>
                             
                              <div class="row">
                                   <div class="col-lg-6 col-md-12">
                                   <div class="form-group pad-all">
                                        <div class="label-input"> Precio Venta </div>
                                        <div class="input-group input-prefix number">
                                             <label> $ </label>
                                             <input id="nPriceComerce" type="number" min="1" name="Price" value="" 
                                             class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                        </div>
                                   </div>
                                   </div>
                                   <div class="col-lg-6 col-md-12">
                                   <div class="form-group pad-all">
                                        <div class="label-input"> Precio Anterior </div>
                                        <div class="input-group input-prefix number">
                                             <label> $ </label>
                                             <input id="nPriceComercePrevious" type="number" min="1" name="Price" value="" 
                                             class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                        </div>
                                   </div>
                                   </div>
                              </div>
                              

                         </div>
                         
                    </div>
                    

               </div>
               </div></div>



               <div class="row"><div class="col-lg-12">
               
               </div></div>
          </div>
               
     </div>
     <br />
     <div class="row pad-all">
          <div class="col-lg-12" style="text-align:right">
               <span class="jj-button-new pad-all" style="padding:5px 15px; margin:10px;" onclick="newProduct();"> + Guardar</span>
          </div>
     </div>
     </div>
     </div>
     <br />  <br />
    
    
</section>
@endsection
