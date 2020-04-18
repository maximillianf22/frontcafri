@extends('themes.administrator.template.index')
@section('title', 'Nueva Categoria')
@section('content-theme')
<section class="content-wrapper">
     <section class="content-header">
          <h1>Crear nueva categoria</h1>
          <ol class="breadcrumb">
          <li class="breadcrumb-item active"></li>
          </ol>
     </section>
     <section class="content-body" style="padding:10px;" >
     <div class="row"><div class="col">
          
          <div class="box">
          <form id="FrmEditProduct" action="{{route('admin.category.store')}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
               @csrf
               <div class="box-body"> <div class="row">
                    <div class="col-lg-2">
                    <div class="form-group" id="idImageLinkVideo">
                         <label for="imagenCategorie" class="control-label">Imagen Categoria</label>
                              <div class="imgEditProduct pad-all " style="min-height:150px; min-width:150px; border:1px dashed #CCC; margin: 5px 0 5px;">
                                   <img src="{{ asset('/content/upload/store/no-image-product.png') }}" alt="Imagen Categoria" />
                              </div>
                              <span style="font-size:11px;color:#32536A;padding:2px; text-align:left"> Minimo Recomendado (260 alto X 160 ancho) </span>
                              <input type="file" id="imagenCategorie" name="imagenCategorie" class="form-control" style="border:none !important; font-size:11px;">
                         </div>
                    </div>
                    
                    <div class="col-lg-10 ">
                        
                         
                         <div class="row">
                              <div class="col-lg-7 ">
                                   <div class="form-group">
                                        <label>Nombre Categoria</label>
                                        <input type="text" name="name" value="" class="form-control" placeholder="Nombre de la Categoria" required>
                                   </div>
                              </div>

                              <div class="col-lg-5 ">
                                   <div class="form-group">
                                        <label>Estado Categoria</label>
                                        <select name="state" class="form-control">
                                        <option value="1" >Activo</option>
                                        <option value="2" >Inactivo</option>
                                        </select>
                                   </div>
                              </div>

                         </div>
                         <div class="row">
                         <div class="col-lg-12 ">
                              <div class="form-group">
                                   <textarea class="form-control" name="decription" rows="3" placeholder="Descripcion" ></textarea>
                              </div>
                         </div>     
                         </div>

                         <div class="row ">
                              <div class="col-lg-12 text-right">
                                   <button id="addNewProduct" type="submit" class="btn btn-info ">Crear nueva Categoria</button>
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