@extends('theme.templates.core.admin.admin_master')
@section('title', 'Mis Sliders')
@section('content-theme')
<section class="content-wrapper">
      <div class="content-header-section ">
          <div class="title-section float-left">Slider Web</div>
          <a href="{{route('admin.sliders.create')}}"><div class="jj-button-new float-right">+ Nuevo Slider Web</div></a>
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
              <th class="text-center">Imagen</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Url</th>
                <th class="text-center">Estado Actual</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody class="store-b-manager">
            @if (count($dataSlider)>0)
                @foreach ($dataSlider as $Slider)
                  <tr class="" style="padding:1px">
                    <td class="" style="padding:10px !important; text-align:left;font-weight:200;color:#000">
                    @if(!empty($Slider->imageSlider))
                            @if (file_exists( public_path().'/content/upload/'.$Slider->imageSlider ))
                                <img id="logoTheme" src="{{ asset('/content/upload/'.$Slider->imageSlider) }}" alt="Slider" width="150" >
                            @else
                            @endif
                      @else
                      @endif
                    </td>
                    <td class="" style="padding:10px !important; text-align:left;color:#000">
                    {{$Slider->title}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:left;color:#000">
                    {{$Slider->urlSlider}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:left;color:#000">
                    @if($Slider->idState==1)
                        <span class="badge badge-success">Activo</span>
                      @else
                        <span class="badge badge-danger">Inactivo</span>
                      @endif
                    </td>
                    <td class="" style="padding:10px !important; text-align:center; font-size:11px">
                         <div class="jj-button-mini"><a href="{{route('admin.sliders.show', [$Slider->id])}}">Editar </a> </div>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4" class="pad-all">No se encontraron Slider creados</td>
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
