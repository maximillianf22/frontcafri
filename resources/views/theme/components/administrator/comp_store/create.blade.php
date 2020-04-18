@extends('theme.templates.core.admin.admin_master')
@section('title', 'Crear Nuevo Producto')
@section('content-theme')
<style>
     .app-box-card-title,
     .label-input,
     input, select, textarea { color:#000; font-family: arial } 
</style>admin.new.products
<section class="content-wrapper" style="padding:20px;">
     <div class="content-body pad-all " >
     <div class="container-fluid pad-all">
     

     <form id="FrmEditProduct" action="{{route('admin.new.products')}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
     @csrf
     <div class="row pad-all">
          <div class="col-lg-12" style="text-align:right">
          <!--<span class="jj-button-new pad-all" style="padding:5px 15px; margin:10px;" onclick="newProduct();"> + Guardar Nuevo Producto</span>-->
          <button type="submit" class="jj-button-new pad-all">Guardar Producto</button>
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
                    <div class="row">
                         <div class="col-lg-12">
                              <input type="file" id="imagenProduct" name="imagenProduct" class="form-control" accept=".png, .jpg, .jpeg" style="border:none !important; font-size:12px;" onchange="return fileValidation()" >
                         </div>
                        
                    </div>
             
               </div>
          </div>

          <div class="col-lg-8 col-md-8 col-sm-12 pad-all ">
               <div class="row"><div class="col-lg-12">
               <div class="box-content-section">
                    <div class="app-box-card-title"> Información del Producto </div>
                    <div class="row ">
                         <div class="col-lg-6">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Nombre del Producto </div>
                                   <input   id="cProduct" type="text" name="nameProduct" value="" class="input-text" placeholder="nombre del producto" required >
                                   <span style="font-size: 10px; padding: 5px">( Recomendado 80 Caracteres )</span>
                              </div>
                         </div>
                        
                         <div class="col-lg-3">
                              <div class="form-group pad-all">
                                   <div class="label-input"> Categoria </div>
                                   <select id="nCategory" name="Category_Product" class="form-control jj-select select2 jj-item" required>
                                        <option value=""> </option>
                                        <optgroup label="Mis Categorias ">
                                        <!--
                                        @foreach($Category as $Category_)
                                            <option value="{{$Category_->id}}">{{$Category_->nameCategorie}}</option>
                                        @endforeach
                                        -->
                                        @foreach($litarCategorias_ as $Category_)
                                        @if($Category_->type=='categoria')
                                             </optgroup>
                                             <optgroup label="{{$Category_->nameCategorie}}" style="font-weight: bold; font-size:8pt">

                                            
                                        @else
                                             <option value="{{$Category_->id_categorie}} " style="font-style: italic;">
                                                  - {{$Category_->nameCategorie}}
                                             </option>
                                        @endif 
                                        @endforeach
                                         </optgroup>
                                        
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
                                   <div class="label-input"> Nombre de la Presentación (Recomendado si tiene variación) </div>
                                   <input id="titleVariation" type="text" name="titleVariation" 
                                        value="" class="input-text" 
                                        placeholder="nombre/titulo para la variación" 
                                          >
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
                                        <input id="nAmount_per_sale" type="number" min="1" name="nAmount_per_sale" value="" 
                                        class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder=" Minimo" required >
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
                                   <input id="cCntbyunit" type="text" name="cCntbyunit" value="" class="input-text" placeholder="Cantidad en Unidad por producto" >
                              </div>
                         </div>
                    </div>

                    <div class="row pad-all" style="border-bottom:1px solid #DFE5EB">
                         <div class="col-lg-3">
                              <div class="app-box-card-title" style="font-size: 12px !important">Mostrar en Oferta</div>
                         </div>
                         <div class="col-lg-3 pad-top">
                              <select name="inOffert" class="form-control jj-select select2 jj-item">
                                   <option value="0" > NO </option>
                                   <option value="1" > SI </option>
                              </select>
                         </div>
                    </div>

                    <div class="row ">

                         <div class="col-lg-6 col-md-12">
                              <!---
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
                              --->
                              <div class="row">
                                   
                                   <div class="col-lg-6 col-md-12">
                                   <div class="form-group pad-all">
                                        <div class="label-input"> Precio Lista 1 </div>
                                        <div class="input-group input-prefix number">
                                             <label> $ </label>
                                             <input id="nPriceProduct" type="number" min="1" name="nPriceProduct" value="0" 
                                             class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                        </div>
                                   </div>
                                   </div>
                                   <div class="col-lg-6 col-md-12">
                                        <div class="form-group pad-all">
                                             <div class="label-input"> Precio Lista 2 </div>
                                             <div class="input-group input-prefix number">
                                                  <label> $ </label>
                                                  <input id="nPriceComerce" type="number" min="1" name="nPriceComerce" value="" 
                                                  class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio"  >                                            
                                             </div>
                                        </div>
                                   <!---
                                   <div class="form-group pad-all">
                                        <div class="label-input"> Precio Anterior </div>
                                        <div class="input-group input-prefix number">
                                             <label> $ </label>
                                             <input id="nPriceProductPrevious" type="number" min="0" name="nPriceProductPrevious" value="0" 
                                             class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio" required >                                            
                                        </div>
                                   </div>
                                   --->
                                   </div>
                                  
                              </div>

                         </div>

                         <div class="col-lg-6 col-md-12">
                             
                              <!---
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
                              --->
                             
                              <div class="row">
                                   <div class="col-lg-6 col-md-12">
                                         <div class="form-group pad-all">
                                             <div class="label-input"> Precio Lista 3 </div>
                                             <div class="input-group input-prefix number">
                                                  <label> $ </label>
                                                  <input id="nPricelist3" type="number" min="1" name="nPricelist3" value="" 
                                                  class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio"  >                                            
                                             </div>
                                        </div> 
                                   </div>
                                   
                                   <div class="col-lg-6 col-md-12">
                                         <div class="form-group pad-all">
                                             <div class="label-input"> Precio Lista 4 </div>
                                             <div class="input-group input-prefix number">
                                                  <label> $ </label>
                                                  <input id="nPricelist4" type="number" min="1" name="nPricelist4" value="" 
                                                  class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio"  >                                            
                                             </div>
                                        </div>
                                   <!---
                                   <div class="form-group pad-all">
                                        <div class="label-input"> Precio Anterior </div>
                                        <div class="input-group input-prefix number">
                                             <label> $ </label>
                                             <input id="nPriceComercePrevious" type="number" min="0" name="nPriceComercePrevious" value="0" 
                                             class="form-control jj-number " style="border:none !important; margin-top:-5px !important"  placeholder="Precio"  >                                            
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
                                                  <input id="nPricelist5" type="number" min="1" name="nPricelist5" value="" 
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
               
               </div></div>
          </div>
     </div>
     <br />
          <div class="row pad-all">
               <div class="col-lg-12" style="text-align:right">
                    <!--<span class="jj-button-new pad-all" style="padding:5px 15px; margin:10px;" onclick="newProduct();"> + Guardar</span>-->
               <button type="submit" class="jj-button-new pad-all">Guardar Producto</button>
               </div>
          </div>
     </form> 

         
     </div>
     </div>
     <br />  <br />
    
     <script type="text/javascript">
     function fileValidation(){
         var fileInput = document.getElementById('imagenProduct');
         var filePath = fileInput.value;
         var allowedExtensions = /(.jpg|.jpeg|.png)$/i;
         if(!allowedExtensions.exec(filePath)){
             alert('Unicamente se permite archivos de tipo .jpeg/.jpg/.png/ .');
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
       var ext = this.value.match(/\.([^\.]+)$/)[1];
       switch (ext) {
         case 'jpg':
         case 'png':
         case 'jpeg':
            break;
         default:
           alert('Tipo de Formato no permitido, solo se permite extensiones .JPG, .PNG, .JPEG');
           this.value = '';
       }
     };
     */
     </script>
</section>
@endsection
@section('js')

@endsection
