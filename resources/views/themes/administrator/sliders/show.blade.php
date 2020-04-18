@extends('themes.administrator.template.index')
@section('title', 'Slider')
@section('content-theme')
<section class="content-wrapper">
     <section class="content-header">
          <h1>{{$dataSlider->title}}</h1>
          <ol class="breadcrumb">
          <li class="breadcrumb-item active"></li>
          </ol>
     </section>
     <section class="content-body" style="padding:10px;" >
     <div class="row"><div class="col">
          
          <div class="box">
          <form id="FrmEditProduct" action="{{route('admin.sliders.update', [$dataSlider->id])}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
               @csrf
               <div class="box-body"> <div class="row">
                    <div class="col-lg-2">
                    <div class="form-group" id="idImageLinkVideo">
                         <label for="imagenCategorie" class="control-label">Imagen Slider</label>
                              <div class="imgEditProduct pad-all " style="min-height:150px; min-width:150px; border:1px dashed #CCC; margin: 5px 0 5px;">
                                   @if(!empty($dataSlider->imageSlider))
                                        @if (file_exists( public_path().'/content/upload/'.$dataSlider->imageSlider ))
                                             <img src="{{ asset('/content/upload/'.$dataSlider->imageSlider) }}" alt="Producto" />
                                        @else
                                             
                                        @endif
                                   @else
                                        
                                   @endif
                              </div>
                              <span style="font-size:11px;color:#32536A;padding:2px; text-align:left"> Minimo Recomendado (300 alto X 1330 ancho) </span>
                              <input type="file" id="imagenSlider" name="imagenSlider" class="form-control" style="border:none !important; font-size:11px;">
                         </div>
                    </div>
                    
                    <div class="col-lg-10 ">
                        
                         
                         <div class="row">
                              <div class="col-lg-7 ">
                                   <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="title" value="{{$dataSlider->title}}" class="form-control" placeholder="Nombre del Slider" required>
                                   </div>
                              </div>

                              <div class="col-lg-5 ">
                                   <div class="form-group">
                                        <label>Estado Slider</label>
                                        <select name="state" class="form-control">
                                        <option value="1" <?php if($dataSlider->idState===2){ echo "selected"; } ?> >Activo</option>
                                        <option value="2" <?php if($dataSlider->idState===2){ echo "selected"; } ?> >Inactivo</option>
                                        </select>
                                   </div>
                              </div>

                         </div>
                         <div class="row">
                         <div class="col-lg-12 ">
                              <div class="form-group">
                                   <textarea class="form-control" name="decription" rows="3" placeholder="Descripcion" >{{$dataSlider->description}}</textarea>
                              </div>
                         </div>     
                         </div>

                         <div class="row ">
                              <div class="col-lg-12 text-right">
                                   <button id="addNewProduct" type="submit" class="btn btn-info ">Actualizar Slider</button>
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