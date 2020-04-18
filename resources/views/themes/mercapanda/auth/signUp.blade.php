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
     <link rel="stylesheet" href="{{asset('components/bootstrap/bootstrap-extend.css') }} ">
     <!-- <link rel="stylesheet" href="{{asset('components/bootstrap/master_style.css') }} "> -->
     <link rel="stylesheet" href="{{asset('components/fonts/fonts.css') }} ">
    
     <!-- Theme style App -->
     <link href="{{asset('assets/'.$ConfigTheme_->name_theme.'/css/styles.css') }}" rel="stylesheet">
     <link href="{{asset('assets/'.$ConfigTheme_->name_theme.'/css/master.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('components/bootstrap-datepicker/bootstrap-datepicker.min.css') }} ">
 
     <style>
          
/*calendar*/
.datepicker{
    font-variant: tabular-nums;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 10px !important;
    font-size: 13px !important;
    color: rgba(0,0,0,.65);
    background-color: #fff;
    background-image: none;
    border: 1px solid #d9d9d9;
    border-radius: 4px;
    -webkit-transition: all .3s;
    -o-transition: all .3s;
    transition: all .3s;
}

.datepicker-dropdown {
    top: 0;
    left: 0;
    padding-left: 24px;
    padding-right: 24px;
    border-radius: 4px;
}

.datepicker table tr td,
.datepicker table tr th {
    text-align: center;
    width: 30px; 
    height: 30px;
    border-radius: 4px; 
    border: none;
    color: #000; 
    font-weight: normal !important;
    cursor: pointer !important; 
}
.datepicker .disabled{ background:#F7F7F7 !important; border:3px solid #FFF !important  }

.datepicker table tr td.day:hover,
    .datepicker table tr td.focused {
    background: red;
}
.datepicker table tr td.old,
.datepicker table tr td.new {
    color: #999;
}
.datepicker table tr td.new:hover {
    background: #E6F7FF;
}


.datepicker table tr td.today {
    color: white !important;
    background-color: #FFA953; 
    border-color: #FFB76F;  
}
.datepicker table tr td.today:hover {
    color: #FFFFFF;
    background-color: #FF8273;
    border-color: #f59e00;
    cursor: pointer !important; 
}
.datepicker .datepicker-switch {
    width: 145px;
}

.datepicker .datepicker-switch,
.datepicker .prev,
.datepicker .next,
.datepicker tfoot tr th {
   color:#212121; font-weight: normal !important; background: none !important;
} 
.datepicker .datepicker-switch:hover,
.datepicker .prev:hover,
.datepicker .next:hover,
.datepicker tfoot tr th:hover {
   color:#40A9FF; font-weight: normal !important; background: none !important;
} 

.ui-datepicker {
    width: 15.20em !important;
    border: 1px solid #ccc !important;
}

          </style>
</head>
<body class="hold-transition ">
     <div class="error-pagewrap">
          <div class="error-page-int">
               <div class="text-center custom-login">
                    <h3></h3>
               </div>
               <div class="content-error">
                    <div class="hpanel ">
                    <div class="panel-body box-shadow-app">
                         @if(!empty($ConfigTheme_))
                         <div class="logo-theme">
                         <a href="{{route('index')}}" style="color:none !important; background:none !important">
                              @if(!empty($ConfigTheme_->logo_theme))
                                   @if (file_exists( public_path().'/content/upload/theme/'.$ConfigTheme_->logo_theme ))
                                        <img id="previewProfileImage" src="{{ asset('/content/upload/theme/'.$ConfigTheme_->logo_theme) }}" alt="Avatar">
                                   @else
                                        Logo no cargado
                                   @endif
                              @else
                                   Aqui el logo del tema
                              @endif
                         </a>
                         </div>
                         @endif
                         <form id="FrmSingUp" action="{{route('signup.Auth.Register')}}" method="post" class="form-element" name="formLoginAuth">
                         @csrf
                              

                              <div class="row">

                                   <div class="form-group col-lg-12">
                                        <select id="typeOfUser" name="typeOfUser" class="form-control" onchange="showTypeofUser()">
                                             <option value="people">Soy persona Natural</option>
                                             <option value="business">Soy un Comercio/Negocio</option>
                                        </select>
                                   </div>

                                   <div id="namebusiness" class="form-group col-lg-12 hideItem ">
                                        <div class="controls">
                                             <input type="text" name="namebusiness" value="" class="form-control" placeholder="Nombre del Negocio" >
                                        </div>
                                   </div>
                                   
                                   <div class="form-group col-lg-6">
                                        <div class="has-feedback">
                                             <input id="name" type="text" name="first_name" maxlength="20" class="form-control input_text" placeholder="Nombres">
                                        </div>
                                   </div>
                                   <div class="form-group col-lg-6">
                                        <div class="has-feedback">
                                             <input id="last_name" type="text" name="last_name" maxlength="20"  class="form-control input_text" placeholder="Apellidos">
                                        </div>
                                   </div>

                                   <div class="form-group col-lg-12">
                                        <div class="controls">
                                             <input type="text" name="email" class="form-control" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Ingrese un Correo Valido">
                                        </div>
                                   </div>

                                   <div class="form-group col-lg-6">
                                        <input type="text" id="fechaNac" name="fechaNac" class="form-control datepicker dev-calendar" placeholder="Fecha Nacimiento" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                                   </div>
                                   <div class="form-group col-lg-6">
                                        <div class="form-group has-feedback">
                                             <input type="text" id="Celular" name="celular" class="form-control" placeholder="Celular" data-inputmask="'mask':[ '(999) 999-9999']" data-mask >
                                        </div>
                                   </div>

                                   <div class="form-group col-lg-6">
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
                                   <div class="form-group col-lg-6">
                                        <div class=" has-feedback">
                                        <div class="controls">
                                             <input type="password" name="password2" data-validation-match-match="password" class="form-control" required  placeholder="Repetir Contraseña">
                                        </div>
                                        </div>
                                   </div>
                              </div>

                              <div class="form-group has-feedback">
                                   <div class="col-12 terms_Conditions">
                                        <label for="basic_checkbox_1">
                                        <input type="checkbox" id="basic_checkbox_0" class="info-notify check-term"  /> 
                                        <a href="{{asset('assets/media/TerminosYCondiciones.pdf')}}" target="new" >
                                             <div class="info-term">Me gustaría recibir comunicaciones promocionales (Recibirás un e-mail
de Confirmación)</div>
                                        </a>
                                        </label>
                                   </div>
                              </div>

                              <div class="form-group has-feedback">
                                   <div class="col-12 terms_Conditions">
                                        <label for="basic_checkbox_1">
                                        <input type="checkbox" id="basic_checkbox_1" class="term_condiciones check-term"  /> 
                                        <a href="{{asset('assets/media/TerminosYCondiciones.pdf')}}" target="new" >
                                             <div class="info-term"> Declaro que he leído y acepto la nueva <strong>Política de Privacidad</strong> y de los <strong>Términos y Condiciones</strong> {{$ConfigTheme_->name_theme}} </div>
                                        </a>
                                        </label>
                                   </div>
                              </div>
                              <div class="form-group has-feedback">
                                   <div class="col-12 text-center">
                                        <button id="formRegister" type="button" class="btn  btn-bg-theme btn-block margin-top-10 " onclick="javascript:calcularEdad();" disabled >Completar Registro </button>
                                   </div>
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
     <script type='text/javascript' src="{{asset('components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

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
         
          $('#fechaNac').datepicker({
               minDate: new Date(1919, 10 - 1, 25)
          });
    </script>

    <script type='text/javascript' src="{{asset('components/advanced-element.js')}}"></script>
    <script type='text/javascript' src="{{asset('components/template.js')}}"></script>
    <script type='text/javascript' src="{{asset('components/core.master.js')}}"></script>
    <script type='text/javascript' src="{{asset('components/store/config.js')}}"></script>
    
    @include('errors.global_app')
</body>
</html>