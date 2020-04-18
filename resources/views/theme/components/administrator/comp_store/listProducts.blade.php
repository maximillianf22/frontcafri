@extends('theme.templates.core.admin.admin_master')
@section('title', 'Mis Productos')
@section('content-theme')
<section class="content-wrapper">

    <div class="container-fluid ">
      <div class="row pad-all">
        <div class="col-md-6 pad-all"> 
            <div class="title-section  "><b>Mis Productos.</b></div>
        </div>
        <div class="col-md-6 pad-all"> 
          <a href="{{route('admin.product.create')}}"><div class="jj-button-new float-right">+ Nuevo Producto</div></a> 
        </div>
      </div>
    </div>
   
     <div class="content-body pad-all " style="padding:10px 10px 1px; margin:10px 20px 2px;" >
     <div class="container-fluid pad-all">

          <div class="row box-content-section "><div class="col-12">
               <!-- envabezado-->
               
                    <div class="head-section-component">
                         <div class="row ">
                             <div class="col-lg-5 col-md-12 pad-all ">
                              <div class="lbl-filter" >Buscar Producto</div>
                              <input class=" jj-search " data-id="" data-slug=""  type="text" id="filterProductAll" name="filterProductAll" value="" placeholder="Ingresar Nombre" onkeyup="filterProductAll()" />
                             </div>


                             <div class="col-lg-3 col-md-12 pad-all filter-options" >
                                   <div class="lbl-filter" >Categoría</div>
                                   <select name="dCategory" id="filterCategory" class="form-control jj-select select2 jj-item " style="width: 100%;">
                                        <option value="0"> - </option>
                                        <!--
                                          @foreach($Store_categorie_ as $Category_)
                                          <option value="{{$Category_->idCategorie}}">{{$Category_->nameCategorie}}</option>
                                          @endforeach
                                        -->
                                        @foreach($litarCategorias_ as $Category_)
                                        @if($Category_->type=='categoria')
                                             <option value="{{$Category_->id_categorie}} " style="font-weight: bold; font-size: 9pt">
                                                  {{$Category_->nameCategorie}}
                                             </option>
                                        @else
                                             <option value="{{$Category_->id_categorie}} " style="font-style: italic;">
                                                  - {{$Category_->nameCategorie}}
                                             </option>
                                        @endif 
                                        @endforeach
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
                                   <div class="pad-all jj-button-new" onclick="filtrarProductos_();" style="border-radius:2px;">
                                        Filtrar
                                   </div>
                             </div>

                        </div>
                    </div>
               
               <!-- envabezado-->
          </div></div>
          <div class="row box-content-section "><div class="col-12"><div id="filterListProduc" class="">
          <table id="result" class="table table-responsive table-app-content">
               <thead>
               <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Descripción General</th>
                    <th>Categoria</th>
                    <th>Unidad Venta</th>
                    <th>Tipo Producto</th>
                    <th>Estado.</th>
                    <th></th>
               </tr>
               </thead>
               <tbody class="store-b-manager">
                    @foreach($Products as $list)
                    <tr>
                         <td>
                              <div class="imgStoreTbl">
                              @if(!empty($list->imageProduct))
                                   @if (file_exists( public_path().'/content/upload/store/'.$list->imageProduct ))
                                        <img id="logoTheme" src="{{ asset('/content/upload/store/'.$list->imageProduct) }}" alt="Producto" width="100" >
                                   @else
                                        $list->imageProduct
                                   @endif
                              @else
                                   $list->imageProduct
                              @endif
                              </div>
                         </td>
                         <td >
                              <div class="product-name" style="color:#000; text-align:left"> {{ $list->nameProduct }} </div>
                         </td>
                         <td  style="color:#000">  {{ $list->desc_product }} </td>
                         <td  style="color:#000"> {{ $list->nameCategorie }} </td>
                         <td  style="color:#000"> {{ $list->unidad_venta }} </td>
                         <td  style="color:#000">
                              @if($list->cnt_attributes>1)
                                  Con Variación
                              @else
                                 Unico
                              @endif
                         </td>
                         <td  style="color:#000"> 
                              @if($list->idState==1)
                                   <span class="badge badge-success">Activo</span>
                              @else
                                   <span class="badge badge-danger">Inactivo</span>
                              @endif
                         </td>
                         
                         <td>
                              <div class="jj-button-mini"><a href="{{ route('admin.edit.products',$list->id)}} ">Editar </a> </div>
                         </td>
                    </tr>
                    @endforeach     
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

    /*
     function filterProductAll(){
      alert(a);
          var DataSearch = document.getElementById("filterProductAll").value;
          $.ajax({
               type:'POST',
               url: UrlHost_+"/store/product/searchfilterAll",
               data:{DataSearch : DataSearch},
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success: function(data){
                    $("#result").css("display", "none");
                    $("#filterListProduc").html(data);
               },
               error: function(xhr, type, exception, thrownError){
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
               }
          });
     } 
    function table_filter() {
      $(".filter_table").slideToggle("slow");
    }
    */
  </script>
@endsection