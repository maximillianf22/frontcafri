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
    <title>Login</title>
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
     <link href="{{asset('assets/'.$ConfigTheme_->name_theme.'/css/styles.css') }}" rel="stylesheet">
     <link href="{{asset('assets/'.$ConfigTheme_->name_theme.'/css/master.css') }}" rel="stylesheet">

</head>
<body class="hold-transition ">
<div class="error-pagewrap">
		<div class="error-page-int">
               
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                    <div class="text-center ps-recovered">
				<h3>RECUPERAR CONTRASEÑA</h3>
				<p>Por favor complete el formulario para recuperar su contraseña</p>
			</div>
                        <form action="{{route('recovery.Account')}}" method="post" class="form-element" name="formLoginAuth">
                              @csrf
                              <div class="form-group">
                                   <input type="text" placeholder="email@example.com" name="email" title="Please enter you email" class="form-control" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Ingrese un Correo Valido" required >
                                   <span class="help-block small">Su dirección de correo electrónico registrada</span>
                              </div>

                              <div class="col-12 text-center">
                                   <button type="submit" class="btn btn-bg-theme btn-block margin-top-10 ">Recuperar Contraseña</button>
                              </div>
                        </form>
                         <div class="margin-top-10 text-center existing-account">
                              ¿Ya tienes una cuenta?  <a href="{{route('login')}}" class="text-info m-l-5"  > Iniciar sesión aquí</a>
                         </div>
                    </div>
                </div>
			</div>
               <div class="text-center login-footer">
                    Copyright © 2019. All rights reserved. Template by <a href="http://www.developapp.co">Developapp sas</a>
               </div>
		</div>   
    </div>
     
     
     <!-- jQuery 3 -->
     <script type='text/javascript' src="{{asset('components/bootstrap/jquery.min.js')}}"></script>
     <!-- popper -->
     <script type='text/javascript' src="{{asset('components/bootstrap/popper.min.js')}}"></script>
     <!-- Bootstrap 4.0-->
     <script type='text/javascript' src="{{asset('components/bootstrap/bootstrap.min.js')}}"></script>

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
    @include('errors.global_app')
    
</body>
</html>
