@extends('themes.administrator.template.index')
@section('title', 'Sliders')

@section('content-theme')
  <section class="content-wrapper">
    <section class="content-header">
      <h1>Sliders</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="breadcrumb-item active">Sliders</li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="row align-items-center">
            <div class="col-6">
              <h4 class="box-title">Sliders</h4>
            </div>
            <div class="col-6">
              <div class="box-controls pull-right">
                <div class="box-header-actions">
                  <a href="{{route('admin.sliders.create')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Agregar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-hover table-responsive">
            <thead>
              <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Opciones</th>
              </tr>
            </thead>
            <tbody class="text-center">
              @if (count($dataSlider)>0)
                @foreach ($dataSlider as $sliders)
                  <tr>
                    <td> <b>{{$sliders->title}}</b> </td>
                    <td>
                      @if ($sliders->typeSlider==1)
                        <span class="badge badge-dark">Imagen</span>
                      @else
                        <span class="badge badge-dark">Video</span>
                      @endif
                    </td>
                    <td>
                      @if ($sliders->idState==1)
                        <span class="badge badge-success">Activo</span>
                      @else
                        <span class="badge badge-danger">Inactivo</span>
                      @endif
                    </td>
                    <td style="vertical-align:middle;">
                      <a href="{{route('admin.sliders.show', [$sliders->idSlider])}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver mas</a>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4">No se encontraron sliders</td>
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
