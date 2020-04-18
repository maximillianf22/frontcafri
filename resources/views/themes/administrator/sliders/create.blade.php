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
        <form action="{{route('admin.sliders.store')}}" method="post" files="true" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nombre" class="control-label">Titulo</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" autocomplete="off" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="typeSlider" class="control-label">Tipo</label>
                <select class="form-control" id="typeSlider" name="typeSlider" onchange="selectType(this.value)">
                  <option value="1">Imagen</option>
                  <option value="2">Video</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group" id="idImageLinkVideo">
                <label for="imagenSlider" class="control-label">Imagen</label>
                <input type="file" id="imagenSlider" name="imagenSlider" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="descripcion" class="control-label">Descripcion</label>
                <textarea name="descripcion" id="descripcion" rows="5" class="form-control"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="urlSlider" class="control-label">Url</label>
                <input type="text" id="urlSlider" name="urlSlider" placeholder="url a redireccionar" autocomplete="off" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group" id="idImageLinkVideo">
                <label for="idState" class="control-label">Estado</label>
                <select class="form-control" id="idState" name="idState">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-info btn-block">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

  </section>
@endsection

@section('js')
  <script type="text/javascript">
    function selectType(value) {
      $("#idImageLinkVideo").empty();
      if (value==1) {
        $("#idImageLinkVideo").append('<label for="imagenSlider" class="control-label">Imagen</label>'+
        '<input type="file" id="imagenSlider" name="imagenSlider" class="form-control">');
      }else{
        $("#idImageLinkVideo").append('<label for="linkVideo" class="control-label">Link video</label>'+
        '<input type="text" id="linkVideo" name="linkVideo" placeholder="link del video" autocomplete="off" class="form-control">');
      }
    }
  </script>
@endsection
