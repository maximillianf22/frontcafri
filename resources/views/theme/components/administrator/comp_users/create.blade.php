@extends('theme.templates.core.admin.admin_master')
@section('title', 'Editar usuario')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="title-section float-left">Crear Nuevo Usuario</div>
     </div>
     <div class="content-body pad-all " style="padding:10px 10px 1px; margin:10px 20px 2px;" >
     <div class="container-fluid pad-all">

          <div class="row box-content-section "><div class="col-12">
               <div class="head-section-component">
                    <div class="row ">
                         <div class="col-lg-3  col-md-12 pad-all ">
                              
                         </div>

                         <div class="col-lg-8  col-md-12 pad-all filter-options" >
                              <form id="FrmEditProduct" action="{{route('admin.users.save.new')}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
                              @csrf
                              <div class="box-body"> <div class="row">
                                  
                                   
                                   <div class="col-lg-12 ">
                                   
                                        <div class="row">
                                             <div class="col-lg-4 ">
                                                  <div class="form-group">
                                                       <label>Nombre Del Usuario</label>
                                                       <input type="text" name="name_user" value="" class="form-control" placeholder="Nombre Cliente"  >
                                                       <input type="hidden" name="idCliente" value="" class="form-control" placeholder="" readonly >
                                                  </div>
                                             </div>
                                             <div class="col-lg-4 ">
                                                  <div class="form-group">
                                                       <label>Apellidos Del Usuario</label>
                                                       <input type="text" name="lastnameUser" value="" class="form-control" placeholder="Nombre Cliente" >
                                                  </div>
                                             </div>
                                             <div class="col-lg-4 ">
                                                  <div class="form-group">
                                                       <label>Celular</label>
                                                       <input type="text" name="celular_user" value="" class="form-control" placeholder="Celular "  >
                                                  </div>
                                             </div>

                                        </div>
                                        <div class="row">
                                             <div class="col-lg-12 ">
                                                <input type="hidden" name="name" value="" class="form-control" placeholder="Nombre Negocio" readonly>
                                             </div>
                                        </div>

                                        <div class="row" >
                                             <div class="col-lg-6 ">
                                                  <div class="form-group">
                                                       <label>Correo Electronico</label>
                                                       <input type="text" name="email_user" value="" class="form-control" placeholder="Email User"  >
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
                                                       <option value="1"  >Activo</option>
                                                       <option value="2"  >Inactivo</option>
                                                       </select>
                                                  </div>
                                             </div>

                                             
                                        </div>

                                        <?php 
                                            
                                        ?>
                                        <br />
                                        <div class="row pad-all "  style="border:1px dashed #CCC">
                                             <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                       <div class="row pad-all">
                                                            <div class="col-lg-7 pad-all">Mod. Clientes</div>
                                                            <div class="col-lg-5">
                                                                 <select name="cl" class="form-control">
                                                                 <option value="1"  >Si</option>
                                                                 <option value="2"  >No</option>
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
                                                                 <option value="1"  >Si</option>
                                                                 <option value="2"  >No</option>
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
                                                                 <option value="1"  >Si</option>
                                                                 <option value="2"  >No</option>
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
                                                                 <option value="1" >Si</option>
                                                                 <option value="2"  >No</option>
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
                                                                 <option value="1"  >Si</option>
                                                                 <option value="2"  >No</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                       <div class="row pad-all">
                                                            <div class="col-lg-7 pad-all">subCategorias</div>
                                                            <div class="col-lg-5">
                                                                 <select name="sct" class="form-control">
                                                                 <option value="1"  >Si</option>
                                                                 <option value="2"  >No</option>
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
                                                                 <option value="1"  >Si</option>
                                                                 <option value="2"  >No</option>
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
                                                                 <option value="1" >Si</option>
                                                                 <option value="2"  >No</option>
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
                                                                 <option value="1"  >Si</option>
                                                                 <option value="2"  >No</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                       <div class="row pad-all">
                                                            <div class="col-lg-7 pad-all">Mod. Hr Entrega</div>
                                                            <div class="col-lg-5">
                                                                 <select name="hr" class="form-control">
                                                                 <option value="1"  >Si</option>
                                                                 <option value="2" >No</option>
                                                                 </select>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-lg-4  pad-all " style="text-align:center">
                                                  <div class="form-group">
                                                  </div>
                                             </div>
                                        </div>
                                        <br />
                                        <div class="row">
                                             <div class="col-lg-6 ">
                                             <button id="addNewProduct" type="submit" class="btn btn-info ">Guardar </button>
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