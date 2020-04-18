<?php
namespace App\Http\Controllers\Core;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Cookie\Factory,  Cookie;
use Illuminate\Support\Facades\Storage;
use App\Config\Gestor_plantillas,App\Store\Store_products_list;

use Hash, Auth, Mail, Session, Redirect;
use App\User,App\Store\Store_order,App\Store\Store_orders_detail;
use App\Store\Store_products_temp;
use App\Store\Store_detail_order;
use App\Core\core_template_manager, App\Store\Store_products_selection;
use App\Core\Slider, App\Store\Store_cupon, App\Store\store_ranges_hour,App\Store\Store_attributes_value;
use App\UserAddress, App\Store\view_listar_productos;
use App\Store\store_subcategories,App\Store\view_list_categories,App\Store\view_filter_categories;

class storeController extends Controller {

    /** App\Store\
     *  Display a listing of the resource.
     *  @return \Illuminate\Http\Response
     */

    public function index(){

        /*--- maintenance mode ---*/
        //return view('theme.maintenance.default')->with([]);
        /*-----------------------*/
        
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            if(!empty($_COOKIE['_gid'])){
                $type_client_= $_COOKIE['_gid'];
            }else{
                $type_client_= 'P';
            }
            
            $Config_ = core_template_manager::where('idState',1)->where('main',1)->first();
            //return $Config_ ;

            $Sliders_ =  Slider::where('idState',1)->get();
            $Offers_ = Store_products_selection::where('isOffers',1)
            ->where('visible_publico',$type_client_)
            ->where('idState',1)
            ->groupBy('nameProduct')->get();
 
            //return $Offers_;
            $Store_categorie_menu =  Store_products_selection::where('visible_publico', $type_client_)
            ->where('idState',1)
            ->groupBy('categoria_main')
            ->orderBy('order_category','Asc')
            ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState']);

             $Store_categorie_ =  Store_products_selection::where('visible_publico', $type_client_)
            ->where('idState',1)
            ->groupBy('categoria_main')
            ->orderBy('order_category','Asc')
            ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState']);
           // return $Store_categorie_ ;

           
            foreach ($Store_categorie_ as $Store_categorie) {
               $row_ = view_listar_productos::select( DB::raw('count(*) as cnt_rows'))
               ->where('idCategorie',$Store_categorie->idCategorie)->first(['cnt_rows']); 
                $Store_categorie->productos =$row_->cnt_rows; 
            }
            
 
            /*-- Compra y Envio ----*/
            $min_compra_ = Store_attributes_value::where('idState',1)->whereIn('id',['15'])->first();
            $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();
            /*----------------------*/
            $litarCategorias_ = view_list_categories::All();
            
            return view('theme.layouts.' . $Config_->view_default.'.index')
            ->with([
                "Config_"  => $Config_,
                "Sliders" => $Sliders_,
                "Offers_" => $Offers_,
                "Store_categorie_" => $Store_categorie_,
                'min_compra_' => $min_compra_,
                "litarCategorias_" => $litarCategorias_,
                "Store_categorie_menu" => $Store_categorie_menu
            ]);

        }else{ }
    }

    /*--- Listar las categorias ---*/
    public function viewCategorysub($slug){
        return  redirect()->route('store.category.lisproduct',[$slug]);
    }
    
    public function viewCategoryListsub($slug,$subslug){
        if(!empty($slug) && !empty($subslug)){
            $response_ = json_decode($this->configuration());
            if(!empty($_COOKIE['_gid'])){
                $type_client_= $_COOKIE['_gid'];
            }else{  $type_client_= 'P';  }
            if($response_->codeState==200){

                $Config_ = core_template_manager::where('idState',1)->where('main',1)->first(); 

                  $Sliders_ =  Slider::where('idState',1)->get();
            $Offers_ = Store_products_selection::where('isOffers',1)
            ->where('visible_publico',$type_client_)
            ->where('idState',1)
            ->groupBy('nameProduct')->get();

                $Store_categorie_menu =  Store_products_selection::where('visible_publico', $type_client_)
                ->where('idState',1)
                ->groupBy('categoria_main')
                ->orderBy('order_category','Asc')
                ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState']);

                $Store_categorie_ =  Store_products_selection::where('visible_publico', $type_client_)
                ->where('idState',1)
                ->groupBy('categoria_main')
                ->orderBy('order_category','Asc')
                ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState']); 
               
                foreach ($Store_categorie_ as $Store_categorie) {
                   $row_ = view_listar_productos::select( DB::raw('count(*) as cnt_rows'))
                   ->where('idCategorie',$Store_categorie->idCategorie)->first(['cnt_rows']); 
                    $Store_categorie->productos =$row_->cnt_rows; 
                }

                // return $Store_categorie_;

                /*
                $Store_categorie_ =  Store_products_selection::where('visible_publico',$type_client_)->where('slug_main',$slug)->where('idState',1)->groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category','categoria_main','slug_main','slug_category as slug_subcategoria']);
                */

                $Products = Store_products_selection::where('visible_publico',$type_client_)
                ->where('slug_main',$slug)
                ->where('slug_category',$subslug)
                ->where('idState',1)
                ->groupBy('nameProduct')
                ->orderBy('nameProduct','Asc')->get();

               // return $Products;
                 
                $nameSlug = view_list_categories::where('slug_base',$slug)->first();                
                $subcategoriasslug_ = view_list_categories::where('slug_main',$slug)->
                    where('variante',1)->get();

                $min_compra_ = Store_attributes_value::where('idState',1)->whereIn('id',['15'])->first();
                $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();

                return view('theme.layouts.' . $Config_->view_default.'.listSubCategoryProducts')
                ->with([
                    "slug"=> $slug,
                    "subslug" => $subslug,
                    "Config_" => $Config_,
                    "Products" => $Products,
                    "Store_categorie_" => $Store_categorie_,
                    'Slug_' => $nameSlug,
                    "Offers_" => $Offers_,
                    'min_compra_' => $min_compra_,
                    'envio_' => $envio_,
                    'subcategoriasslug_' => $subcategoriasslug_,
                    "Store_categorie_menu" => $Store_categorie_menu
                ]);

            }

        }else{
        }
    }
    /*--------*/
    public function viewCategory(){ return redirect()->route('store.index'); }
    public function viewCategoryList($slug){
 
        if(!empty($slug)){
            $response_ = json_decode($this->configuration());
            if(!empty($_COOKIE['_gid'])){
                $type_client_= $_COOKIE['_gid'];
            }else{  $type_client_= 'P';  }

            if($response_->codeState==200){ 

                $Config_ = core_template_manager::where('idState',1)->where('main',1)->first();

                
                 $Sliders_ =  Slider::where('idState',1)->get();
            $Offers_ = Store_products_selection::where('isOffers',1)
            ->where('visible_publico',$type_client_)
            ->where('idState',1)
            ->groupBy('nameProduct')->get();
            
                $Store_categorie_menu =  Store_products_selection::where('visible_publico', $type_client_)
                ->where('idState',1)
                ->groupBy('categoria_main')
                ->orderBy('order_category','Asc')
                ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState']);

                $Store_categorie_ =  Store_products_selection::where('visible_publico', $type_client_)
                ->where('idState',1)->where('slug_main',$slug)
                ->groupBy(['categoria_main','nameCategorie'])
                ->orderBy('nameCategorie','Asc')
                ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState','slug_category as slug_subcategoria']); 
               
                foreach ($Store_categorie_ as $Store_categorie) {
                   $row_ = view_listar_productos::select( DB::raw('count(*) as cnt_rows'))
                   ->where('idCategorie',$Store_categorie->idCategorie)->first(['cnt_rows']); 
                    $Store_categorie->productos =$row_->cnt_rows; 
                }

                // return $Store_categorie_;
                

                $Products = Store_products_selection::where('visible_publico',$type_client_)->where('slug_category',$slug)->where('idState',1)->groupBy('nameProduct')->orderBy('nameProduct','Asc')->get();

                //$nameSlug = Store_products_selection::where('slug_category',$slug)->where('idState',1)->first();

                $nameSlug = view_list_categories::where('slug_base',$slug)->first();
                //return $nameSlug;

                 
                $subcategoriasslug_ = view_list_categories::where('slug_main',$slug)
                ->where('variante',1)
                ->orderBy(trim('nameCategorie'),'Asc')
                ->get();

               // return $subcategoriasslug_;
                // return $subcategoriasslug_;

                $min_compra_ = Store_attributes_value::where('idState',1)
                ->whereIn('id',['15'])->first();
                $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();

                return view('theme.layouts.' . $Config_->view_default.'.listCategoryProducts')
                ->with([
                    "Config_" => $Config_,
                    "Products" => $Products,
                    "Store_categorie_" => $Store_categorie_,
                    'Slug_' => $nameSlug,
                    'min_compra_' => $min_compra_,
                    "Offers_" => $Offers_,
                    'envio_' => $envio_,
                    'subcategoriasslug_' => $subcategoriasslug_,
                    "Store_categorie_menu" => $Store_categorie_menu
                ]);

            }
        }else{   
        }
    }

    /*--- Guarda Temporalmente los productos del carrito ---*/
    public function savetmpCarProducts(Request $request){
        if($request){
            $ArrayOrder_ = json_decode($request->dataJson,true);
            $TokenTmp_= $request->idJson;
             /*----*/
            if($request->action=="A"){
                foreach($ArrayOrder_ as $OrderArray){
                    $idProduct_ = $OrderArray['idProduct'];
                    $idAttribute = $OrderArray['idAttribute'];

                    $DataBasket_ = Store_orders_detail::where('idTempCar',$TokenTmp_)
                    ->where('idProduct',$idProduct_)
                    ->where('idAttribute',$idAttribute)->where('isTempCar','Y')->first();
                    if(!empty($DataBasket_)){
                        /* No encuentro el valor */
                        $DataBasket_->nameProduct = $OrderArray['nameProduct'];
                        $DataBasket_->idProduct = $OrderArray['idProduct'];
                        $DataBasket_->idAttribute = $OrderArray['idAttribute'];
                        $DataBasket_->priceOrder = $OrderArray['priceOrder'];
                        $DataBasket_->priceComerceOrder = 0;
                        $DataBasket_->stockOrder = 0;
                        $DataBasket_->totalOrder = $OrderArray['totalOrder'];
                        $DataBasket_->quantityOrder = $OrderArray['quantityOrder'];
                        $DataBasket_->update();
                    }else{
                        /*Agrego el producto*/
                        $TmpOrderDetail = new Store_orders_detail();
                        $TmpOrderDetail->idOrder = 0;
                        $TmpOrderDetail->idUser = 0;
                        $TmpOrderDetail->nameProduct = $OrderArray['nameProduct'];
                        $TmpOrderDetail->idProduct = $OrderArray['idProduct'];
                        $TmpOrderDetail->idAttribute = $OrderArray['idAttribute'];
                        $TmpOrderDetail->priceOrder = $OrderArray['priceOrder'];
                        $TmpOrderDetail->priceComerceOrder = 0;
                        $TmpOrderDetail->stockOrder = 0;
                        $TmpOrderDetail->totalOrder = $OrderArray['totalOrder'];
                        $TmpOrderDetail->quantityOrder = $OrderArray['quantityOrder'];
                        $TmpOrderDetail->idTempCar = $TokenTmp_;
                        $TmpOrderDetail->save();
                    }
                }
            }
            /*-----*/
            if($request->action=="D"){
                // return "aqui";
                $DataBasketDelete_ = Store_orders_detail::where('idTempCar',$request->idJson)
                ->where('idProduct',$request->itemDel)->first();
                // dd($DataBasketDelete_);
            }
            $DataBasketResult_ = store_products_temp::where('idTempCar',$TokenTmp_)->get();
            $ListProduct = json_decode($DataBasketResult_,true);
            /*-- Compra y Envio ----*/
            $min_compra_ = Store_attributes_value::where('idState',1)->whereIn('id',['15'])->first();
            $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();
            /*----------------------*/
            return view('theme.components.store.comp_products.viewPanelCarProducts',compact('ListProduct','min_compra_','envio_'));
            
        }else{ }
    }

    /*  Muestra el detalle del producto a consultar, */
    public function viewItemProduct(Request $request){
        if(!empty($request->idProduct_)){
            $response_ = json_decode($this->configuration());
            if(!empty($_COOKIE['_gid'])){
                $type_client_= $_COOKIE['_gid'];
            }else{
                $type_client_= 'P';
            }
            if($response_->codeState==200){
                $Config_ = core_template_manager::where('idState',1)->where('main',1)->first();
                $Product = Store_products_selection::where('visible_publico',$type_client_)->where('id',$request->idProduct_)->groupBy('nameProduct')->orderBy('nameProduct','Asc')->first();

                 
                $VariacionesProduct = Store_products_selection::where('visible_publico',$type_client_)->where('id',$request->idProduct_)->orderBy('nameProduct','Asc')->get();
                return view('theme.components.store.comp_products.modalProduct')
                ->with([
                    "Product_" => $Product,
                    "Variations_" => $VariacionesProduct,
                ]);
            }else{
                return "error : 333 ";
            }
        }else{ }
    }

    public function viewItemProductEdit(Request $request){
        if(!empty($request->idProduct_)){
            $response_ = json_decode($this->configuration());
            if(!empty($_COOKIE['_gid'])){
                $type_client_= $_COOKIE['_gid'];
            }else{
                $type_client_= 'P';
            }
            if($response_->codeState==200){
                $Config_ = core_template_manager::where('idState',1)->where('main',1)->first();
                $Product = Store_products_selection::where('visible_publico',$type_client_)->where('id',$request->idProduct_)->groupBy('nameProduct')->orderBy('nameProduct','Asc')->first();
                
                if(empty($Product)){
                //    $Product = Store_products_selection::where('visible_publico',$type_client_)->where('id_attribute',$request->idProduct_)->groupBy('nameProduct')->orderBy('nameProduct','Asc')->first();    
                }
                $VariacionesProduct = Store_products_selection::where('visible_publico',$type_client_)->where('id',$request->idProduct_)->orderBy('nameProduct','Asc')->get();
                
                $ProductsEdit_ = Store_orders_detail::where('idAttribute',$request->idAttributeEdit_)
                ->where('idTempCar',$request->tokem_)
                ->where('isTempCar','Y')
                ->get();

                return view('theme.components.store.comp_products.modalProductEdit')
                ->with([
                    "Product_" => $Product,
                    "Variations_" => $VariacionesProduct,
                    "ProductsEdit_" => $ProductsEdit_,
                ]);


            }else{
                return "error : 333 ";
            }
        }else{ }
    }

    public function reloadCar(Request $request){
        if($request){
            $TokenTmp_=$request->idJson;
            $DataBasketResult_ = store_products_temp::where('idTempCar',$TokenTmp_)->get();
            $ListProduct = json_decode($DataBasketResult_,true);
            /*-- Compra y Envio ----*/
            $min_compra_ = Store_attributes_value::where('idState',1)->whereIn('id',['15'])->first();
            $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();
            /*----------------------*/
            return view('theme.components.store.comp_products.viewPanelCarProducts',compact('ListProduct','min_compra_','envio_'));
        }
    }


    public function repeatProducts(Request $request){
        if($request){
            $TokenTmp_=$request->idToken_;
            $CestaTmp_=$request->idCar_;

            $DataBasketDelete_ = Store_orders_detail::where('idTempCar',$TokenTmp_)
            ->delete();

            $findAnt_ = Store_orders_detail::where('idOrder',$CestaTmp_)->get();
            if(!empty($findAnt_)){
                foreach($findAnt_  as $item){
                    $TmpOrderDetail = new Store_orders_detail();
                    
                    $TmpOrderDetail->idOrder = 0;
                    $TmpOrderDetail->idUser = 0;
                    $TmpOrderDetail->idProduct = $item->idProduct;
                    $TmpOrderDetail->nameProduct = $item->nameProduct;
                    $TmpOrderDetail->idAttribute = $item->idAttribute;
                    $TmpOrderDetail->priceOrder = $item->priceOrder;
                    $TmpOrderDetail->priceComerceOrder = $item->priceComerceOrder;
                    $TmpOrderDetail->stockOrder = $item->stockOrder;
                    $TmpOrderDetail->totalOrder = $item->totalOrder;
                    $TmpOrderDetail->quantityOrder = $item->quantityOrder;
                    $TmpOrderDetail->idTempCar = $TokenTmp_;
                    $TmpOrderDetail->save();
                }
                return $CestaTmp_;
            }
            return $TokenTmp_;
           
        }
    }


    public function delProductcar(Request $request){
        if($request){
            $TokenTmp_=$request->idJson;
            $DataBasketDelete_ = Store_orders_detail::where('idTempCar',$TokenTmp_)
            ->delete();
        }
    }

    public function delitemProductCar(Request $request){
        if($request){
            $TokenTmp_ = $request->idTem_;
            $idAttribute_ = $request->idAttribute_;

            $DataBasketDelete_ = Store_orders_detail::where('idTempCar',$TokenTmp_)
            ->where('idAttribute',$idAttribute_)
            ->delete();
            return "Y";
        }
    }
    
    public function checkCupon(Request $request){
        if($request){
            if(!empty($request->codigoCupon)){
                $ValidateCupon_ = Store_cupon::where('idState',1)
                ->where('code_cupon',$request->codigoCupon)
                ->where('cupon_limite',0)->first();
                if(!empty($ValidateCupon_)){
                    //return $ValidateCupon_->cupon_value;
                    return array("cupon_value"=>$ValidateCupon_->cupon_value,"minimo_compra"=>$ValidateCupon_->minimo_compra,"code_cupon"=>$ValidateCupon_->code_cupon);
                }else{
                    return 0;
                }
            }
        }else{ }

        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $Config_ = core_template_manager::where('idState',1)->where('main',1)->first();
            if(Auth::user()){
                $UserAccount_= User::where('id',Auth::user()->id)->first();
            }else{
                $UserAccount_="";
            }
            $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);
            $DataBasketResult_ = store_products_temp::where('idTempCar',$request->idJson)->get();
         
          /*-- Compra y Envio ----*/
            $min_compra_ = Store_attributes_value::where('idState',1)->whereIn('id',['15'])->first();
            $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();
            
             $Store_categorie_menu =  Store_products_selection::where('visible_publico', $type_client_)
                ->where('idState',1)
                ->groupBy('categoria_main')
                ->orderBy('order_category','Asc')
                ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState']);


            return view('theme.components.store.comp_checkout.checkout')
            ->with([
                "Config_" => $Config_,
                "UserAccount_"=> $UserAccount_,
                "DataBasketResult_" => $DataBasketResult_,
                "Store_categorie_" => $Store_categorie_,
                "min_compra_" => $min_compra_,
                "envio_" => $envio_,
                "Store_categorie_menu" => $Store_categorie_menu
            ]);
        }else{}
    }

    public function checkout(Request $request){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
             if(!empty($_COOKIE['_gid'])){
                $type_client_= $_COOKIE['_gid'];
            }else{  $type_client_= 'P';  }

            $Config_ = core_template_manager::where('idState',1)->where('main',1)->first();
            if(Auth::user()){
                $UserAccount_= User::where('id',Auth::user()->id)->first();
            }else{
                $UserAccount_="";
            }
            
            $idTemp_ = $_COOKIE['_gidCatalogo'];
            // $idTemp1_ = $_COOKIE['id.catalogo'];
            $vrCupon_ = $_COOKIE['_gtokCupV'];
            $idCupon_ = $_COOKIE['_gtokCup'];
            //return $idTemp_;
            $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);
            $DataBasketResult_ = store_products_temp::where('idTempCar',$idTemp_)->get();
            // return  $DataBasketResult_;
            $HourRanges_ = store_ranges_hour::where('idState',1)->orderBy('id','Asc')->get();
            // return $HourRanges_;
              
            $addresses_ = UserAddress::where('idUser',Auth::User()->id)->where('idState',1)->get();
            /*-- Compra y Envio ----*/
            $min_compra_ = Store_attributes_value::where('idState',1)->whereIn('id',['15'])->first();
            $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();
              $Store_categorie_menu =  Store_products_selection::where('visible_publico', $type_client_)
                ->where('idState',1)
                ->groupBy('categoria_main')
                ->orderBy('order_category','Asc')
                ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState']);


            return view('theme.components.store.comp_checkout.checkout')
            ->with([
                "Config_" => $Config_,
                "UserAccount_"=> $UserAccount_,
                "addresses_" => $addresses_,
                "DataBasketResult_" => $DataBasketResult_,
                "Store_categorie_" => $Store_categorie_,
                "HourRanges_" => $HourRanges_,
                "min_compra_" => $min_compra_,
                "envio_" => $envio_,
                "Store_categorie_menu" => $Store_categorie_menu
            ]);
        }else{}

    }

    public function checkoutfinish(Request $request){
        if($request){
            
            $idTemp_ = $_COOKIE['_gidCatalogo'];
            $vrCupon_ = $_COOKIE['_gtokCupV'];
            $idCupon_ = $_COOKIE['_gtokCup'];

             if(!empty($_COOKIE['_gid'])){
                $type_client_= $_COOKIE['_gid'];
            }else{  $type_client_= 'P';  }

             /*-- Compra y Envio ----*/
            $min_compra_ = Store_attributes_value::where('idState',1)->whereIn('id',['15'])->first();
            $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();
          


            if(!empty($request->Data_address)){
                $dSaveDetail_ = "";
                $DataOrder = new Store_order();
                $DataOrder->idUser = Auth::User()->id;
                $DataOrder->address = $request->Data_address;
                $DataOrder->date_order = $request->Data_date;
                $DataOrder->time_order = $request->Data_time;
                $DataOrder->comments = $request->Data_comments;
                if($idCupon_<>"_i"){
                    $DataOrder->code_cupon = $idCupon_;
                    $DataOrder->cupon_value = $vrCupon_;
                }else{
                    $DataOrder->code_cupon = "";
                    $DataOrder->cupon_value = 0;
                }
              
                $balance = DB::table('store_orders_details')
                ->where('idTempCar',$idTemp_)
                ->where('isTempCar','Y')
                ->sum('totalOrder');

               // return $balance;
                $totBalance_ = 0;
                $totBalance_ = $balance;
               if($balance>$min_compra_->extra){
                    if($min_compra_->extra>0){
                        $DataOrder->send_value_cost = 0;
                    }else{ 
                        $DataOrder->send_value_cost =  $envio_->extra;
                    } 
               }else{
                    $DataOrder->send_value_cost = $envio_->extra;
               }

               $DataOrder->minimun_shop = $min_compra_->extra;

                $DataOrder->totOrder = $totBalance_;
                $DataOrder->idStateOrder = 1;
                $Token =  $request->Token;
                
                if ($DataOrder->save()){
                    $DataOrderDetail = Store_orders_detail::where('idTempCar',$Token)
                    ->where('isTempCar','Y')->first();
                    if(!empty($DataOrderDetail)){
                        /* No encuentro el valor */

                        DB::table('store_orders_details')
                        ->where('idTempCar',$Token)
                        ->where('isTempCar','Y')
                        ->update(array('idOrder' => $DataOrder->id,'idUser' =>  Auth::User()->id,'isTempCar'=>'N'));
                        $dSaveDetail_="Y";

                        /*--- Valido el limite de los cupones ---*/
                        $CuponUtilizados_ = Store_order::where('code_cupon',$idCupon_)->where('idState',1)->get();
                        $cRedimidos_ = count($CuponUtilizados_);
                        $cuponLImite_ = Store_cupon::where('code_cupon',$idCupon_)->first(['user_limit']);
                        if(!empty($cuponLImite_)){
                            if($cRedimidos_>=$cuponLImite_->user_limit){
                                $cuponLImite_->cupon_limite= 2;
                                
                                DB::table('store_cupons')
                                ->where('code_cupon',$idCupon_)
                                ->update(array('cupon_limite' =>2));
                                
                            }
                        }
                        
                       
                        /*---------------------------------------*/


                    }
                    if($dSaveDetail_=="Y"){
                        Session::flash('success',"Su pedido ha sido registrado,");
                        return "Y";
                    }else{
                        Session::flash('warning',"No pedido no pudo ser procesado, intentelo mas tarde");
                        return "N";
                    }
                    
                }else{
                    Session::flash('warning',"No pedido no pudo ser procesado, intentelo mas tarde");
                    return "N";
                }
            }
            
        }else{
        }
    }

    public function ordersProducts(){

        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){ 
            if(!empty($_COOKIE['_gid'])){
                $type_client_= $_COOKIE['_gid'];
            }else{  $type_client_= 'P';  }


            $Config_ = core_template_manager::where('idState',1)->where('main',1)->first();

            /*
            $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')->orderBy('order_category','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);
            */
              $Store_categorie_menu =  Store_products_selection::where('visible_publico', $type_client_)
                ->where('idState',1)
                ->groupBy('categoria_main')
                ->orderBy('order_category','Asc')
                ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState']);

             $Store_categorie_ =  Store_products_selection::where('visible_publico', $type_client_)
                ->where('idState',1)
                ->groupBy('categoria_main')
                ->orderBy('order_category','Asc')
                ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState','slug_category as slug_subcategoria']); 
               
                foreach ($Store_categorie_ as $Store_categorie) {
                   $row_ = view_listar_productos::select( DB::raw('count(*) as cnt_rows'))
                   ->where('idCategorie',$Store_categorie->idCategorie)->first(['cnt_rows']); 
                    $Store_categorie->productos =$row_->cnt_rows; 
                }

            
            $Orders_ = Store_detail_order::where('idUser',Auth::User()->id)->groupBy('id','idUser')->orderBy('id','Desc')->get(['id','idUser','address','date_order','time_order','comments','code_cupon','cupon_value','totOrder','send_value_cost','idState','idStateOrder']);
            /*-- Compra y Envio ----*/
            $min_compra_ = Store_attributes_value::where('idState',1)->whereIn('id',['15'])->first();
            $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();
          

            return view('theme.components.store.comp_orders.myOrders')
            ->with([
                "Config_" => $Config_,
                "Orders_" => $Orders_,
                "Store_categorie_"=> $Store_categorie_,
                "min_compra_" => $min_compra_,
                "envio_" => $envio_,
                "Store_categorie_menu" => $Store_categorie_menu
            ]); 
        }else{

        }
    }

    public function search(Request $request){
        
        if(!empty($_COOKIE['_gid'])){
            $type_client_= $_COOKIE['_gid'];
        }else{
            $type_client_= 'P';
        }

        $Config_ = core_template_manager::where('idState',1)->where('main',1)->first();
        $Store_categorie_ =  Store_products_selection::where('idState',1)->groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);
        // $slugDescription = store_categorie::where('idState',1)->where('slug',$slug)->first('description');
        
        if(!empty($request->slug)){
            $Products = Store_products_selection::where('nameProduct','like','%'.$request->DataSearch.'%')
            ->where('visible_publico',$type_client_)
            ->where('idState',1)
            ->where('slug_main',$request->slug_main)
            ->where('slug_category',$request->slug)
            ->groupBy('nameProduct')->orderBy('nameProduct','Asc')->get();
        }else{
            $Products = Store_products_selection::where('nameProduct','like','%'.$request->DataSearch.'%')
            ->where('visible_publico',$type_client_)
            ->where('idState',1)
            ->where('slug_main',$request->slug_main)
            ->groupBy('nameProduct')->orderBy('nameProduct','Asc')->get();
        }
        $row_ = count($Products); 
        return view('theme.components.store.comp_products.productsByCategory')
        ->with([
            "Config_" => $Config_,
            "Products" => $Products,
            "Store_categorie_" => $Store_categorie_,
            "findRow_" => $row_,
        ]); 
    }

    public function filtersearch(Request $request){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){

            $Category_ = $request->dataCategory_;
            $State_ = $request->dataState_;
            //return $State_;

            $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);
            if($State_==0 && $Category_==0){
                $Products = Store_products_selection::select('*',DB::raw('count(*) as cnt_attributes'))
                ->groupBy('nameProduct')->orderBy('nameProduct','Asc')->get();
            }
            if($State_>=1 && $Category_>=1){
                $Products = Store_products_selection::select('*',DB::raw('count(*) as cnt_attributes'))
                ->where('idCategorie',$Category_)
                ->where('idState',$State_)
                ->groupBy('nameProduct')->orderBy('nameProduct','Asc')->get();
            }
            if($Category_>=1 && $State_==0){
                $Products = Store_products_selection::select('*',DB::raw('count(*) as cnt_attributes'))
                ->where('idCategorie',$Category_)
                ->groupBy('nameProduct')->orderBy('nameProduct','Asc')->get();
            }
            if($Category_==0 && $State_>=1){
                // return $State_;
                $Products = Store_products_selection::select('*',DB::raw('count(*) as cnt_attributes'))
                ->where('idState',$State_)
                ->groupBy('visible_publico','nameProduct')->orderBy('nameProduct','Asc')->get() ;
            }

            return view('theme.components.administrator.comp_store.filterAdminProduct')
            ->with([
                "Products" => $Products,
                "Store_categorie_" => $Store_categorie_,
            ]);

        }
    }

    
    public function checkClient(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $Config_ = core_template_manager::where('idState',1)->where('main',1)->first();
            if(!empty($_COOKIE['_gid'])){
                $type_client_= $_COOKIE['_gid'];
            }else{
                $type_client_= 'P';
            }
            
           
        }else{

        }
        
    }

    public function viewOffersProduct(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $Config_ = core_template_manager::where('idState',1)->where('main',1)->first();
            if(!empty($_COOKIE['_gid'])){
                $type_client_= $_COOKIE['_gid'];
            }else{
                $type_client_= 'P';
            }

             $Store_categorie_menu =  Store_products_selection::where('visible_publico', $type_client_)
                ->where('idState',1)
                ->groupBy('categoria_main')
                ->orderBy('order_category','Asc')
                ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState']);

            
            $Offers_ = Store_products_selection::where('isOffers',1)
            ->where('visible_publico',$type_client_)->where('idState',1)->groupBy('nameProduct')->get();
            $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->where('idState',1)->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);

             /*-- Compra y Envio ----*/
            $min_compra_ = Store_attributes_value::where('idState',1)->whereIn('id',['15'])->first();
            $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();
            /*----------------------*/
           
            
            return view('theme.components.store.comp_offers.listOffers')
            ->with([
                "Config_" => $Config_,
                "Offers_" => $Offers_,
                "Store_categorie_" => $Store_categorie_,
                "min_compra_" => $min_compra_,
                "envio_" => $envio_,
                "Store_categorie_menu" => $Store_categorie_menu
            ]); 
        }else{

        }
        
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $UpdateAccount_ = User::where('id',$id)
        ->where('idState',1)
        ->first();
        //return $UpdateAccount_;
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){}
    

    /*-- Cambia el estado a cancelado de las ordenes --*/

    public function orderCancel(Request $request){
        $find_ = Store_order::where('idUser',Auth::user()->id)->where('id',$request->idOrder)->where('idStateOrder',1)->first();
        if(!empty($find_)){
            $find_->idState = 2;
            $find_->update();
            return "Y";
        }else{
            return "N";
        }
    }

    public function orderDetail(Request $request){
        $order_ = Store_order::where('idUser',Auth::User()->id)->where('id',$request->idOrder)
        ->first();
        //dd($order_);

       $ListProduct = Store_detail_order::where('idUser',Auth::User()->id)
        ->where('id',$request->idOrder)
        ->get();

        //dd($ListProduct);
        if(!empty($ListProduct)){
            /*-- Compra y Envio ----*/
            $min_compra_ = Store_attributes_value::where('idState',1)->whereIn('id',['15'])->first();
            $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();
            /*----------------------*/
            
            return view('theme.components.store.comp_products.viewPanelDetailCarProducts',compact('ListProduct','min_compra_','envio_','order_'));
        }else{

        }
        
    }
    public function orderDetailCopy(Request $request){
        $ListProduct=Store_detail_order::where('idUser',Auth::User()->id)
         ->where('id',$request->idOrder)
         ->get();
         // dd($ListProduct);
         if(!empty($ListProduct)){
             return view('theme.components.store.comp_products.viewPanelDetailCarProductsCopy',compact('ListProduct'));
         }else{
 
         }
         
     }
    
    
    public function searchAll(Request $request){
        $Config_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        $Store_categorie_ =  store_categorie::where('idState',1)->orderBy('nameCategorie')->get();
       
        if(!empty($request->DataSearch)){
            $Products = Store_products_list::where('solo_publico',1)->orWhere('solo_comercio1',1)->where('nameProduct','like','%'.$request->DataSearch.'%')->select('*','priceProduct', DB::raw('count(*) as cnt_attributes'))->where('solo_publico',1)->orWhere('solo_comercio',1)->where('nameProduct','like','%'.$request->DataSearch.'%')->where('idState',1)->groupBy('idProduct')->orderBy('nameProduct','ASC')->get();
        }else{
            $Products = Store_products_list::where('solo_publico',1)->orWhere('solo_comercio',1)->where('idState',1)->select('*','priceProduct', DB::raw('count(*) as cnt_attributes'))->where('solo_publico',1)->orWhere('solo_comercio',1)->where('idState',1)->groupBy('idProduct')->orderBy('nameProduct','ASC')->get();
        }
        return view('themes.'.$Config_->name_theme.'.web.comp_store_category.filterProduct')
        ->with([
            "Config_" => $Config_,
            "Products" => $Products,
        ]); 
    }

    public function searchfilterAll(Request $request){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);
            if(!empty($request->DataSearch)){
                $Products = Store_products_selection::select('*',DB::raw('count(*) as cnt_attributes'))->where('nameProduct','like','%'.$request->DataSearch.'%')->groupBy('nameProduct')->orderBy('nameProduct','Asc')->get()->take(20);
            }else{
                $Products = Store_products_selection::select('*',DB::raw('count(*) as cnt_attributes'))->where('nameProduct','like','%'.$request->DataSearch.'%')->groupBy('nameProduct')->orderBy('nameProduct','Asc')->get()->take(20);
            }
             return view('theme.components.administrator.comp_store.filterAdminProduct')
            ->with([
                "Products" => $Products,
                "Store_categorie_" => $Store_categorie_,
            ]); 
        }
    
    }


    public function viewCategorieProduct($slug){
        $Config_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        $Store_categorie_ =  store_categorie::where('idState',1)->where('slug','<>',$slug)->orderBy('nameCategorie')->get();
        $slug = store_categorie::where('idState',1)->where('slug',$slug)->first();
        $slugDescription = store_categorie::where('idState',1)->where('slug',$slug)->first('description');
        
        
        $Products = Store_products_list::where('idCategorie',$slug->id)->where('idState',1)->orderBy('nameProduct','ASC')->get();
        return view('themes.'.$Config_->name_theme.'.web.comp_store_category.listCategory')
        ->with([
            "Config_" => $Config_,
            "Products" => $Products,
            "slug" => $slug->nameCategorie,
            "dataCategorie" => $slug,
            "Store_categorie_" => $Store_categorie_,
        ]); 
    }

    /*--- Servicios personalizados ---*/

    /*-------------------------------------------*/
   

    public function removeCarView(Request $request){
        $Config_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        $ArrayOrder_ = json_decode($request->dataJson,true);

        $DataBasketDelete_ = Store_orders_detail::where('idTempCar',$request->idJson)
        ->where('idProduct',$request->itemDel)->delete();
       
        $DataBasketResult_ = store_products_temp::where('idTempCar',$request->idJson)->get();
        $ListProduct = json_decode($DataBasketResult_,true);
        /*-- Compra y Envio ----*/
        $min_compra_ = Store_attributes_value::where('idState',1)->whereIn('id',['15'])->first();
        $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();
        /*----------------------*/
        return view('themes.'.$Config_->name_theme.'.system.modules.mod-'.$Config_->templateDefault.'.viewPanelCarProducts',compact('ListProduct','min_compra_','envio_'));
    }

    public function addCarView(Request $request){
        $Config_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        $ArrayOrder_ = json_decode($request->dataJson,true);

        /*----*/
        if($request->action=="A"){
            foreach($ArrayOrder_ as $OrderArray){

                $DataBasket_ = Store_orders_detail::where('idTempCar',$request->idJson)
                ->where('idProduct',$OrderArray['idProduct'])->first();
                if(!empty($DataBasket_)){
                    /* No encuentro el valor */
                    $DataBasket_->nameProduct = $OrderArray['nameProduct'];
                    $DataBasket_->idAttribute = $OrderArray['idAttribute'];
                    $DataBasket_->priceOrder = $OrderArray['priceOrder'];
                    $DataBasket_->priceComerceOrder = 0;
                    $DataBasket_->stockOrder = $OrderArray['stockOrder'];
                    $DataBasket_->totalOrder = ($OrderArray['inventory']*$OrderArray['priceOrder']);
                    $DataBasket_->quantityOrder = $OrderArray['inventory'];
                    $DataBasket_->update();
                }else{

                    /*Agrego el producto*/
                    $TmpOrderDetail = new Store_orders_detail();
                    $TmpOrderDetail->idOrder = 0;
                    $TmpOrderDetail->idUser = 0;
                    $TmpOrderDetail->idProduct = $OrderArray['idProduct'];
                    $TmpOrderDetail->nameProduct = $OrderArray['nameProduct'];
                    $TmpOrderDetail->idAttribute = $OrderArray['idAttribute'];
                    $TmpOrderDetail->priceOrder = $OrderArray['priceOrder'];
                    $TmpOrderDetail->priceComerceOrder = 0;
                    $TmpOrderDetail->stockOrder = $OrderArray['stockOrder'];
                    $TmpOrderDetail->totalOrder = ($OrderArray['inventory']*$OrderArray['priceOrder']);
                    $TmpOrderDetail->quantityOrder = $OrderArray['inventory'];
                    $TmpOrderDetail->idTempCar = $request->idJson;
                    $TmpOrderDetail->save();
                }
            }
        }
        /*-----*/

        if($request->action=="D"){
            return "aqui";
            $DataBasketDelete_ = Store_orders_detail::where('idTempCar',$request->idJson)
            ->where('idProduct',$request->itemDel)->first();
            dd($DataBasketDelete_);
        }
       
        $DataBasketResult_ = store_products_temp::where('idTempCar',$request->idJson)->get();
        $ListProduct = json_decode($DataBasketResult_,true);
        /*-- Compra y Envio ----*/
        $min_compra_ = Store_attributes_value::where('idState',1)->whereIn('id',['15'])->first();
        $envio_ = Store_attributes_value::where('idState',1)->whereIn('id',['16'])->first();
        /*----------------------*/
        return view('themes.'.$Config_->name_theme.'.system.modules.mod-'.$Config_->templateDefault.'.viewPanelCarProducts',compact('ListProduct','min_compra_','envio_'));

    }

    /*-------------------------------------------*/
   


}
