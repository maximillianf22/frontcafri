@extends('themes.administrator.template.index')
@section('title', 'Permisos del Sistema')

@section('content-theme')
  <section class="content-wrapper">
    <section class="content-header">
      <h1>Permisos del Sistema</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="breadcrumb-item active">Permisos</li>
      </ol>
    </section>

    <section class="content">
      <form id="form_permisos" action="javascript:savePermisos()">
        <div class="row">
          <div class="col-md-8">
            <div class="box">
              <div class="box-header with-border">
                <div class="row">
                  <div class="col-md-12">
                    <h4 class="box-title">Permisos</h4>
                  </div>
                </div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="idProfile" class="control-label">Perfiles</label>
                      <select class="form-control" id="idProfile" name="idProfile" onchange="selectPerfil(this.value)">
                        <option value="">Selecciona un perfil</option>
                        @foreach ($dataProfiles as $profiles)
                          <option value="{{$profiles->id}}">{{$profiles->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="idRol" class="control-label">Roles</label>
                      <select class="form-control" id="idRol" name="idRol" onchange="selectRol(this.value)">
                        <option value="">Selecciona un rol</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="idModule" class="control-label">Modulos</label>
                      <select class="form-control" id="idModule" name="idModule" onchange="selectModule($('#idRol').val(), this.value)">
                        <option value="">Selecciona un modulo</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-header with-border">
                <div class="row">
                  <div class="col-md-12">
                    <h4 class="box-title">Acciones</h4>
                  </div>
                </div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="checkbox_list" id="actionsChecked">
                      {{-- <div class="row">
                        <div class="col-md-12">
                          <input type="checkbox" id="md_checkbox_31" class="filled-in chk-col-green" checked />
                					<label for="md_checkbox_31">Crear</label>
                        </div>
                      </div> --}}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-dark btn-block">Asignar Permiso</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
  </section>
@endsection

@section('js')
  <script type="text/javascript">
    $('#idProfile').change(function(){
      var idProfile = this.value;
      var UrlPath_ = UrlHost_+"/administrator/permisos/ajax/perfiles";
      $.ajax({
        type:'POST',
        url:UrlPath_,
        data:{idProfile:idProfile},
        dataType:'json',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        beforeSend:function(){
          // $("#cod_dpto").empty();$("#cod_ciudad").empty();
          $("#idRol").empty();
          $("#idModule").empty();
        },
        success:function(response){
          $("#idRol").append('<option value="">Seleccione un rol</option>');
          $("#idModule").append('<option value="">Seleccione un modulo</option>');
          if (response.state == 1) {
            $.each(response.data.roles, function(j, roles) {
              $("#idRol").append('<option value="'+ roles["id"]+'">' + roles["name"] + '</option>');
            });

            $.each(response.data.modules, function(j, modules) {
              $("#idModule").append('<option value="'+ modules["idModule"]+'">' + modules["nameModule"] + '</option>');
            });
          }
        },
        error: function(xhr){
          // console.log(xhr);
          // $("#cod_dpto").append('<option value="0">Selecciona un departamento</option>');
          // $("#cod_ciudad").append('<option value="0">Selecciona una ciudad</option>');
        }
      });
    });

    function selectRol(valueRol) {
      if (valueRol > 0) {
        var valueModule = $('#idModule').val();
        if (valueModule) {
          selectModule(valueRol, valueModule)
        }
      }
    }

    function selectModule(valueRol, valueModule) {
      if ((valueRol != 0) && (valueModule != 0)) {
        var data = {
          "idRol": valueRol,
          "idModule": valueModule
        }
        $.ajax({
          url: UrlHost_+"/administrator/permisos/ajax/checked",
          data: data,
          type: 'post',
          dataType: 'json',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          beforeSend: function () {
            $('#loader_content').removeClass('d-none');
          },
          success: function(response){
            $("#actionsChecked").empty();
            $('#loader_content').addClass('d-none');
            $.each(response, function(i, item){
              if (item.checked == 1) {
                $("#actionsChecked").append('<div class="row">'+
                  '<div class="col-md-12">'+
                    '<input type="checkbox" name="checkedIdAction" id="actionId_'+item.id+'" value="'+item.id+'" class="filled-in chk-col-green" checked />'+
                    '<label for="actionId_'+item.id+'">'+item.name+'</label>'+
                  '</div>'+
                '</div>');
              }else{
                $("#actionsChecked").append('<div class="row">'+
                  '<div class="col-md-12">'+
                    '<input type="checkbox" name="checkedIdAction" id="actionId_'+item.id+'" value="'+item.id+'" class="filled-in chk-col-green" />'+
                    '<label for="actionId_'+item.id+'">'+item.name+'</label>'+
                  '</div>'+
                '</div>');
              }
            });
          },
          error: function(xhr){
            $("#actionsChecked").empty();
            $('#loader_content').addClass('d-none');
          }
        });
      }
    }
  </script>
  <script type="text/javascript">
    function savePermisos() {
      var idRol = $('#idRol').val();
      var idModule = $('#idModule').val();
      var actions = $('input:checkbox[name=checkedIdAction]:checked').map(function() {
        return this.value; // obtienes el valor de todos los checkboxes
      }).get();
      var data = {
        "idRol": idRol,
        "idModule": idModule,
        "actions": actions
      }
      $.ajax({
        url: UrlHost_+"/administrator/permisos/ajax/save",
        data: data,
        type: 'post',
        dataType: 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
          $('#loader_content').removeClass('d-none');
        },
        success: function(response){
          location.reload();
        },
        error: function(xhr){
          location.reload();
        }
      });
    }
  </script>
@endsection
