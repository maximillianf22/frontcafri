@extends('themes.'.$Config_->name_theme.'.templates.store.master')
@section('content-theme')
<br />
<div class="album pad-top bg-white ">
  <div class="container pad-top">
     <div class="row pad-all">
          
          <div class="col-lg-12">
               

            <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Mis Pedidos Realizados</h3>
              <h6 class="box-subtitle">Relación de mis pedidos {{$Config_->name_theme}}</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-responsive">
                <tr style="color:#32536A; font-weight:bold; border-top:none !important">
                  <th ># Ref Pedido</th>
                  <th>Direccion para entrega</th>
                  <th>Fecha sugerida entrega</th>
                  <th>Hora sugerida entrega</th>
                  <th>Comentarios</th>
                  <th style="width: 40px">Pedido</th>
                  <th></th>
                </tr>
                @if(sizeof($Orders_)>=1)
                @foreach($Orders_  as $Order)
                    <tr>
                         <td>REF # {{$Order->id}}</td>
                         <td>{{$Order->address}}</td>
                         <td>{{$Order->date_order}}</td>
                         <td>{{$Order->time_order}}</td>
                         <td>{{$Order->comments}}</td>
                         <td>
                         
                        @if ($Order->idStateOrder==1)
                        <span class="badge badge-pink">Solicitado</span>
                        @endif
                        @if ($Order->idStateOrder==2)
                            <span class="badge badge-purple">Proceso Selecccion</span>
                        @endif
                        @if ($Order->idStateOrder==3)
                            <span class="badge badge-warning">En ruta</span>
                        @endif
                        @if ($Order->idStateOrder==4)
                            <span class="badge badge-success">Entregado</span>
                        @endif
                        
                        </td>
                         <td><i class="lni-cross-circle" onclick="orderCancel({{$Order->id}})" style="font-size:14px; font-weight:bolder;cursor:pointer"></i> Cancelar</td>
                    </tr>
                @endforeach
                @else
                    <tr >
                         <td colspan="6" class="text-center">Aun no ha realizado pedidos en nuestra tienda</td>
                         
                    </tr>
                @endif

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          
          </div>
          
          
     </div>
     <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
  </div>
</div>
@endsection