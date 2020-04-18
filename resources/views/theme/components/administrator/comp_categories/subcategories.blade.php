@extends('theme.templates.core.admin.admin_master')
@section('title', 'Sub Categorias')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="title-section float-left">Mis Sub Categorias</div>
          <a href="{{route('admin.category.subcategoriecreate')}}"><div class="jj-button-new float-right">+ Nueva Sub Categoria</div></a>
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
          
          <table id="result" class="table table-responsive table-app-content">
            <thead>
              <tr>
                <th class="text-center"></th>
                <th class="text-center">Imagen</th>
                <th class="text-center">Nombre Sub Categoria</th>
                <th class="text-center">Categoria Principal</th>
                <th class="text-center">Descripción general</th>
                <th class="text-center">Estado Actual</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody class="store-b-manager">
              @if (count($dataSubCategory)>0)
              <?php $ult_ = count($dataSubCategory); $i_ =1; ?>
               @foreach ($dataSubCategory as $category)
                  <tr class="showOrder" style="padding:1px">

                    <td>
                      <!--
                         <div class="sOrder">
                              <?php if($i_==1){}else{ ?>
                              <div class="topOrder" onclick="topCategory({{$category->id}});">
                                   <img src="{{ asset('/content/upload/app/ordern_top.svg') }}" width="20" height="20" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30"  />
                              </div>
                              <?php } ?>
                              <?php if($i_==$ult_){}else{ ?>
                              <div class="downOrder"  onclick="downCategory({{$category->id}});">
                                   <img src="{{ asset('/content/upload/app/ordern_down.svg') }}" width="20" height="20" style="display: inline-block; fill: black; vertical-align: middle;" viewBox="0 0 30 30"  />
                              </div>
                            <?php } $i_   ++;?>
                         </div>
                       -->
                    </td>

                    <td class="" style="padding:10px !important; text-align:left;font-weight:200;color:#000">
                         <div class=" " style="1 width:50px; height:50px; text-align:center">
                         @if(!empty($category->imageCategorie))
                            @if (file_exists( public_path().'/content/upload/store/'.$category->imageCategorie ))
                                <img id="logoTheme" src="{{ asset('/content/upload/store/'.$category->imageCategorie) }}" alt="Categoria" height="100%" >
                            @else
                            @endif
                         @else
                         @endif
                         </div>
                    </td>
                    <td class="" style="padding:10px !important; text-align:left;color:#000">
                         {{$category->nameCategorie}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:left;color:#000">
                         {{$category->nombre_categoria}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:left;color:#000">
                         {{$category->description}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:left;color:#000">
                         @if($category->idState==1)
                              <span class="badge badge-success">Activo</span>
                         @else
                              <span class="badge badge-danger">Inactivo</span>
                         @endif
                    </td>
                    <td class="" style="padding:10px !important; text-align:center; font-size:11px">
                         <div class="jj-button-mini"><a href="{{route('admin.category.subcategorieedit',$category->id)}}">Editar </a> </div>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="7" style="text-align: left;">No se encontraron Subcategorias creadas.</td>
                </tr>
              @endif
            </tbody>
          </table>


          </div></div></div>

     </div>
     </div>
     <br />  <br />


<div class="row grid span8">
     <div class="well span2 tile brd_"> </div>
     <div class="well span2 tile"> </div>
     <div class="well span2 tile"> </div>
     <div class="well span4 tile"> </div>
</div>
   


</section>
@endsection
