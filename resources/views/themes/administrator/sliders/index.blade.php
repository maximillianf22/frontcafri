@extends('themes.administrator.template.index')
@section('title', 'Slider Web')

@section('content-theme')
  <section class="content-wrapper">
    <section class="content-header">
      <h1>Slider</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="breadcrumb-item active">Slider</li>
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
                  <a href="{{route('admin.sliders.create')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Agregar Nuevo Slider </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-hover table-responsive">
            <thead>
              <tr>
                <th class="text-center">Imagen</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Url</th>
                <th class="text-center">Estado Actual</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody class="text-center">
              @if (count($dataSlider)>0)
                @foreach ($dataSlider as $Slider)
                  <tr>
                    <td>
                      @if(!empty($Slider->imageSlider))
                            @if (file_exists( public_path().'/content/upload/'.$Slider->imageSlider ))
                                <img id="logoTheme" src="{{ asset('/content/upload/'.$Slider->imageSlider) }}" alt="Slider" width="150" >
                            @else
                            @endif
                      @else
                      @endif
                    </td>
                    <td>{{$Slider->title}}</td>
                    <td>{{$Slider->urlSlider}}</td>
                    <td>
                      @if($Slider->idState==1)
                        <span class="badge badge-success">Activo</span>
                      @else
                        <span class="badge badge-danger">Inactivo</span>
                      @endif
                    </td>
                    <td>
                    <a href="{{route('admin.sliders.show', [$Slider->id])}}"><i class="lni-pencil" style="font-size:20px;cursor:pointer"></i></a>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4">No se encontraron Slider creadas</td>
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
