@extends('theme.templates.core.admin.admin_master')
@section('title', 'Administrar Cupones')
@section('content-theme')
<section class="content-wrapper">
     <div class="content-header-section ">
          <div class="title-section float-left">Cupones</div>
          <a href="{{route('admin.cupons.create')}}"><div class="jj-button-new float-right">+ Nuevo Cupon</div></a>
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
                    <th class="text-center">Codigo Cupon</th>
                    <th class="text-center">Valor Cupon  </th>
                    <th class="text-center">Fecha Creación </th>
                    <th class="text-center">Usuario Limite</th>
                    <th class="text-center">Minimo Compra</th>
                    <th class="text-center">Usados</th>
                    <th class="text-center">Estado Cupon</th>
                    <th class="text-center"></th>
              </tr>
            </thead>
            <tbody class="store-b-manager">
               @if (count($Cupons)>0)
                @foreach ($Cupons as $Cupon)
                  <tr class="" style="padding:1px">
                    <td class="" style="padding:10px !important; text-align:center;color:#000" >
                         {{$Cupon->code_cupon}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:center;color:#000">
                         {{$Cupon->cupon_value}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:center;color:#000">
                         {{substr($Cupon->created_at,0,10)}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:center;color:#000">
                         {{$Cupon->user_limit}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:center;color:#000">
                         {{$Cupon->minimo_compra}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:center;color:#000">
                         {{$Cupon->utilizados}}
                    </td>
                    <td class="" style="padding:10px !important; text-align:center;color:#000">
                    @if($Cupon->idState==1)
                        <span class="badge badge-success">Activo</span>
                      @else
                        <span class="badge badge-danger">Inactivo</span>
                      @endif
                    </td>
                    <td class="" style="padding:10px !important; text-align:center; font-weight:200; font-size:11px">
                         <div class="jj-button-mini"><a href="{{route('admin.cupons.edit',$Cupon->id)}}">Editar Cupon</a> </div>
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
