@extends('theme.templates.core.admin.admin_master')
@section('title', 'Mis Productos')
@section('content-theme')
<style>
     .app-box-card-title,
     .label-input,
     input, select, textarea { color:#000; font-family: arial } 
</style>
<section class="content-wrapper" style="padding:20px;">
     <div class="content-body pad-all " >
     <div class="container-fluid pad-all">
     <div class="row pad-all">
          <div class="col-lg-12" style="text-align:right">
               <span class="jj-button-new pad-all" style="padding:5px 15px; margin:10px;" onclick="updProduct({{$Products->id}});"> + Actualizar Producto</span>
          </div>
     </div>

     <div class="row">

          <div class="col-lg-4 col-md-4 col-sm-12 pad-all ">
               <div class="box-content-section">
               <div class="app-box-card-title">Imagen del Producto.</div>
               <div class="pad-all">
                   

                    @if(!empty($Products->imageProduct))
                         @if (file_exists( public_path().'/content/upload/store/'.$Products->imageProduct ))
                              <div class="add-media-box-mini-container-img pad-all">
                                   <img src="{{ asset('/content/upload/store/'.$Products->imageProduct) }}" alt="Producto" style=" max-height:150px;  max-width:150px; text-align:center " />
                              </div>
                         @else
                              <div class="add-media-box-mini-container pad-all">
                                   <div class="add-media-button pad-all ">
                                        <img src="{{ asset('/content/upload/app/picture.svg') }}" style="vertical-align: middle;" viewBox="0 0 50 50"  data-toggle="modal" data-target="#modal-left" />
                                   </div>
                              </div>
                         @endif
                    @else
                         <div class="add-media-box-mini-container pad-all">
                              <div class="add-media-button pad-all ">
                                   <img src="{{ asset('/content/upload/app/picture.svg') }}" style="vertical-align: middle;" viewBox="0 0 50 50"  data-toggle="modal" data-target="#modal-left" />
                              </div>
                         </div>
                    @endif
                    
               </div>
               <form id="FrmEditProduct" action="{{route('admin.update.imgproduct',$Products->id)}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
               @csrf
                    <div class="row">
                         <div class="col-lg-12">
                              <input type="file" id="imagenProduct" name="imagenProduct" class="form-control" accept="image/png, .png, .jpg, .jpeg"   style="border:none !important; font-size:12px;" onchange="return fileValidation()" >
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
                                   <input id="cProduct" type="text" name="nameProduct" value="{{$Products->nameProduct}}" class="input-text" placeholder="nombre del producto" required >
                                   <span style="font-size: 10px; padding: 5px">( Recomendado 80 Caracteres )</span>
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="form-group pad-all"> 
                                   <div class="label-input"> Categoria </div>
                                   <select id="nCategory" name="Category_Product" class="form-control jj-select select2 jj-item" required>
                                        <option value=""> </option>
                                        <optgroup label="Mis Categorias ">
 
                                        @foreach($litarCategorias_ as $Category_)
                                        @if($Category_->type=='categoria')
                                             </optgroup>
                                             <optgroup label="{{$Category_->nameCategorie}}" style="font-weight: bold; font-size:8pt">
                                              
                                        @else
                                             <option value="{{$Category_->id_categorie}}" style="font-style: italic;"
                                                  @if($Category_->id_categorie == $Products->idCategorie) selected @endif > 
                                                  - {{$Category_->nameCategorie}}
                                             </option>
                                        @endif 

                                        @endforeach 

                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Estado @if($Products->idState==1) <span class="badge badge-xl badge-dot badge-success"></span> @else <span class="badge badge-xl badge-dot badge-danger"></span> @endif </div>
                                   <select name="stateProduct" class="form-control jj-select select2 jj-item">
                                        <option value="1" @if($Products->idState==1) selected @endif > Activo</option>
                                        <option value="2" @if($Products->idState==2) selected @endif >Inactivo</option>
                                        <option value="3" >Papelera</option>
                                   </select>
                              </div>
                         </div>
                    </div>

                    <div class="row ">
                         <div class="col-lg-12">
                              <div class="form-group pad-all">
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
                              <div class="form-group pad-all">
                                   <div class="label-input"> Descripción General </div>
                                   <textarea id="cDescription" class="form-control text-area" name="decriptionProduct" rows="3" placeholder="Descripcion" >{{$Products->description}}</textarea>
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
                                        <input id="nAmount_per_sale" type="number" min="1" name="Price" value="{{$Product_main->amount_per_sale}}" 
                                        class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >
                                   </div>
                              </div>
                         </div>
                         <div class="col-lg-3" style="border-bottom:1px solid #DFE5EB">
                              <div class="form-group pad-all">
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
                         <div class="col-lg-6" style="border-bottom:1px solid #DFE5EB">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Cantidad x Producto </div>
                                   <input id="cCntbyunit" type="text" name="cCntbyunit" value="{{$Product_main->cntbyUnit}}" class="input-text" placeholder="nombre del producto" required >
                              </div>
                         </div>
                    </div>

                     <div class="row pad-all" style="border-bottom:1px solid #DFE5EB">
                         <div class="col-lg-3">
                              <div class="app-box-card-title" style="font-size: 12px !important">Mostrar en Oferta</div>
                         </div>
                         <div class="col-lg-3 pad-top">

                              <select name="inOffert" id="inOffert" class="form-control jj-select select2 jj-item">
                                   <option value="0"  @if($Products->isOffers==0) selected @endif > NO </option>
                                   <option value="1"  @if($Products->isOffers==1) selected @endif > SI </option>
                              </select>
                         </div>
                    </div>

                    <div class="row ">

                         <div class="col-lg-6 col-md-12">
                              <div class="row">
                                   <!---
                                   <div class="col-lg-6">
                                        <div class="app-box-card-title" style="font-size: 12px !important">Visible Público</div>
                                   </div>
                                   <div class="col-lg-6 pad-top">
                                        <button id="onlyPublic" type="button" class="btn btn-min btn-toggle btn-info @if($Product_main->solo_publico==1) active @endif" data-toggle="button" aria-pressed="true" autocomplete="off">
                                             <div class="handle"></div>
                                        </button>
                                   </div>
                                   --->

                              </div>
                              <div class="row">
                                   
                                   <div class="col-lg-6 col-md-12">
                                   <div class="form-group pad-all">
                                        <div class="label-input"> Precio Lista 1 </div>
                                        <div class="input-group input-prefix number">
                                             <label> $ </label>
                                             <input id="nPriceProduct" type="number" min="1" name="Price" value="{{$Product_main->priceProduct}}" 
                                             class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                        </div>
                                   </div>
                                   </div>
                                   <div class="col-lg-6 col-md-12">
                                        <div class="form-group pad-all">
                                             <div class="label-input"> Precio Lista 2 </div>
                                             <div class="input-group input-prefix number">
                                                  <label> $ </label>
                                                  <input id="nPriceComerce" type="number" min="1" name="Price" value="{{$Product_main->pricecomerceProduct}}" 
                                                  class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                             </div>
                                        </div>
                                        <!---
                                        <div class="form-group pad-all">
                                             <div class="label-input"> Precio Anterior </div>
                                             <div class="input-group input-prefix number">
                                                  <label> $ </label>
                                                  <input id="nPriceProductPrevious" type="number" min="1" name="Price" value="{{$Product_main->previous_price}}" 
                                                  class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                             </div>
                                        </div>
                                        --->
                                   </div>
                                  
                              </div>

                         </div>

                         <div class="col-lg-6 col-md-12">
                              <div class="row">
                                   
                                   <!---
                                   <div class="col-lg-6">
                                        <div class="app-box-card-title " style="font-size: 12px !important">Visible Comercio</div>
                                   </div>
                                   <div class="col-lg-6 pad-top">
                                        <button id="onlyComerce" type="button" class="btn btn-min btn-toggle btn-info @if($Product_main->solo_comercio==1) active @endif" data-toggle="button" aria-pressed="true" autocomplete="off">
                                             <div class="handle"></div>
                                        </button>
                                   </div>
                                   --->
                              </div>
                             
                              <div class="row">
                                   <div class="col-lg-6 col-md-12">
                                        <div class="form-group pad-all">
                                             <div class="label-input"> Precio Lista 3 </div>
                                             <div class="input-group input-prefix number">
                                                  <label> $ </label>
                                                  <input id="nPricelist3" type="number" min="1" name="nPricelist3" value="{{$Product_main->price_list_3}}" 
                                                  class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                             </div>
                                        </div>
                                   
                                   </div>
                                   <div class="col-lg-6 col-md-12">
                                        <div class="form-group pad-all">
                                             <div class="label-input"> Precio Lista 4 </div>
                                             <div class="input-group input-prefix number">
                                                  <label> $ </label>
                                                  <input id="nPricelist4" type="number" min="1" name="nPricelist4" value="{{$Product_main->price_list_4}}" 
                                                  class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                             </div>
                                        </div>
                                        <!---
                                        <div class="form-group pad-all">
                                             <div class="label-input"> Precio Anterior </div>
                                             <div class="input-group input-prefix number">
                                                  <label> $ </label>
                                                  <input id="nPriceComercePrevious" type="number" min="1" name="Price" value="{{$Product_main->previous_price_comerce}}" 
                                                  class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                             </div>
                                        </div>
                                        --->
                                   </div>
                              </div> 
                              

                         </div>
                         
                    </div>

                     <div class="row pad-all" style="border-bottom:1px solid #DFE5EB">
                         <div class="col-lg-6 col-md-12"> 
                              <div class="row">
                                   <div class="col-lg-6 col-md-12">
                                         <div class="form-group pad-all">
                                             <div class="label-input"> Precio Lista 5 </div>
                                             <div class="input-group input-prefix number">
                                                  <label> $ </label>
                                                  <input id="nPricelist5" type="number" min="1" name="nPricelist5" value="{{$Product_main->price_list_5}}" 
                                                  class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio"  > 
                                             </div>
                                        </div> 
                                   </div> 
                                   <div class="col-lg-6 col-md-12"> 
                                   </div> 
                              </div> 
                         </div>

                         <div class="col-lg-6 col-md-12">
                         </div>
                    </div>
                    

               </div>
               </div></div>



               <div class="row"><div class="col-lg-12">
               
               <div class="box-content-section" style="margin-top:15px">
                    <div class="app-box-card-title">
                         <span style="float:right; font-size:12px;">{{count($Products_attr)}}  Variantes</span>
                         Variantes del producto 
                         <br /><br /><span style="font-size:11px">Administra posibles variaciones de este producto. </span><br />
                    </div>
                    <div class="row "><div class="col-lg-12">
                         @if(sizeof($Products_attr)>=1)
                         <table id="result" class="table table-responsive table-app-content" style="color:#000">
                              <thead>
                              <tr>
                                   <th>Variante</th>
                                   <th>Lista 1</th>
                                   <th>Lista 2</th>
                                   <th>Lista 3</th>
                                   <th>Lista 4</th>
                                   <th>Lista 5</th>
                                   <th>Estado</th>
                                   <th></th>
                              </tr>
                              </thead>
                              <tbody class="store-b-manager" style="font-weight:200 !important">
                              @foreach($Products_attr as $attr)
                                   <tr style="color:#000">
                                        <td  style="color:#000; font-family: arial"><div class="pad-all">{{$attr->nameAttribute}}</div></td>
                                        <td  style="color:#000; font-family: arial"><div class="pad-all">$ {{number_format($attr->priceProduct,2)}}</div></td>
                                        
                                        <td  style="color:#000; font-family: arial"><div class="pad-all">$ {{number_format($attr->pricecomerceProduct,2)}}</div></td>

                                        <td  style="color:#000; font-family: arial"><div class="pad-all">$ {{number_format($attr->price_list_3,2)}}</div></td>

                                        <td  style="color:#000; font-family: arial"><div class="pad-all">$ {{number_format($attr->price_list_4,2)}}</div></td>

                                        <td  style="color:#000; font-family: arial"><div class="pad-all">$ {{number_format($attr->price_list_5,2)}}</div></td>
                                        
                                        <td  style="color:#000; font-family: arial"><div class="pad-all">
                                             @if($attr->idState==1) <span class="badge badge-sm  badge-dot badge-success"></span> <span style="color:green">Activo</span> @endif 
                                             @if($attr->idState==2) <span class="badge badge-sm  badge-dot badge-danger"></span> <span style="color:#ff0000">Inactivo</span> @endif 
                                        </div></td>
                                        <td  style="color:#000; font-family: arial"><div class="pad-all">
                                        <div class="jj-button-mini"><div 
                                             onclick="openAttrModal({{$attr->id}});" >Editar </div> </div>
                                        </div></td>
                                   </tr>
                              @endforeach
                              </tbody>
                         
                         </table>
                         <div class="pad-all">
                              <span onclick="openNewAttrModal({{$Products->id}});"  class=" pad-all" style="padding:5px 15px; margin:10px; font-size:11px; border:1px solid #2B81CB;cursor:pointer"> + Agregar Nueva Variación</span>
                         </div>
                         <br />
                         @else
                              <div class="pad-all text-center" style="border:1px dashed #DFE5EB">
                                   <br /><br />¿Tu producto viene en diferentes opciones ? Agrégalos aquí.<br />
                                   <br /> <span onclick="openNewAttrModal({{$Products->id}});"  class="jj-button-new pad-all" style="padding:5px 15px; margin:10px;"> + Agregar Nueva Variación</span>
                                   <br /><br />
                              </div>
                         @endif
                    </div></div>
               </div>
               </div></div>
          </div>
               
     </div>
     <br />
     <div class="row pad-all">
          <div class="col-lg-12" style="text-align:right">
               <span class="jj-button-new pad-all" style="padding:5px 15px; margin:10px;" onclick="updProduct({{$Products->id}});"> + Actualizar Producto</span>
          </div>
     </div>
     </div>
     </div>
     <br />  <br />
    
     <script type="text/javascript"> 
          function fileValidation(){
              var fileInput = document.getElementById('imagenProduct');
              var filePath = fileInput.value;
              var allowedExtensions = /(.jpg|.jpeg|.png)$/i;
              if(!allowedExtensions.exec(filePath)){
                  alert('Unicamente se permite archivos de tipo .jpeg/.jpg/.png/ only.');
                  fileInput.value = '';
                  return false;
              }else{
               /*
                  //Image preview
                  if (fileInput.files && fileInput.files[0]) {
                      var reader = new FileReader();
                      reader.onload = function(e) {
                          document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
                      };
                      reader.readAsDataURL(fileInput.files[0]);
                  }
                  */
              }
          }

          /*
      var file = document.getElementById('imagenProduct');
      file.onchange = function(e) { 
         var archivo = $("#imagenProduct").val();
         var extensiones = archivo.substring(archivo.lastIndexOf("."));
 
          if (extensiones.match() !== null) {

               var ext = this.value.match(/\.([^\.]+)$/)[1]; 
               
               

               if(extensiones != ".jpg" && extensiones != ".jpeg" && extensiones != ".png") {
                    alert("El archivo de tipo " + extensiones + "no es válido");
               } 
               if(ext===""){
                    alert('Este Tipo de Formato no permitido, solo se permite extensiones .JPG, .PNG, .JPEG');
                    this.value = '';
               }else{
                    switch (ext) {
                    case 'jpg':
                    case 'png':
                    case 'jpeg':
                      break;
                    default:
                         alert('Tipo de Formato no permitido, solo se permite extensiones .JPG, .PNG, .JPEG');
                         this.value = '';
                    } 
               } 
          } 
     }; 
     */
     </script>
    
</section>
@endsection
