@extends('themes.administrator.template.index')
@section('title', 'Sliders')

@section('content-theme')
  <section class="content-wrapper">
    <section class="content-header">
      <h1>Sliders</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.sliders')}}"><i class="fa fa-map-marker"></i> Sliders</a></li>
        <li class="breadcrumb-item active">Crear</li>
      </ol>
    </section>

    <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <div class="row align-items-center">
          <div class="col-12">
            <h4 class="box-title">Slider</h4>
          </div>
        </div>
      </div>
      <div class="box-body">
        <form action="{{route('admin.sliders.update', [$dataSlider->idSlider])}}" method="post" files="true" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nombre" class="control-label">Titulo</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" autocomplete="off" value="{{$dataSlider->title}}" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="typeSlider" class="control-label">Tipo</label>
                @if ($dataSlider->typeSlider==1)
                  <input type="text" disabled autocomplete="off" value="Imagen" class="form-control">
                @else
                  <input type="text" disabled autocomplete="off" value="Image" class="form-control">
                @endif
              </div>
            </div>
          </div>
          @if ($dataSlider->typeSlider==2)
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="linkVideo" class="control-label">Link video</label>
                  <input type="text" id="linkVideo" name="linkVideo" placeholder="link del video" autocomplete="off" value="{{$dataSlider->link_media}}" class="form-control">
                </div>
              </div>
            </div>
          @endif
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="descripcion" class="control-label">Descripcion</label>
                <textarea name="descripcion" id="descripcion" rows="5" class="form-control">{{$dataSlider->description}}</textarea>
              </div>
            </div>
          </div>
          @if ($dataSlider->typeSlider==1)
            <div class="row">
              <div class="col-md-6 text-center">
                @if ($dataSlider->link_media <> null)
                  <img class="img_table" src="{{asset('assets/administrator/media/slider')}}/{{$dataSlider->link_media}}" width="400px" style="height: 150px;object-fit: contain;object-position: center;" alt="Imagen">
                @endif
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="imagenSlider" class="control-label">Imagen</label>
                  <input type="file" id="imagenSlider" name="imagenSlider" class="form-control">
                </div>
              </div>
            </div>
          @endif
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="urlSlider" class="control-label">Url</label>
                <input type="text" id="urlSlider" name="urlSlider" placeholder="url a redireccionar" autocomplete="off" value="{{$dataSlider->urlSlider}}" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group" id="idImageLinkVideo">
                <label for="idState" class="control-label">Estado</label>
                <select class="form-control" id="idState" name="idState">
                  @if ($dataSlider->idState==1)
                    <option value="1" selected>Activo</option>
                    <option value="2">Inactivo</option>
                  @else
                    <option value="1">Activo</option>
                    <option value="2" selected>Inactivo</option>
                  @endif
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-info btn-block">Guardar cambios</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

  </section>
@endsection

@section('js')
@endsection
