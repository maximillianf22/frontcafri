@extends('themes.administrator.template.index')
@section('title', 'Direcciones')

@section('content-theme')
  <section class="content-wrapper">
    <section class="content-header">
      <h1>Direcciones</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="breadcrumb-item active">Direcciones</li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="row align-items-center">
            <div class="col-6">
              <h4 class="box-title">Direcciones</h4>
            </div>
            <div class="col-6">
              <div class="box-controls pull-right">
                <div class="box-header-actions">
                  <a href="{{route("admin.direccion.create")}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Agregar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-hover table-responsive">
            <thead>
              <tr>
                <th class="text-center">Etiqueta</th>
                <th class="text-center">Direccion</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Opciones</th>
              </tr>
            </thead>
            <tbody class="text-center">
              @if (count($direcciones)>0)
                @foreach ($direcciones as $listDireccion)
                  <tr>
                    <td style="vertical-align:middle;" class="font-weight-bold">{{$listDireccion->reference}}</td>
                    <td style="vertical-align:middle;">{{$listDireccion->addrees}}</td>
                    <td style="vertical-align:middle;">
                      @if ($listDireccion->idState)
                        <span class="badge badge-success">Activo</span>
                      @else
                        <span class="badge badge-danger">Inactivo</span>
                      @endif
                    </td>
                    <td style="vertical-align:middle;">
                      <a href="{{route('admin.direccion.show', [$listDireccion->id])}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver mas</a>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4">No se encontraron direcciones</td>
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
