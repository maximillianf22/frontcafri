@extends('theme.templates.core.admin.admin_master')
@section('title', 'Editar Cliente')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="title-section float-left">Editar Cliente / {{$dataCustomer->nameUser}} {{$dataCustomer->lastnameUser}} - {{$dataCustomer->nameBusiness}}</div>
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
                                        @if(!empty($dataCustomer->imageProfile))
                                             @if (file_exists( public_path().'/content/upload/avatars/'.$dataCustomer->imageProfile ))
                                                  <img src="{{ asset('/content/upload/avatars/'.$dataCustomer->imageProfile) }}" width="70%" alt="" />
                                             @else
                                             <img src="{{ asset('/content/upload/defaultavatar_large.png') }}" alt="" /> 
                                             @endif
                                        @else
                                             
                                        @endif
                                   </div>
                              </div>
                         </div>

                         <div class="col-lg-8  col-md-12 pad-all filter-options" >
                              <form id="FrmEditProduct" action="{{route('admin.customer.save')}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
                              @csrf
                              <div class="box-body"> <div class="row">
                                  
                                   
                                   <div class="col-lg-10 ">
                                   
                                        <div class="row">
                                             <div class="col-lg-6 ">
                                                  <div class="form-group">
                                                       <label>Nombre Del Usuario</label>
                                                       <input type="text" name="name" value="{{$dataCustomer->nameUser}}" class="form-control" placeholder="Nombre Cliente" disabled >
                                                       <input type="hidden" name="idCliente" value="{{$dataCustomer->id}}" class="form-control" placeholder="" readonly >
                                                  </div>
                                             </div>
                                             <div class="col-lg-6 ">
                                                  <div class="form-group">
                                                       <label>Apellidos Del Usuario</label>
                                                       <input type="text" name="name" value="{{$dataCustomer->lastnameUser}}" class="form-control" placeholder="Nombre Cliente"  disabled>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-lg-12 ">
                                                  <div class="form-group">
                                                       <label>Nombre del Negocio</label>
                                                       <input type="text" name="name" value="{{$dataCustomer->nameBusiness}}" class="form-control" placeholder="Nombre Negocio" disabled>
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="row">
                                             <div class="col-lg-4 ">
                                                  <div class="form-group">
                                                       <label>Celular</label>
                                                       <input type="text" name="name" value="{{$dataCustomer->celularUser}}" class="form-control" placeholder="Celular "disabled >
                                                  </div>
                                             </div>
                                             <div class="col-lg-4 ">
                                                  <div class="form-group">
                                                       <label>Fecha Nacimiento</label>
                                                       <input type="text" name="name" value="{{$dataCustomer->fechanac}}" class="form-control" placeholder="Fecha Nacimiento" disabled>
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="row">
                                             <div class="col-lg-12 ">
                                                  <div class="form-group">
                                                       <label>Correo Electronico</label>
                                                       <input type="text" name="name" value="{{$dataCustomer->email}}" class="form-control" placeholder="Email Cliente"disabled >
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-lg-6 ">
                                                  <div class="form-group">
                                                       <label>Estado </label>
                                                       <select name="state" class="form-control">
                                                       <option value="1" <?php if($dataCustomer->idState===1){ echo "selected"; } ?> >Activo</option>
                                                       <option value="2" <?php if($dataCustomer->idState===2){ echo "selected"; } ?> >Inactivo</option>
                                                       </select>
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="row">
                                             <div class="col-lg-6 ">
                                             <button id="addNewProduct" type="submit" class="btn btn-info ">Actualizar Estado</button>
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
