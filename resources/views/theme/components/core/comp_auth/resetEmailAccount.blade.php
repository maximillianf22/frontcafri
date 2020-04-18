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
    <title>Restablecer Password</title>
    <!--
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    -->
    <link rel="stylesheet" href="{{asset('components/jquery-toast/jquery.toast.css') }} ">
    <link rel="stylesheet" href="{{asset('components/bootstrap/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{asset('components/Bootstrap-v4.3.1/base.css') }} ">
    
    <link href="{{asset('assets/'.$nameTheme.'/css/master.css') }}" rel="stylesheet">
     
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <![endif]-->

</head>
<body class="hold-transition ">
<div class="login-box">
     <div class="login-logo"><a href="{{route('index')}}"><b> RECOVER</b></a></div>
     <div class="login-box-body">
          <div class="pad-all">Ingrese los datos de su cuenta contraseña</div>
          <form action="{{route('reset.Pass.Account')}}" method="post" class="form-element" name="formLoginAuth">
               {{ csrf_field() }}
               <input  type="hidden"  name="email" placeholder="" value="{{ $mail }}">
               <input  type="hidden"  name="token_" placeholder="" value="{{ $token_}}">
               
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

               <div class="form-group has-feedback">
                    <div class="controls">
                         <input type="password" name="password2" data-validation-match-match="password" class="form-control" required  placeholder="Repetir Contraseña">
                    </div>
               </div>
               <!--
               <div class="form-group has-feedback">
                    <input type="text" id="Celular" name="celular" class="form-control" placeholder="Celular" data-inputmask="'mask':[ '(999) 999-9999']" data-mask >
               </div>
               -->
               
               
               <div class="form-group has-feedback">
                    <div class="col-12 text-center">
                         <button type="submit" class="btn btn-info btn-block margin-top-10 ">Reestablecer Contraseña </button>
                    </div>
               </div>

          </form>
          
          <div class="margin-top-10 text-center">
               <p>¿Ya tienes una cuenta?  <a href="{{route('login')}}" class="text-info m-l-5"> Iniciar sesión aquí</a></p>
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
         
    </script>
    <script type='text/javascript' src="{{asset('components/advanced-element.js')}}"></script>
    
    <!--
     <script type='text/javascript' src="{{asset('components/jquery-toast/config.toast.js')}}"></script>
    -->
    @include('errors.global_app')
</body>
</html>
