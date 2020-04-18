<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Auth;
use App\view_validate_access;

use App\Config\Gestor_plantillas, App\Config\Configuracion_valor;


class Controller extends BaseController{
  
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function validate_access($module, $action){
    $idRole = Auth::user()->idRole;
    $data_validate = view_validate_access::where('module', $module)
      ->where('action', $action)
      ->where('idRole', $idRole)
      ->first();
    if (!empty($data_validate)) {
      return 'true';
    }else{
      return 'false';
    }
  }

  /* Function Upload Directory Files. */
  public function fileDirectory_($file_) {
    $exists = Storage::disk('upload')->exists($file_);
    if($exists){
        return "Y";
    }else{
        return "N";
    }
  }

  /*--- Controla los errores de la plataforma ---*/
  public function errorSystem($type_,$name_){
    $Name_ = $name_;
    if(!empty($type_)){
      if($type_=="general"){
        $Msg_ ="Error ! No tiene ninguna plantilla cargada o configurada como principal";
      }
      if($type_=="file"){
        $Msg_ ="Error ! El archivo [ ".$name_." ] al que se intenta acceder no existe o fue borrado. ";
      }
      if($type_=="dir"){
        $Msg_ ="Error ! El Directorio [ ".$name_." ] al que se intenta acceder no existe o fue borrado. ";
      }
    }
    return view("errors.templatenotfound",compact('Name_','Msg_'));
  }
  /*--- End ---*/


    /* Process Para los SMS de la plataforma */
  public function SendSms_($Celular_,$TextSms_){
      $url = 'https://api.hablame.co/sms/envio/';
      $data = array(
          'cliente' => 10014491,
          'api' => 'gEL4JmJYZByMezDP4vpyvKp5wfXnHL',
          'numero' => $Celular_,
          'sms' => $TextSms_,
          'fecha' => '',
          'referencia' => 'Probienestar',
      );
      $options = array(
          'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'POST',
              'content' => http_build_query($data)
          )
      );
      $context  = stream_context_create($options);
      $result = json_decode((file_get_contents($url, false, $context)), true);
      return $result["resultado"];
  }


  /*--- Load Initial Configuration ---*/
  public function configuration(){
      define('CORE_MINIMUM_PHP', '7.1.3');
      if (version_compare(PHP_VERSION, CORE_MINIMUM_PHP, '<')){
          die('Your host needs to use PHP ' . CORE_MINIMUM_PHP . ' or higher to run this version of Core System !');
      }
      // Saves the start time and memory usage.
      $startTime = microtime(1);
      $startMem  = memory_get_usage();
      /**
       * Constant that is checked in included files to prevent direct access.
       * 
       */
      define('_JEXEC', 1);
      define('JPATH_INCLUDES', 'theme.includes');
      define('JPATH_ROOT','views.theme.');
      define('JPATH_THEME','theme');
      //return __DIR__;
    
      if(view()->exists(JPATH_INCLUDES.'.defines')){
        return json_encode(array(
          'state' => 1,
          'message' => 'success',
          'codeState' => 200
      )); 
      }else{
          return "Error, Directorio defines";
      }

      $Config_ = core_template_manager::where('idState',1)->where('main',1)->first();
      if(!empty($Config_)){
          if(empty($Config_->themeTemplate)){
              return json_encode(array(
                  'state' => 2,
                  'message' => 'tema esta vacio',
                  'codeState' => 'XXX'
              )); 
          }

          if(view()->exists(JPATH_TEMPLATES . $Config_->nameDirectory . '.' . $Config_->themeTemplate)){
          
              return $this->execute($Config_);
              /* Permite lanzar la aplicacion , una vez ralizada todas las validaciones ---*/
              /*
                  public function execute($Config_){
                      $destinyAction_ = 'store.index';
                      return redirect()->route($destinyAction_);
                  }

              */
              /*---------------------------------------------------------------------------*/
          

            
          }else{
              return json_encode(array(
                  'state' => 2,
                  'message' => JPATH_TEMPLATES . $Config_->themeTemplate,
                  'codeState' => 'XXX'
              ));
          }
      }else{
          return json_encode(array(
              'state' => 2,
              'message' => 'Error ',
              'codeState' => 'XXX'
          ));
      }

    
      //return CORE_MINIMUM_PHP;
  }



}
