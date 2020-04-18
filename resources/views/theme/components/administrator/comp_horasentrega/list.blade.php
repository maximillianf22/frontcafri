@extends('theme.templates.core.admin.admin_master')
@section('title', 'Administrar Horas')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="title-section float-left">Horas de Entrega</div>
          <a href="{{route('admin.horas.entrega.create')}}"><div class="jj-button-new float-right">+ Nuevo Hora Entrega</div></a>
     </div>
     <div class="content-body pad-all " style="padding:10px 10px 1px; margin:10px 20px 2px;" >
     <div class="container-fluid pad-all">

          <div class="row box-content-section "><div class="col-12">
               <div class="head-section-component">
                    <div class="row ">
                         
                    </div>
               </div>
          </div></div>
          <div class="row box-content-section "><div class="col-8"><div id="filterListProduc" class="">
          
          <table id="result" class="table table-responsive table-app-content">
            <thead>
              <tr>
                    <th class="text-center">Hora Inicial</th>
                    <th class="text-center">Hora Final  </th>
                    <th class="text-center">Estado</th>
                    <th class="text-center"></th>
              </tr>
            </thead>
            <tbody class="store-b-manager">
               @if (count($Hours)>0)
                @foreach ($Hours as $Hour)
                  <tr class="" style="padding:1px">
                    <td class="" style="padding:10px !important; text-align:center;color:#000">
                         {{$Hour->range_initial}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:center;color:#000">
                         {{$Hour->range_final}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:center;color:#000">
                    @if($Hour->idState==1)
                        <span class="badge badge-success">Activo</span>
                      @else
                        <span class="badge badge-danger">Inactivo</span>
                      @endif
                    </td>
                    <td class="" style="padding:10px !important; text-align:center; font-weight:200; font-size:11px">
                         <div class="jj-button-mini"><a href="{{route('admin.horas.entrega.edit',$Hour->id)}}">Editar Hora</a> </div>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4">No se encontraron Categorias creadas</td>
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
