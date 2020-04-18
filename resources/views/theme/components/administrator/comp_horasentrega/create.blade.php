@extends('theme.templates.core.admin.admin_master')
@section('title', 'Nueva hora de Entrega')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="title-section float-left">Crear Nueva Hora de Entrega</div>
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
          
          <form id="FrmEditProduct" action="{{route('admin.horas.entrega.save')}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
               @csrf
               <div class="box-body"> <div class="row">
                    
                    <div class="col-lg-12 ">
                        
                         <div class="row">

                              <div class="col-lg-3 ">
                                   <div class="input-group">
                                        <div class="bootstrap-timepicker">
                                             <div class="form-group">
                                                  <label>Hora Inicial</label>
                                                  <div class="input-group">
                                                       <input  name="hora_inicial"  type="text" class="form-control timepicker">
                                                       <div class="input-group-addon">
                                                       <i class="fa fa-clock-o"></i>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-3 ">
                                   <div class="input-group">
                                        <div class="bootstrap-timepicker">
                                             <div class="form-group">
                                                  <label>Hora Final</label>
                                                  <div class="input-group">
                                                       <input name="hora_final" type="text" class="form-control timepicker">
                                                       <div class="input-group-addon">
                                                       <i class="fa fa-clock-o"></i>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>

                              <div class="col-lg-2 ">
                                   <div class="form-group">
                                        <label>Estado</label>
                                        <select name="state" class="form-control">
                                        <option value="1"  >Activo</option>
                                        <option value="2"  >Inactivo</option>
                                        </select>
                                   </div>
                              </div>

                              <div class="col-lg-2 "><label>.</label>
                              <button id="addNewProduct" type="submit" class="btn btn-info ">Crear Nuevo Horario</button>
                              </div>

                         </div>
                         <div class="row">
                         <div class="col-lg-12 ">
                              <div class="form-group">
                                 <!--  <textarea class="form-control" name="decription" rows="3" placeholder="Descripcion" ></textarea> -->
                              </div>
                         </div>     
                         </div>

                         <div class="row ">
                              <div class="col-lg-12 text-right">
                                   
                              </div>
                         </div>
                              
                    
                    </div>

               </div></div>
      
          </form>

          </div></div></div>

     </div>
     </div>
     <br />  <br />
     
</section>
@endsection