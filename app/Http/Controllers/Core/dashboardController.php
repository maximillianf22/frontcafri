<?php

namespace App\Http\Controllers\Core;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Config\Gestor_plantillas, App\Config\Configuracion_valor;
use App\Store\store_categorie, App\Store\Store_products_list;
use App\Store\Api_products_offer;
use App\Core\Slider;
use App\Core\core_template_manager, App\Store\Store_products_selection;
use App\Store\Store_attributes_value;

class dashboardController extends Controller{
    
    /* Busca el tema por defecto de la plantilla */
    public function DefaultTheme_ (){
        $ViewDefault_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        return $ViewDefault_;
    }


    public function index(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
        
            $Config_ = core_template_manager::where('idState',1)->where('main',1)->first();
            $Sliders_ =  Slider::where('idState',1)->get();
            
            if(!empty($_COOKIE['_gid'])){
                $type_client_= $_COOKIE['_gid'];
            }else{
                $type_client_= 'P';
            }

            // $Offers_ = Store_products_selection::where('isOffers',1)->whereIn('visible_publico',['C','P'])->groupBy('nameProduct')->get();
            $Offers_ = Store_products_selection::where('isOffers',1)->where('visible_publico',$type_client_)->groupBy('nameProduct')->get();

            /*
            $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);
            */
          $Store_categorie_menu =  Store_products_selection::where('visible_publico', $type_client_)
            ->where('idState',1)
            ->groupBy('categoria_main')
            ->orderBy('order_category','Asc')
            ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState']);



             $Store_categorie_ =  Store_products_selection::
            groupBy('categoria_main')->orderBy('order_category','Asc')->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category']);
           
           /*-- Compra y Envio ----*/
            $min_compra_ = Store_attributes_value::where('idState',1)->whereIn('id',['15'])->first();
            $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();

            /*----------------------*/ 
            return view('theme.components.core.comp_dashboard.store')
            ->with([
                "Config_"  => $Config_,
                "Sliders" => $Sliders_,
                "Offers_" => $Offers_,
                "Store_categorie_" => $Store_categorie_,
                'min_compra_' =>$min_compra_,
                "Store_categorie_menu" => $Store_categorie_menu
            ]);
        }
      
       
    }

    public function create(){ }
    public function store(Request $request){ }
    public function show($id){ }
    public function edit($id){ }
    public function update(Request $request, $id){ }
    public function destroy($id){ }


}
