@extends('themes.administrator.template.index')
@section('title', 'Categorias')
@section('content-theme')
<section class="content-wrapper">
     <section class="content-header">
          <h1>{{$Category_->nameCategorie}}</h1>
          <ol class="breadcrumb">
          <li class="breadcrumb-item active"></li>
          </ol>
     </section>
     <section class="content-body" style="padding:10px;" >
     <div class="row"><div class="col">
          
          <div class="box">
          <form id="FrmEditProduct" action="{{route('admin.category.update',$Category_->id)}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
               @csrf
               <div class="box-body"> <div class="row">
                    <div class="col-lg-2">
                    <div class="form-group" id="idImageLinkVideo">
                         <label for="imagenCategorie" class="control-label">Imagen Categoria</label>
                              <div class="imgEditProduct pad-all " style="min-height:150px; min-width:150px; border:1px dashed #CCC; margin: 5px 0 5px;">
                                   @if(!empty($Category_->imageCategorie))
                                        @if (file_exists( public_path().'/content/upload/store/'.$Category_->imageCategorie ))
                                             <img src="{{ asset('/content/upload/store/'.$Category_->imageCategorie) }}" alt="Producto" />
                                        @else
                                             
                                        @endif
                                   @else
                                        
                                   @endif
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

     </div></div>
     </section>
</section>
@endsection