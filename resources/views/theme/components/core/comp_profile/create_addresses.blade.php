@extends('theme.templates.'.$Config_->nameDirectory.'.'.$Config_->themeTemplate)
@section('content-store-theme')
@include('theme.includes.defines')
<br /><br /><br /><br /><br />
<div class="album pad-top bg-white ">
  <div class="container pad-top">
     <div class="row pad-all">
     <form id="FrmEditCupon" action="{{route('account.addresses.create.save')}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
     @csrf  
     <div class="box" style="border:none">
          <div class="box-header" style="border-bottom:none !important " >
               <h4 class="box-title">Crear Dirección </h4>
          </div>
          <div class="box-body">
               <div class="row">
               <div class="col-lg-10">
                    <div class="row">
                         <div class="col-lg-3">
                         <label>Tipo de Calle </label>
                         <select name="tipo_calle" class="form-control">
                              <option value="Via" >Via</option>
                              <option value="Avenida"  >Avenida</option>
                              <option value="Avenida calle" >Avenida calle </option>
                              <option value="Avenida Carrera"  >Avenida Carrera</option>
                              <option value="Calle" >Calle</option>
                              <option value="Carrera"  >Carrera</option>
                              <option value="Circular" >Circular</option>
                              <option value="Diagonal"  >Diagonal</option>
                              <option value="Manzana" >Manzana</option>
                              <option value="Transversal"  >Transversal</option>
                         </select>
                         </div>
                         <div class="col-lg-2">
                         <label style="color:#FFF">. </label>
                         <input type="text" class="form-control" name="add_1" id="idadd-1" />
                         </div>
                         <div class="col-lg-1"><label style="color:#FFF">. </label><br />#</div>
                         <div class="col-lg-2">
                              <label style="color:#FFF">. </label>
                              <input type="text" class="form-control" name="add_2" id="idadd-2" />
                         </div>
                         <div class="col-lg-1"><label style="color:#FFF">. </label><br />-</div>
                         <div class="col-lg-2">
                              <label style="color:#FFF">. </label>
                              <input type="text" class="form-control" name="add_3" id="idadd-3" />
                         </div>
                         

                    </div>
                    <div class="row">
                         <div class="col-lg-11">
                         <label style="color:#FFF">Comentarios</label>
                         <textarea name="comments" id="descripcion" rows="5" placeholder= "Edificio, Casa, Apartamento, Local" class="form-control"></textarea>
                         </div>
                        
                    </div>
                    <div class="col-lg-1 "><label style="color:#FFF">. </label>
                         <button id="saveeditDir" type="submit" class="btn btn-info ">Guardar</button>
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