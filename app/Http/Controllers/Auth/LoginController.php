<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Config\Gestor_plantillas, App\Config\Configuracion_valor;
use App\Core\core_template_manager;

use Auth, Mail, Session, Redirect;

class LoginController extends Controller{
    use AuthenticatesUsers;
    public $maxAttempts = 3;

    protected $redirectTo = '/login';

    public function __construct(){
      $this->middleware('guest')->except('logout');
    }

    public function ConfigFormLoginAuth_ ($Action_){
        /* Action_ -> values ( Admin - User ) */
        if(!empty($Action_)){
            if($Action_=="Admin"){
                $FieldDefaultAuth_="";
                $DefaultAuth_ = Configuracion_valor::where('idConfiguracion',5)->where('idState',1)->where('is_default',1)->first(['extra']);
            }else{
                $FieldDefaultAuth_="";
                $DefaultAuth_ = Configuracion_valor::where('idConfiguracion',2)->where('idState',1)->where('is_default',1)->first(['extra']);
            }
            $FieldDefaultAuth_ = !empty($DefaultAuth_) ? $DefaultAuth_->extra : "email";
            return $FieldDefaultAuth_;
        }

    }
    public function ConfigViewDefault_ (){
        $ViewDefault_="";
        // $ViewDefault_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first(['view_default']);
        $ViewDefault_ = core_template_manager::where('idState',1)->where('main',1)->first();
        return $ViewDefault_->view_default;
    }

    public function SigninUser() {
        $ConfigTheme_ = core_template_manager::where('idState',1)->where('main',1)->first();
        if($ConfigTheme_->auth_template==1){
            if(view()->exists('theme.components.core.comp_auth.login_theme')){
                if(view()->exists('theme.components.core.comp_auth.login_theme')){
                    $FieldDefaultAuth_="";
                    $FieldDefaultAuth_ = $this->ConfigFormLoginAuth_ ("User");
                    return view('theme.components.core.comp_auth.login_theme',compact('ConfigTheme_','FieldDefaultAuth_'));
                }else{
                    return "css no definido";
                }
            }else{
                $Name_ ="Form Login "; $Msg_=" Para {".$ConfigTheme_->nameDirectory."} No esta Definido  ";
                return view("errors.templatenotfound",compact('Name_','Msg_'));
            }
        }else{
            if(view()->exists('theme.components.core.comp_auth.login')){
                /* Busco el valor defecto del campo de autenticacion */
                $FieldDefaultAuth_="";
                $FieldDefaultAuth_ = $this->ConfigFormLoginAuth_ ("User");
                return view('theme.components.core.comp_auth.login',compact('ConfigTheme_','FieldDefaultAuth_'));
            }else{
                $Name_ ="Form Login "; $Msg_=" No esta Definido  ";
                return view("errors.templatenotfound",compact('Name_','Msg_'));
            }
        }
    }

    /*Administrator*/
    public function Admin_SigninUser(){
        $theme_ = core_template_manager::where('idState',1)->where('main',1)->first();
        if($theme_->auth_template==1){
            if(view()->exists('theme.components.core.comp_auth.admin_login')){
                if(view()->exists('theme.components.core.comp_auth.admin_login')){
                    $FieldDefaultAuth_="";
                    $FieldDefaultAuth_ = $this->ConfigFormLoginAuth_ ("Admin");
                    return view('theme.components.core.comp_auth.admin_login',compact('theme_','FieldDefaultAuth_'));
                }else{
                    return "css no definido";
                }
            }else{
                $Name_ ="Form Login "; $Msg_=" Para {".$theme_->nameDirectory."} No esta Definido  ";
                return view("errors.templatenotfound",compact('Name_','Msg_'));
            }
        }else{
            
          if(view()->exists('themes.auth.admin_login')){
            /* Busco el valor defecto del campo de autenticacion */
            $FieldDefaultAuth_="";
            $FieldDefaultAuth_ = $this->ConfigFormLoginAuth_ ("Admin");
            $nameTheme=$theme_->nameDirectory;
            return view('themes.auth.admin_login',compact('theme_','nameTheme','FieldDefaultAuth_'));
          }else{
            $Name_ ="Form Login "; $Msg_=" No esta Definido  ";
            return view("errors.templatenotfound",compact('Name_','Msg_'));
          }
        }
    }


    /*--- Validacion de la Autenticacion del usuario ---*/
    public function AuthUserSignIn(Request $request){
        $ClientDiferent_ = "N";
        if(!empty($_COOKIE['_gid'])){
            $type_client_= $_COOKIE['_gid'];
        }else{
            $type_client_= 'P';
        }
        $FieldValidate_ = $this->ConfigFormLoginAuth_("User");
        $this->validate($request, [
            $FieldValidate_ => 'required',
            'password' => 'required',
        ],[
           'password.required' => 'debe establecer una contraseña de acceso',
        ]);

 
        $credentials = $request->only($FieldValidate_, 'password');
        $VerifiedAccount_ = User::Where($FieldValidate_, $request->$FieldValidate_)->Where('emailVerified',11)->where('idState',1)->first();

        if(!empty($VerifiedAccount_)){
            if($VerifiedAccount_->idPerfil===1){
            Session::flash('danger',"Error De autenticación los datos de acceso son de una cuenta tipo admininistrador, por lo que no puede ingresar desde esta opción que solo es para usuarios clientes.");
            return redirect::to('login');
        }else{
            if (!empty($VerifiedAccount_)){
                $users = User::Where($FieldValidate_, $request->$FieldValidate_)->where('idPerfil','<>',1)->first();
                $mess_="";

                if($users->isCommerce==1){
                    if($type_client_=='P'){
                        $ClientDiferent_='Y';
                        $mess_ ="Tu cuenta de usuario es de tipo comercio, si tienes producto agregado eliminalos del carrito e intenta de nuevo";
                    }
                }

                if($users->isCommerce==0){
                    if($type_client_=='C'){
                        $ClientDiferent_='Y';
                        $mess_ ="Tu cuenta de usuario es de tipo público, si tienes producto agregado eliminalos del carrito e intenta de nuevo";
                    }
                }

                if($ClientDiferent_=='N'){
                    if (!empty($users)) {
                        if (Auth::attempt($credentials)){
                            session()->forget('attempts_'.$users->id);
                            //return redirect::to($this->ConfigViewDefault_());
                            return redirect::to('dashboard');
                            // return redirect::to('admin.orders');
                        } else {
                            $attempts = session()->get('attempts_'.$users->idUser);
                            if (empty($attempts)){ $attempts = session()->get('attempts_'.$users->idUser, 1); }
                            if($attempts <= 3){
                                if ($attempts==3){
                                    Session::flash('warning',"Su usuario ha sido bloqueado de forma temporal por intentos fallidos, si gusta puede restablecer su contraseña.");
                                    return redirect()->route('recoverAuth');
                                }
                                session()->put('attempts_'.$users->idUser, $attempts + 1);
                            }
                            Session::flash('danger',"Error De autenticación los datos no son validos, Intentos ".$attempts." de 3 Fallidos.");
                            return redirect::to('login');
                        }
                    }else{
                        Session::flash('danger',"Error De autenticación los datos no son validos para inicar session como usuario");
                        return redirect::to('login');
                    }
                }else{
                    Session::flash('warning',$mess_);
                    return redirect()->route('index');
                }
                
            }else{
                
                Session::flash('warning',"Error de Validación, La cuenta no ha sido verificada, o no se encuentra registrada en nuestra plataforma");
                return redirect::to('login');
                
            }

        }

        }else{
             Session::flash('warning',"Error de Validación, Este usuario no se encuentra registrado en la plataforma");
                return redirect::to('login');

        }

         
        
        
    }

    public function recover(){
        $ConfigTheme_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        
        if(!empty($ConfigTheme_)){
            if($ConfigTheme_->auth_plantilla==1){
                if(view()->exists('themes.'.$ConfigTheme_->nameDirectory.'.auth.recovery')){
                    return view('themes.'.$ConfigTheme_->nameDirectory.'.auth.recovery',compact('ConfigTheme_'));
                }else{
                    $Name_ ="Form SignUp "; $Msg_=" Para {".$ConfigTheme_->nameDirectory."} No esta Creada / Definido  ";
                    return view("errors.templatenotfound",compact('Name_','Msg_'));
                }
            }else{
                if(view()->exists('themes.auth.recovery')){
                   return view('themes.auth.recovery',compact('ConfigTheme_'));
                }else{
                    $Name_ ="Form SignUp "; $Msg_=" No esta Definido  ";
                    return view("errors.templatenotfound",compact('Name_','Msg_'));
                }
           }
       }
    }

    public function sendPassRecover(Request $request){
        $this->validate($request, [ 'email' => 'required' ]);
        $isFound_ = User::where('email', $request->email)->first();
        if (!empty($isFound_)) {
            $isFound_->confirm_token = str_random(100);
            if($isFound_->update()){
            $DataName_ = $isFound_->nameUser;
            $DataEmail_ = $isFound_->email;

            $data['nombre'] =  $DataName_;
            $data['identificacion'] = '';
            $data['email'] = $DataEmail_;
            $data['confirm_token'] = $isFound_->confirm_token;

            Mail::send('email_templates.recoveryAccount', ['data' => $data], function($mail) use($data){
                $mail->subject('Restaurar Contraseña');
                $mail->to($data['email'], $data['nombre']);
            });

            Session::flash('success', 'Se ha enviado un email con los datos para reestablecer su contraseña');
            return redirect()->route('login');

            }
        }else{
            Session::flash('warning', 'Esta cuenta de correo no se encuentra registrada en nuestra plataforma.');
            return redirect()->route('recoverAuth');
        }
    }

    /* Form SignAuth Theme  */
    public function signUp(){
        $ConfigTheme_ = core_template_manager::where('idState',1)->where('main',1)->first();
        if(!empty($ConfigTheme_)){
            if($ConfigTheme_->auth_template===1){
                if(view()->exists('theme.components.core.comp_auth.signUp')){
                    return view('theme.components.core.comp_auth.signUp',compact('ConfigTheme_'));
                }else{
                    $Name_ ="Form SignUp "; $Msg_=" Para {".$ConfigTheme_->nameDirectory."} No esta Definido  ";
                    return view("errors.templatenotfound",compact('Name_','Msg_'));
                }
            }else{
                if(view()->exists('theme.components.core.comp_auth.signUp')){
                    return view('theme.components.core.comp_auth.signUp',compact('ConfigTheme_'));
                }else{
                    $Name_ ="Form SignUp "; $Msg_=" No esta Definido  ";
                    return view("errors.templatenotfound",compact('Name_','Msg_'));
                }
           }
       }
    }

    public function signUpRegister(Request $request){
        if(!empty($_COOKIE['_gid'])){
            $type_client_= $_COOKIE['_gid'];
        }else{
            $type_client_= 'P';
        }
        $ConfigTheme_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        $ConfStateRegister_ =  Configuracion_valor::where('id',8)->first();
        if(!empty($request->email)){
            $searchEmail_ = User::where('email',$request->email)->first();
            if(!empty($searchEmail_)){
                Session::flash('danger',"Esta cuenta de correo ya se encuentra registrada en nuestro sistema");
                return redirect()->route('signupAuth');
            }else{
                $DataUser = new User();
                /*--- Datos  Basicos ---*/
                $DataUser->nameUser = $request->first_name;
                $DataUser->lastnameUser = $request->last_name;
                $DataUser->nameBusiness = $request->namebusiness;
                $DataUser->email = $request->email;
                $DataUser->celularUser =  intval(preg_replace('/[^0-9]+/','', $request->celular), 10);
                $DataUser->password = bcrypt($request->password);
                $DataUser->remember_token = str_random(100);
                $DataUser->confirm_token = str_random(100);
                $DataUser->idPerfil = 0;
                $DataUser->emailVerified = 0;
                $DataUser->fechaNac = $request->fechaNac;
                // $DataUser->emailVerified =  10;
                $DataUser->emailVerified =  11;
                $DataUser->idPerfil =  2;
                $DataUser->idState =  1;
                $DataUser->idTheme =  $ConfigTheme_->id;
                $DataUser->idRole = !empty($ConfStateRegister_->extra) ? $ConfStateRegister_->extra : 0;
                /*--------------------------------------*/
                if ($DataUser->save()){
                    /*Send Mail*/
                    $searchRow_ = User::where('email',$request->email)->whereIn('emailVerified',[10,11])->first();
                    if(!empty($searchRow_)){

                        $data['name'] =  $searchRow_->nameUser;
                        $data['identificacion'] = $request->identificacion;
                        $data['email'] = $request->email;
                        $data['confirm_token'] = $searchRow_->confirm_token;
                        /*----*/
                        Mail::send('email_templates.confirmAccount', ['data' => $data], function($mail) use($data){
                            $mail->subject('Activar nueva cuenta ');
                            $mail->to($data['email'],$data['name']);
                        });

                        /*--- Send Sms ----------------------------------*/

                        $TextSms_= "Bienvenido a Tuproveedor.com, Para completar tu registro te hemos enviado un correo para la activacion de tu cuenta ";
                        $CelSms_='57'.intval(preg_replace('/[^0-9]+/','', $request->celular), 10);
                        $EstadoSms_ = $this->SendSms_($CelSms_,$TextSms_);

                        Session::flash('success',"Tu cuenta ha sido creada, se ha enviado un correo para la activación de tu cuenta");
                        return redirect()->route('signupAuth');

                    }else{
                        return "Error al crear la cuenta ";
                    }
                    /*------------------------------------------------*/

                }else{
                    Session::flash('danger',"Error, no se pudo realizar el registro, intentelo mas tarde");
                    return redirect()->route('signupAuth');
                }
            }
        }


    }
    /*----------------------------------------------*/
    public function confirmAccount($mail,$token_){
        $confirmAccount_ = User::where('email', $mail)->where('confirm_token', $token_)->first();
        if (!empty($confirmAccount_)) {
            /* Realizo el proceso de la activación de la cuenta del usuario. */
            $confirmAccount_->emailVerified = 11;
            if($confirmAccount_->update()){
                Session::flash('success',"Su cuenta ha sido verificado y validada, puede iniciar session.");
                return redirect::to('/login');
            }
            return view('mail.resetEmail',compact('email','token_'));
        }else{
            return "Error Confirmación de Datos ";
        }
    }
    public function confirmResetPass($mail,$token_){
        $confirmAccount_ = User::where('email', $mail)->where('confirm_token', $token_)->first();
        if (!empty($confirmAccount_)) {
            $theme_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
            $nameTheme=$theme_->nameDirectory;
            return view('themes.auth.resetEmailAccount',compact('mail','token_','theme_','nameTheme'));
        }else{
            Session::flash('danger',"Error al intentar realizar la petición.");
            return redirect()->route('signupAuth');
        }
    }
    
    public function recoveryPass(Request $request){
        if(!empty($request)){
            $isFoundRow_ = User::where('email', $request->email)->first();
            if (!empty($isFoundRow_)) {
                
                $isFoundRow_->confirm_token = str_random(100);
                if($isFoundRow_->update()){
                    $DataName_ = $isFoundRow_->nameUser;
                    $DataEmail_ = $isFoundRow_->email;

                    $data['nombre'] =  $DataName_;
                    $data['identificacion'] = '';
                    $data['email'] = $DataEmail_;
                    $data['confirm_token'] = $isFoundRow_->confirm_token;

                    Mail::send('email_templates.recoveryAccount', ['data' => $data], function($mail) use($data){
                        $mail->subject('Restaurar Contraseña');
                        $mail->to($data['email'], $data['nombre']);
                    });
                    $data = Array("code" => 200, "data" => [], "message" => "El correo ha sido enviado ");
                }else{
                    $data = Array("code" => 401, "data" => [], "message" => "Error, no se pudo realizar el envio del correo ");
                }
            }else{
                $data = Array("code" => 401, "data" => [], "message" => "Error, Este cuenta de email no se encuentra registrada. ");
            }
        }else{
            $data = Array("code" => 401, "data" => [], "message" => "Error, Debe especificar una cuenta de correo ");
        }
        
        return json_encode($data);
    }

    public function resetPassAccount(Request $request){
        $isFoundRow_ = User::where('email', $request->email)->where('confirm_token', $request->token_)->first();
        if (!empty($isFoundRow_)) {
            $isFoundRow_->password = bcrypt($request->password);
            $isFoundRow_->confirm_token = str_random(100);
            if($isFoundRow_->update()){
                Session::flash('success',"Su Contraseña ha sido reestablecida");
                return redirect()->route('login');
            }
        }else{
            Session::flash('danger',"Error al intentar realizar la petición de reestablecer contraseña, intentelo de nuevo.");
            return redirect()->route('login');
        }
    }

    

    public function Admin_AuthUserSignIn(Request $request){
        $FieldValidate_ = $this->ConfigFormLoginAuth_("Admin");
        $this->validate($request, [
            $FieldValidate_ => 'required',
            'password' => 'required',
        ],[
            'password.required' => 'debe establecer una contraseña de acceso',
        ]);

        $credentials = $request->only($FieldValidate_, 'password');
        $VerifiedAccount_ = User::Where($FieldValidate_, $request->$FieldValidate_)->Where('emailVerified',11)->where('idState',1)->first();
        if (!empty($VerifiedAccount_)) {
            $users = User::Where($FieldValidate_, $request->$FieldValidate_)->first();
            if (!empty($users)) {
            $idProfile = $users->idPerfil;
            if ($idProfile==1) {
                if (Auth::attempt($credentials)){
                session()->forget('attempts_'.$users->id);
                    //return redirect::to('administrator/orders');
                    return redirect()->route('admin.dashboard');
                } else {
                $attempts = session()->get('attempts_'.$users->idUser);
                if (empty($attempts)){ $attempts = session()->get('attempts_'.$users->idUser, 1); }
                if($attempts <= 3){
                    if ($attempts==3){
                    Session::flash('warning',"Su usuario ha sido bloqueado de forma temporal por intentos fallidos, si gusta puede restablecer su contraseña.");
                    return redirect()->route('recoverAuth');
                    }
                    session()->put('attempts_'.$users->idUser, $attempts + 1);
                }
                Session::flash('danger',"Error De autenticación los datos no son validos, Intentos ".$attempts." de 3 Fallidos.");
                return redirect::to('administrator/login');
                }
            }else{
                Session::flash('danger', "No tienes permisos para acceder desde esta opcion");
                return redirect::to('administrator/login');
            }
            }else{
            Session::flash('danger',"Error De autenticación los datos no son validos");
            return redirect::to('administrator/login');
            }
        }else{
            Session::flash('warning',"Error de Validación, La cuenta no ha sido verificada, o se encuentra inactiva");
            return redirect::to('administrator/login');
        }
    }

    /* Servicio de conexion desde la app movil */
    public function SigninUserApp(Request $request){
        if($request){
            $ClientDiferent_='N'; 
            $users_ = User::where('email', $request->email)->where('idState',1)->first();
            if(!empty($users_)){
                $this->validate($request, [ 'email' => 'required', 'password' => 'required', ]);
                $credentials_ = $request->only('email', 'password');
                
                $mess_="";
                if($users_->isCommerce==1){
                    if($request->tipo_cliente=='P'){
                        $ClientDiferent_='Y';
                        $mess_ ="Tu cuenta de usuario es de tipo comercio, si tienes producto agregado eliminalos del carrito e intenta de nuevo";
                    }
                }

                if($users_->isCommerce==0){
                    if($request->tipo_cliente=='C'){
                        $ClientDiferent_='Y';
                        $mess_ ="Tu cuenta de usuario es de tipo público, si tienes producto agregado eliminalos del carrito e intenta de nuevo";
                    }
                }
                if($ClientDiferent_=='N'){
                    if (!empty($users_)) {
                        if($users_->emailVerified==10){
                            $data = Array("code" => 404, "data" => [], "message" => "Error de Validación, su cuenta no ha sido verificada");
                        }else{
                            if (Auth::attempt($credentials_)) {
                                if (Auth::check()){
                                    $data = Array("code" => 200, "data" => $users_, "message" => "Conexión extablecida");
                                }
                            }else{
                                $data = Array("code" => 404, "data" => [], "message" => "Error de Autenticación, Usuario o Contraseña son incorrecto");
                            }
                        }
                    }else{
                        $data = Array("code" => 404, "data" => [], "message" => "Error al intentar realizar la conexión");
                    }
                }else{
                    $data = Array("code" => 404, "data" => [], "message" => $mess_); 
                }

            }else{
                $data = Array("code" => 404, "data" => [], "message" => "Error, al intentar validar esta cuenta de correo, no se encuentra registrada en nuestro sistema, o la cuenta se encuenta inactiva. ");
            } 
        }else{
            $data = Array("code" => 401, "data" => [], "message" => "Error, al intentar solicitar la petición. ");
        }
        return json_encode($data);
    }
    

    /*End Administrator*/

    public function logout(){
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }



}
