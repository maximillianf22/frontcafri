@extends('themes.administrator.template.index')
@section('title', 'Direcciones')

@section('content-theme')
  <section class="content-wrapper">
    <section class="content-header">
      <h1>Direcciones</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.direccion')}}"><i class="fa fa-map-marker"></i> Direcciones</a></li>
        <li class="breadcrumb-item active">Crear</li>
      </ol>
    </section>

    <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <div class="row align-items-center">
          <div class="col-12">
            <h4 class="box-title">Direccion</h4>
          </div>
        </div>
      </div>
      <div class="box-body">
        <form method="post" id="idFormAddress">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="nombreAd" class="control-label">Nombre</label>
                <input type="text" id="nombreAd" name="nombre" placeholder="Nombre" autocomplete="off" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group {{$errors->has('cod_pais') ? 'has-error' : ''}}">
                <label for="cod_pais" class="control-label">País *</label>
                <select class="form-control" id="cod_pais" name="cod_pais">
                  <option value="">Selecciona un país</option>
                  <option value="169-COLOMBIA">COLOMBIA</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{$errors->has('cod_dpto') ? 'has-error' : ''}}">
                <label for="cod_dpto" class="control-label">Departamento *</label>
                <select class="form-control" id="cod_dpto" name="cod_dpto">
                  <option value="">Selecciona un departamento</option>
                  <option value="8-ATLANTICO">ATLANTICO</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group {{$errors->has('cod_ciudad') ? 'has-error' : ''}}">
                <label for="cod_ciudad" class="control-label">Ciudad *</label>
                <select class="form-control" id="cod_ciudad" name="cod_ciudad">
                  <option value="">Selecciona una ciudad</option>
                  <option value="001-BARRANQUILLA">BARRANQUILLA</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <select class="form-control" id="selectType" name="selectType">
                  <option value="1-CALLE">CALLE</option>
                  <option value="2-CARRERA">CARRERA</option>
                </select>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" id="numOne" name="numOne" placeholder="100" autocomplete="off" class="form-control">
                  <div class="input-group-addon">
                    <i class="fa fa-hashtag"></i>
                  </div>
                  <input type="text" id="numTwo" name="numTwo" placeholder="100" autocomplete="off" class="form-control">
                  <div class="input-group-addon">
                    <i class="fa fa-minus"></i>
                  </div>
                  <input type="text" id="numThree" name="numThree" placeholder="100" autocomplete="off" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <button class="btn btn-info" id="idValidateAddress" type="button">Validar dirección</button>
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
    function localizar(direccion) {
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({'address': direccion}, function(results, status) {
        if (status === 'OK') {
          var resultados = results[0].geometry.location,
          resultados_lat = resultados.lat(),
          resultados_long = resultados.lng();

          sendAddressAjax(resultados_lat, resultados_long, direccion);

        } else {
          var mensajeError = "";
          if (status === "ZERO_RESULTS") {
            mensajeError = "No hubo resultados para la dirección ingresada.";
          } else if (status === "OVER_QUERY_LIMIT" || status === "REQUEST_DENIED" || status === "UNKNOWN_ERROR") {
            mensajeError = "Error general del mapa.";
          } else if (status === "INVALID_REQUEST") {
            mensajeError = "Error de la web. Contacte con Name Agency.";
          }
          alert(mensajeError);

          sendAddressAjax("10.000", "-74.000", direccion);

        }
      });
    }

    $.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyC7jl5Fb6u1ufXZM7xhioUXIMgxgjOEIQw", function() {
      $("#idValidateAddress").click(function() {
        var cod_pais = $("#cod_pais").val();
        var cod_dpto = $("#cod_dpto").val();
        var cod_ciudad = $("#cod_ciudad").val();
        var selectType = $("#selectType").val();
        var numOne = $("#numOne").val();
        var numTwo = $("#numTwo").val();
        var numThree = $("#numThree").val();

        cod_pais = cod_pais.split("-", 2);
        cod_dpto = cod_dpto.split("-", 2);
        cod_ciudad = cod_ciudad.split("-", 2);
        selectType = selectType.split("-", 2);

        if (cod_pais[1] !== "" && cod_dpto[1] !== "" && cod_ciudad[1] !== "" && selectType[1] !== "" && numOne !== "" && numTwo !== "" && numThree !== "") {
          var direccion = selectType[1]+" "+numOne+" #"+numTwo+"-"+numThree+", "+cod_ciudad[1]+", "+cod_dpto[1]+", "+cod_pais[1];
          // alert(direccion);
          // Cra. 54 #76-123, Barranquilla, Atlántico
          localizar(direccion);
        }
      });
    });

    function sendAddressAjax(lat, long, address) {
      var formData = new FormData(document.getElementById("idFormAddress"));
      formData.append('lalitud', lat);
      formData.append('longitud', long);
      formData.append('address', address);
      var UrlPath_ = UrlHost_+"/administrator/direcciones/ajax/store";
      $.ajax({
        type:'POST',
        url:UrlPath_,
        data:formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        beforeSend:function(){
          // $('#loader_content').removeClass('d-none');
        },
        success:function(response){
          // $('#loader_content').addClass('d-none');
          location.reload();
          if (response.state == 1) {
            swal({
              title: "¡Bien hecho!",
              text: response.message,
              type: response.type,
              showCancelButton: false,
              confirmButtonColor: "#1e88e5",
              confirmButtonText: "OK",
              closeOnConfirm: false
            }, function(){
              // $('#loader_content').removeClass('d-none');
              location.reload();
            });
          }else if (response.state == 2) {
            //warning
            location.reload();
          }else{
            //error
          }
        },
        error: function(xhr){
          $('#loader_content').addClass('d-none');
          console.log("error");
          console.log(xhr);
        }
      });
    }
  </script>
@endsection
