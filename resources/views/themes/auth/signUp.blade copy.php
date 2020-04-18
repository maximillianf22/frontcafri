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
    <title>Registro de Cuenta</title>
    <!--
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    -->
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
<div class="login-box">
{!! Session::get('danger->message')!!}
     <div class="login-logo"><a href="{{route('index')}}"><b>Registro - {{$theme_->name_theme}}</b></a></div>
     <div class="login-box-body">
          <form id="FrmSingUp" action="{{route('signup.Auth.Register')}}" method="post" class="form-element" name="formLoginAuth">
               @csrf

               <div class="row">
                    <div class="col-6">
                         <div class="form-group has-feedback">
                              <input id="name" type="text" name="first_name" maxlength="20" class="form-control input_text" placeholder="Nombres">
                         </div>
                    </div>
                    <div class="col-6">
                         <div class="form-group has-feedback">
                              <input id="last_name" type="text" name="last_name" maxlength="20"  class="form-control input_text" placeholder="Apellidos">
                         </div>
                    </div>
               </div>
               
               <div class="form-group">
                    <div class="controls">
                    <input type="text" name="email" class="form-control" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Ingrese un Correo Valido">
                    </div>
               </div>

               <div class="form-group has-feedback">
                    <input type="text" id="Celular" name="celular" class="form-control" placeholder="Celular" data-inputmask="'mask':[ '(999) 999-9999']" data-mask >
               </div>
               
               <div class="form-group has-feedback">
               <input type="text" id="fechaNac" name="fechaNac" class="form-control" placeholder="Fecha Nacimiento" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
               </div>
               <div class="row">
                    <div class="col-6">
                         <div id="pwd-container2">
                              <div class="form-group">
                              <div class="controls">
                                   <input type="password" name="password" class="form-control example2" id="password" data-validation-required-message="Este campo es requerido" placeholder="Password" value="" minlength="6">
                              </div>
                              </div>
                              <div class="form-group mg-b-pass">
                                   <div class="pwstrength_viewport_verdict text-strong-password"></div>
                              </div>
                         </div>
                    </div>
                    <div class="col-6">
                         <div class="form-group has-feedback">
                         <div class="controls">
                              <input type="password" name="password2" data-validation-match-match="password" class="form-control" required  placeholder="Repetir Contraseña">
                         </div>
                         </div>
                    </div>
               </div>

               <div class="form-group has-feedback">
                    <div class="col-12">
					<input type="checkbox" id="basic_checkbox_1" class="term_condiciones"  />
					<label for="basic_checkbox_1"><a href="{{asset('assets/media/TerminosYCondiciones.pdf')}}" target="new">Acepto los Terminos y Condiciones</a></label>
                    </div>
               </div>
               
               <div class="form-group has-feedback">
                    <div class="col-12 text-center">
                         <button id="formRegister" type="button" class="btn btn-info btn-block margin-top-10 " onclick="javascript:calcularEdad();" disabled >Registrarme Ahora </button>
                    </div>
               </div>

          </form>
          
          <div class="margin-top-10 text-center">
               <p>¿Ya tienes una cuenta?  <a href="{{route('login')}}" class="text-info m-l-5"> Iniciar sesión aquí</a></p>
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
    <script type='text/javascript' src="{{asset('components/core.master.js')}}"></script>
    @include('errors.global_app')
</body>
</html>
