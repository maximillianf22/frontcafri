@extends('theme.templates.core.admin.admin_master')
@section('title', 'Mis Clientes')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="title-section float-left">Editar Categoria / {{$Category_->nameCategorie}}</div>
     </div>
     <div class="content-body pad-all " style="padding:10px 10px 1px; margin:10px 20px 2px;" >
     <div class="container-fluid pad-all">

          <div class="row box-content-section "><div class="col-12">
               <div class="head-section-component">
                    <div class="row ">
                         
                    </div>
               </div>
          </div></div>
          <div class="row box-content-section "><div class="col-12"><div id="filterListProduc" class="">
          
          <form id="FrmEditProduct" action="{{route('admin.category.update',$Category_->id)}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
               @csrf
               <div class="box-body"> <div class="row">
                    <div class="col-lg-2">
                    <div class="form-group" id="idImageLinkVideo">
                         <label for="imagenCategorie" class="control-label">Imagen Categoria</label>
                              <div class="imgEditProduct pad-all " style="min-height:150px; text-align:center; min-width:150px; border:1px dashed #CCC; margin: 5px 0 5px;">
                                   @if(!empty($Category_->imageCategorie))
                                        @if (file_exists( public_path().'/content/upload/store/'.$Category_->imageCategorie ))
                                             <img src="{{ asset('/content/upload/store/'.$Category_->imageCategorie) }}" height="100%" alt="Producto" />
                                        @else
                                        @endif
                                   @else
                                   @endif
                              </div>
                              <span style="font-size:11px;color:#32536A;padding:2px; text-align:left"> Minimo Recomendado (260 alto X 160 ancho) </span>
                              <input type="file" id="imagenCategorie" name="imagenCategorie" class="form-control"  accept=".png, .jpg, .jpeg"  style="border:none !important; font-size:11px;"  onchange="return fileValidation()" >
                         </div>
                    </div>
                    
                    <div class="col-lg-10 ">
                         <div class="row">
                              <div class="col-lg-7 ">
                                   <div class="form-group">
                                        <label>Nombre Categoria</label>
                                        <input type="text" name="name" value="{{$Category_->nameCategorie}}" class="form-control" placeholder="Nombre de la Categoria" required>
                                   </div>
                              </div>

                              <div class="col-lg-5 ">
                                   <div class="form-group">
                                        <label>Estado Categoria</label>
                                        <select name="state" class="form-control">
                                        <option value="1" <?php if($Category_->idState===2){ echo "selected"; } ?> >Activo</option>
                                        <option value="2" <?php if($Category_->idState===2){ echo "selected"; } ?> >Inactivo</option>
                                        </select>
                                   </div>
                              </div>

                         </div>
                         <div class="row">
                         <div class="col-lg-12 ">
                              <div class="form-group">
                                   <textarea class="form-control" name="decription" rows="3" placeholder="Descripcion" >{{$Category_->description}}</textarea>
                              </div>
                         </div>     
                         </div>

                         <div class="row ">
                              <div class="col-lg-12 text-right">
                                   <button id="addNewProduct" type="submit" class="btn btn-info ">Actualizar Categoria</button>
                              </div>
                         </div>
                              
                    
                    </div>

               </div></div>
          </div>
          </form>

          </div></div></div>

     </div>
     </div>
     <br />  <br />
     
      <script type="text/javascript">
         function fileValidation(){
         var fileInput = document.getElementById('imagenCategorie');
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
      var file = document.getElementById('imagenCategorie');
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
