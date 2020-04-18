@extends('themes.administrator.template.index')
@section('title', 'Roles y perfiles')

@section('content-theme')
  <section class="content-wrapper">
    <section class="content-header">
      <h1>Roles y perfiles</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.roles')}}"><i class="fa fa-map-marker"></i> Roles y perfiles</a></li>
        <li class="breadcrumb-item active">Crear</li>
      </ol>
    </section>

    <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <div class="row align-items-center">
          <div class="col-12">
            <h4 class="box-title">Roles</h4>
          </div>
        </div>
      </div>
      <div class="box-body">
        <form action="{{route('admin.roles.update', [$rol->id])}}" method="post" files="true" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="nombre" class="control-label">Titulo</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" autocomplete="off" value="{{$rol->description}}" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="idProfile" class="control-label">Perfiles</label>
                <select class="form-control" id="idProfile" name="idProfile">
                  @foreach ($profiles as $listProfile)
                    <option value="{{$listProfile->id}}">{{$listProfile->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="idState" class="control-label">Estados</label>
                <select class="form-control" id="idState" name="idState">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
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
  <script type="text/javascript">
    var idProfile = {{$rol->idProfile}};
    $("#idProfile").val(idProfile);

    var idState = {{$rol->idState}};
    $("#idState").val(idState);
  </script>
@endsection
