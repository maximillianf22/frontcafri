<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Cookie\Factory,  Cookie;
use Illuminate\Support\Facades\Storage;

use Auth,Redirect,Session;
use App\Core\core_template_manager;

 
use App\Store\store_categorie, App\Store\Store_products_list;
use App\Core\Slider;

 

use App\Store\Api_products_offer; 

class CoreController extends Controller{
    
    public function location(){
        $Config_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        $Time = 2880; 
        $arrayCookie = ".null.";
        $StoreCookie = cookie($Config_->name_theme,$arrayCookie ,2880);
        return redirect()->route('index')->withCookie($StoreCookie);
        // return redirect()->route('index.config');
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
                    
            // Global definitions
            /*
            $parts = explode(DIRECTORY_SEPARATOR, JPATH_BASE);
            */
           
            // Defines Globals System .
            // define('JPATH_ROOT',          implode(DIRECTORY_SEPARATOR, $parts));
            
            define('JPATH_SITE',          JPATH_ROOT);
            define('JPATH_CONFIGURATION', JPATH_ROOT);
            define('JPATH_ADMINISTRATOR', JPATH_THEME  . '.administrator.');
            define('JPATH_LIBRARIES',     JPATH_THEME  . '.libraries.');
            define('JPATH_COMPONENTS',    JPATH_THEME  . '.components.');
            define('JPATH_MODULES',       JPATH_THEME  . '.modules.');
            define('JPATH_TEMPLATES',     JPATH_THEME  . '.templates.');
            define('JPATH_LAYOUTS',       JPATH_THEME  . '.layouts.');
            define('JPATH_PLUGINS',       JPATH_THEME  . '.plugins.');
            define('JPATH_INSTALLATION',  JPATH_THEME  . '.installation.');
            // define('JPATH_THEMES',        JPATH_BASE  . 'templates');
            // define('JPATH_CACHE',         JPATH_BASE  . 'cache');
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
        


    /* Establece la configuracion basica del proyecto y sus rutas */
    public function configuration1(){
        $Config_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        if(!empty($Config_)){
            if(view()->exists('themes.'.$Config_->name_theme.'.index')){
                if($Config_->useWebsite==1){
                    if($Config_->templateDefault=="default"){
                    }else{
                        if(view()->exists('themes.'.$Config_->name_theme.'.web.'.$Config_->templateDefault)){

                            /*--- Cuando sea modulo de tienda ---*/
                            if($Config_->templateDefault=="store"){
                                
                                $Store_categorie_ =  store_categorie::where('idState',1)->get();
                                $Api_products_availables_ = Store_products_list::where('solo_publico',1)->get();
                                
                                // return $Api_products_availables_;

                                $cookieStore_ = \Request::cookie($Config_->name_theme, null);
                                $Sliders_ =  Slider::where('idState',1)->get();
                                
                                if(Auth::User()){
                                    if(!empty(Auth::User()->nameBusiness)){
                                        $Products = Store_products_list::where('idCategorie',1)->where('solo_publico',1)->orWhere('solo_comercio',1)->where('idState',1)->select('*','priceProduct', DB::raw('count(*) as cnt_attributes'))->where('idCategorie',1)->where('solo_publico',1)->orWhere('solo_comercio',1)->where('idState',1)->groupBy('idProduct')->orderBy('nameProduct','ASC')->get();
                                    }else{
                                        $Products = Store_products_list::where('idCategorie',1)->where('solo_publico',1)->where('idState',1)->select('*','priceProduct', DB::raw('count(*) as cnt_attributes'))->where('idCategorie',1)->where('solo_publico',1)->where('idState',1)->groupBy('idProduct')->orderBy('nameProduct','ASC')->get();
                                    }
                                }else{
                                    $Products = Store_products_list::where('idCategorie',1)->where('solo_publico',1)->where('idState',1)->select('*','priceProduct', DB::raw('count(*) as cnt_attributes'))->where('idCategorie',1)->where('solo_publico',1)->where('idState',1)->groupBy('idProduct')->orderBy('nameProduct','ASC')->get();
                                }

                                
                                
                                if ($cookieStore_ == null) {
                                    return redirect()->route('index.location');
                                }else{
                                   
                                    $StoreCookie_ = \Request::cookie($Config_->name_theme, null);
                                    
                                    //$Offers_ = Store_products_list::where('isOffers',1)->select('*','priceProduct', DB::raw('count(*) as cnt_attributes'))->where('idState',1)->groupBy('idProduct')->orderBy('priceProduct','ASC')->get();
                                    if(Auth::User()){
                                        if(Auth::User()->isCommerce==1){
                                            return "es comercio";
                                            $Offers_ = Store_products_list::where('isOffers',1)->where('solo_publico',1)->take(5)->get();
                                        }else{
                                            $Offers_ = Store_products_list::where('isOffers',1)->where('solo_publico',1)->take(5)->get();
                                        }
                                    }else{
                                        $Offers_ = Store_products_list::where('isOffers',1)->where('solo_publico',1)->take(5)->get();
                                    }
                                    
                                   
                                    return view('themes.'.$Config_->name_theme.'.web.'.$Config_->templateDefault,compact('Config_'))
                                    ->with([
                                        "Config_" => $Config_,
                                        "Products_availables_" => $Api_products_availables_,
                                        "Offers_" => $Offers_,
                                        "Sliders" => $Sliders_,
                                        "Store_categorie_" =>$Store_categorie_,
                                        "Products" => $Products
                                    ]);
                                }
                            }
                        }else{
                            return $this->errorSystem('file',$Config_->templateDefault);
                        }
                    }
                }else{
                    return "tomar plantilla default";
                }
            }
        }else{
            return $this->errorSystem('general','');
        }   
    }

    public function configuration_old(){
        $ConfigTheme_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();

        if(view()->exists('themes.'.$ConfigTheme_->name_theme.'.index')){
            if(file_exists(public_path('assets/'.$ConfigTheme_->name_theme.'/css/master.css'))){
                if($ConfigTheme_->useWebsite==1){
                    if($ConfigTheme_->templateDefault=="default"){
                        if(view()->exists('themes.'.$ConfigTheme_->name_theme.'.web.index')){
                            return view('themes.'.$ConfigTheme_->name_theme.'.web.index',compact('ConfigTheme_'));
                        }else{
                            $Name_ = " Plantilla {index} ";
                            $Msg_=" No esta Definida  ";
                            return view("errors.templatenotfound",compact('Name_','Msg_'));
                        }
                    }else{
                        if(view()->exists('themes.'.$ConfigTheme_->name_theme.'.webSite.'.$ConfigTheme_->templateDefault)){
                            if($ConfigTheme_->templateDefault=="store"){
                                
                                /*--- Cuando sea modulo de tienda ---*/
                                /*
                                $Time = 2880; 
                                $jsonCookie_ =  cookie('jSonStoreCar',"", $Time);
                                $response->withCookie($jsonCookie_);
                                */
                                Cookie::queue('jSonStoreCar', "", 60);

                                $Store_categorie_ =  store_categorie::where('idState',1)->where('idTheme',$ConfigTheme_->id)->get();
                                $Api_products_availables_ = Api_products_available::where('idState',1)->get();
                                $Offers_ = Api_products_available::where('idState',1)->where('isOffers',1)->get();
                                //return $Offers_;
                                return view('themes.'.$ConfigTheme_->name_theme.'.webSite.'.$ConfigTheme_->templateDefault)
                                ->with([
                                    "ConfigTheme_" => $ConfigTheme_,
                                    "Products_availables_" => $Api_products_availables_,
                                    "Offers_" => $Offers_,
                                    "Store_categorie_" =>$Store_categorie_,
                                ]);

                            }else{
                                return view('themes.'.$ConfigTheme_->name_theme.'.webSite.'.$ConfigTheme_->templateDefault,compact('ConfigTheme_'));
                            }
                           
                        }else{
                            $Name_ = " Plantilla {$ConfigTheme_->templateDefault} ";
                            $Msg_=" No esta Definida  ";
                            return view("errors.templatenotfound",compact('Name_','Msg_'));
                        }
                    }
                }else{
                    return view('themes.'.$ConfigTheme_->name_theme.'.index');
                }
           }else{
            $Name_ = $ConfigTheme_->name_theme." {Css} ";
            $Msg_=" No esta Definido  ";
            return view("errors.templatenotfound",compact('Name_','Msg_'));
           }  
        }else{
            $Msg_=" No esta Configurada ";
            $Name_ = $ConfigTheme_->name_theme;
            return view("errors.templatenotfound",compact('Name_','Msg_'));
        }    
    }
}
