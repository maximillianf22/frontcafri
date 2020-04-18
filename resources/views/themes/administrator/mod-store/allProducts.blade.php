@extends('themes.administrator.template.index')
@section('title', 'Inicio')
@section('content-theme')
<section class="content-wrapper">
     <section class="content-header">
          <h1>Mis Productos</h1>
          <ol class="breadcrumb">
          <li class="breadcrumb-item active"></li>
          </ol>
     </section>
     <section class="content-body " style="padding:10px;" >
     <div class="row">
     
     <div class="col ">
     
          <div class="box ">
               
               <div class="box-header with-border">
                    <div class="row">
                         <div class="col-lg-4 ">
                              <a href="{{route('admin.product.create')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Agregar Nuevo Producto</a>
                         </div>
                         <div class="col-lg-8 ">
                              <input class="filterProductAll" data-id="" data-slug="" style="height:40px; margin:0 auto !important; width:99% !important; padding:7px 20px !important; border:1px solid #D9D9D9 !important; border-radius:20px;" type="text" id="filterProductAll" name="filterProductAll" value="" placeholder="Buscar por nombre del producto" onkeyup="filterProductAll()" />
                         </div>
                    </div>
               </div>
               
               <div class="box-body no-padding">
               
               <div id="resultfilter">
               </div>
               <table id="result" class="table table-striped table-responsive">
                    <tr>
                         <th style="width: 10px"></th>
                         <th style="width: 100px"></th>
                         <th>Descripción</th>
                         <th>Categoria</th>
                         <th>Precio Público</th>
                         <th>Precio Comercio</th>
                         <th>Inventario</th>
                         <th>Stock</th>
                         <th>Venta Minima</th>
                         <th>Estado</th>
                         <th></th>
                    </tr>
               
                    <tbody>
                   
                         @foreach($Products as $list)
                         <tr>
                              <td>
                                   @if($list->isOffers==1)
                                   <i class="lni-offer text-danger" style="font-size:14px;padding-top:40px !important"></i>
                                   @endif 
                              </td>
                              <td>
                                   @if(!empty($list->imageProduct))
                                        @if (file_exists( public_path().'/content/upload/store/'.$list->imageProduct ))
                                             <img id="logoTheme" src="{{ asset('/content/upload/store/'.$list->imageProduct) }}" alt="Producto" width="100" >
                                        @else
                                             $list->imageProduct
                                        @endif
                                   @else
                                        $list->imageProduct
                                   @endif
                              </td>
                              <td>
                                   {{ $list->nameProduct }}<br />
                                   {{ $list->descriptionProduct }}<br />
                              </td>
                              <td>
                                   {{ $list->nameCategorie }}
                              </td>

                              <td>$ {{ number_format($list->priceProduct,2) }}</td>
                              <td>$ {{ number_format($list->pricecomerceProduct,2) }}</td>
                              <td>{{ $list->inventory }}</td>
                              <td>{{ $list->stockAttribute }}</td>
                              <td>{{ $list->amount_per_sale }} / {{ $list->unidad_venta }}</td>
                         
                              <td>
                                   @if($list->idState==1)
                                        <span class="badge badge-success">Activo</span>
                                   @else
                                        <span class="badge badge-danger">Inactivo</span>
                                   @endif
                              </td>

                              <td>
                                   <a href="{{route('admin.edit.products',$list->idProduct)}}"><i class="lni-pencil" style="font-size:18px;cursor:pointer"></i></a>
                              </td>
                              
                         </tr>
                         @endforeach     
                    </tbody>
               </table>
               </div>
               
          </div>




     </div></div>
     </section>
</section>
@endsection
@section('js')
  <script type="text/javascript">

     
     function filterProductAll(){
          var DataSearch = document.getElementById("filterProductAll").value;
          $.ajax({
               type:'POST',
               url: UrlHost_+"/store/product/searchfilterAll",
               data:{DataSearch : DataSearch},
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success: function(data){
                    $("#result").css("display", "none");
                    $("#resultfilter").html(data);
               },
               error: function(xhr, type, exception, thrownError){
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
               }
          });
     }


    function table_filter() {
      $(".filter_table").slideToggle("slow");
    }

    $(document).ready(function() {
      //Datepicker
      $('#fecha_cita').datepicker({
        format: "dd/mm/yyyy",
        autoclose:true,
        todayHighlight: true,
        language: "es"
      });
    });
  </script>
@endsection