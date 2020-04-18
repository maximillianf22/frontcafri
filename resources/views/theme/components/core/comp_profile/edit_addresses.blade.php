@extends('theme.templates.'.$Config_->nameDirectory.'.'.$Config_->themeTemplate)
@section('content-store-theme')
@include('theme.includes.defines')
<br /><br /><br /><br /><br />
<div class="album pad-top bg-white ">
  <div class="container pad-top">
     <div class="row pad-all">
     <form id="FrmEditCupon" action="{{route('account.addresses.edit.save')}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
     @csrf  
     <div class="box" style="border:none">
          <div class="box-header" style="border-bottom:none !important " >
               <h4 class="box-title">Editar Dirección </h4>
          </div>
          <div class="box-body">
               <div class="row">
               <div class="col-lg-10">
                    <div class="row">
                         <div class="col-lg-3">
                         <label>Tipo de Calle </label>
                         <select name="tipo_calle" class="form-control">
                              <option value="Via" <?php if($addresses_->tipo_calle=='Via') echo 'selected'; ?> >Via</option>
                              <option value="Avenida" <?php if($addresses_->tipo_calle=='Avenida') echo 'selected'; ?>   >Avenida</option>
                              <option value="Avenida calle"  <?php if($addresses_->tipo_calle=='Avenida Calle') echo 'selected'; ?> >Avenida calle </option>
                              <option value="Avenida Carrera"  <?php if($addresses_->tipo_calle=='Avenida Carrera') echo 'selected'; ?>  >Avenida Carrera</option>
                              <option value="Calle"  <?php if($addresses_->tipo_calle=='Calle') echo 'selected'; ?> >Calle</option>
                              <option value="Carrera"  <?php if($addresses_->tipo_calle=='Carrera') echo 'selected'; ?>  >Carrera</option>
                              <option value="Circular"  <?php if($addresses_->tipo_calle=='Circular') echo 'selected'; ?> >Circular</option>
                              <option value="Diagonal"  <?php if($addresses_->tipo_calle=='Diagonal') echo 'selected'; ?>  >Diagonal</option>
                              <option value="Manzana" <?php if($addresses_->tipo_calle=='Manzana') echo 'selected'; ?>  >Manzana</option>
                              <option value="Transversal"   <?php if($addresses_->tipo_calle=='Transversal') echo 'selected'; ?> >Transversal</option>
                         </select>
                         </div>
                         <div class="col-lg-2">
                         <label style="color:#FFF">. </label>
                         <input type="hidden" class="form-control" name="id" value="{{$addresses_->id}}" id="idadd-1" />
                         <input type="text" class="form-control" value="{{$addresses_->dir_1}}" name="add_1" id="idadd-1" />
                         </div>
                         <div class="col-lg-1"><label style="color:#FFF">. </label><br />#</div>
                         <div class="col-lg-2">
                              <label style="color:#FFF">. </label>
                              <input type="text" class="form-control" value="{{$addresses_->dir_2}}" name="add_2" id="idadd-2" />
                         </div>
                         <div class="col-lg-1"><label style="color:#FFF">. </label><br />-</div>
                         <div class="col-lg-2">
                              <label style="color:#FFF">. </label>
                              <input type="text" class="form-control" value="{{$addresses_->dir_3}}" name="add_3" id="idadd-3" />
                         </div>
                         

                    </div>
                    <div class="row">
                         <div class="col-lg-11">
                         <label style="color:#FFF">Comentarios</label>
                         <textarea name="comments" id="descripcion" rows="5" class="form-control">{{$addresses_->comments}}</textarea>
                         </div>
                        
                    </div>
                    <div class="col-lg-1 "><label style="color:#FFF">. </label>
                         <button id="saveeditDir" type="submit" class="btn btn-info ">Actualizar</button>
                         </div>

               <br />
               </div>
               </div>
              
               
          </div>
     </div>
     </form>
    

</div></div></div>
<br /><br /><br /><br /><br /><br /><br /><br /><br />

@endsection