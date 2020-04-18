@extends('theme.templates.core.admin.admin_master')
@section('title', 'Editar usuario')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="title-section float-left">Editar Usuario / {{$dataUser->nameUser}} {{$dataUser->lastnameUser}} - {{$dataUser->nameBusiness}}</div>
     </div>
     <div class="content-body pad-all " style="padding:10px 10px 1px; margin:10px 20px 2px;" >
     <div class="container-fluid pad-all">

          <div class="row box-content-section "><div class="col-12">
               <div class="head-section-component">
                    <div class="row ">
                         <div class="col-lg-3  col-md-12 pad-all ">
                              <div class="form-group" id="idImageLinkVideo">
                                   <label for="imagenCategorie" class="control-label">Imagen Perfil</label>
                                   <div class="imgEditProduct pad-all " style="width:100%; min-height:200px; text-align:center; padding:10px; border:1px dashed #CCC; margin: 5px 0 5px;">
                                        @if(!empty($dataUser->imageProfile))
                                             @if (file_exists( public_path().'/content/upload/avatars/'.$dataUser->imageProfile ))
                                                  <img src="{{ asset('/content/upload/avatars/'.$dataUser->imageProfile) }}" width="70%" alt="" />
                                             @else
                                             <img src="{{ asset('/content/upload/defaultavatar_large.png') }}" alt="" /> 
                                             @endif
                                        @else
                                             
                                        @endif
                                   </div>
                              </div>
                         </div>

                         <div class="col-lg-8  col-md-12 pad-all filter-options" >
                              <form id="FrmEditProduct" action="{{route('admin.users.save')}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
                              @csrf
                              <div class="box-body"> <div class="row">
                                  
                                   
                                   <div class="col-lg-12 ">
                                   
                                        <div class="row">
                                             <div class="col-lg-4 ">
                                                  <div class="form-group">
                                                       <label>Nombre Del Usuario</label>
                                                       <input type="text" name="name" value="{{$dataUser->nameUser}}" class="form-control" placeholder="Nombre Cliente" disabled >
                                                       <input type="hidden" name="idCliente" value="{{$dataUser->id}}" class="form-control" placeholder="" readonly >
                                                  </div>
                                             </div>
                                             <div class="col-lg-4 ">
                                                  <div class="form-group">
                                                       <label>Apellidos Del Usuario</label>
                                                       <input type="text" name="name" value="{{$dataUser->lastnameUser}}" class="form-control" placeholder="Nombre Cliente"  disabled>
                                                  </div>
                                             </div>
                                             <div class="col-lg-4 ">
                                                  <div class="form-group">
                                                       <label>Celular</label>
                                                       <input type="text" name="celular_user" value="{{$dataUser->celularUser}}" class="form-control" placeholder="Celular "  >
                                                  </div>
                                             </div>

                                        </div>
                                        <div class="row">
                                             <div class="col-lg-12 ">
                                                <input type="hidden" name="name" value="{{$dataUser->nameBusiness}}" class="form-control" placeholder="Nombre Negocio" readonly>
                                             </div>
                                        </div>

                                        <div class="row" >
                                             <div class="col-lg-6 ">
                                                  <div class="form-group">
                                                       <label>Correo Electronico</label>
                                                       <input type="text" name="email_user" value="{{$dataUser->email}}" class="form-control" placeholder="Email User"  >
                                                  </div>
                                             </div>
                                             <div class="col-lg-3">
                                                  <div class="form-group">
                                                       <label>Password </label>
                                                       <input type="password" name="password_user" value="" class="form-control" placeholder="Password"  >
                                                  </div>
                                             </div>
                                             <div class="col-lg-3">
                                                  <div class="form-group">
                                                       <label>Estado </label>
                                                       <select name="state" class="form-control">
                                                       <option value="1" <?php if($dataUser->idState===1){ echo "selected"; } ?> >Activo</option>
                                                       <option value="2" <?php if($dataUser->idState===2){ echo "selected"; } ?> >Inactivo</option>
                                                       </select>
                                                  </div>
                                             </div>

                                             
                                        </div>

                                        <?php 
                                             $dataArray_ = json_decode($dataUser->modulos_permisos);
                                        ?>
                                        <br />
                                        <div class="row pad-all "  style="border:1px dashed #CCC">
                                             <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                       <div class="row pad-all">
                                                            <div class="col-lg-7 pad-all">Mod. Clientes</div>
                                                            <div class="col-lg-5">
                                                                 <select name="cl" class="form-control">
                                                                 <option value="1" <?php if($dataArray_->cl==1){ echo "selected"; } ?> >Si</option>
                                                                 <option value="2" <?php if($dataArray_->cl==2){ echo "selected"; } ?> >No</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                       <div class="row pad-all">
                                                            <div class="col-lg-7 pad-all">Mod. Productos</div>
                                                            <div class="col-lg-5">
                                                                 <select name="pr" class="form-control">
                                                                 <option value="1" <?php if($dataArray_->pr==1){ echo "selected"; } ?> >Si</option>
                                                                 <option value="2" <?php if($dataArray_->pr==2){ echo "selected"; } ?> >No</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>

                                             <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                       <div class="row pad-all">
                                                            <div class="col-lg-7 pad-all">Adm. Productos</div>
                                                            <div class="col-lg-5">
                                                                 <select name="apr" class="form-control">
                                                                 <option value="1" <?php if($dataArray_->apr==1){ echo "selected"; } ?> >Si</option>
                                                                 <option value="2" <?php if($dataArray_->apr==2){ echo "selected"; } ?> >No</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div> 
                                        </div>

                                        <div class="row pad-all "  style="border:1px dashed #CCC">
                                             
                                             <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                       <div class="row pad-all">
                                                            <div class="col-lg-7 pad-all">Mod. Pedidos</div>
                                                            <div class="col-lg-5">
                                                                 <select name="pd" class="form-control">
                                                                 <option value="1" <?php if($dataArray_->pd==1){ echo "selected"; } ?> >Si</option>
                                                                 <option value="2" <?php if($dataArray_->pd==2){ echo "selected"; } ?> >No</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>

                                             <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                       <div class="row pad-all">
                                                            <div class="col-lg-7 pad-all">Mod. Categorias</div>
                                                            <div class="col-lg-5">
                                                                 <select name="ct" class="form-control">
                                                                 <option value="1" <?php if($dataArray_->ct==1){ echo "selected"; } ?> >Si</option>
                                                                 <option value="2" <?php if($dataArray_->ct==2){ echo "selected"; } ?> >No</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                       <div class="row pad-all">
                                                            <div class="col-lg-7 pad-all">SubCategorias</div>
                                                            <div class="col-lg-5">
                                                                 <select name="sct" class="form-control">
                                                                 <option value="1" <?php if($dataArray_->sct==1){ echo "selected"; } ?> >Si</option>
                                                                 <option value="2" <?php if($dataArray_->sct==2){ echo "selected"; } ?> >No</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div> 
                                        </div>

                                        <div class="row pad-all "  style="border:1px dashed #CCC">

                                             <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                       <div class="row pad-all">
                                                            <div class="col-lg-7 pad-all">Mod. Und Medida</div>
                                                            <div class="col-lg-5">
                                                                 <select name="um" class="form-control">
                                                                 <option value="1" <?php if($dataArray_->um==1){ echo "selected"; } ?> >Si</option>
                                                                 <option value="2" <?php if($dataArray_->um==2){ echo "selected"; } ?> >No</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>

                                              <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                       <div class="row pad-all">
                                                            <div class="col-lg-7 pad-all">Mod. Slider</div>
                                                            <div class="col-lg-5">
                                                                 <select name="sl" class="form-control">
                                                                 <option value="1" <?php if($dataArray_->sl==1){ echo "selected"; } ?> >Si</option>
                                                                 <option value="2" <?php if($dataArray_->sl==2){ echo "selected"; } ?> >No</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>

                                             <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                       <div class="row pad-all">
                                                            <div class="col-lg-7 pad-all">Mod. Cupones</div>
                                                            <div class="col-lg-5">
                                                                 <select name="cp" class="form-control">
                                                                 <option value="1" <?php if($dataArray_->cp==1){ echo "selected"; } ?> >Si</option>
                                                                 <option value="2" <?php if($dataArray_->cp==2){ echo "selected"; } ?> >No</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                              
                                        </div>

                                        <div class="row pad-all "  style="border:1px dashed #CCC">
                                             

                                             <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                       <div class="row pad-all">
                                                            <div class="col-lg-7 pad-all">Mod. Hr Entrega</div>
                                                            <div class="col-lg-5">
                                                                 <select name="hr" class="form-control">
                                                                 <option value="1" <?php if($dataArray_->hr==1){ echo "selected"; } ?> >Si</option>
                                                                 <option value="2" <?php if($dataArray_->hr==2){ echo "selected"; } ?> >No</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>

                                              
                                        </div> 
                                        <br />
                                        <div class="row">
                                             <div class="col-lg-6 ">
                                             <button id="addNewProduct" type="submit" class="btn btn-info ">Actualizar </button>
                                             </div>
                                        </div>
                                   </div>
                              </div></div>
                         </div>
                         </form>
                         </div>
                    </div>
               </div>
          </div></div>
          <div class="row box-content-section "><div class="col-12"><div id="filterListProduc" class="">
          </div></div></div>
     </div>
     </div>
     <br />  <br />
</section>
@endsection