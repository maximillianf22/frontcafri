@extends('themes.administrator.template.index')
@section('title', 'Clientes')

@section('content-theme')
  <section class="content-wrapper">
    <section class="content-header">
      <h1>Sliders</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="breadcrumb-item active">Clientes</li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="row align-items-center">
            <div class="col-6">
              <h4 class="box-title">Clientes</h4>
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
                <th class="text-center">Nombre y Apellidos </th>
                <th class="text-center">Nombre del Negocio</th>
                <th class="text-center">Celular</th>
                <th class="text-center">Correo Electronico</th>
                <th class="text-center">Estado</th>
              </tr>
            </thead>
            <tbody class="text-left">
              @if (count($dataCustomer)>0)
                @foreach ($dataCustomer as $customer)
                  <tr>
                    <td>{{$customer->nameUser}} {{$customer->lastnameUser}}</td>
                    <td>{{$customer->nameBusiness}}</td>
                    <td>{{$customer->celularUser}}</td>
                    <td>{{$customer->email}}</td>
                    <td>
                      @if ($customer->idState==1)
                        <span class="badge badge-success">Activo</span>
                      @else
                        <span class="badge badge-danger">Inactivo</span>
                      @endif
                    </td>
                    <td style="vertical-align:middle;">
                      
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
        </div>
        <div class="box-footer clearfix">
          {{-- Pagination --}}
        </div>
      </div>
    </section>
  </section>
@endsection
