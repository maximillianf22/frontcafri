@extends('theme.templates.core.admin.admin_master')
@section('title', 'Mis Clientes')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="title-section float-left">Mis Clientes</div>
     </div>
     <div class="content-body pad-all " style="padding:10px 10px 1px; margin:10px 20px 2px;" >
     <div class="container-fluid pad-all">

     <div class="row box-content-section "><div class="col-12">
               <!-- envabezado-->
               
                    <div class="head-section-component">
                         <div class="row ">
                             <div class="col-lg-5 col-md-12 pad-all ">
                              <div class="lbl-filter" >Buscar Cliente </div>
                              <input class=" jj-search " data-id="" data-slug=""  type="text" id="filterClientetAll" name="filterClientetAll" value="" placeholder="Ingresar Data de Busqueda" onkeyup="filterClienteAll()" />
                             </div>


                             <div class="col-lg-3 col-md-12 pad-all filter-options" >
                                   <div class="lbl-filter" >Tipo Cliente</div>
                                   <select name="dType" class="form-control jj-select select2 jj-item " style="width: 100%;">
                                        <option value="99">Todos </option>
                                        <option value="0">Persona </option>
                                        <option value="1">Comercio</option>
                                   </select>
                             </div>

                             <div class="col-lg-3 col-md-12 pad-all filter-options" >
                                   <div class="lbl-filter" >Estados</div>
                                   <select name="dState" class="form-control jj-select select2 jj-item " style="width: 100%;">
                                        <option value="0">Todos</option>
                                        <option value="1">Activos</option>
                                        <option value="2">Inactivos</option>
                                        
                                   </select>
                             </div>

                              <div class="col-lg-1 col-md-12 pad-all ">
                                   <div class="lbl-filter" >.</div>
                                   <div class="pad-all jj-button-new" onclick="filtrarClientes_();" style="border-radius:2px;">
                                        Filtrar
                                   </div>
                             </div>

                        </div>
                    </div>
               
               <!-- envabezado-->
          </div></div>

          <div class="row box-content-section "><div class="col-12"><div id="filterListClient" class="">
          
          <table id="result" class="table table-responsive table-app-content">
            <thead>
              <tr>
                <th></th>
                <th class="text-center">Nombre </th>
                <th class="text-center">Apellidos </th>
                <th class="text-center">Nombre del Negocio</th>
                <th class="text-center">Celular</th>
                <th class="text-center">Correo Electronico</th>
                <th class="text-center">Estado</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody class="store-b-manager">
              @if (count($dataCustomer)>0)
                @foreach ($dataCustomer as $customer)
                  <tr class="" style="padding:1px">

                    <td>
                         <div class=" pad-all " style="width:30px; min-height:30px; text-align:center; padding:1px;  margin: 5px 0 5px;">
                         @if(!empty($customer->imageProfile))
                                   @if (file_exists( public_path().'/content/upload/avatars/'.$customer->imageProfile ))
                                        <img src="{{ asset('/content/upload/avatars/'.$customer->imageProfile) }}" width="30px" style="border-radius:999px;" height="30px" alt="" />
                                   @else
                                   <img src="{{ asset('/content/upload/defaultavatar_large.png') }}"  style="border-radius:999px;"  width="100%" alt="" /> 
                                   @endif
                              @else
                                   
                              @endif
                         </div>
                    </td>

                    <td class="" style="padding:10px !important;color:#000; text-align:left;font-weight:300">
                         {{$customer->nameUser}} 
                    </td>
                    <td class="" style="padding:10px !important;color:#000; text-align:left;font-weight:300">
                         {{$customer->lastnameUser}}
                    </td>
                    <td class="" style="padding:10px !important;color:#000; text-align:left;font-weight:300">
                         {{$customer->nameBusiness}}
                    </td>
                    <td class="" style="padding:10px !important;color:#000; text-align:left;font-weight:300">
                         {{$customer->celularUser}}
                    </td>
                    <td class="" style="padding:10px !important;color:#000; text-align:left;font-weight:300">
                         {{$customer->email}}
                    </td>
                    <td class="" style="padding:10px !important;color:#000; text-align:left;font-weight:300">
                         @if ($customer->idState==1)
                              <span class="badge badge-success">Activo</span>
                         @else
                              <span class="badge badge-danger">Inactivo</span>
                         @endif
                    </td>
                    <td class="" style="padding:10px !important;color:#000; text-align:left;font-weight:300; font-size:11px">
                         <div class="jj-button-mini"><a href="{{route('admin.customers.edit',$customer->id)}}">Editar </a> </div>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4">No se encontraron Clientes</td>
                </tr>
              @endif
            </tbody>
          </table>


          </div></div></div>

     </div>
     </div>
     <br />  <br />
     
</section>
@endsection

@section('js')
  <script type="text/javascript">

     
     function filterClienteAll(){
          var DataSearch = document.getElementById("filterClientetAll").value;
          var dataType=$('select[name=dType]').val(); 
          var dataState=$('select[name=dState]').val();

          $.ajax({
               type:'POST',
               url: UrlHost_+"/administrator/customers/searchfilterAll",
               data:{dataType_ :dataType, dataState_ :dataState,DataSearch : DataSearch },
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success: function(data){
                    $("#result").css("display", "none");
                    $("#filterListClient").html(data);
               },
               error: function(xhr, type, exception, thrownError){
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
               }
          });
     }


  </script>
@endsection