<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Auth;
use App\view_sidebar_permisos;
use App\Config\Gestor_plantillas, App\Config\Configuracion_valor;

class SidebarServiceProvider extends ServiceProvider
{
  public function register()
  {
      //
  }

  public function boot()
  {
    view()->composer('themes.administrator.template.sidebar', function ($view) {
      if (Auth::check()) {
        $idRole = Auth::user()->idRole;
        $modules = view_sidebar_permisos::where('idRol', $idRole)->orderBy('idModule', 'ASC')->get();
        $view->with('modules', $modules);
      }else{
        return route('index');
      }
    });

    /* obtengo el tema de la plantilla */
    $template_ = Gestor_plantillas::where('principal',1)->where('idState',1)->first();
    if(!empty($template_)){
      view()->composer('themes.'.$template_->name_theme.'.layouts.sidebar', function ($view) {
        if (Auth::check()) {
          $idRole = Auth::user()->idRole;
          $modules = view_sidebar_permisos::where('idRol', $idRole)->orderBy('idModule', 'ASC')->get();
         
          $view->with('modules', $modules);
        }else{
          return route('index');
        }
      });
    }else{
      $Name_ =" PLantilla Principal "; $Msg_=" No esta Definida  ";
      return view("errors.templatenotfound",compact('Name_','Msg_'));
    }
   
  }
}
