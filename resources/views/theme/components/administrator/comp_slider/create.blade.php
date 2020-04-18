@extends('theme.templates.core.admin.admin_master')
@section('title', 'Mis Sliders')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="title-section float-left">Crear Nuevo Slider </div>
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
          
          <form action="{{route('admin.sliders.store')}}" method="post" files="true" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nombre" class="control-label">Titulo</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" autocomplete="off" class="form-control" required >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="typeSlider" class="control-label">Tipo</label>
                <select class="form-control" id="typeSlider" name="typeSlider" onchange="selectType(this.value)">
                  <option value="1">Imagen</option>
                 
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group" id="idImageLinkVideo">
                <label for="imagenSlider" class="control-label">Imagen</label>
                <input type="file" accept=".png, .jpg, .jpeg"  id="imagenSlider" name="imagenSlider" class="form-control"
                 onchange="return fileValidation()" >
              </div>
            </div>
          </div>
          <!--
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="descripcion" class="control-label">Descripcion</label>
                <textarea name="descripcion" id="descripcion" rows="5" class="form-control"></textarea>
              </div>
            </div>
          </div>
          -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="urlSlider" class="control-label">Url</label>
                <input type="text" id="urlSlider" name="urlSlider" placeholder="url a redireccionar" autocomplete="off" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group" id="idImageLinkVideo">
                <label for="idState" class="control-label">Estado</label>
                <select class="form-control" id="idState" name="idState">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-info btn-block">Guardar</button>
            </div>
          </div>
        </form>

          </div></div></div>

     </div>
     </div>
     <br />  <br />

<script type="text/javascript">
   function fileValidation(){
         var fileInput = document.getElementById('imagenSlider');
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
      var file = document.getElementById('imagenSlider');
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
