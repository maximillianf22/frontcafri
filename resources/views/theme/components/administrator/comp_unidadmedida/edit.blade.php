@extends('theme.templates.core.admin.admin_master')
@section('title', 'Editar Unidad')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="title-section float-left">Editar Unidad / {{$Unidades->nameValue}} </div>
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
          
          <form id="FrmEditProduct" action="{{route('admin.unidad.update',$Unidades->id)}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
               @csrf
               <div class="box-body"> <div class="row">
                    <div class="col-lg-2">
                    
                    </div>
                    
                    <div class="col-lg-10 ">
                        
                         
                         <div class="row">
                              <div class="col-lg-7 ">
                                   <div class="form-group">
                                        <label>Prefijo Categoria</label>
                                        <input type="text" name="name" value="{{$Unidades->nameValue}}" class="form-control" placeholder="Nombre de la Categoria" disabled required>
                                   </div>
                              </div>

                              <div class="col-lg-5 ">
                                   <div class="form-group">
                                        <label>Estado Categoria</label>
                                        <select name="state" class="form-control">
                                        <option value="1" <?php if($Unidades->idState===2){ echo "selected"; } ?> >Activo</option>
                                        <option value="2" <?php if($Unidades->idState===2){ echo "selected"; } ?> >Inactivo</option>
                                        <option value="3" >Enviar a Papelera</option>
                                        </select>
                                   </div>
                              </div>

                         </div>
                         <div class="row">
                         <div class="col-lg-12 ">
                              <div class="form-group">
                                   <textarea class="form-control" name="decription" rows="3" placeholder="Descripcion" >{{$Unidades->extra}}</textarea>
                              </div>
                         </div>     
                         </div>

                         <div class="row ">
                              <div class="col-lg-12 text-right">
                                   <button id="addNewProduct" type="submit" class="btn btn-info ">Actualizar Unidad</button>
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
