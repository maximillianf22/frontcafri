<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\roles, App\profiles;
use App\User;

class RolesController extends Controller{


  public function users_sistemas(){
    $response_ = json_decode($this->configuration());
    if($response_->codeState==200){
        $dataUser = User::whereIn('idRole',[1,2])->paginate(100);
        $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
        return view('theme.components.administrator.comp_users.list',compact('dataUser','permisos_'));
    }
  }
  public function editUsers($idCliente){
    $response_ = json_decode($this->configuration());
    if($response_->codeState==200){
        $dataUser = User::where('id',$idCliente)->first();
        $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
        return view('theme.components.administrator.comp_users.edit',compact('dataUser','permisos_'));
    }
  }

  public function createUsers(){
    $response_ = json_decode($this->configuration());
    if($response_->codeState==200){
        $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
        return view('theme.components.administrator.comp_users.create',compact('permisos_'));
    }
  }

  public function saveNewUser(Request $request){
    $response_ = json_decode($this->configuration());
    if($response_->codeState==200){
      $NewUser_ = new User;
      $NewUser_->identificacion =0;
      $NewUser_->nameUser = $request->name_user;
      $NewUser_->lastnameUser = $request->lastnameUser;
      $NewUser_->celularUser = $request->celular_user;
      $NewUser_->email = $request->email_user;
      $NewUser_->emailverified = 11;
      $NewUser_->idState =$request->state;
      $NewUser_->idPerfil =1;
      $NewUser_->idRole =2;
      $NewUser_->password = bcrypt($request->password_user);
      /* configuro las opciones de permiso*/
      $data = array(
        "cl" => $request->cl,
        "pr" => $request->pr,
        "apr" => $request->apr,
        "pd" => $request->pd,
        "ct" => $request->ct,
        "sct" => $request->sct,
        "um" => $request->um,
        "sl" => $request->sl,
        "cp" => $request->cp,
        "hr" => $request->hr,
      );
      $NewUser_->modulos_permisos = json_encode($data);
      if ($NewUser_->save()) {
        return redirect()->route('admin.users.sistema');
      }
      
    }
  }
  
  public function saveeditUser(Request $request){
    $response_ = json_decode($this->configuration());
    if($response_->codeState==200){
        $dataCustomer = User::where('id',$request->idCliente)->first();
        if(!empty($dataCustomer)){
          $dataCustomer->idState = $request->state;
          $dataCustomer->celularUser = $request->celular_user;
          $dataCustomer->email = $request->email_user;
          if(!empty($request->password_user)){
            $dataCustomer->password = bcrypt($request->password_user);
          }  
          $data = array(
            "cl" => $request->cl,
            "pr" => $request->pr,
            "apr" => $request->apr,
            "pd" => $request->pd,
            "ct" => $request->ct,
            "sct" => $request->sct,
            "um" => $request->um,
            "sl" => $request->sl,
            "cp" => $request->cp,
            "hr" => $request->hr,
          );
          
          $dataCustomer->modulos_permisos = json_encode($data); 
          /* configuro las opciones de permiso*/ 
          /* end configurations */ 
          $dataCustomer->update();
          return back();
        }
    }
  }


  public function index()
  {
    $roles = roles::paginate(10);
    return view('themes.administrator.roles.index', compact('roles'));
  }

  public function create()
  {
    $profiles = profiles::where('idState', 1)->get();
    return view('themes.administrator.roles.create', compact('profiles'));
  }

  public function store(Request $request)
  {
    $newRol = new roles;
    $newRol->idProfile = $request->idProfile;
    $newRol->description = $request->nombre;
    $newRol->idState = 1;
    if ($newRol->save()) {
      Session::flash('success', 'Rol agregado correctamente');
      return redirect()->route('admin.roles');
    }else{
      Session::flash('danger', 'Hemos tenido problemas, intenta nuevamente');
      return back();
    }
  }

  public function show($idRol)
  {
    $rol = roles::where('id', $idRol)->first();
    if (!empty($rol)) {
      $profiles = profiles::where('idState', 1)->get();
      return view('themes.administrator.roles.show', compact('rol', 'profiles'));
    }else{
      Session::flash('danger', 'Hemos tenido problemas, intenta nuevamente');
      return back();
    }

  }

  public function update(Request $request, $idRol)
  {
    $rol = roles::where('id', $idRol)->first();
    if (!empty($rol)) {

      $rol->description = $request->nombre;
      $rol->idProfile = $request->idProfile;
      $rol->idState = $request->idState;
      if ($rol->update()) {
        Session::flash('success', 'Rol actualizado correctamente');
        return back();
      }else{
        Session::flash('danger', 'Hemos tenido problemas, intenta nuevamente');
        return back();
      }
    }else{
      Session::flash('danger', 'Hemos tenido problemas, intenta nuevamente');
      return back();
    }
  }

}
