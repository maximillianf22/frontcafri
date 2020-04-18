@extends('theme.templates.core.admin.admin_master')
@section('title', 'Nueva Cupon')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="title-section float-left">Crear Nuevo Cupon</div>
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
          
          <form id="FrmEditCupon" action="{{route('admin.cupons.save')}}" method="post"  name="frmEditCupon" files="true" enctype="multipart/form-data">
               @csrf
               <div class="box-body"> <div class="row">
                    
                    <div class="col-lg-12 ">
                        
                         
                         <div class="row">
                              <div class="col-lg-3 ">
                                   <div class="form-group">
                                        <label>Codigo Cupon</label>
                                        <input id="CodeCupon" type="text" name="code_cupon" maxlength="50" value="" class="form-control" placeholder="Codigo" onkeyup="nospaces();" required>
                                        <div id="valida_cupon" style="color:green"></div><div id="valida_cupon_n" style='color:red'></div>
                                   </div>
                              </div>
                              <div class="col-lg-2 ">
                                   <div class="form-group">
                                        <label>Valor Cupon</label>
                                        <input type="number" name="cupon_value" value="" class="form-control" placeholder="Valor" required>
                                   </div>
                              </div>
                              <div class="col-lg-2 ">
                                   <div class="form-group">
                                        <label>Minimo Compra</label>
                                        <input type="number" name="minimo_compra" value="0" class="form-control" placeholder="Valor" required>
                                   </div>
                              </div>
                              <div class="col-lg-2 ">
                                   <div class="form-group">
                                        <label>Usuarios</label>
                                        <input type="number" name="user_limit" value="" class="form-control" placeholder="Limite" required>
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

                              <div class="col-lg-1 "><label>.</label>
                              <button id="addNewProduct" type="submit" class="btn btn-info ">Crear</button>
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
          </div>
          </form>

          </div></div></div>

     </div>
     </div>
     <br />  <br />
   

     <script>
     function nospaces(){
          Code=$("#CodeCupon").val();
          NewCode = Code.replace(" ",""); 
          $("#CodeCupon").val(NewCode);
         
          /*---- valida el cupon ---*/
          $.ajax({
               type:'POST',
               url: UrlHost_+"/administrator/cupons/validate",
               data:{NewCode_:NewCode},
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success: function(data){
                    if(data=="Y"){
                         $("#valida_cupon_n").html("Codigo Invalido, Ya esta registrado");
                         $("#valida_cupon").html("");
                         $("#addNewProduct").prop('disabled', true);
                    }else{
                         $("#valida_cupon_n").html("");
                         $("#valida_cupon").html("Codigo valido");
                         $("#addNewProduct").prop('disabled', false);
                    }
                   
               },
               error: function(xhr, type, exception, thrownError) { 
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
               }
          });

          
     }
     </script>

</section>
@endsection
