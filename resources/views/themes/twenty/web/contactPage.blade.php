<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="develop app">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/ico" href="{{ asset('favicon.ico')}}"/>
    <title>Contactenos</title>
    <!--
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    -->
    <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">
    
     <link rel="stylesheet" href="{{asset('components/jquery-toast/jquery.toast.css') }} ">
     <!-- Bootstrap 4.0-->
     <link rel="stylesheet" href="{{asset('components/bootstrap/bootstrap.min.css') }} ">
     <!-- Bootstrap 4.0-->
     <link rel="stylesheet" href="{{asset('components/bootstrap/bootstrap-extend.css') }} ">
     <link rel="stylesheet" href="{{asset('components/bootstrap/master_style.css') }} ">
     <link rel="stylesheet" href="{{asset('components/fonts/fonts.css') }} ">
    
     <!-- Theme style App -->
     <link href="{{asset('assets/'.$nameTheme.'/css/master.css') }}" rel="stylesheet">
     <link href="{{asset('assets/'.$nameTheme.'/css/styles.css') }}" rel="stylesheet">
     
    
</head>
<body class="hold-transition ">
<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>CONTACTENOS {{$theme_->name_theme}} </h3>
				<p>Formulario de Contacto</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="{{route('send.contactForm')}}" method="post" id="contactForm">
                        @csrf
                        <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Nombres y Apellidos </label>
                                    <input type="text" placeholder="Nombres y Apellidos" title="Nombres y Apellidos" required value="" name="username_frm" id="username" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                   <label>Cuenta de Correo </label>
                                   <div class="controls">
                                   <input type="text" name="email" class="form-control" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Ingrese un Correo Valido" required >
                                   </div>
                                </div>
                                <div class="form-group col-lg-12">
                                   <label>Detalle de su Solicitud</label>
                                   <textarea name="detail_frm" style="padding:5px !important " rows="4" cols="50" placeholder="Detalle de la solicitud" required >
                                   
                                   </textarea> 
                                </div>
                         </div>
                         <div class="col-12 text-center">
                              <button type="submit" class="btn btn-info btn-block margin-top-10 ">Enviar Solicitud</button>
                         </div>

                        </form>
                        
                         <div class="margin-top-10 text-center">
                              <p>Datos de la Empresa : Tel 3013669528 , Direccion : Oficina Word Trade Center</p>
                         </div>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2019. All rights reserved. </p>
			</div>
		</div>   
    </div>
     
     
     <!-- jQuery 3 -->
     <script type='text/javascript' src="{{asset('components/Bootstrap-v4.3.1/jquery.min.js')}}"></script>
     <!-- popper -->
     <script type='text/javascript' src="{{asset('components/Bootstrap-v4.3.1/popper.min.js')}}"></script>
     <!-- Bootstrap 4.0-->
     <script type='text/javascript' src="{{asset('components/Bootstrap-v4.3.1/bootstrap.min.js')}}"></script>

     <script src="{{asset('components/select2/select2.full.js')}}"></script>
     
     <script type='text/javascript' src="{{asset('components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/jquery-toast/jquery.toast.js')}}"></script>

     <script type='text/javascript' src="{{asset('components/validations/validation.js')}}"></script>
    
     <script type='text/javascript' src="{{asset('components/input-mask/jquery.inputmask.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/input-mask/jquery.inputmask.extensions.js')}}"></script>

     <script type='text/javascript' src="{{asset('components/password-meter/pwstrength-bootstrap.min.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/password-meter/zxcvbn.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/password-meter/password-meter-active.js')}}"></script>
     <script>
          ! function(window, document, $) {
        "use strict";
			$("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
          }(window, document, jQuery);
         
          jQuery('.input_text').keypress(function(tecla) {
               if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && (tecla.charCode != 45)) return false;
          });
    </script>
    <script type='text/javascript' src="{{asset('components/advanced-element.js')}}"></script>
    <script type='text/javascript' src="{{asset('components/template.js')}}"></script>
    
    <!--
     <script type='text/javascript' src="{{asset('components/jquery-toast/config.toast.js')}}"></script>
    -->
    @include('errors.global_app')
</body>
</html>
