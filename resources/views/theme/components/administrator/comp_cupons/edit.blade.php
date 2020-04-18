@extends('theme.templates.core.admin.admin_master')
@section('title', 'Nueva Cupon')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="title-section float-left">Editar Cupon / {{$Cupons->code_cupon}}</div>
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
          
          <form id="FrmEditCupon" action="{{route('admin.cupons.edit.save')}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
               @csrf
               <div class="box-body"> <div class="row">
                    <div class="col-lg-10 ">
                        
                         <div class="row">
                              <div class="col-lg-3">
                                   <div class="form-group">
                                        <label>Código Cupon</label>
                                        <input type="hidden" name="idCupon" readonly value="{{$Cupons->id}}"  class="form-control" placeholder="Codigo" required>
                                        <input type="text" name="code_cupon" maxlength="6" value="{{$Cupons->code_cupon}}" disabled class="form-control" placeholder="Codigo" required>
                                   </div>
                              </div>
                              <div class="col-lg-2 ">
                                   <div class="form-group">
                                        <label>Valor Cupon</label>
                                        <input type="number" name="cupon_value" value="{{$Cupons->cupon_value}}" class="form-control" placeholder="Valor" required>
                                   </div>
                              </div>
                              <div class="col-lg-2 ">
                                   <div class="form-group">
                                        <label>Minimo Compra</label>
                                        <input type="number" name="minimo_compra" value="{{$Cupons->minimo_compra}}" class="form-control" placeholder="Valor" required>
                                   </div>
                              </div>
                              <div class="col-lg-2 ">
                                   <div class="form-group">
                                        <label>Limite Usuarios</label>
                                        <input type="number" name="user_limit" value="{{$Cupons->user_limit}}" class="form-control" placeholder="Limite" required>
                                   </div>
                              </div>

                              <div class="col-lg-2 ">
                                   <div class="form-group">
                                        <label>Estado</label>
                                        <select name="state" class="form-control">

                                        <option value="1" <?php if($Cupons->idState===1){ echo "selected"; } ?> >Activo</option>
                                        <option value="2" <?php if($Cupons->idState===2){ echo "selected"; } ?> >Inactivo</option>

                                        </select>
                                   </div>
                              </div>
                              <div class="col-lg-1"><label>.</label>
                                   <button id="addNewProduct" type="submit" class="btn btn-info ">Actualizar</button>
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
     
</section>
@endsection
