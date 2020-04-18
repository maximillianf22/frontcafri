@extends('themes.administrator.template.index')
@section('title', 'Pedidos')

@section('content-theme')
  <section class="content-wrapper">
    <section class="content-header">
      <h1>Mis Pedidos</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="breadcrumb-item active"></li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="row align-items-center">
            <div class="col-6">
              <h4 class="box-title"></h4>
            </div>
            <div class="col-6">
              <div class="box-controls pull-right">
                <div class="box-header-actions">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-hover table-responsive">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Usuario/Negocio</th>
                <th class="text-center">Fecha Pedido</th>
                <th class="text-center">Fecha sugerida entrega</th>
                <th class="text-center">Hora sugerida entrega</th>
                
                <th class="text-center">Estado Pedido</th>
                <th class="text-center"></th>
                
              </tr>
            </thead>
            <tbody class="text-left">
              @if (count($dataOrders)>0)
                @foreach ($dataOrders as $orders)
                  <tr>
                  <td>Ref-{{$orders->id}}</td>
                  <td></td>
                  <td class="text-center">{{substr($orders->created_at,0,10)}}</td>
                  <td class="text-center">{{substr($orders->date_order,6,4)}}-{{substr($orders->date_order,0,2)}}-{{substr($orders->date_order,3,2)}}</td>
                  <td class="text-center">{{$orders->time_order}}</td>
                  
                  <td class="text-center">
                    @if ($orders->idStateOrder==1)
                        <span class="badge badge-info">Solicitado</span>
                    @endif
                    @if ($orders->idStateOrder==2)
                        <span class="badge badge-info">Proceso Selecccion</span>
                    @endif
                    @if ($orders->idStateOrder==3)
                        <span class="badge badge-info">En ruta</span>
                    @endif
                    @if ($orders->idStateOrder==4)
                        <span class="badge badge-success">Entregado</span>
                    @endif

                  </td>
                  <td class="text-center"><div class="editOrder"><a href="{{route('admin.detail.order',[$orders->id])}}"><i class="lni-pencil-alt"></i> Ver Pedido </a></div> </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4">No se encontraron Clientes</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="box-footer clearfix">
          {{-- Pagination --}}
        </div>
      </div>
    </section>
  </section>
@endsection
