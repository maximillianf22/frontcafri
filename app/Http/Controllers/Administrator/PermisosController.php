<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use App\profiles, App\roles, App\modules, App\module_profiles, App\actions_roles, App\permission_roles;
use App\view_modules_profile, App\view_check_actions;

class PermisosController extends Controller
{
  public function index()
  {
    $dataProfiles = profiles::where("idState", 1)->get();
    return view('themes.administrator.permisos.index', compact('dataProfiles'));
  }

  public function perfiles(Request $request)
  {
    $idProfile = $request->idProfile;
    $roles = roles::where('idProfile', $idProfile)->where('idState', 1)->get(['id', 'idProfile', 'description as name']);
    $modules = view_modules_profile::where('idProfile', $idProfile)->get();
    $data = array('roles' => $roles, 'modules' => $modules);
    $response = array('state' => 1, 'message' => 'lista de modulos y perfiles', 'data' => $data);
    return json_encode($response);
  }

  public function actionsChecked(Request $request)
  {
    $data_check = view_check_actions::where('idModule', $request->idModule)
      ->where('idRole', $request->idRol)
      ->get();
    return json_encode($data_check);
  }

  public function actionsSave(Request $request)
  {
    $idRol = $request->idRol;
    $idModule = $request->idModule;
    $actions = $request->actions;
    if (!empty($idRol) && !empty($idModule)) {

      $deleteAction = permission_roles::where('idRole', $idRol)
        ->module($idModule)
        ->delete();

      if (count($actions) > 0) {
        for ($i=0; $i < count($actions); $i++) {
          $idAction = $actions[$i];
          $count_action = actions_roles::where('id', $idAction)->where('idModule', $idModule)->count();
          if ($count_action > 0) {
            $new_action = new permission_roles;
            $new_action->idRole = $idRol;
            $new_action->idAction = $idAction;
            $new_action->save();
          }
        }
      }

      Session::flash('success', 'Permisos asignados correctamente');
      $response_ = array('state' => 1);
      return json_encode($response_);

    }else {
      Session::flash('danger', 'Hemos tenido problemas, intenta mas tarde');
      $response_ = array('state' => 2);
      return json_encode($response_);
    }


  }

}
